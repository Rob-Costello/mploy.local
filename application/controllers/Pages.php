<?php

Class Pages extends CI_Controller{





	public function __construct()
	{

		parent::__construct();
        $this->load->model('login');
        //$this->load->model('messages');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();


	}


	public function view($page = 'home') 
	{

        $data['title'] = ucfirst($page);
        $data['posts'] = $this->post_model->get_posts();
        //$this->load->view('templates/header');
		$data['user'] = $this->user;
		$this->load->view('pages/'.$page, $data);
        //$this->load->view('templates/footer');

	}



}
