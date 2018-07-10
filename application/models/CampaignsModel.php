<?php

class CampaignsModel extends CI_Model
{



    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function callInfo($campaign_ref,$date){
//date is campaign end
        return $this->db->query("select count(distinct org_id) as calls 
                                  from mploy_campaign_activity 
                                  where campaign_ref = '".$campaign_ref."'
                                 
                                   ")->row_array();
    }

    function callAmmount($camp){
        return $this->db->query("select count( org_campaign_ref) as total
                                  from mploy_rel_campaign_employers 
                                  where org_campaign_ref = '".$camp."'
                                 
                                   ")->row_array();


    }

    function allCalls(){
	    $this->db->select('count(campaign_ref) as total, sum(if( date_time > NOW() - INTERVAL 30 DAY,1,0)) as days, ');
	    $query= $this->db->get('mploy_campaign_activity');
	    return $query->row_array();
    }



    function campaignCalls($id){

    	return $this->db->query("select count(campaign_ref) as calls, 
								sum(if(rag_status= 'red' ,1,0)) as rejected, 
								sum(if(rag_status= 'green',1,0)) as success, 
								sum(if(rag_status= 'amber',1,0)) as maybe 
								from mploy_campaign_activity where campaign_ref = '".$id."'")->row_array();

    }


    function getCampaigns($where = null, $request = null, $limit = null, $offset = null)
    {
       
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
			$this->db->join('mploy_organisations','mploy_organisations.school_id = mploy_campaigns.select_school','left');
			$this->db->order_by($request);
			$query = $this->db->get('mploy_campaigns');
            $count = $this->db->from('mploy_campaigns')->count_all_results();
        } else {
            $this->db->join('mploy_organisations','mploy_organisations.school_id = mploy_campaigns.select_school','left');
			$this->db->order_by($request);
            $query = $this->db->get_where('mploy_campaigns', $where);
            $count = $this->db->from('mploy_campaigns')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);
    }

    function getEmployers($where = null, $request = null,$like = null, $limit = null, $offset = null, $camp=null)
    {

        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
			$this->db->order_by($request);
        	$query = $this->db->get('mploy_organisations');
            $count = $this->db->from('mploy_organisations')->count_all_results();
        } else {

                $query = $this->db->query('SELECT * FROM  mploy_organisations o
                                  left join mploy_contacts as c on o.main_contact_id = c.id
                                  where comp_id in 
                                  (select campaign_employer_id from mploy_rel_campaign_employers where campaign_ref='.$where['camp_ref'].') 
                                  and '.$where['status'].'
                                  and organisation_type_id =2')->result();


            //$this->db->join('mploy_contacts','mploy_organisations.main_contact_id = mploy_contacts.id','left');
            //$this->db->join('mploy_rel_campaign_employers','mploy_organisations.comp_id = mploy_rel_campaign_employers.campaign_employer_id' );

            if($like !==null) {
				$this->db->like('name',$like,'both');
			}
			$this->db->order_by($request);
            //$this->db->where_in('comp_id', '(select campaign_employer_id from `mploy_rel_campaign_employers where campaign_ref ='.$camp.'  )');
            //$query = $this->db->get_where('mploy_organisations', $where)->result();
            $count = count($query);
        }
        return array('data' => $query, 'count' => $count);
    }


    public function campName($ref){

    	$this->db->select('campaign_name');
    	$query = $this->db->get_where('mploy_campaigns','where campaign_ref ='.$ref);
    	return $query->row_array();

    }

    public function availableCampaigns(){
        $this->db->join('mploy_contacts','mploy_campaigns.select_school = mploy_contacts.school_id');
		$this->db->group_by('select_school');
		$company = $this->db->get_where('mploy_campaigns','active =1');

		return $company->result();

	}

	public function placements($id){

    	$query  = "select * from mploy_campaign_activity where rag_status ='green' and org_id='".$id."' ";

		return $query->result();


	}

	public function getSchools(){

    	$this->db->select('*');
        $this->db->order_by("name", "asc");
    	$query = $this->db->get_where('mploy_organisations', 'school_id > 0');
		return $query->result();
    }


    public function updateCompanyContact($id,$data){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }

	public function updateHolidayDate($id,$data){



			$this->db->trans_start();
			$this->db->where('id', $id);
			$this->db->update('mploy_organisation_holidays', $data);
			$this->db->trans_complete();
			return $this->db->trans_status();



	}

	public function updateCalendarDate($id,$data){



		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('mploy_calendar', $data);
		$this->db->trans_complete();
		return $this->db->trans_status();



	}

    public function getCompanyContact($id){

        $query = $this->db->get_where('mploy_contacts','id ='.$id);
        return $query->row_array();

    }

    public function createCampaign($data){

        $this->db->insert('mploy_campaigns', $data);
	    $insert_id = $this->db->insert_id();

	    return  $insert_id;

    }


    public function employerDetails($ref, $id)
    {
        $this->db->join('mploy_contacts','mploy_organisations.comp_id = mploy_contacts.org_id','left');
        $company = $this->db->get_where('mploy_organisations','comp_id ='.$id);
        
        //$this->db->join('mploy_contacts','mploy_campaign_activity.user_id = mploy_contacts.id');
        
        //$calls = $this->db->get_where('mploy_campaign_activity','campaign_ref='.$ref);
        
        return ['company' => $company->result()];

    }

    public function campaignEmployerCalls($ref,$id=null){

    	if($id==null){

		    $this->db->join('mploy_campaign_activity_types','mploy_campaign_activity_types.campaign_type_id = mploy_campaign_activity.campaign_activity_type_id');
		    $this->db->join('users','users.id = mploy_campaign_activity.user_id');

		    $calls = $this->db->get_where('mploy_campaign_activity','campaign_ref='.$ref);
		    return $calls->result();

	    }

    	$this->db->join('mploy_campaign_activity_types','mploy_campaign_activity_types.campaign_type_id = mploy_campaign_activity.campaign_activity_type_id');
	    $this->db->join('users','users.id = mploy_campaign_activity.user_id');
	    $this->db->where('org_id='.$id);
	    $calls = $this->db->get_where('mploy_campaign_activity','campaign_ref='.$ref);
	    return $calls->result();
    }

    public function newCall($data){

        $timestamp = strtotime($data['date_time']);
    	$data['date_time']= date("Y-m-d H:i:s", $timestamp);
        $this->db->insert('mploy_campaign_activity', $data);
        
    }

    public function getActivity(){

        $query = $this->db->get('mploy_campaign_activity_types');
        return $query->result();

    }

    public function listCampaigns($campaign){

    	$query = $this->db->get_where('mploy_campaigns','select_school='.$campaign);

    	return $query->result_array();
	}

	public function lookupCampaign($id)
	{
        $this->db->join('mploy_contacts','mploy_campaigns.select_school = mploy_contacts.school_id','left');
        $query = $this->db->get_where('mploy_campaigns','campaign_id='.$id);
        return $query->row_array();
    }

	public function newCalendarEntry($id,$data){

		$values = array_merge(['school_id'=>$id],$data);

		 $this->db->insert('mploy_calendar',$values);

		//return  $count;

		//$this->db->insert('mploy_calendar', $values)

	}

	function dropHoliday($id){

		$this->db->where('id', $id);
		$this->db->delete('mploy_organisation_holidays');


	}

	function setSchoolHoliday($data){

    	$this->db->insert('mploy_organisation_holidays', $data);


	}

	function getSchoolHoliday($id){

    	$query = $this->db->get_where('mploy_organisation_holidays',['school_id'=>$id]);
    	return $query->result_array();

	}

	function updateSchoolHoliday($id,$data){

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('mploy_organisation_holidays', $data);
		$this->db->trans_complete();

	}


	function checkHoliday($id,$data){

		$data['school_id']= $id;

		$query = $this->db->get_where('mploy_organisation_holidays',$data);
		return $query->row_array();

	}


	public function getCalendarEntries($id){

		$query = $this->db->get_where('mploy_calendar','school_id = '.$id );
		//$count = $this->db->from('mploy_organisations')->count_all_results();
		return $query->result_array();
	}


	public function getCampaignDates($id){

		$query = $this->db->get_where('mploy_campaigns','select_school = '.$id );
		//$count = $this->db->from('mploy_organisations')->count_all_results();
		return $query->result_array();

	}


	public function editCampaign($id,$data){


		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('campaign_id', $id);
		$this->db->update('mploy_campaigns');
		$this->db->trans_complete();
		return $this->db->trans_status();

	}


	public function getCampaign($id){
		$query = $this->db->get_where('mploy_campaigns','campaign_id = '.$id );
		return $query->row_array();
	}


	public function getSchoolName($id){

		$this->db->select('name');
    	$query = $this->db->get_where('mploy_organisations','school_id = '.$id )->row_array();
		return $query;

	}

	public function title($id){

    	$this->db->select('*');
    	$this->db->where(['campaign_id' => $id]);
    	$query = $this->db->get('mploy_campaigns' );

    	return $query->row_array();

	}

	public function getCompaniesByPostcode($where,$campaign=null){

			$query = $this->db->query("SELECT * FROM  mploy_organisations o where organisation_type_id =2 ".$where);
		return $query->result_array();

	}

	public function addCompaniesToCampaign($data){


    	$this->db->insert('mploy_rel_campaign_employers', $data);


	}


	public function getCampaignCompanies($id){

    	$this->db->select('*');
    	$this->db->join('mploy_organisations', 'mploy_organisations.comp_id = mploy_rel_campaign_employers.campaign_employer_id');
    	$query = $this->db->get_where('mploy_rel_campaign_employers','org_id ='.$id);

    	return $query->result_array();

	}


	public function getPlacements($school,$id){

    	$this->db->select('*');

    	$query = $this->db->get_where('mploy_contacts','school_id ='.$school.' and placement_company_id ='.$id);
    	return $query->result();

	}


	public function getAllPlacements($school){

		$this->db->select('*');

		$query = $this->db->get_where('mploy_contacts','school_id ='.$school);
		return $query->result();

	}

	public function getSuccessfulPlacement($id){

		$this->db->select('*');
		//$this->db->join('mploy_organisations' , 'mploy_organisations.school_id= mploy_campaign_activity.campaign_ref','left');
		$query = $this->db->get_where('mploy_campaign_activity',['rag_status'=>'green', 'mploy_campaign_activity.org_id' => $id]);
		return $query->result();
	}






	public function getStudents($school)
	{

		$this->db->select('*');
		$query = $this->db->get_where('mploy_contacts','school_id ='.$school);
		return $query->result();


	}


}
