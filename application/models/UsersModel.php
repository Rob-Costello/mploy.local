<?php

class UsersModel extends CI_Model
{


	public function __construct()
	{

		$this->load->database();

	}




	function getUsers($where = null, $request = null, $limit = null, $offset = null,$orderby='id')
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);

		if( $where == null ) {
			//$query = $this->db->get('mploy_schools');
			$this->db->from('users');
			$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('users')->count_all_results();
		} else {
			$query=$this->db->where('users', $where);
			$query=$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('users')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}


	function setWexId($email,$wexid){

		$this->db->where('email', $email);
		$this->db->update('users', ['wex_id' => $wexid]);

	}

}


