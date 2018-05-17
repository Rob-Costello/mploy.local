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
		$this->load->model('YoungPeopleModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage = 1;
		$this->offset = 0;
		$this->load->library('pagination');
		$this->tabs = ['Person\'s Details' => '', 'Membership'=>'membership','History'=>'history','Login Details'=>'login',];

	}

	public function index($id=0){

		$youngPeople = new YoungPeopleModel();
		$search=null;

		if (!empty($_POST)) {
			$search = $this->input->post('search');
		}

		$page = $id;
		//$data['headings'] = ['Name','Address','Town','County','Postcode','phone_number','Type of Institution','Funding Model'];
		$data['headings'] = ['first_name'=>'First Name', 'last_name' => 'Last Name', 'phone' =>'Phone Number','carer' => 'Parent / Carer'];
		$offset=0;

		if(!empty($_POST))
		{
			$this->
			$youngPeople->findYoungPerson();
		}

		if($page > 0){
			$offset = $page * $this->perPage;
		}

		$data['people'] = $youngPeople->getYoungPeople($search, null, $this->perPage, $offset);

		$page = $this->helpers->page($data['people'],'/youngpeople',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		if($data['pagination_end'] > $data['people']['count']) {
			$data['pagination_end'] = $data['people']['count'];
		}
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Young People';
		$data['nav'] = 'young people';
		$this->load->view('pages/young_people/young_people', $data);

	}



	function page($model,$baseurl,$perPage=1)
	{

		$pagConfig['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$pagConfig['full_tag_close'] = '</ul>';
		$pagConfig['base_url'] = $baseurl;
		$pagConfig['total_rows'] = $model['count'];
		$pagConfig['per_page'] = $perPage;
		$pagConfig['num_tag_open'] = '<li class="paginate_button">';
		$pagConfig['num_tag_close'] = '</li>';
		$pagConfig['cur_tag_open'] = '<li class="paginate_button activePage">';
		$pagConfig['cur_tag_close'] = '</li>';
		$pagConfig['prev_link'] = 'Previous';
		$pagConfig['prev_tag_open'] = '<li class="paginate_button previous">';
		$pagConfig['prev_tag_close'] = '</li>';
		$pagConfig['next_link'] = 'Next';
		$pagConfig['next_tag_open'] = '<li class="paginate_button next">';
		$pagConfig['next_tag_close'] = '</li>';

		return $pagConfig;


	}

	function view($id, $page = null, $pagenumber = 0)
	{

		$data['id']=$id;
		$data['user']=$this->user;
		$youngpeople= new YoungPeopleModel();
		if(!empty($_POST))
		{

			$success = $youngpeople->updateYoungPerson($id,$this->input->post());
			$data['message'] = "Information updated";
		}

		switch ($page)
		{

			case 'membership':
				$this->membership($id, $pagenumber);
				break;

			case 'history':
				$this->history($id, $pagenumber);
				break;

			case 'login':
				$this->placements($id, $pagenumber);
				break;

			default:
				$data['tabs'] = $this->tabs;
				$data['table'] = $youngpeople->getYoungPerson($id);
				$this->load->view('pages/young_people/young_people_view', $data);
		}

	}



	function addStudent(){



	}

	function membership($id,$page=null){
		$data['user']=$this->user;
		$youngpeople = new YoungPeopleModel();

		if(!empty($_POST)){

			$youngpeople->updateMemebership($id,$this->input->post());

		}
		$data['id'] = $id;
		$data['tabs'] = $this->tabs;
		$data['table'] = $youngpeople->getYoungPerson($id);
		$this->load->view('pages/young_people/young_people_membership', $data);

	}




	function history($id,$page=null){
		$data['user']=$this->user;
		$youngpeople = new YoungPeopleModel();
		$data['id'] = $id;

		$data['tabs'] = $this->tabs;
		$data['table'] = $youngpeople->getYoungPerson($id);
		$this->load->view('pages/young_people/young_people_view', $data);

	}

	function placements($id,$page=null){
		$data['user']=$this->user;
		$youngpeople = new YoungPeopleModel();

		$data['tabs'] = $this->tabs;
		$data['table'] = $youngpeople->getYoungPerson($id);
		$this->load->view('pages/young_people/young_people_view', $data);
	}





}
