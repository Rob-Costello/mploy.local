<?php


class Campaigns extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('login');
		$this->load->library('ion_auth');
		$this->load->model('CampaignsModel');
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

		$data['headings'] = ['campaign_name','campaign_place_start_date','campaign_place_end_date','status','name'];
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

        $data['message'] = $data['message'] = $this->session->flashdata('message');
        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Campaigns';
		$data['nav'] = 'campaigns';
		$this->load->view('pages/campaigns/campaigns', $data);
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
				'matching_end'];

			$dates= ['campaign_start_date','campaign_place_start_date',
				'campaign_place_end_date','mailshot_1_date','mailshot_2_date',
				'employer_engagement_start','employer_engagement_end','self_place_deadline',
				'matching_start','matching_end'];

			foreach($dates as $d)
			{
				$_POST[$d] = date("Y-m-d", strtotime($this->input->post($d)));
			}

			$start = $this->input->post('start_date');
			$end = $this->input->post('end_date');
			$holiday = $this->input->post('holiday');
			$school = $this->input->post('select_school');
			if(null !== $start){

				for($i=0; $i < count($start); $i++){

					$available = $campaign->checkHoliday($school,['start_date'=>$start[$i],'end_date' => $end[$i], 'holiday_name' => $holiday[$i]]);

					if($available==null){

						$campaign->setSchoolHoliday(['start_date'=>$start[$i],'end_date' => $end[$i], 'holiday_name' => $holiday[$i]]);
					}
				}

			}

			//make dates db friendly
			foreach($dates as $d){
				$_POST[$d] = date("Y-m-d", strtotime($this->input->post($d)));
			}

			foreach($required as $r){
				if($_POST[$r] =='' || empty($_POST[$r]) ){
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
				$campaign->createCampaign($this->input->post());
				$data['message'] = 'New Campaign  '.$this->input->post('campaign_name') .' Created ';
				$this->session->set_flashdata('message', 'New Campaign  '.$this->input->post('campaign_name') .' Created ');
				redirect('campaigns','refresh');
				//$this->load->view('pages/campaigns/campaigns', $data);
			}
		}

		//create progress bar and feed in placements query
		//$campaign->placements($id);
		$data['dropdown']=$campaign->getSchools();




		$this->load->view('pages/campaigns/new_campaign',$data);

    }

		function employers( $camp_ref, $pageNo = 0 ){

			$hasSearch = false;
	        $data['campaign_list'] = $this->availableCampaigns;
			$campaign= new campaignsModel();
			$school = $campaign-> lookupCampaign($camp_ref);
			$orderby = 'mploy_organisations.org_id';
			$data['orderby']='';
			$like = null;

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

			$where['organisation_type_id'] = '2' ;
			$data['status'] = 'all';

			if(isset($_GET['status']))
			{
				if ($_GET['status'] !=='all'){
					$where['status'] = $_GET['status'];
				}
				$data['status'] = $_GET['status'];
			}

			if ($hasSearch){
				$data['campaign'] = $campaign->getEmployers($where,$orderby,$like, null, null);
				$page = $this->helpers->page($data['campaign'],'/campaigns/employers/'.$camp_ref,count($data['campaign']));
			}
			else{
				$data['campaign'] = $campaign->getEmployers($where,$orderby,$like, $this->perPage, $offset);
				$page = $this->helpers->page($data['campaign'],'/campaigns/employers/'.$camp_ref,$this->perPage);
				$this->pagination->initialize($page);
			}

			$data['pagination_start'] = $offset + 1;
			$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		
			if($data['pagination_end'] > $data['campaign']['count']) {
				$data['pagination_end'] = $data['campaign']['count'];
			}

			$data['pagination'] = $this->pagination->create_links();
			$data['user'] = $this->user;
			$data['title'] = 'Campaign';
			$data['nav'] = 'campaign';
			$data['camp_id'] = $school['select_school'];
			$data['table']= $campaign->getEmployers($where,null, $this->perPage, $offset);
			$this->load->view('pages/campaigns/campaign_employers',$data);

		}

			function employerDetails($camp_ref,$id)
			{
                $data['campaign_list'] = $this->availableCampaigns;
			    $campaign= new campaignsModel();
				//$data['employer'] = $campaign->employerDetails($id);
				$info = $campaign->employerDetails($camp_ref,$id);
				$data['messages'] = '';
				$data['employer'] = $info['company'][0];
				$data['company'] = $info['company'];
				$data['calls'] = $campaign->campaignEmployerCalls($camp_ref,$id);
				$data['camp_id'] = $camp_ref;	
				$data['comp_id'] = $id;
				$data['user'] = $this->user;
				$data['title'] = 'Campaign';
				$data['nav'] = 'campaign';
				$data['contacts_table']= ['Name', 'Position', 'Phone', 'Email'];
				$data['call_table'] = ['Type','Notes','Date','Outcome'];
				$this->load->view('pages/campaigns/campaign_employer_details',$data);
			
			}


			function newCall($camp_ref,$id)
			{
                $data['campaign_list'] = $this->availableCampaigns;
			    $campaign = new campaignsModel();
				$data['date'] = date('d/m/Y H:i:s');
				$data['user'] = $this->user;
				$data['activity'] = $campaign->getActivity();
				$data['messages']='';
				$data['camp_id'] = $camp_ref;	
				$data['comp_id'] = $id;
				
				if(!empty($_POST)){
					$campaign->newCall($this->input->post());
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



				foreach($campaignDates as $k => $camp){

					foreach($dates as $d) {

						if (is_array($d)) {
							$start =   'start		:new Date('.date($camp[$d[0]]).',"Y-MM-DD HH:mm:ss"),';
							$end =   'end		:new Date('.date($camp[$d[0]]).',"Y-MM-DD HH:mm:ss"),';

						} else {
							$start =   'start		:new Date('.$camp[$d].',"Y-MM-DD HH:mm:ss"),';
							$end =   'end		:new Date('.$camp[$d].',"Y-MM-DD HH:mm:ss" ),';

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
				if ($holiday !== null){
					foreach ($holidays as $hol) {


					}
				}
			}


			function calculateDates()
			{
				//need to get info from config set static for now
				$dates = ['campaign_start_date', 'mailshot_1_date', 'mailshot_2_date',
					'employer_engagement_start', 'employer_engagement_end', 'self_place_deadline',
					'matching_start', 'matching_end'];
				//var_dump( $_POST);
				if (!empty($_POST)) {
					if ($this->input->post('campaign_place_start_date')) {
						$start = new DateTime();
						$start->setTimestamp( strtotime($this->input->post('campaign_place_start_date')));
						$end = new DateTime();
						$end->setTimestamp(strtotime($this->input->post('campaign_place_end_date')));
						$interval = date_diff($start, $end);
						$days = $interval->format('%R%a');
						//echo $days;
						if (strstr($days, '+')) {
							$days = (int)$days;
							$interval = $days / count($dates);
							$array = [];
							$day = 0;
							for ($i = 0; $i < count($dates); $i++) {
								$array[$dates[$i]] = date('d-m-Y', strtotime($start->format('d-m-Y') . ' + ' . (int)$day . ' day'));
								$day += $interval;
							}
						}
						echo json_encode($array, true);
					}


				}
			}



}
