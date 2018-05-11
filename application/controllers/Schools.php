<?php


class Schools extends CI_Controller
{

	public function __construct(){

		parent::__construct();
		$this->load->model('login');
		//$this->load->model('messages');
		$this->load->library('ion_auth');
		$this->load->model('Schools_model');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();

	}


	function index($id=0)
	{

		$page = $id;
		$data['headings'] = ['Name','Address','Town','County','Postcode','phone_number','Type of Institution','Funding Model'];

		$this->load->library('pagination');

		$schools = new schools_model();

		$perPage = 1;
		$offset = 0;

		if($page > 0){
			$offset = $page * $perPage;
		}

		$data['schools'] = $schools->get_schools(null, null, $perPage, $offset);

		$page = $this->page($data['schools'],$id,$perPage,$offset);

		$data = array_merge($page,$data);
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Schools';
		$data['nav'] = 'schools';
		$this->load->view('pages/schools', $data);

	}





	function page($model,$page,$baseurl,$perPage=1,$offset = 0){


		$data=[];

		if($page > 0){
			$offset = $page * $perPage;
		}

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

		$this->pagination->initialize($pagConfig);

		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $perPage;

		if($data['pagination_end'] > $model['count']) {
			$data['pagination_end'] = $model['count'];
		}

	return $data;


	}



	function view($id =1){



		$school= new schools_model();

		$data['table']= $school->get_school($id);
		//$data['errors'] = $this->messages->get_errors();
		//$data['messages'] = $this->messages->get_messages();


		$this->load->view('pages/schools_view',$data);


	}






}


