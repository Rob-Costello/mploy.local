<?php


class Wex extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('login');
		$this->load->library('ion_auth');

		$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->perPage =20;
		$this->offset =0;
		$this->load->library('pagination');
		$this->load->library('helpers');
		$this->load->model('WexModel');


	}


	function convertBlob($string){
		$start = '|';
		$end = ':';
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return substr($string, $ini, $len);


	}



	function index($pageNo = 0)
	{
		$wex = new WexModel();

		if($_POST){

			$this->input->post('key');

		}
		$session = $wex->getSession();
		//var_dump($session);







		foreach($session as $s){

			var_dump($this->convertBlob($s->data[0]));

			$val = explode(';',$s->data);
			//var_dump($val);
			//var_dump(unserialize($s->data));
			//$array = explode(';', $s->data);
				//var_dump($array);
			//$test = 'email|s:15:"admin@admin.com';
			 //strpos($test,'|');


		}




	}


}
