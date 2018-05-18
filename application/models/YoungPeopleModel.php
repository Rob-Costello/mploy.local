<?php

class YoungPeopleModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function getYoungPeople($where = null, $request = null, $limit = null, $offset = null)
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

	public function getYoungPerson($id){

		$query = $this->db->get_where('mploy_students','id ='.$id);
		return $query->row_array();

	}


	public function updateYoungPerson($id,$data){

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('mploy_students', $data);
		$this->db->trans_complete();
		return $this->db->trans_status();

	}

	public function updateMemebership($id, $data){



			$this->db->trans_start();
			$this->db->where('id', $id);
			$this->db->update('mploy_students', $data);
			$this->db->trans_complete();
			return $this->db->trans_status();



	}



}
