<?php


class Companies extends CI_Controller
{

	public function __construct(){

		parent::__construct();
		$this->load->model('login');
		$this->load->library('ion_auth');
		$this->load->model('CompaniesModel');
		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
        $this->perPage =20;
        $this->offset =0;
    
        $this->load->library('pagination');
        $this->load->library('helpers');
	}


	function index( $pageNo = 0 )
	{


        $where = 'organisation_type_id =2 ';
		$data['headings'] = ['name' => 'Name', 'phone' => 'Main Telephone','first_name'=>'Main Contact','status'=>'Status'];
		$companies = new CompaniesModel();
        $offset=0;

        if($pageNo > 0){
			$offset = $pageNo * $this->perPage;
		}

		$orderby = 'name';
		$data['orderby']='';
        if(isset($_GET['orderby'])){

        	$orderby = $this->input->get('orderby');
			$data['orderby'] = '?orderby='.$orderby;
		}

        if(!empty($_POST)){

            foreach($_POST as $k => $v){
                $where .= " and mploy_organisations." . $k . " like '%".$v."%'";
            }
            $data['companies'] = $companies->getCompanies($where, $orderby, $this->perPage, $offset);
            $page = $this->page($data['companies'],'/companies',$this->perPage);
        }else{

            $data['companies'] = $companies->getCompanies($where, $orderby, $this->perPage, $offset);
            $page = $this->page($data['companies'],'/companies',$this->perPage);

        }


		$where = ['organisation_type_id' => '2'] ;
		//$data['companies'] = $companies->getCompanies($where, $orderby, $this->perPage, $offset);
        //$data['companies']=$output;
        $page = $this->helpers->page($data['companies'],'/companies',$this->perPage,$data['orderby']);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;

        if($data['pagination_end'] > $data['companies']['count']) {
            $data['pagination_end'] = $data['companies']['count'];
        }
		$data['message'] = $this->session->flashdata('message');
        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Companies';
		$data['nav'] = 'companies';
		$data['post_data'] = $this->input->post();
		$this->load->view('pages/companies/companies', $data);
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

    function contacts($id, $page=0)
    {
        $data['id']=$id;
        $data['page'] = 'contacts';
        $data['user']=$this->user;
        $company = new CompaniesModel();
        $offset=0;
		$orderby = 'name';
		$data['orderby']='';
		if(isset($_GET['orderby'])){

			$orderby = $this->input->get('orderby');
			$data['orderby'] = '?orderby='.$orderby;
		}

        if($page > 0){
            $offset = $page * $this->perPage;
        }
        
        $data['contacts'] = $company->getContacts(array('org_id'=>$data['id']), $orderby, $this->perPage, $offset);
        $page = $this->helpers->page($data['contacts'],'/companies/view/'.$id.'/contacts',$this->perPage,$data['orderby']);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;
        if($data['pagination_end'] > $data['contacts']['count']) {
            $data['pagination_end'] = $data['contacts']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();

        $header = ['first_name','last_name', 'job_title', 'phone', 'email'];
       
        $pretty = [];
        array_walk($header, function ($item, $key) use (&$pretty) {
            $pretty[] = ucwords(str_replace('_', ' ', $item));
        });
        $data['message'] = $this->session->flashdata('message');
        $data['fields'] = $header;
        $data['table_header'] = $pretty;
        $this->load->view('pages/companies/company_contacts',$data);
    }

	function addContact($id){

		$company = new CompaniesModel();
		$data['messages'] = '';
		$data['org_id'] = $id;
		$data['id']=$id;
		$data['page'] = 'history';
		$data['user']=$this->user;

		if(!empty($_POST))
		{

			$company->createCompanyContact( $this->input->post());
			$this->session->set_flashdata('message', 'Contact Added to Company ');
			redirect('companies/view/'.$id.'/contacts/','refresh');

		}




		$this->load->view('pages/companies/companies_new_contact',$data);


	}

    function contactDetails($id){

        $data['user']=$this->user;
        $data['id']=$id;
        $company= new CompaniesModel();
	    $data['table']= $company->getCompanyContact($id);
        if(!empty($_POST)){
            $success = $company->updateCompanyContact($id,$this->input->post());


            $data['message'] = "Information updated";
	        $this->session->set_flashdata('message', 'Contact Updated');
	        redirect('companies/view/'.$data['table']['org_id'].'/contacts/','refresh');

        }

        $this->load->view('pages/companies/company_contact_details',$data);

    }

	function newCompany()
	{


		$data['user'] = $this->user;
		$company = new CompaniesModel();
		if (!empty($_POST)) {
			$success = $company->addCompany($this->input->post());
			$this->session->set_flashdata('message', 'Company' . $this->input->post('name') . ' created');
			redirect('companies/','refresh');

		}

		$this->load->view('pages/companies/companies_new_company',$data);
	}




    function view($id=0, $page = null, $pageNo = 0 ){

        $company= new CompaniesModel();
        if(!empty($_POST)){
            $success = $company->updateCompany($id,$this->input->post());
            $data['message'] = "Information updated";
        }
        $data['id'] = $id;
        $data['page'] = $page;
        $data['user']=$this->user;
        $data['dropdown'] = $company->getDropDown();
        switch($page){
            case 'contacts':
                $this->contacts($id, $pageNo);
                break;

            case 'history':
                $this->history($id, $pageNo);
                break;

            default:
                $data['table']= $company->getCompany($id);
                $this->load->view('pages/campaigns/campaign_view',$data);

        }

	}

    function history($id, $page=0)
    {

        $data['id']=$id;
        $data['page'] = 'history';
        $data['user']=$this->user;
        $company = new CompaniesModel();
        $offset=0;

        if($page > 0){
            $offset = $page * $this->perPage;
        }

        $data['placements'] = $company->getPlacementHistory($id);

        $data['user_string'] =   $this->helpers->encryptSession($username=null);


        $data['calls'] = $company->getCallHistory($id);
		//var_dump($data['calls']);

        $data['contacts'] = $company->getHistory(['mploy_campaign_activity.org_id'=>$data['id']], null, $this->perPage, $offset);
        $page = $this->page($data['contacts'],'/companies/contacts/',$this->perPage);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;
        if($data['pagination_end'] > $data['contacts']['count']) {
            $data['pagination_end'] = $data['contacts']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();

        $header = ['Name', 'Start Date', 'Job Title', 'School Name'];
        $data['calls_header'] = ['Type','Notes','Date','Outcome'];

	    $pretty = [];
        array_walk($header, function ($item, $key) use (&$pretty) {
            $pretty[] = ucwords(str_replace('_', ' ', $item));
        });
        $data['fields'] = $header;
        $data['table_header'] = $pretty;
        $this->load->view('pages/companies/company_history',$data);
    }
}


