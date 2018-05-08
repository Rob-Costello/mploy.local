<?php

Class Schools extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('login');
        $this->load->model('schools_model');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();

    }


    public function index(){

        $this->load->library('pagination');
        //$schools = $this->schools_model($pageNumber = null);
        $page = $this->input->get('page', TRUE);
        $data['tableheadings'] = ['Id','Username','Email','Created On','First Name','Last Name','Company','Phone'];
        $perPage = 1;
        $offset = 0;

        if($page > 0){
            $offset = $page * $perPage;
        }

        $data['schools'] = $this->schools_model->get_schools(null, null, $perPage, $offset);
        $data['user'] = $this->user;
        $data['title'] = 'Schools';
        $data['nav'] = 'schools';
        $pagConfig['base_url'] = '/schools';
        $pagConfig['total_rows'] = $data['schools']['count'];
        $pagConfig['per_page'] = $perPage;

        $pagConfig['num_tag_open'] = '<li class="paginate_button">';
        $pagConfig['num_tag_close'] = '</li>';
        $pagConfig['cur_tag_open'] = '<li class="paginate_button current">';
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
        if($data['pagination_end'] > $data['schools']['count']) {
            $data['pagination_end'] = $data['schools']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('pages/schools', $data);





        //$data['title'] = 'Schools';
        ///$data['schools'] = $this->schools_model->get_schools();
        //$this->load->view('templates/header');
        //$this->load->view('pages/schools', $data);
        //$this->load->view('templates/footer');

    }


    public function view($page = 'home')
    {

        $data['title'] = ucfirst($page);
        $data['posts'] = $this->post_model->get_posts();
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }


}