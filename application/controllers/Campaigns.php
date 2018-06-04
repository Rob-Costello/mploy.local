<?php


class Campaigns extends CI_Controller
{

	public function __construct(){

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
	}


	function index( $pageNo = 0 )
	{
		$data['headings'] = ['Name','Main Telephone','Main Contact','Status'];
		$companies = new CampaignsModel();
        $offset=0;

        if($pageNo > 0){
			$offset = $pageNo * $this->perPage;
		}
        
        $where = ['active' => '1'] ;
		$data['campaigns'] = $companies->getCampaigns($where, null, $this->perPage, $offset);
        //$data['companies']=$output;
        $page = $this->helpers->page($data['campaigns'],'/companies',$this->perPage);
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

    function newCampaign(){

        $data['user']=$this->user;
        //$data['id']=$id;
        $company= new CampaignsModel();
        if(!empty($_POST)){
            $success = $company->updateCompanyContact($id,$this->input->post());
            $data['message'] = "Information updated";
        }
        //$data['table']= $company->getCompanyContact($id);
        $this->load->view('pages/campaigns/new_campaign',$data);

    }







}