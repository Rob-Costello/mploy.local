<?php


class Customers extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('login');
		$this->load->library('session');
		$this->load->library('ion_auth');
		$this->load->model('CustomersModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage =20;
		$this->offset =0;
		$this->load->library('pagination');
		$this->tabs = array('Customer Information' =>'',
			           'Customer Contacts'=>'contacts',
			           'Campaigns'=>'placements',
			           'Customer Call History'=>'history');
	}

	function index($id=0)
	{

		$sortby="";
		$orderby = 'org_id';
		$data['orderby']='';
		$like = null;
		$where = 'organisation_type_id =1 ';
		$data['fields'] = ['name','address1','town','county','postcode','phone_number'];
		$customer = new CustomersModel();
		$page = $id;
		$data['headings'] = ['Name','Address','Town','County','Postcode','Phone Number' ];
		$offset=0;
		$data['message']='';
		$data['message'] = $this->session->flashdata('message');
		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}

		if(isset($_GET['orderby'])){
			$orderby = $this->input->get('orderby');
			$data['orderby'] = '?orderby='.$orderby;
		}

		if(!empty($_POST)){

			$like = $this->input->post('search');
			$where .= " and name like '%".$like."%'";
			$data['customers'] = $customer->getcustomers($where, $orderby,  null,null);
			$page = $this->page($data['customers'],'/customers',$this->perPage);
		}else{

			$data['customers'] = $customer->getcustomers($where, $orderby, $this->perPage, $offset,$sortby);
			$page = $this->page($data['customers'],'/customers',$this->perPage);

		}


		$page = $this->page($data['customers'],'/customers',$this->perPage);
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

	function page($model,$baseurl,$perPage=1)
	{
		$pagConfig['num_links'] = 8;

		$pagConfig['use_page_numbers'] = TRUE; 
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
		$customer= new CustomersModel();
		$data['messages']='';
		if(!empty($_POST))
		{
			$success = $customer->updateCustomer($id,$this->input->post());
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
					$data['table'] = $customer->getcustomer($id);
				$this->load->view('pages/customers/customers_view', $data);
		}

	}




	function contacts($id, $page=0)
	{
		$data['user']=$this->user;
		$data['id'] = $id;
		$customer = new CustomersModel();

		$offset=0;

		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}
		$data['contacts'] = $customer->getContacts(array('school_id'=>$data['id'],'contact_type'=>'3' ), null, $this->perPage, $offset);
		$page = $this->page($data['contacts'],'/customers/view/'.$id.'/contacts',$this->perPage,$offset);
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
		$data['message'] = $this->session->flashdata('message');
		$data['fields'] = $header;
		$data['table_header'] = $pretty;
		$data['tabs'] = $this->tabs;
		$this->load->view('pages/customers/customers_contacts',$data);
	}


	function newContact($id){


		$data['user']=$this->user;
		$data['id'] = $id;
		$customer = new CustomersModel();
		$required = [];

		if(!empty($_POST)){
			$customer->newContact($this->input->post());
			$this->session->set_flashdata('message', 'New Contact Added');
			redirect('customers/view/'.$id.'/contacts','refresh');
		}

		$this->load->view('pages/customers/customers_new_contact',$data);

	}




	function newcustomer(){
		$customer = new CustomersModel();
		$data['user'] = $this->user;
		$data['messages'] = '';
		$customerid = $customer->getLastCustomer()['id'];
	 $customerid+1;
		if(!empty($_POST)){
			$_POST['school_id'] = $customerid + 1;
		    $customer->newcustomer($this->input->post());
			$this->session->set_flashdata('message', 'Successfully added customer!');
			redirect('/customers','refresh');
		}

		$this->load->view('pages/customers/customers_new_customer',$data);

	}


	function contactDetails($id)
	{

		$data['user']=$this->user;
		$data['id']=$id;
		$customer= new CustomersModel();
		$data['messages'] = '';
		if(!empty($_POST))
		{
			$success = $customer->updatecustomerContact($id,$this->input->post());
			$data['messages'] = "Information updated";
		}
		$data['table']= $customer->getcustomerContact($id);

		$this->load->view('pages/customers/customer_contact_details',$data);

	}

	function history($id, $page=0)
	{

		$data['user']=$this->user;
		$data['id']=$id;
		$customer = new CustomersModel();


		$offset=0;

		if($page > 0)
		{
			$offset = $page * $this->perPage;
		}

		$data['contacts'] = $customer->getHistory(['campaign_ref'=>$data['id']], null, $this->perPage, $offset);
		$page = $this->page($data['contacts'],'/customers/view/'.$id.'/history',$this->perPage);
		$this->pagination->initialize($page);
		$data['pagination_start'] = $offset + 1;
		$data['pagination_end'] = $data['pagination_start'] + $this->perPage;
		if($data['pagination_end'] > $data['contacts']['count'])
		{
			$data['pagination_end'] = $data['contacts']['count'];
		}
		$data['pagination'] = $this->pagination->create_links();

		$header = ['date_time',  'username', 'receiver','description','rag_status','notes'];

		$pretty = [];
		array_walk($header, function ($item, $key) use (&$pretty)
		{
			$pretty[] = ucwords(str_replace('_', ' ', $item));
		}
		);


		$data['message'] = $this->session->flashdata('message');
		$data['tabs'] = $this->tabs;
		$data['fields'] = $header;
		$data['table_header'] = $pretty;

		$this->load->view('pages/customers/customer_history',$data);
	}

	function call($id){
		$customer = new CustomersModel();
		$data['user']=$this->user;
		$data['date'] =   date('d/m/Y H:i:s');
		$data['id'] = $id;
		$data['camp_id'] = $id;
		//$customer->getCompanies();
		$data['companies'] = $customer->getEmployers($id);
		if(!is_array($data['companies'])){
			$data['companies'] = ['comp_id' =>'', 'name' => 'None Avaialble, Add a Company to the Campaign'];
		}
		//$data['id']=$this->session->customerid;

		$data['contacts']=$customer->getContacts(array('school_id'=>$data['id']));

		$data['activity'] = $customer->getActivity();

		if(!empty($_POST)){
			$_POST['date_time'] = date('Y-m-d H:i:s');
			$customer->createCall($this->input->post());
			$this->session->set_flashdata('message', 'New Call Added');
			redirect('customers/view/'.$id.'/history','refresh');
		}

		$this->load->view('pages/customers/customer_call',$data);
	}

	function placements($id, $page=0){
		$data['user']=$this->user;
		$customer= new CustomersModel();
		$header = ['campaign_name', 'campaign_place_start_date', 'campaign_place_end_date','placed','status'];
		$pretty = [];
		$data['message']='';
		array_walk($header, function ($item, $key) use (&$pretty)
		{
			$pretty[] = ucwords(str_replace('_', ' ', $item));
		}
		);
		$data['id'] = $id;
		$data['tabs'] = $this->tabs;
		$data['table_header'] = $pretty;
		$data['fields'] = $header;
		$where = "select_school = ".$id ." and campaign_place_start_date and campaign_place_end_date > '".date("Y-m-d" )."'";
		$info = $customer->getPlacements($where); //need to check if placement end date has expired
		$temp = [];
		foreach($info as $active)
		{
			$callstats = $customer->getCallData($id);
			$call =0;

			foreach($callstats as $stat){
				if($stat->rag_status =='green')
				{
					$call++;
				}
			}
			$data['message'] = $this->session->flashdata('message');
			$active['placed'] = $call .'/' .$active['students_to_place'];
			$active['status'] = 'Active';
			$temp[]=$active;
		}
		$data['data'] = $temp;
		$this->load->view('pages/customers/customer_placements',$data);

	}

	function newPlacement($id){
		$data['user']=$this->user;
		$customer = new CustomersModel();
		$data['id']=$id;
		$data['messages']='';
		$data['contacts'] = $customer->getContacts(['school_id'=>$id]);
		$data['companies']  = $customer->getCompanies();

		if(!empty($_POST))
		{
			$_POST['placement_start_date'] = date("Y-m-d", strtotime($this->input->post('placement_start_date')));
			$_POST['placement_end_date'] = date("Y-m-d", strtotime($this->input->post('placement_end_date')));
			$id = $this->input->post('id');
			unset($_POST['id']);
			$customer->updateCompanyContact($id,$this->input->post());
			$this->session->set_flashdata('message','Student added to Company' );
			redirect('customers/view/'.$data['id'].'/placements','refresh');
		}
		$this->load->view('pages/customers/customers_new_placement',$data);

	}


	function checkFile($file){

		$customer = new CustomersModel();
		$path_parts = pathinfo($file);
		$extension =$path_parts['extension'];
		if($extension == 'csv'){

			$csv = array_map('str_getcsv', file($file));
			array_walk($csv, function(&$a) use ($csv) {
				$a = array_combine($csv[0], $a);
			});
			$header = $csv[0];
			array_shift($csv);
			$data['header']=$customer->getStudentsTableHeader();
			$data['csv']= $csv;
			return $data;
		}

	}

	function getcustomers(){
		
		$customer = new CustomersModel();
		header('Content-Type: application/json');
		if (isset($_GET['term'])) {           
		echo json_encode($customer->customerList($_GET['term']));
	    }

	} 


	function showStudents(){

		$student = new StudentsModel();
		$student->getStudents();

	}

	function studentUpload($id){

		$data['user'] = $this->user;
		$data['id'] = $id;
		$customer = new CustomersModel();
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

		$this->load->view('pages/customers/customers_upload_students',$data);

	}


}


