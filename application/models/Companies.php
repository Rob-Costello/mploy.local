<?php

class Customers extends CI_Model
{


	public function __construct()
	{

		$this->load->database();

	}


	public function companies(){

		$query = $this->db->get('mploy_customers');
		return $query->result_array();

	}


}
