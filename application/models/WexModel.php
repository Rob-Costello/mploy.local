<?php



class WexModel extends CI_Model
{



	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	public function getSession(){

		//return $this->db->query('SELECT CAST(data AS CHAR(10000) CHARACTER SET utf8) as data FROM ci_sessions')->result();
		return $this->db->query('select * from ci_sessions')->result();

	}
}
