<?php



class WexModel extends CI_Model
{



	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	public function getSession($session){

		//return $this->db->query('SELECT CAST(data AS CHAR(10000) CHARACTER SET utf8) as data FROM ci_sessions')->result();
		$this->db->select('*');
		return $this->db->get_where('ci_sessions',"id = '".$session."'")->row();

	}

	public function getWexId($email){

		$this->db->select('wex_id');
		return $this->db->get_where("users", "email='".$email."'")->row();

	}

	public function getCiSession($username ){

		return $this->db->query("select id from ci_sessions where data like '%".$username."%' order by timestamp desc limit 1")->row_array();

	}


}

