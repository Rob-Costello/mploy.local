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
	}


	function index( $pageNo = 0 )
	{
		$data['headings'] = ['Name','Last Updated','Main Telephone','Main Contact','Status'];
		$companies = new CompaniesModel();
        $offset=0;

        if($pageNo > 0){
			$offset = $pageNo * $this->perPage;
		}

		$data['companies'] = $companies->getCompanies(null, null, $this->perPage, $offset);
		$page = $this->page($data['companies'],'/companies',$this->perPage);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;

        if($data['pagination_end'] > $data['companies']['count']) {
            $data['pagination_end'] = $data['companies']['count'];
        }

        $data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->user;
		$data['title'] = 'Companies';
		$data['nav'] = 'companies';
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
        $company = new CompaniesModel();

        $offset=0;

        if($page > 0){
            $offset = $page * $this->perPage;
        }
		$data['contacts'] = $company->getContacts(array('company_id'=>$data['id']), null, $this->perPage, $offset);
        $page = $this->page($data['contacts'],'/companies/view/'.$id.'/contacts',$this->perPage,$offset);
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

        $this->load->view('pages/companies/company_contacts',$data);
    }



    function contactDetails($id){


        $data['id']=$id;
        $company= new CompaniesModel();
        if(!empty($_POST)){
            $success = $company->updateCompanyContact($id,$this->input->post());
            $data['message'] = "Information updated";
        }
        $data['table']= $company->getCompanyContact($id);
        $this->load->view('pages/compnaies/company_contact_details',$data);

    }


	function view($id, $page = null, $pageNo = 0 ){

        $company= new CompaniesModel();
        if(!empty($_POST)){
            $success = $company->updateCompany($id,$this->input->post());
            $data['message'] = "Information updated";
        }
        $data['id'] = $id;
        $data['page'] = $page;

        switch($page){

            case 'contacts':
                $this->contacts($id, $pageNo);
                break;

            case 'history':
                $this->history($id, $pageNo);
                break;

            default:
                $data['table']= $company->getCompany($id);
                $this->load->view('pages/companies/company_view',$data);

        }

	}

    function history($id, $page=0)
    {


        $data['id']=$id;
        $data['page'] = 'history';
        $company = new CompaniesModel();

        $offset=0;

        if($page > 0){
            $offset = $page * $this->perPage;
        }

		$data['contacts'] = $company->getHistory(['company_id'=>$data['id']], null, $this->perPage, $offset);
        $page = $this->page($data['contacts'],'/companies/contacts/',$this->perPage);
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

        $this->load->view('pages/companies/company_history',$data);
    }
}


