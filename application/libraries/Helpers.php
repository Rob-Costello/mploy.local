<?php
defined('BASEPATH') OR exit('No direct script access allowed');


 class Helpers
{

	function __construct(){

		$CI =& get_instance();
		$this->CI = $CI =& get_instance();
		$CI->load->model('WexModel');
		$CI->load->library('session');
		$CI->load->library('encryption');
		$CI->load->library('ion_auth');


    }




	function page($model, $baseurl, $perPage = 5,$suffix=null)
	{
		$pagConfig['suffix'] = $suffix;
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
		$pagConfig['reuse_query_string'] = true;

		return $pagConfig;


	}

	 function checkValid($user)
	 {
		 return $this->encryptSession($user->username);

	 }

	 function encrypt($text)
	 {
		 $this->CI->load->library('encryption');

		 $ciphertext = $this->CI->encryption->encrypt($text)    ;
		 return  $ciphertext;
	 }


	 //takes array and outputs xml
	 function getXml($data = null){
		 $url = 'https://www.workexperiences.co.uk/export.cfm';
		 $username ='MployAuto:2B2C235F3FE8105F579B97CE293D9C';
		 //$post = ['Type' => 3,'ids'=>'6491','postcode'=>'wa104an'];
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
		 $export = new SimpleXMLElement($content);
		 return $export;

	 }


	 //takes xml and outputs xml
	 function setXml($data = null){

		 $url = 'https://www.workexperiences.co.uk/import.cfm';
		 $username ='MployAuto:2B2C235F3FE8105F579B97CE293D9C';
		 $headr[] = 'Content-Type: 	application/xml';
		 $headr[] = 'Authorisation: Basic '.base64_encode($username);

		 $xml = '<data> 
				<schools>
				<school>
				<name>Test School 1</name>
				<type>School</type>
				<address1>Forestry Drive</address1> 
				<town>Cheltenham</town> 
				<county>Gloucestershire</county>
				<postcode>FC5 8ST</postcode> 
				<teacher_first_name>Jo</teacher_first_name> 
				<teacher_last_name>Forest</teacher_last_name> 
				<teacher_email>JoForest@example.com</teacher_email>
				</school> </schools>
				</data>';

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
		 return $export;

	 }

	 function encryptSession($username=null){

		 $wex = new WexModel();
		 $session = $wex->getCiSession($username)['id'];
		 return $session;
		 //return this->encrypt($session);

	 }


	 function arrayLocation($array,$value){
		$i=0;
		foreach($array as $k => $arr){
			if($value==$k){
				return $i;
			}
			$i++;
		}
		return false;
	}

}
