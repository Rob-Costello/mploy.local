<?php


class Wex extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('login');
		$this->load->library('ion_auth');
		//$this->login->login_check_force();
		$this->user = $this->ion_auth->user()->row();
		$this->load->model('WexModel');
		$this->load->library('session');
		$this->load->library('encryption');

	}



	function convertBlob($string)
	{
		$split = explode(';', $string);
		$email = explode('|', $split[1]);
		$val = explode(':', $email[1]);
		return str_replace('"', '', $val[2]);

	}


	function validateUser($key)
	{
		$wex = new WexModel();

		$session = $wex->getSession($key);

		if ($session == null) {
			return json_encode(['error' => 'Invalid Session']);

		}
		$userid = $wex->getWexId($this->convertBlob($session->data));

		if ($userid == null) {
			return json_encode(['error' => 'No Wex ID']);
		}

		return json_encode(['user_id' => $userid->wex_id]);

	}


	function encryptSession($username=null){
		//$username='admin@admin.com';
		$wex = new WexModel();
		$session = $wex->getCiSession($username)['id'];

		return $this->encrypt($session);

	}


	function index()
	{
		$key = '';
		var_dump($this->session->userdata());
		if ($_POST) {
			$key = $this->input->post('key');
			$this->validateUser($this->decrypt($key));
			echo $this->encrypt($key);
		}
	}





	//check if user is valid if valid return encrypted session id
	function checkValid()
	{
		$this->login->login_check_force();
		$user = $this->ion_auth->user()->row();
		echo $this->encryptSession($user->username);

	}

	function sso(){

		if ($_POST) {

			$encKey = $this->input->post('key');

			$key= $this->decrypt($encKey);
			echo $key;
			//echo $this->validateUser($key);
		}
		else{

			echo json_encode(['error' => 'No Session Data Provided']);

		}



	}


	function sendRequest($page=null){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://mploy.local/wex');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		curl_setopt ($ch,CURLOPT_SSL_VERIFYPEER , false);
		$content = trim(curl_exec($ch));
		echo curl_error($ch);
		curl_close($ch);
		print $content;

	}


	function encrypt($text)
	{

		$ciphertext = $this->encryption->encrypt($text);
			return  $ciphertext;
	}


	function decrypt($string){

		return $this->encryption->decrypt($string);

	}


}
