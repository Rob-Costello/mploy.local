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
		$this->load->model('StudentsModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage =5;
		$this->offset =0;
		$this->load->library('pagination');
		$this->tabs = array('School Information' =>'',
			           'School Contacts'=>'contacts',
			           'School Placements'=>'placements',
			           'School Call History'=>'history');
	}

	function index($id=0)
	{

		$sortby = null;
		if (!empty($_POST)) {
			$sortby = $this->input->post('sort');
		}

		$page = $id;
		$data['headings'] = ['Name' => 'name',
			'Address' => 'address1',
			'Town' => 'town',
			'County' => 'county',
			'Postcode' => 'postcode',
			'Phone Number' => 'phone_number',
			'Type of Institution' => 'type',
			'Funding Model' => 'price'];
		$schools = new SchoolsModel();
		$offset=0;

		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}
		//set organisation type to 1 for school
		$where = 'organisation_type_id =1';
		$data['schools'] = $schools->getSchools($where, null, $this->perPage, $offset,$sortby);
		$page = $this->page($data['schools'],'/schools',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;

		if($data['pagination_end'] > $data['schools']['count'])
		{
			$data['pagination_end'] = $data['schools']['count'];
		}
		$data['sortby']=$sortby;
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Schools';
		$data['nav'] = 'schools';
		$this->load->view('pages/schools/schools', $data);
	
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
		$school= new SchoolsModel();
		$data['messages']='';
		if(!empty($_POST))
		{
			$success = $school->updateSchool($id,$this->input->post());
			$data['messages'] = "Information updated";
		}

		switch ($page)
		{

			case 'contacts':
				$this->contacts($id, $pagenumber);
				break;

			case 'history':
				$this->history($id, $pagenumber);
				break;

			case 'placements':
				$this->placements($id, $pagenumber);
				break;

			case 'studentupload':
				$this->studentUpload($id);
				break;



				default:
					$data['tabs'] = $this->tabs;
					$data['table'] = $school->getSchool($id);
				$this->load->view('pages/schools/schools_view', $data);
		}

	}


	function contacts($id, $page=0)
	{
		$data['user']=$this->user;
		$data['id'] = $id;
		$school = new SchoolsModel();

		$offset=0;

		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}
		$data['contacts'] = $school->getContacts(array('school_id'=>$data['id'],'contact_type'=>'3' ), null, $this->perPage, $offset);
		$page = $this->page($data['contacts'],'/schools/view/'.$id.'/contacts',$this->perPage,$offset);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		if($data['pagination_end'] > $data['contacts']['count'])
		{
			$data['pagination_end'] = $data['contacts']['count'];
		}
		$data['pagination'] = $this->pagination->create_links();
		$header = ['first_name','last_name', 'job_title', 'phone', 'email'];
		$pretty = [];
		array_walk($header, function ($item, $key) use (&$pretty)
		{
			$pretty[] = ucwords(str_replace('_', ' ', $item));
		}
		);
		$data['fields'] = $header;
		$data['table_header'] = $pretty;
		$data['tabs'] = $this->tabs;
		$this->load->view('pages/schools/schools_contacts',$data);
	}


	function newSchool(){
		$school = new SchoolsModel();
		$data['user'] = $this->user;
		$data['messages'] = '';
		if(!empty($_POST)){

			$school->newSchool($this->input->post());
			$data['messages']='Successfully added school!';
		}

		$this->load->view('pages/schools/schools_new_school',$data);

	}


	function contactDetails($id)
	{

		$data['user']=$this->user;
		$data['id']=$id;
		$school= new SchoolsModel();
		$data['messages'] = '';
		if(!empty($_POST))
		{
			$success = $school->updateSchoolContact($id,$this->input->post());
			$data['messages'] = "Information updated";
		}
		$data['table']= $school->getSchoolContact($id);

		$this->load->view('pages/schools/school_contact_details',$data);

	}

	function history($id, $page=0)
	{

		$data['user']=$this->user;
		$data['id']=$id;
		$school = new SchoolsModel();

		$offset=0;

		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}

		$data['contacts'] = $school->getHistory(['select_school'=>$data['id']], null, $this->perPage, $offset);
		$page = $this->page($data['contacts'],'/schools/view/'.$id.'/history',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		if($data['pagination_end'] > $data['contacts']['count'])
		{
			$data['pagination_end'] = $data['contacts']['count'];
		}
		$data['pagination'] = $this->pagination->create_links();



		$header = ['date', 'time', 'caller', 'receiver','origin','call_notes'];
		$pretty = [];
		array_walk($header, function ($item, $key) use (&$pretty)
		{
			$pretty[] = ucwords(str_replace('_', ' ', $item));
		}
		);
		$data['tabs'] = $this->tabs;
		$data['fields'] = $header;
		$data['table_header'] = $pretty;

		$this->load->view('pages/schools/school_history',$data);
	}

	function call($id){
		$school = new SchoolsModel();
		$data['user']=$this->user;
		$data['id'] = $id;
		//$data['id']=$this->session->schoolid;
		$data['contacts']=$school->getContacts(array('school_id'=>$data['id']));
		$data['messages']='';
		if(!empty($_POST)){
			$success = $school->createCall($this->input->post());
			$data['messages'] = "Call Added";
		}

		$this->load->view('pages/schools/school_call',$data);
	}

	function placements($id, $page=0){
		$data['user']=$this->user;
		$school= new SchoolsModel();
		$header = ['placement_type', 'start_date', 'end_date', 'class','mploy_self','placed','status','student_id'];
		$pretty = [];
		array_walk($header, function ($item, $key) use (&$pretty)
		{
			$pretty[] = ucwords(str_replace('_', ' ', $item));
		}
		);
		$data['id'] = $id;
		$data['tabs'] = $this->tabs;
		$data['table_header'] = $pretty;
		$data['fields'] = $header;
		$data['active'] = $school->getPlacements("placement_company_id >0 and placement_end_date > now()");//need to check if placement end date has expired
		$this->load->view('pages/schools/school_placements',$data);

	}

	function newplacement($id){
		$data['user']=$this->user;
		$school = new SchoolsModel();
		$data['id']=$id;
		$data['contacts']=$school->getContacts(array('school_id'=>$id));
		$data['messages']='';
		if(!empty($_POST))
		{
			$success = $school->createCall($this->input->post());
			$data['messages'] = "Information updated";
		}

		$this->load->view('pages/schools/schools_new_placement',$data);

	}


	function checkFile($file){

		$school = new SchoolsModel();
		$path_parts = pathinfo($file);
		$extension =$path_parts['extension'];
		if($extension == 'csv'){

			$csv = array_map('str_getcsv', file($file));
			array_walk($csv, function(&$a) use ($csv) {
				$a = array_combine($csv[0], $a);
			});
			$header = $csv[0];
			array_shift($csv);
			$data['header']=$school->getStudentsTableHeader();
			$data['csv']= $csv;
			return $data;
		}



	}

	function showStudents(){

		$student = new StudentsModel();
		$student->getStudents();
	}

	function studentUpload($id){

		$data['user'] = $this->user;
		$data['id'] = $id;
		$school = new SchoolsModel();
		$data['message']=null;

		if(!empty($_POST)){
			$config['upload_path']          =  realpath(APPPATH . '../files');
			$config['allowed_types']        = 'csv|xls|xlsx';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('myfile'))
			{

				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			}
			else
			{

				$data = array('upload_data' => $this->upload->data());
				var_dump($data['upload_data']);
				$data['message'] ='Students upload successful';
			}

		}

		$this->load->view('pages/schools/schools_upload_students',$data);

	}


}


