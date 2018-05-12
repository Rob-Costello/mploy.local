<?php

class Schools_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


    function get_contacts($where = null, $request = null, $limit = null, $offset = null)
    {

        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_school_contacts');
            $count = $this->db->from('mploy_school_contacts')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_schools', $where);
            $count = $this->db->from('mploy_schools')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }



	function get_schools($where = null, $request = null, $limit = null, $offset = null)
	{

		$this->db->select('*');
		$this->db->limit($limit, $offset);
		if( $where == null ) {
			$query = $this->db->get('mploy_schools');
			$count = $this->db->from('mploy_schools')->count_all_results();
		} else {
			$query = $this->db->get_where('mploy_schools', $where);
			$count = $this->db->from('mploy_schools')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}

	public function update_school($id,$data){



            $this->db->trans_start();
            $this->db->where('id', $id);
            $this->db->update('mploy_schools', $data);
            $this->db->trans_complete();
            return $this->db->trans_status();




    }


	public function get_school($id=1){

		$query = $this->db->get_where('mploy_schools','id ='.$id);
		return $query->row_array();

	}


}









