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
		$data['headings'] = ['campaign_name','campaign_place_start_date','campaign_place_end_date','status','select_school'];
		$companies = new CampaignsModel();
        $offset=0;

        if($pageNo > 0){
			$offset = $pageNo * $this->perPage;
		}
        
		//$where = ['active' => '1'] ;
		$where = null;
		$data['campaigns'] = $companies->getCampaigns($where, null, $this->perPage, $offset);
        //$data['companies']=$output;
        $page = $this->helpers->page($data['campaigns'],'/campaigns',$this->perPage);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;

        if($data['pagination_end'] > $data['campaigns']['count']) {
            $data['pagination_end'] = $data['campaigns']['count'];
        }

        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Campaigns';
		$data['nav'] = 'campaigns';
		$this->load->view('pages/campaigns/campaigns', $data);
    }




	function newCampaign()
	{
        $data['user']=$this->user;
        $company= new CampaignsModel();	
		$start = $this->input->post('start_date');
		$end = $this->input->post('end_date');
		$holiday = $this->input->post('holiday');
		$output ="";
		
		$dates= ['campaign_start_date','campaign_place_start_date',
		'campaign_place_end_date','mailshot_1_date','mailshot_2_date',
		'employer_engagement_start','employer_engagement_end','self_place_deadline',
		'matching_start','matching_end'];

		foreach($dates as $d){

			$_POST[$d] = date("Y-m-d", strtotime($this->input->post($d)));
		}

		if(null !== $start){
			for($i=0; $i < count($start); $i++){
				$output .= $start[$i].' '.$end[$i].' '.$holiday[$i];
			}
		}

		unset($_POST['start_date']);
		unset($_POST['end_date']);
		unset($_POST['holiday']);
		
		if(!empty($_POST)){
			foreach($dates as $d){

				$_POST[$d] = date("Y-m-d", strtotime($this->input->post($d)));
			}
			
			$success = $company->createCampaign($this->input->post());
            $data['message'] = "Information updated";
			

		}
		
		$this->load->view('pages/campaigns/new_campaign',$data);

    }

		function employers( $camp_ref, $pageNo = 0 ){
				
			$data['headings'] = ['name','campaign_place_start_date','campaign_place_end_date','status','select_school'];
				$where = ['org_type'=>'2','status'=>'Available'];

				$campaign= new campaignsModel();
				
				if(!empty($_POST)){
					$success = $company->getCampaign($id,$this->input->post());
					$data['message'] = "Information updated";
				}
				
				//$data['id'] = $id;
				//$data['page'] = $page;
				$data['user']=$this->user;
				//$data['dropdown'] = $company->getDropDown();
				
				$data['headings'] = ['Name','Main Telephone','Address','Line of Business'];
				
				$offset=0;
		
				if($pageNo > 0){
					$offset = $pageNo * $this->perPage;
				}
				$where = ['organisation_type_id' => '2','status'=>'Available'] ;
				
				$data['campaign'] = $campaign->getEmployers($where,null, $this->perPage, $offset);
				//var_dump($data['campaign']);
				//$data['companies']=$output;
				$page = $this->helpers->page($data['campaign'],'/campaigns/employers/'.$camp_ref,$this->perPage);
				$this->pagination->initialize($page);
				$data['pagination_start'] = $offset + 1;
				$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		
				if($data['pagination_end'] > $data['campaign']['count']) {
					$data['pagination_end'] = $data['campaign']['count'];
				}
				//$data['campaign']=$camp_ref;
				$data['pagination'] = $this->pagination->create_links();
				$data['user'] = $this->user;
				$data['title'] = 'Campaign';
				$data['nav'] = 'campaign';
				$data['camp_id'] = $camp_ref;
				$data['table']= $campaign->getEmployers($where,null, $this->perPage, $offset);
				$this->load->view('pages/campaigns/campaign_employers',$data);
		
				
		
			}

			function employerDetails($camp_ref,$id)
			{
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
					$option= "";
					foreach($list as $k => $item){

						$option.= '<option value="'.$item['campaign_id'].'">'.$item['campaign_name'].'</option>';
					}

				}
				echo $option;
			}

	



}
