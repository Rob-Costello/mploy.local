<?php

class Customers extends CI_Controller
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
		$this->perPage = 1;
		$this->offset = 0;
		$this->load->library('pagination');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->tabs = array('School Information' => '',
			'School Contacts' => 'contacts',
			'School Placements' => 'placements',
			'School Call History' => 'history');
	}


	function index($id=0)
	{

		$sortby = null;
		if (!empty($_POST)) {
			$sortby = $this->input->post('sort');
		}

		$page = $id;
		$data['headings'] =
			['Name' => ['first_name','last_name'],
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

		$data['customers'] = $customers->getCustomers(null, null, $this->perPage, $offset,$sortby);
		$page = $page = $this->helpers->page($data['customers'],'/customers',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;

		if($data['pagination_end'] > $data['customers']['count'])
		{
			$data['pagination_end'] = $data['customers']['count'];
		}
		$data['sortby']=$sortby;
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Customers';
		$data['nav'] = 'Customers';
		$this->load->view('pages/customers/customers', $data);
	}



}
