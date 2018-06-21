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
            $query = $this->db->get('mploy_contacts');
            $count = $this->db->from('mploy_contacts')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_contacts', $where);
            $count = $this->db->from('mploy_contacts')->where($where)->count_all_results();
        }

        return array('data' => $query->result(), 'count' => $count);
    }


	function newContact($data){

		$this->db->insert('mploy_contacts', $data);


	}



    public function newSchool($data){
		$this->db->insert('mploy_organisations', $data);

	}

    public function updateSchoolContact($id,$data)
	{
		
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }



    public function getSchoolContact($id)
	{
        $query = $this->db->get_where('mploy_contacts','id ='.$id);
        return $query->row_array();
    }



	function getSchools($where = null, $request = null, $limit = null, $offset = null,$orderby='org_id')
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);

		if( $where == null ) {
			$query = $this->db->get('mploy_organisations');
			$this->db->from('mploy_organisations');
			$this->db->order_by($request);
			$query = $this->db->get();
			$count = $this->db->from('mploy_organisations')->count_all_results();
		} else {

			$this->db->order_by($request);
			$query=$this->db->get_where('mploy_organisations', $where);
			$count = $this->db->from('mploy_organisations')->where($where)->count_all_results();
			 
		}
		return array('data' => $query->result(), 'count' => $count);

	}

	function getCompanies(){

		$this->db->select('*');
		$query  = $this->db->get_where('mploy_organisations','organisation_type_id =2 ');
		return $query->result();


	}

	function getCampaignCompanies($school){


	}

	function schoolList($search){

		$this->db->select('school_id , name');
		$this->db->like('name', $search);
		$query = $this->db->get_where('mploy_organisations',['organisation_type_id'=>'1',]);
		return $query->result_array();
	}

	public function updateSchool($id,$data)
	{
            $this->db->trans_start();
            $this->db->where('school_id', $id);
            $this->db->update('mploy_organisations', $data);
            $this->db->trans_complete();
            return $this->db->trans_status();

    }


	public function getSchool($id){

		$query = $this->db->get_where('mploy_organisations','school_id ='.$id);
		return $query->row_array();

	}



	public function getActivity(){

		$query = $this->db->get('mploy_campaign_activity_types');
		return $query->result();

	}


	function getHistory($where = null, $request = null, $limit = null, $offset = null)
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);
		if( $where == null ) {
			$query = $this->db->get('mploy_campaigns');
			$count = $this->db->from('mploy_campaigns')->count_all_results();
		} else {
			// $query = $this->db->get_where('mploy_campaigns', $where);
			//$this->db->join('mploy_campaign_activity','mploy_campaign_activity.campaign_ref = mploy_campaigns.select_school ','left');
			$this->db->join('users','users.id = mploy_campaign_activity.user_id');

			$this->db->join('mploy_campaign_activity_types','mploy_campaign_activity_types.campaign_type_id = mploy_campaign_activity.campaign_activity_type_id');
			$query = $this->db->get_where('mploy_campaign_activity', $where);

			$this->db->select('*');
			$count = $this->db->from('mploy_campaign_activity')->where($where)->count_all_results();

		}
		return array('data' => $query->result(), 'count' => $count);

	}


    function createCall($data){

	    $timestamp = strtotime($data['date_time']);
	    $data['date_time']= date("Y-m-d H:i:s", $timestamp);
	    $this->db->insert('mploy_campaign_activity', $data);

    }

	public function updateCompanyContact($id,$data){

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('mploy_contacts', $data);
		$this->db->trans_complete();
		return $this->db->trans_status();

	}


	function getPlacements($where = null, $request = null, $limit = null, $offset = null)
	{
		$this->db->select('*');
		$this->db->limit($limit, $offset);
		//$current = 'select * from campaigns where school_id = $id and campaign_end_date > today';
		//$historic = 'select * from campaigns where school_id = $id and campaign_end_date < today';
		//$students = select * from contacts where school_id = $id and campaign_end_date > today;

		if( $where == null ) {
			$query = $this->db->get('mploy_contacts');
			$count = $this->db->from('mploy_contacts')->count_all_results();
		} else {
			//$where = 'school_id=3';
			//$this->db->join('mploy_campaign_activity','mploy_campaigns.campaign_id = mploy_campaign_activity.campaign_ref ',);

			$query = $this->db->get_where('mploy_campaigns', $where);


			//$count = $this->db->from('mploy_contacts')->where($where)->count_all_results();
		}
		return  $query->result_array();

	}

	function getCallData($id){

		$this->db->select('*');
		$query = $this->db->get_where('mploy_campaign_activity', ['campaign_ref'=>$id]);
		return  $query->result();

	}

	function getStudentsTableHeader(){

		$query = $this->db->list_fields('mploy_students');
		return array('data'=>$query->result());

	}


	function getEmployers($school)
	{
			$query = $this->db->query('SELECT * FROM  mploy_organisations o
                                  left join mploy_contacts as c on o.main_contact_id = c.id
                                  where comp_id in 
                                  (select campaign_employer_id from mploy_rel_campaign_employers where org_campaign_ref='.$school.') 
                                  and organisation_type_id =2')->result();

			return  $query;
	}


}









