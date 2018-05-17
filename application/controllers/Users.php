<?php

class Schools extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('login');
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('SchoolsModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage = 1;
		$this->offset = 0;
		$this->load->library('pagination');
		$this->tabs = array('School Information' => '',
			'School Contacts' => 'contacts',
			'School Placements' => 'placements',
			'School Call History' => 'history');
	}






}
