<?php


class Wex extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('login');
		$this->load->library('ion_auth');
		//$this->login->login_check_force();
		//$this->user = $this->ion_auth->user()->row();
		$this->load->model('WexModel');
		$this->load->library('session');


	}


	function convertBlob($string){
		$split = explode(';',$string);
		$email = explode('|',$split[1]);
		$val = explode(':',$email[1]);
		return str_replace('"','',$val[2]);

	}



	function index()
	{
		$wex = new WexModel();
		$key = '';

		if($_POST)
		{
			$key = $this->input->post('key');
			$session = $wex->getSession($key);
			$userid = $wex->getWexId($this->convertBlob($session->data));
			echo json_encode( ['user_id' => $userid->wex_id]);
		}


	}

	function checkValid(){





	}


}
