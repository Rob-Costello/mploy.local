<?php

Class Customers extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->library('ion_auth');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->load->library(array('ion_auth', 'form_validation'));
		if ($this->ion_auth->logged_in()) {
			$this->load->view('pages/about');
		} else {

			$this->load->view('auth/login');
		}

	}




}
