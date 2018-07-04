<?php


class Campaigns extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->library('ion_auth');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage = 20;
		$this->offset = 0;
		$this->load->library('pagination');
		$this->load->library('helpers');
		$campaigns = new CampaignsModel();
		$this->availableCampaigns = $campaigns->availableCampaigns();

	}


	function index($pageNo = 0)
	{

		if($_POST){

			$this->input->post('key');


		}



	}


}
