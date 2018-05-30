<?php

class StudentsModel extends CI_Model
{

   public $studentsFields = ['id','member_id','upn','first_name','last_name','username','email','school_id',
    'school_name','course_code','year','form_name','ethnicity','gender','health','other_health','sen','lac',
    'placement_company_name','placement_company_id','placement_start_date','placement_end_date','uln'];

	public function __construct()
	{

		$this->load->database();

	}


	function getStudents($where = null, $request = null, $limit = null, $offset = null,$orderby='id')
	{
        $fields="'".implode("','",$this->studentsFields)."'";
        
        
        $this->db->select($fields);
		$this->db->limit($limit, $offset);

		if( $where == null ) {
			//$query = $this->db->get('mploy_schools');
			$this->db->from('mploy_contacts');
			$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('mploy_contacts')->count_all_results();
		} else {
			$query=$this->db->where('mploy_contacts', $where);
			$query=$this->db->order_by($orderby);
			$query = $this->db->get();
			$count = $this->db->from('mploy_contacts')->where($where)->count_all_results();
		}
		return array('data' => $query->result(), 'count' => $count);

    }
    
    function getStudent(){



    }

}

