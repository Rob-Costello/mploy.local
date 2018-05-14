<?php

class YoungPeople extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('login');
		$this->load->library('session');
		//$this->load->model('messages');
		$this->load->library('ion_auth');
		$this->load->library('helpers');
		$this->load->model('YoungPeople_model');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage = 1;
		$this->offset = 0;
		$this->load->library('pagination');
	}

	public function index($id=0){



		$youngPeople = new youngpeople_model();
		//$data['people']=$youngPeople->get_youngpeople();


		$page = $id;
		$data['headings'] = ['Name','Address','Town','County','Postcode','phone_number','Type of Institution','Funding Model'];

		//$schools = new schools_model();

		$offset=0;

		if($page > 0){
			$offset = $page * $this->perPage;
		}

		$data['people'] = $youngPeople->get_youngpeople(null, null, $this->perPage, $offset);

		$page = $this->helpers->page($data['people'],'/youngpeople',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		if($data['pagination_end'] > $data['people']['count']) {
			$data['pagination_end'] = $data['people']['count'];
		}
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Schools';
		$data['nav'] = 'schools';
		$this->load->view('pages/schools', $data);

	}



}
