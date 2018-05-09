<?php

Class Pages extends CI_Controller
{
	public function __construct(){

		parent::__construct();
		$this->load->model('login');
		$this->load->model('messages');
		$this->load->library('ion_auth');
		$this->load->model('jobsModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();



	}


	public function index(){



	}


}
