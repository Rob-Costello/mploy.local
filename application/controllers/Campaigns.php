<?php


class Campaigns extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('login');
		$this->load->library('ion_auth');
		$this->load->model('CampaignsModel');
        $this->load->model('CompaniesModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
        $this->perPage =20;
        $this->offset =0;
        $this->load->library('pagination');
        $this->load->library('helpers');
        $campaigns = new CampaignsModel();
        $this->availableCampaigns=$campaigns->availableCampaigns();
	}


	function index( $pageNo = 0 )
	{
		$data['campaign_list'] = $this->availableCampaigns;
		$orderby = 'campaign_name';
		$data['orderby']='';
		if(isset($_GET['orderby'])){
			$orderby = $this->input->get('orderby');
			$data['orderby'] = '?orderby='.$orderby;
		}

		$data['headings'] = ['campaign_name','campaign_place_start_date','campaign_place_end_date','active','name'];
		$companies = new CampaignsModel();
        $offset=0;

        if($pageNo > 0){

        	$offset = $pageNo * $this->perPage;
        }

		$where = null;

        if(!empty($_POST)){

			$where = "campaign_name like '%".$this->input->post('search')."%'";

		}

		$data['campaigns'] = $companies->getCampaigns($where, $orderby, $this->perPage, $offset);

		$page = $this->helpers->page($data['campaigns'],'/campaigns',$this->perPage,$data['orderby']);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;

        if($data['pagination_end'] > $data['campaigns']['count']) {
            $data['pagination_end'] = $data['campaigns']['count'];
        }

        $data['message']  = $this->session->flashdata('message');
        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Campaigns';
		$data['nav'] = 'campaigns';
		$this->load->view('pages/campaigns/campaigns', $data);
    }



    function edit($id,$school_id){

		$campaign = new CampaignsModel();

		$dates= ['campaign_start_date','campaign_place_start_date',
		    'campaign_place_end_date','mailshot_1_date','mailshot_2_date',
		    'employer_engagement_start','employer_engagement_end','self_place_deadline',
		    'matching_start','matching_end'];

		$campData = $campaign->getCampaign($id);

			foreach ($dates as $date){

				$campData[$date] = date("d/m/Y", strtotime(strtr($campData[$date], '/', '-')));

			}

			$data['school_id'] = $campData['select_school'];

		$data['campaign_list'] = $this->availableCampaigns;
		$data['user']=$this->user;
		$output ="";
		$schoolHolidays = $campaign->getSchoolHoliday($data['school_id']);
		$holidays = [];

		foreach($schoolHolidays as $hol){
			if ($hol['start_date'] =='1970-01-01' || $hol['end_date'] =='1970-01-01' ){
				continue;
			}
			$holidays[] = ['start_date' => date("d/m/Y", strtotime(strtr($hol['start_date'], '/', '-'))),
			'end_date'=>date("d/m/Y", strtotime(strtr($hol['end_date'], '/', '-'))),
			'holiday_name' => $hol['holiday_name']];
		}

	    $data['holiday'] = $holidays;

		if(!empty($_POST)){
			if($this->input->post('active') =='')
			{
				$_POST['active'] = 0 ;

			}
			$required = ['campaign_name',
				'students_to_place',
				'self_placing_students',
				'select_school',
				'campaign_place_start_date',
				'campaign_start_date',
				'mailshot_1_date',
				'mailshot_2_date',
				'employer_engagement_start',
				'employer_engagement_end',
				'self_place_deadline',
				'matching_start',
				'matching_end'];

			foreach($dates as $d)
			{
				$_POST[$d] = date("Y-m-d", strtotime(strtr($this->input->post($d), '/', '-')));

			}

			$start = $this->input->post('start_date');
			$end = $this->input->post('end_date');
			$holiday = $this->input->post('holiday');
			$school = $this->input->post('select_school');

			if(null !== $start){

				for($i=0; $i < count($start); $i++){

					$available = $campaign->checkHoliday($school,['start_date'=>$start[$i],'end_date' => $end[$i], 'holiday_name' => $holiday[$i]]);

					if($available==null){
						$campaign->setSchoolHoliday(['start_date'=>date('Y-m-d',strtotime($start[$i])),
							'end_date' => date('Y-m-d',strtotime($end[$i])),
							'holiday_name' =>$holiday[$i],
							'school_id'=>$this->input->post('select_school')]);
					}
				}

			}

			//make dates db friendly
			foreach($dates as $d){
				$_POST[$d] = date("Y-m-d", strtotime($this->input->post($d)));

			}

			foreach($required as $r){
				if($_POST[$r] =='' || empty($_POST[$r]) || !isset($_POST[$r]))
				{
					$error[] = $r;
				}
			}


			if(isset($error)){
				$data['error'] = $error;
			}


			unset($_POST['start_date']);
			unset($_POST['end_date']);
			unset($_POST['holiday']);

			if(!isset($error)) {
				$temp = [];
				if(null!==($this->input->post('campaign_employer_id'))){

					foreach ($this->input->post('campaign_employer_id') as $employer) {

						$temp[] = ['campaign_employer_id' => $employer, 'org_campaign_ref' => $_POST['select_school'] ];

					}
					//remove employer id to stop error
					unset($_POST['campaign_employer_id']);
				}
				unset($_POST['search']);

				foreach ($temp as  $t) {

					$t['campaign_ref'] = $id;
					$campaign->addCompaniesToCampaign($t);

				}

				$where['status'] = "status like '%%'";
				$where['camp_ref'] = $id;



				$campaign->editCampaign($id,$this->input->post());
				$data['message'] = 'Campaign  '.$this->input->post('campaign_name') .' Updated ';
				$this->session->set_flashdata('message', 'Campaign  '.$this->input->post('campaign_name') .' Updated ');
				redirect('campaigns','refresh');
			}
		}

	    $where['status'] = "status like '%%'";
	    $where['camp_ref'] = $id;
		$data['dropdown'] = $campaign->getSchools();
	    $companies = $campaign->getEmployers($where);
	    $data['company_table'] = $companies['data'];
		$data['company_count'] = $companies['count'];
	    $data['entries'] = $campData;
		$this->load->view('pages/campaigns/campaign_edit', $data);
	}



	function getSelectedCompanies($id)
	{

		$campaign = new CampaignsModel();

		$companies = $campaign->getCampaignCompanies($id);

		echo json_encode($companies);

	}


	function newCampaign()
	{
        $data['campaign_list'] = $this->availableCampaigns;
        $data['user']=$this->user;
        $campaign= new CampaignsModel();
		$output ="";

		if(!empty($_POST)){


			$required = ['campaign_name',
				'students_to_place',
				'self_placing_students',
				'select_school',
				'campaign_place_start_date',
				'campaign_start_date',
				'mailshot_1_date',
				'mailshot_2_date',
				'employer_engagement_start',
				'employer_engagement_end',
				'self_place_deadline',
				'matching_start',
				'matching_end',
				'campaign_employer_id'
				];

			$dates= ['campaign_start_date','campaign_place_start_date',
				'campaign_place_end_date','mailshot_1_date','mailshot_2_date',
				'employer_engagement_start','employer_engagement_end','self_place_deadline',
				'matching_start','matching_end'];

			foreach($dates as $d)
			{
				$_POST[$d] = date("Y-m-d", strtotime(strtr($this->input->post($d), '/', '-')));
			}


			$start = $this->input->post('start_date');
			$end = $this->input->post('end_date');
			$holiday = $this->input->post('holiday');
			$school = $this->input->post('select_school');
			if(null !== $start){
				for($i=0; $i < count($start); $i++){
					$available = $campaign->checkHoliday($school,['start_date'=>$start[$i],'end_date' => $end[$i], 'holiday_name' => $holiday[$i]]);
					if($available==null){
						$campaign->setSchoolHoliday(['start_date'=>date('Y-m-d',strtotime($start[$i])),
													 'end_date' => date('Y-m-d',strtotime($end[$i])),
													 'holiday_name' =>$holiday[$i],
													'school_id'=>$this->input->post('select_school')]);
					}
				}
			}

			//make dates db friendly
			/*foreach($dates as $d){
				$_POST[$d] = date("Y-m-d", strtotime($this->input->post($d)));
			}*/


			foreach($required as $r){
				if($this->input->post($r) =='' ||  $this->input->post($r) == null)
				{
					$error[] = $r;
				}
			}


			if(isset($error)){
				$data['error'] = $error;
			}

			unset($_POST['start_date']);
			unset($_POST['end_date']);
			unset($_POST['holiday']);

			if(!isset($error)) {
				foreach ($this->input->post('campaign_employer_id') as $employer)
				{
					$temp[] = ['campaign_employer_id' => $employer, 'org_campaign_ref' => $_POST['select_school'] ];
				}

				//remove employer id to stop error
				unset($_POST['campaign_employer_id']);
				unset($_POST['search']);
				//get id for insert as campaign reference
                $campaign_id = $campaign->createCampaign($this->input->post());




                $companies = [];

					foreach ($temp as  $t) {
						$t['campaign_ref'] = $campaign_id;

						$campaign->addCompaniesToCampaign($t);

					}
				//}
				$data['message'] = 'New Campaign  '.$this->input->post('campaign_name') .' Created ';
				$this->session->set_flashdata('message', 'New Campaign  '.$this->input->post('campaign_name') .' Created ');
				redirect('campaigns','refresh');
				//$this->load->view('pages/campaigns/campaigns', $data);
			}
		}

		//create progress bar and feed in placements query
		//$campaign->placements($id);
		$data['dropdown']=$campaign->getSchools();
		$data['values'] = array();
		foreach($_POST as $k => $p){

			$data['values'][$k] = $p;


		}
		//var_dump($data['values']);
		$this->load->view('pages/campaigns/new_campaign',$data);

    }






    function employers( $camp_ref, $pageNo = 0 ){



			$hasSearch = false;
	        $data['campaign_list'] = $this->availableCampaigns;
			$campaign= new campaignsModel();
			$school = $campaign-> lookupCampaign($camp_ref);
			$data['camp_data']= $school;
			$data['call_data']= $campaign->campaignCalls($camp_ref);

			$orderby = 'mploy_organisations.org_id';
			$data['orderby']='';
			$like = null;
			$data['school_id'] = $school['select_school'];
			if(isset($_GET['orderby'])){
				$orderby = $this->input->get('orderby');
				$data['orderby'] = '?orderby='.$orderby;

			}

			if(!empty($_POST)){

				$like = $this->input->post('search');
				$hasSearch=true;
			}

			$data['user']=$this->user;
			$data['headings'] = ['Name','Main Telephone','Address','Line of Business','Status'];
			$data['fields'] = ['name','phone','address1','line_of_business','status'];
			$offset=0;

			if($pageNo > 0){
				$offset = $pageNo * $this->perPage;
			}

			//$where['organisation_type_id'] = '2' ;
            //$where = $camp_ref;
			$data['status'] = 'all';
			$where['status'] = "status like '%%'";
			$where['camp_ref'] = $camp_ref;
			if(isset($_GET['status']))
			{
				if ($_GET['status'] !=='all'){
					$where['status'] = "status='".$_GET['status']."'";

				}


				$data['status'] = $_GET['status'];
			}

			if ($hasSearch){
				$data['campaign'] = $campaign->getEmployers($where,$orderby,$like, null, null,$camp_ref);
				$page = $this->helpers->page($data['campaign'],'/campaigns/employers/'.$camp_ref,count($data['campaign']));
			}
			else{
				$data['campaign'] = $campaign->getEmployers($where,$orderby,$like, $this->perPage, $offset,$camp_ref);
				$page = $this->helpers->page($data['campaign'],'/campaigns/employers/'.$camp_ref,$this->perPage);
				$this->pagination->initialize($page);
			}

			$data['pagination_start'] = $offset + 1;
			$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		
			if($data['pagination_end'] > $data['campaign']['count']) {
				$data['pagination_end'] = $data['campaign']['count'];
			}


			$data['campaign_name'] =$school['campaign_name'];
			$data['pagination'] = $this->pagination->create_links();
			$data['user'] = $this->user;
			$data['title'] = 'Campaign';
			$data['nav'] = 'campaign';
			$data['camp_ref'] = $camp_ref;
			$data['camp_id'] = $school['select_school'];
			$data['table']= $campaign->getEmployers($where,null, $this->perPage, $offset);

			$this->load->view('pages/campaigns/campaign_employers',$data);

		}

			function employerDetails($camp_ref,$id)
			{

				$campaign_id = $this->input->get('campid');
				$data['entries'] = $camp_ref;
				$data['campaign_list'] = $this->availableCampaigns;
			    $campaign= new campaignsModel();
				//$data['employer'] = $campaign->employerDetails($id);
				$info = $campaign->employerDetails($campaign_id,$id);
				$data['call_message'] = $this->session->flashdata('call_message');
				$data['employer'] = $info['company'][0];
				$data['company'] = $info['company'];
				$data['company_message'] = $this->session->flashdata('company_message');
				$data['calls'] = $campaign->campaignEmployerCalls($campaign_id,$id);
				$data['camp_id'] = $camp_ref;
				$data['comp_id'] = $id;
				$data['user'] = $this->user;
				$data['title'] = 'Campaign';
				$data['nav'] = 'campaign';
				$data['contacts_table']= ['Name', 'Position', 'Phone', 'Email'];
				$data['call_table'] = ['User','Type','Reciprocant','Notes','Date','Outcome'];
				//$data['placements'] = $campaign->getPlacements($camp_ref, $id);
				$data['placements'] = $campaign->getSuccessfulPlacement($id);
				$data['campaign'] = $campaign_id;
				$data['student_message']  = $this->session->flashdata('student_message');
				//$data['company_message'] = 'Updated Company Successfully';
				if(!empty($_POST)){

				    if($this->input->post('update_company') == 'submit'){
				        $company = new companiesModel();
				        unset($_POST['update_company']);
				        $company->updateCompany($id,$this->input->post());
                        $this->session->set_flashdata('company_message', 'Updated company details');
                        $data['company_message'] = 'Updated Company Successfully';
                        redirect('campaigns/employerdetails/'.$camp_ref.'/'.$id);
                        //$this->load->view('pages/campaigns/campaign_employer_details',$data);
                    }

                }

				$this->load->view('pages/campaigns/campaign_employer_details',$data);
			}


			function newCall($camp_ref,$id)
			{
				$campid = $this->input->get('campid');
				$data['entries'] = $camp_ref;
				$data['campaign_list'] = $this->availableCampaigns;
			    $campaign = new campaignsModel();
				$data['date'] = date('d/m/Y H:i:s');
				$data['user'] = $this->user;
				$data['activity'] = $campaign->getActivity();
				$data['messages']='';
				$data['camp_id'] = $campid;
				if($campid == null || $campid =='') {
					$data['camp_id'] = $camp_ref;
				}

				$data['comp_id'] = $id;


				if(!empty($_POST)){

					$_POST['date_time'] = date('Y-m-d H:i:s');
					$campaign->newCall($this->input->post());
                    $this->session->set_flashdata('call_message', 'New Call Logged');
                    redirect('campaigns/employerdetails/'.$camp_ref.'/'.$id.'?campid='.$campid,'refresh');

				}
				$this->load->view('pages/campaigns/campaign_employer_new_call',$data);
			}




			function findCampaigns(){

				$campaign = new campaignsModel();
				if(!empty($_POST)) {
					$school = $this->input->post('school');
					$list = $campaign->listCampaigns($school);
					$option= '<option>Select Campaign</option>';
					foreach($list as $k => $item){

						$option.= '<option value="'.$item['campaign_id'].'">'.$item['campaign_name'].'</option>';
					}
					echo $option;
				}
				echo json_encode( "nothing");
			}


			function calendar($id,$campaign=null){
                $data['title'] = 'Calendar';
                $data['user'] = $this->user;
                $campaign = new campaignsModel();

                if(!empty($_POST)) {

                	$_POST['start'] =
					$_POST['end'] =

					$list = $campaign->newCalendarEntry($id,$this->input->post());

                }

				$data['entries'] = $campaign->getCalendarEntries($id);

				$calendar = $campaign->getCalendarEntries($id);
				$campaignDates = $campaign->getCampaignDates($id);

				//var_dump($calendar);
				//var_dump($campaignDates);

				$data['entries']='';
				//var_dump($campaignDates);

				$dates= [['campaign_place_start_date','campaign_place_end_date'],
					'mailshot_1_date',
					'mailshot_2_date',
					['employer_engagement_start','employer_engagement_end'],
					'self_place_deadline',
					'matching_start','matching_end'];

				$calendarDates = $campaign->getCalendarEntries($id);

				$holidayDates = $campaign->getSchoolHoliday($id);


				foreach($holidayDates as $hol){

					$title = $hol['holiday_name'];
					$start =   'start		:\''. date('Y-m-d H:i:s',strtotime($hol['start_date'])).'\',';
					$end =   'end		:\''. date('Y-m-d H:i:s',strtotime($hol['end_date'])).'\',';

					$data['entries'] .= '{
                    	title          : \''. $hol['holiday_name'].' \',
                    	'.$start.'
                    	'.$end.'
                    	
                    	backgroundColor: \'#80ba27\', //green
                    	borderColor    : \'#80ba27\' //green
                		},';

				}




				foreach($calendarDates as $cal){

					$title = $cal['title'];
					$start =   'start		:\''. date('Y-m-d H:i:s',strtotime($cal['start'])).'\',';
					$end =   'end		:\''. date('Y-m-d H:i:s',strtotime($cal['end'])).'\',';

					$data['entries'] .= '{
                    	title          : \''. $cal['title'].' \',
                    	'.$start.'
                    	'.$end.'
                    	
                    	backgroundColor: \'#86d0f4\', //blue
                    	borderColor    : \'#86d0f4\' //blue
                		},';

				}

				foreach($campaignDates as $k => $camp){

					foreach($dates as $d) {

						if (is_array($d)) {
							//$start = 'start		:$.fullCalendar.formatDate('.strtotime($camp[$d[0]]).',"yyyy-MM-dd"), ';
							$start =   'start		:\''. date('Y-m-d H:i:s',strtotime($camp[$d[0]])).'\',';
							$end =   'end		:\''. date('Y-m-d H:i:s',strtotime($camp[$d[1]])).'\',';

						} else {
							$start =   'start		:\''. date('Y-m-d H:i:s',strtotime($camp[$d])).'\',';
							$end =   'end		:\''. date('Y-m-d H:i:s',strtotime($camp[$d])).'\',';

						}

						$data['entries'] .= '{
                    	title          : \''. $camp['campaign_name'].' \',
                    	'.$start.'
                    	'.$end.'
                    	
                    	backgroundColor: \'#f39c12\', //yellow
                    	borderColor    : \'#f39c12\' //yellow
                		},';
					}

				}


                $this->load->view('pages/campaigns/campaign_calendar',$data);

            }

			function getSchoolHolidays($id)
			{
				$campaign = new CampaignsModel();
				$holidays = $campaign->getSchoolHoliday($id);
				$dates = array();
				if ($holidays !== null){

					foreach($holidays as $h){
						if ($h['start_date'] =='1970-01-01' || $h['end_date'] =='1970-01-01' ){
							continue;


						}
					$dates[]=$h;
					}


				}
				echo json_encode($dates);
			}


	function newplacement($school,$company){
		$data['user']=$this->user;
		$campaign = new CampaignsModel();
		$data['company']=$company;
		$data['school'] = $school;

		$data['students']  = $campaign->getStudents($school);

		if(!empty($_POST))
		{
			$_POST['placement_start_date'] = date("Y-m-d", strtotime($this->input->post('placement_start_date')));
			$_POST['placement_end_date'] = date("Y-m-d", strtotime($this->input->post('placement_end_date')));
			$id = $this->input->post('id');
			unset($_POST['id']);
			$campaign->updateCompanyContact($id,$this->input->post());
			$this->session->set_flashdata('student_message', 'Student Added to Company');
			redirect('campaigns/employerdetails/'.$school.'/'.$company,'refresh');
			//$success = $school->createCall($this->input->post(),$id);

		}
		$this->load->view('pages/campaigns/campaign_new_placement',$data);

	}



			function calculateDates()
			{
				//need to get info from config set static for now
				$dates = [ 'mailshot_1_date'=>'+7 day', 'mailshot_2_date' => '+14 day',
					'employer_engagement_start'=>' +14 day', 'employer_engagement_end'=>'-9 week', 'self_place_deadline'=>'-7 week',
					 'matching_end'=>'-7 week'];

				$placement = ['employer_engagement_end'=>'-9 week', 'self_place_deadline' =>'-7 week','matching_end' =>'-7 week'];
				if (!empty($_POST)) {
					if ($this->input->post('campaign_place_start_date')) {
						$start = new DateTime();
						$start->setTimestamp( strtotime($this->input->post('campaign_start_date')));
						$place_start = new DateTime();
						$place_start->setTimestamp( strtotime($this->input->post('campaign_place_start_date')));
						$place_end = new DateTime();
						$place_end->setTimestamp(strtotime($this->input->post('campaign_place_end_date')));
						$array = [];
							foreach ($dates as $k => $day){
								if(in_array($k,(array_keys($placement)))){
									$array[$k] = date ('d/m/Y',strtotime( $day));
								}
                                else {
                                    $array[$k] = date('d/m/Y', strtotime( $day));
                                }
							}

							echo json_encode($array, true);
					}
				}
			}


			function getBusiness($campaign_id = null){
				$campaign = new CampaignsModel();
					if (!empty($_POST)) {
						$where='';
						foreach($_POST as $k => $v) {
							if ($v !== '') {
								$where .= " and " . $k . " like '%" . $v . "%'";
							}
						}
						$dates = $campaign->getCompaniesByPostcode($where);
						echo json_encode($dates);
					}
			}


}
