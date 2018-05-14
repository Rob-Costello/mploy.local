<?php

class YoungPeople_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function get_youngpeople($where = null, $request = null, $limit = null, $offset = null)
	{

		$this->db->select('*');
		$this->db->limit($limit, $offset);
		if( $where == null ) {
			$query = $this->db->get('mploy_students');
			$count = $this->db->from('mploy_students')->count_all_results();
		} else {
			$query = $this->db->get_where('mploy_students', $where);
			$count = $this->db->from('mploy_students')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}


	public function update_school_contact($id,$data){

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('mploy_school_contacts', $data);
		$this->db->trans_complete();
		return $this->db->trans_status();

	}




}
