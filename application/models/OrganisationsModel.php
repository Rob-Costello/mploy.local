<?php

class OrganisationsModel extends CI_Model
{


	public function __construct()
	{

		$this->load->database();

	}


	function getOrganisations($where = null, $request = null, $limit = null, $offset = null,$orderby='id')
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);

		if( $where == null ) {
			//$query = $this->db->get('mploy_schools');
			$this->db->from('mploy_organisations');
			$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('mploy_organisations')->count_all_results();
        } 
        else {
			$query=$this->db->where('mploy_organisations', $where);
			$query=$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('mploy_organisations')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

	}

}