<?php


class Schools extends CI_Controller
{

	public function __construct(){

		parent::__construct();
		$this->load->model('login');
        $this->load->library('session');
		//$this->load->model('messages');
		$this->load->library('ion_auth');
		$this->load->model('Schools_model');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
        $this->perPage =1;
        $this->offset =0;

        $this->load->library('pagination');
	}


	function index($id=0)
	{

		$page = $id;
		$data['headings'] = ['Name','Address','Town','County','Postcode','phone_number','Type of Institution','Funding Model'];

		$schools = new schools_model();

        $offset=0;

        if($page > 0){
			$offset = $page * $this->perPage;
		}

		$data['schools'] = $schools->get_schools(null, null, $this->perPage, $offset);

		$page = $this->page($data['schools'],'/schools',$this->perPage);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;
        if($data['pagination_end'] > $data['schools']['count']) {
            $data['pagination_end'] = $data['schools']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Schools';
		$data['nav'] = 'schools';
		$this->load->view('pages/schools', $data);
	}





	function page($model,$baseurl,$perPage=1){

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




    function contacts($page=0)
    {


        $data['id']=$this->session->schoolid;
        $school = new schools_model();

        $offset=0;

        if($page > 0){
            $offset = $page * $this->perPage;
        }
		$data['contacts'] = $school->get_contacts(array('school_id'=>$data['id']), null, $this->perPage, $offset);
        $page = $this->page($data['contacts'],'/schools/contacts/',$this->perPage,$offset);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;
        if($data['pagination_end'] > $data['contacts']['count']) {
            $data['pagination_end'] = $data['contacts']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();



        $header = ['name', 'position', 'phone', 'email'];
        $pretty = [];
        array_walk($header, function ($item, $key) use (&$pretty) {
            $pretty[] = ucwords(str_replace('_', ' ', $item));
        });
        $data['fields'] = $header;
        $data['table_header'] = $pretty;

        $this->load->view('pages/schools_contacts',$data);
    }

    function contact_details($id){


        $data['id']=$id;
        $school= new schools_model();
        if(!empty($_POST)){
            $success = $school->update_school_contact($id,$this->input->post());
            $data['message'] = "Information updated";
        }
        $data['table']= $school->get_school_contact($id);
        $this->load->view('pages/school_contact_details',$data);

    }


	function view($id){
        $_SESSION['schoolid'] =$id;
        $this->session->set_userdata('schoolid',$id);
	    $data['id']=$id;
        $school= new schools_model();
        if(!empty($_POST)){
            $success = $school->update_school($id,$this->input->post());
            $data['message'] = "Information updated";
        }
		$data['table']= $school->get_school($id);
		$this->load->view('pages/schools_view',$data);

	}

    function history($page=0)
    {


        $data['id']=$this->session->schoolid;
        $school = new schools_model();

        $offset=0;

        if($page > 0){
            $offset = $page * $this->perPage;
        }

		$data['contacts'] = $school->get_history(['school_id'=>$data['id']], null, $this->perPage, $offset);
        $page = $this->page($data['contacts'],'/schools/contacts/',$this->perPage);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;
        if($data['pagination_end'] > $data['contacts']['count']) {
            $data['pagination_end'] = $data['contacts']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();



        $header = ['date', 'time', 'caller', 'receiver','origin','call_notes'];
        $pretty = [];
        array_walk($header, function ($item, $key) use (&$pretty) {
            $pretty[] = ucwords(str_replace('_', ' ', $item));
        });
        $data['fields'] = $header;
        $data['table_header'] = $pretty;

        $this->load->view('pages/school_history',$data);
    }

    function call(){
        $school = new schools_model();
	    $data['id']=$this->session->schoolid;
        $data['contacts']=$school->get_contacts(array('school_id'=>$data['id']));

        if(!empty($_POST)){
            $success = $school->create_call($this->input->post());
            $data['message'] = "Information updated";
        }



        $this->load->view('pages/school_call',$data);

    }

    function placements(){
		$header = ['placement_type', 'start_date', 'end_date', 'class','mploy_self','placed','status','student_id'];
		$pretty = [];
		array_walk($header, function ($item, $key) use (&$pretty) {
			$pretty[] = ucwords(str_replace('_', ' ', $item));
		});
		$data['id'] = $this->session->schoolid;
		$data['table_header'] = $pretty;
		$data['fields'] = $header;
		$school= new schools_model();
		$data['active'] = $school->get_placements("status not like '%complete%'");
	    $this->load->view('pages/school_placements',$data);

    }

	function newplacement(){

		$school = new schools_model();
		$data['id']=$this->session->schoolid;
		$data['contacts']=$school->get_contacts(array('school_id'=>$data['id']));

		if(!empty($_POST)){
			$success = $school->create_call($this->input->post());
			$data['message'] = "Information updated";
		}

		$this->load->view('pages/schools_new_placement',$data);

	}

}


