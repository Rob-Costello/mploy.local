<?php

class Customers extends CI_Model
{


	public function __construct()
	{

		$this->load->database();

	}


	public function listCustomers(){

		$query = $this->db->get('mploy_customers');
		return $query->result_array();

	}

	public function  getCustomer($id){

		$query = $this->db->getwhere('mploy_customers',['id' => $id]);

		return $query->row_array();

	}


}


