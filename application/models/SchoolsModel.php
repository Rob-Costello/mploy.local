<?php

class SchoolsModel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    function getContacts($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_school_contacts');
            $count = $this->db->from('mploy_school_contacts')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_school_contacts', $where);
            $count = $this->db->from('mploy_school_contacts')->where($where)->count_all_results();
        }

        return array('data' => $query->result(), 'count' => $count);

    }

	public function newSchool($data){
		$this->db->insert('mploy_schools', $data);

	}

    public function updateSchoolContact($id,$data)
	{


        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_school_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }



    public function getSchoolContact($id)
	{


        $query = $this->db->get_where('mploy_school_contacts','id ='.$id);
        return $query->row_array();

    }





	function getSchools($where = null, $request = null, $limit = null, $offset = null,$orderby='id')
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);

		if( $where == null ) {
			//$query = $this->db->get('mploy_schools');
			$this->db->from('mploy_schools');
			$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('mploy_schools')->count_all_results();
		} else {
			 $query=$this->db->where('mploy_schools', $where);
			 $query=$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('mploy_schools')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}


	public function updateSchool($id,$data)
	{

            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->update('mploy_schools', $data);
            $this->db->trans_complete();
            return $this->db->trans_status();

    }


	public function getSchool($id){

		$query = $this->db->get_where('mploy_schools','id ='.$id);
		return $query->row_array();

	}


    function getHistory($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_school_history');
            $count = $this->db->from('mploy_school_history')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_school_history', $where);
            $count = $this->db->from('mploy_school_history')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

    function createCall($data){


        $this->db->insert('mploy_school_history', $data);


    }

	function getPlacements($where = null, $request = null, $limit = null, $offset = null)
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);
		if( $where == null ) {
			$query = $this->db->get('mploy_school_placements');
			$count = $this->db->from('mploy_school_placements')->count_all_results();
		} else {
			$query = $this->db->get_where('mploy_school_placements', $where);
			$count = $this->db->from('mploy_school_placements')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}

	function getStudentsTableHeader(){

		$query = $this->db->list_fields('mploy_students');
		return array('data'=>$query->result());

	}


}








