<?php

class Schools_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function get_users($where = null, $request = null, $limit = null, $offset = null)
	{

		$this->db->select('*');
		$this->db->limit($limit, $offset);
		if( $where == null ) {
			$query = $this->db->get('users');
			$count = $this->db->from('users')->count_all_results();
		} else {
			$query = $this->db->get_where('users', $where);
			$count = $this->db->from('users')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}



}



