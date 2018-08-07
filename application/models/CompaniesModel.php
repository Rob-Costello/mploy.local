<?php

class CompaniesModel extends CI_Model
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
			$this->db->order_by($request);
			$query = $this->db->get('mploy_contacts');
            $count = $this->db->from('mploy_contacts')->count_all_results();
        } else {
            
            $query = $this->db->get_where('mploy_contacts', $where);
            
            $count = $this->db->from('mploy_contacts')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);
    }



	public function	addCompany($data){

		$this->db->insert('mploy_organisations', $data);

    }

    public function updateCompanyContact($id,$data){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }


    public function getCompanyContact($id){


    	$query = $this->db->get_where('mploy_contacts','id ='.$id);
        return $query->row_array();

    }

    function getDropDown(){

        $query = $this->db->get('mploy_ref_employer_status');
        return $query->result();

    }

    function getOrganisationTypes(){
	    $this->db->select('*');
	    $query = $this->db->get('mploy_ref_organisation_types');

	   return $query->result_array();
    }

    function getCompanies($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*, mploy_organisations.id ');
        $this->db->limit($limit, $offset);
        //$this->db->join('mploy_company_contacts mcc', 'mcc.id = mc.contact_id', 'left');
        if( $where == null ) {
			$this->db->order_by($request);
        	$query = $this->db->get('mploy_organisations');
            $count = $this->db->from('mploy_organisations')->count_all_results();
        } else {
            $this->db->order_by($request);
            $this->db->from('mploy_organisations');
            $this->db->join('mploy_contacts','mploy_contacts.id = mploy_organisations.main_contact_id','left');
            //$this->db->join('mploy_contact_history', 'mploy_contact_history.receiver = mploy_contacts.id','left');
            $this->db->where($where);

            $query=$this->db->get();
            $count = $this->db->from('mploy_organisations')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

    public function getCompanyCalls($id)
    {

        $this->db->join('mploy_activity_types', 'mploy_activity_types.id = mploy_organisation_contact_history.activity_type_id');
        $this->db->join('users', 'users.id = mploy_organisation_contact_history.user_id');
        $this->db->where('org_id=' . $id);
        $this->db->order_by('date_time', 'DESC');
        $calls = $this->db->get_where('mploy_organisation_contact_history');
        return $calls->result();
    }

    public function getCompanyPlacements($id){

        $this->db->select('mploy_rel_campaign_employers.*,mploy_organisations.*, mploy_campaigns.*, mploy_organisations.wex_org_id, s.name as school');
        $this->db->join('mploy_campaigns', 'mploy_rel_campaign_employers.campaign_id = mploy_campaigns.id');
        $this->db->join('mploy_organisations', 'mploy_rel_campaign_employers.org_id = mploy_organisations.id');
        $this->db->join('mploy_organisations s', 'mploy_campaigns.org_id = s.id');
        $this->db->where('mploy_rel_campaign_employers.org_id=' . $id);
        $this->db->where('mploy_rel_campaign_employers.placements IS NOT NULL');
        $this->db->order_by('campaign_place_start_date', 'DESC');
        $calls = $this->db->get_where('mploy_rel_campaign_employers');
        return $calls->result();

    }

    public function updateCompany($id,$data){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_organisations', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }
	public function createCompanyContact($data){

		$this->db->insert('mploy_contacts', $data);


	}

    public function getCompany($id){

        $query = $this->db->get_where('mploy_organisations','id ='.$id);
        return $query->row_array();

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
			//$this->db->join('mploy_organisation_contact_history','mploy_organisation_contact_history.campaign_ref = mploy_campaigns.select_school ','left');
			$this->db->join('users','users.id = mploy_organisation_contact_history.user_id');

			$this->db->join('mploy_activity_types','mploy_activity_types.id = mploy_organisation_contact_history.activity_type_id');
			$query = $this->db->get_where('mploy_organisation_contact_history', $where);

			$this->db->select('*');
			$count = $this->db->from('mploy_organisation_contact_history')->where($where)->count_all_results();

		}
		return array('data' => $query->result(), 'count' => $count);

	}

	function getPlacementHistory($id)
	{
    	$this->db->select('*');
		$this->db->join('mploy_campaigns', 'mploy_campaigns.campaign_id = mploy_organisation_contact_history.campaign_ref', 'left');
		$this->db->join('mploy_organisations', 'mploy_organisations.school_id = mploy_campaigns.select_school', 'left');
		$where ="mploy_organisation_contact_history.org_id ='".$id."'";

    	$query = $this->db->get_where('mploy_organisation_contact_history', $where);

    	return $query->result();

	}

	function getCallHistory($company){


		$this->db->join('mploy_organisation_contact_history_types','mploy_organisation_contact_history_types.campaign_type_id = mploy_organisation_contact_history.campaign_activity_type_id');
		$this->db->join('users', 'users.id = mploy_organisation_contact_history.user_id', 'left');

		//$this->db->where('org_id='.$id);
		$calls = $this->db->get_where('mploy_organisation_contact_history','org_id='.$company);
		return $calls->result();




    	$this->db->select('*');
		$this->db->join('mploy_organisation_contact_history_types','mploy_organisation_contact_history_types.campaign_type_id = mploy_organisation_contact_history.campaign_activity_type_id');
		//$calls = $this->db->get_where('mploy_organisation_contact_history','org_id='.$company);
		$calls = $this->db->get_where('mploy_organisation_contact_history','org_id='.$company);
		return $calls->result();

	}


/*
    function getHistory($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
			$this->db->order_by($request);
        	$query = $this->db->get('mploy_campaigns');
            $count = $this->db->from('mploy_campaigns')->count_all_results();
        } else {

        	$this->db->from('mploy_campaigns');
        	$this->db->join('mploy_organisation_contact_history','mploy_organisation_contact_history.campaign_ref = mploy_campaigns.campaign_id','left');
			$this->db->order_by($request);
            //$this->db->join('mploy_contact_history', 'mploy_contact_history.receiver = mploy_contacts.id','left');
            $this->db->where($where);
            $query = $this->db->get();
            //$query = $this->db->get_where('mploy_campaigns', $where);
            $count = $this->db->from('mploy_organisation_contact_history')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }*/

    function createCall($data)
	{


        $this->db->insert('mploy_company_history', $data);

    }

    function getPlacements($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
			$this->db->order_by($request);
        	$query = $this->db->get('mploy_company_placements');
            $count = $this->db->from('mploy_company_placements')->count_all_results();
        } else {
			$this->db->order_by($request);
        	$query = $this->db->get_where('mploy_company_placements', $where);
            $count = $this->db->from('mploy_company_placements')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

}
