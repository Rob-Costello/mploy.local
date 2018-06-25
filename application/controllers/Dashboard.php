<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct(){

		parent::__construct();
		$this->load->model('login');
		$this->load->library('ion_auth');
		$this->load->model('CompaniesModel');
        $this->load->model('CustomersModel');
        $this->load->model('UsersModel');
        $this->load->model('CampaignsModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage =20;
		$this->offset =0;
		$this->load->library('pagination');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$customersModel = new CustomersModel();
		$companiesModel = new CompaniesModel();
		$usersModel = new UsersModel();
		$campaignsModel = new CampaignsModel();

		$data['user'] = $this->user;
		$data['school_count'] = count($customersModel->getCustomers('organisation_type_id = 1')['data']);
		$data['company_count'] = count($companiesModel->getCompanies('organisation_type_id = 2')['data']);
		$data['user_count'] = count($usersModel->getUsers()['data']);
		$data['campaigns_count'] = count($campaignsModel->getCampaigns()['data']);


		$data['campaigns_display'] = $campaignsModel->getCampaigns(null, null, 5, 0)['data'];
		$callInfo = [];
		$output = [];
        $call = 0;
		foreach ($data['campaigns_display'] as $c) {

            $where = "select_school = " . $c->select_school . " and campaign_place_start_date < now() and campaign_place_end_date > '" . date("Y-m-d") . "'";
            $info = $customersModel->getPlacements($where); //need to check if placement end date has expired
            $temp = [];


            foreach ($info as $active) {
                $callstats = $customersModel->getCallData($c->select_school);
                $call = 0;

                foreach ($callstats as $stat) {
                    if ($stat->rag_status == 'green') {
                        $call++;
                    }
                }

                $calls = $campaignsModel->callInfo($c->select_school, $c->employer_engagement_end)['calls'];
                $info = $campaignsModel->callAmmount($c->select_school)['total'];



                $callInfo[] = ['call' => $calls, 'info' => $info, 'success' => $call, 'total' => $active['students_to_place']];

                //$placed[] = ['success'=>$call, 'total'=> $active['students_to_place']] ;

            }
            $output[]  = ['campaign_display'=>$c,'call_info'=>$callInfo];
        }


			//$data['placed'] = $placed;
			//$data['placed'] = $placed;
			$data['callinfo'] = $callInfo;
            $data['output'] = $output;
			//$data['campaign_calls'] = $campaignsModel->callInfo();
			$this->load->view('pages/dashboard', $data);


	}

	public function dashboard2(){
			$data['user'] = $this->user;
			$this->load->view('pages/dashboard2',$data);

	}

}
