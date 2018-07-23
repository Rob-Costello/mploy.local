<?php


class Wex extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('login');
		$this->load->library('ion_auth');
		//$this->login->login_check_force();
		$this->load->model('CampaignsModel');
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
		$username='admin@admin.com';
		$wex = new WexModel();
		$session = $wex->getCiSession($username)['id'];
		//return 'fd574e64effaf40050831aa93cef8820ca64f2eb6f26f62ef8d1c2a5e9792d4984800b71e00c8f0481f97bd1ccf358ef986b96d46c0ce3be20dc4d602fcb11c10MHVpUmL88lmi+2NxOq750aoEddEIXzzuQgO2OiIRq1qBL7ZS469mdlkQ56ykfZxvRzAE1dFm1lh1+gqYAtcmg==';
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

			echo $this->validateUser($key);
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


	function getXml($data = null){
		$url = 'https://www.workexperiences.co.uk/export.cfm';
		$username ='MployAuto:2B2C235F3FE8105F579B97CE293D9C';
		$data = ['Type' => 1];
		$postData = http_build_query($data);
		$headr[] = 'Content-Type: 	application/x-www-form-urlencoded;charset=UTF-8';
		$headr[] = 'Authorisation: Basic '.base64_encode($username);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		$content=curl_exec($ch);
		//$export = new SimpleXMLElement($content);
		echo $content;
		//return $export;

	}


	function setXml($data = null){
		$url = 'https://www.workexperiences.co.uk/import.cfm';
		$username ='MployAuto:2B2C235F3FE8105F579B97CE293D9C';
		$headr[] = 'Content-Type: 	application/xml';
		$headr[] = 'Authorisation: Basic '.base64_encode($username);

		$xml = $this->toXmlString($data);
		$xml = $this->generateXml();

		$headr[]= "Content-length: " . strlen($xml);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$content=curl_exec($ch);
		$export = new SimpleXMLElement($content);
		var_dump($export);
		return $export;

	}

	function toXmlString($array)
	{
		$xml='';
		foreach ($array as $key => $arr) {
			if(is_array($arr)){
				$xml.='<' . $key . '>';
				$xml.=$this->toXmlString($arr);
				$xml.='</' . $key . '>';
			}
			else {
				$xml .= '<' . $key . '>' . $arr . '</' . $key . '>';
			}
		}
		return $xml;

	}



	function generateXml(){

		$test_array = ['data' => [
			'schools' => [
				'school' =>[
					'name'=>'Test School 2',
					'type' => 'School',
					'address1'=>'Test Address',
					'town' => 'Test Town',
					'county' => 'Test County',
					'postcode'=> 'test',
					'teacher_first_name' => '',
					'teacher_last_name'=>'',
					'teacher_email'=>''
					]
				]
			]
		];

		$xml = $this->toXmlString($test_array);
		return $xml;

	}






	function arrayToXml($array, &$xml_user_info) {
		foreach($array as $key => $value) {
			if(is_array($value)) {
				if(!is_numeric($key)){
					$subnode = $xml_user_info->addChild("$key");
					$this->arrayToXml($value, $subnode);
				}else{
					$subnode = $xml_user_info->addChild("item$key");
					$this->arrayToXml($value, $subnode);
				}
			}else {
				$xml_user_info->addChild("$key",htmlspecialchars("$value"));
			}
		}
	}



	function reply()
	{
		$campaign = new CampaignsModel();
		if(!empty($_GET)){
			$key = $this->input->get('key');
			$response = $this->input->get('response');

			$campaign->mailshotResponse(['rag_status'=>$response,'mailshot_key'=>'Responded'],$key);


		}

		$this->load->view('pages/emails/thankyou');



	}


	function thankyou(){


		$this->load->view('pages/emails/thankyou');

	}


	function register(){
		$wex = new WexModel();

		if($_POST){
			$wex->registerUser($this->input->post());
		}

		$this->load->view('pages/users/customers_register');

	}








}
