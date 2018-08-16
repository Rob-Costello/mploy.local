<?php

class Xml{


	function getXml($data = null){
		$url = 'https://www.workexperiences.co.uk/export.cfm';
		$username ='MployAuto:2B2C235F3FE8105F579B97CE293D9C';
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
		return $content;

	}


	function setXml($data = null){

		$url = 'https://www.workexperiences.co.uk/import.cfm';
		$username ='MployAuto:2B2C235F3FE8105F579B97CE293D9C';
		$headr[] = 'Content-Type: 	application/xml';
		$headr[] = 'Authorisation: Basic '.base64_encode($username);
		$xml = $this->toXmlString($data);
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
		return $content;

	}

	//convert array to xml string compatible with WEX
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


	function getElement($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return substr($string, $ini, $len);
	}



}
