<?php

Class Posts extends CI_Controller{

	public function index($page = 'home') 
	{

	$data['title'] = 'Latest Posts';

	//$data['title'] = ucfirst($page);
	$data['posts'] = $this->post_model->get_posts();
	print_r($data['posts']);
	$this->load->view('templates/header');
	$this->load->view('posts/'.$page, $data);
	$this->load->view('templates/footer');
	}


}