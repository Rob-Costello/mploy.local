<?php

class Users extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('login');
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->library('helpers');
		$this->load->model('CustomersModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage = 20;
		$this->offset = 0;
		$this->load->library('pagination');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->tabs = array('School Information' => '',
			'School Contacts' => 'contacts',
			'School Placements' => 'placements',
			'School Call History' => 'history');
	}

	function message(){

		if (!empty($_POST)) {
			unset($_SESSION['message']);
		}


	}


	function index($id=0)
	{

		$sortby = null;
		if (!empty($_POST)) {
			$sortby = $this->input->post('sort');
		}

		$page = $id;
		$data['headings'] =
			['Name' => 'first_name',
			'Email' => 'email',
			'Username' => 'username',
			'Phone' => 'phone',
				'Company' => 'company'];

		$customers = new CustomersModel();
		$offset=0;

		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}

		$data['users'] = $customers->getCustomers(null, null, $this->perPage, $offset,$sortby);
		$page = $this->helpers->page($data['users'],'/users',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;

		if($data['pagination_end'] > $data['users']['count'])
		{
			$data['pagination_end'] = $data['users']['count'];
		}
		$data['sortby']=$sortby;
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Users';
		$data['nav'] = 'Users';
		$this->load->view('pages/customers/customers', $data);
	}



}
