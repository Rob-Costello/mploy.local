<?php


class Schools extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('login');
		//$this->load->model('messages');
		$this->load->library('ion_auth');
		$this->load->model('Users_model');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();

	}



	public function index()
	{
		$users = new Users_model();

		$headings = ['First Name', 'Last Name', 'Phone','Email','Username','Company'];



		$data['users'] = $users->get_users();


	}


	public function register()
	{



	}



}


