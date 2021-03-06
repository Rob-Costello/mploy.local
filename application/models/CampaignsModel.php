<?php

class CampaignsModel extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function callInfo($campaign_id, $date)
    {
//date is campaign end
        return $this->db->query("select count(distinct campaign_id) as calls 
                                  from mploy_organisation_contact_history 
                                  where campaign_id = '" . $campaign_id . "'
                                 
                                   ")->row_array();
    }

    function callAmmount($camp)
    {
        return $this->db->query("select count( org_id) as total
                                  from mploy_rel_campaign_employers 
                                  where org_id = '" . $camp . "'
                                 
                                   ")->row_array();


    }

    function allCalls()
    {
        $this->db->select('count(campaign_id) as total, sum(if( date_time > NOW() - INTERVAL 30 DAY,1,0)) as days, ');
        $query = $this->db->get('mploy_organisation_contact_history');
        return $query->row_array();
    }

    function allEmails()
    {
        $this->db->select('count(campaign_id) as total, sum(if( date_time > NOW() - INTERVAL 30 DAY,1,0)) as days, ');
        $this->db->join('mploy_activity_types', 'mploy_activity_types.id = mploy_organisation_contact_history.activity_type_id');
        $this->db->where('email_tel', 'Email');
        $query = $this->db->get('mploy_organisation_contact_history');
        return $query->row_array();
    }


    function campaignCalls($id)
    {

        $return = array('calls' => 0, 'success' => 0, 'rejected' => 0, 'maybe' => 0);

        $result = $this->db->query("select count(*) as calls, 
								SUM( CASE WHEN  rag_status= 4 THEN 1 ELSE 0 END )  as rejected, 
								SUM( CASE WHEN  rag_status= 1 OR rag_status= 2 THEN 1 ELSE 0 END ) as success,
								SUM( CASE WHEN  rag_status= 3 THEN 1 ELSE 0 END ) as maybe 
								from mploy_organisation_contact_history where campaign_id = '" . $id . "' GROUP BY org_id  ")->result();

        foreach ($result as $r) {
            foreach ($return as $k => $v) {

                if ($r->$k > 0) {
                    $return[$k] = $v + 1;

                    if ($k != 'calls') {
                        break;
                    }
                }

            }

        }

        return $return;


    }

    function deleteCall($id){

		$this->db->where('id', $id);
		$this->db->delete('mploy_organisation_contact_history');

	}

    function getCampaigns($where = null, $request = null, $limit = null, $offset = null)
    {

        $this->db->select('*, mploy_campaigns.id');
        $this->db->limit($limit, $offset);
        if ($where == null) {
            $this->db->join('mploy_organisations', 'mploy_organisations.id = mploy_campaigns.org_id', 'left');
            $this->db->order_by($request);
            $query = $this->db->get('mploy_campaigns');
            $count = $this->db->from('mploy_campaigns')->count_all_results();
        } else {
            $this->db->join('mploy_organisations', 'mploy_organisations.id = mploy_campaigns.org_id', 'left');
            $this->db->order_by($request);
            $query = $this->db->get_where('mploy_campaigns', $where);
            $count = $this->db->from('mploy_campaigns')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);
    }

    function getCampaignPlacesCount($campaign_ref){

        $this->db->select('SUM(placements) as placements');
        $this->db->where('campaign_id', $campaign_ref);
        $query = $this->db->get('mploy_rel_campaign_employers');
        return $query->row_object();

    }

    function getEmployers($where = null, $request = null, $like = null, $limit = null, $offset = null, $camp = null)
    {

        $this->db->select('*');
        $this->db->limit($limit, $offset);

        foreach( $where as $k => $v ){
            if( $k == '' ){
                $this->db->where($v);
            } else {
                $this->db->where($k, $v);
            }
        }

        foreach( $_GET as $k => $v ){

            if( $v == 'ASC' || $v == 'DESC' ){
                $this->db->order_by($k, $v);
            }

        }

        $this->db->select('mploy_organisation_contact_history.*, mploy_organisations.*');
        $this->db->join('mploy_organisations', 'mploy_rel_campaign_employers.org_id = mploy_organisations.id', 'left');
        $this->db->join('mploy_contacts', 'mploy_contacts.id = mploy_organisations.main_contact_id', 'left');
        $this->db->join('(select max(id) max_id, org_id FROM mploy_organisation_contact_history group by org_id) as a1', 'a1.org_id = mploy_organisations.id', 'left');
        $this->db->join('mploy_organisation_contact_history', 'mploy_organisation_contact_history.id = a1.max_id', 'left');
        $this->db->group_by('mploy_organisations.id');
        $query = $this->db->get('mploy_rel_campaign_employers');


        foreach( $where as $k => $v ){
            if( $k == '' ){
                $this->db->where($v);
            } else {
                $this->db->where($k, $v);
            }
        }

        foreach( $_GET as $k => $v ){

            if( $v == 'ASC' || $v == 'DESC' ){
                $this->db->order_by($k, $v);
            }

        }

        $this->db->select('mploy_organisation_contact_history.*, mploy_organisations.*');
        $this->db->join('mploy_organisations', 'mploy_rel_campaign_employers.org_id = mploy_organisations.id', 'left');
        $this->db->join('mploy_contacts', 'mploy_contacts.id = mploy_organisations.main_contact_id', 'left');
        $this->db->join('(select max(id) max_id, org_id FROM mploy_organisation_contact_history group by org_id) as a1', 'a1.org_id = mploy_organisations.id', 'left');
        $this->db->join('mploy_organisation_contact_history', 'mploy_organisation_contact_history.id = a1.max_id', 'left');
        $this->db->group_by('mploy_organisations.id');
        $countResult = $this->db->get('mploy_rel_campaign_employers');
        $count = count($countResult->result());

        $arraySet = array();
        foreach($countResult->result() as $k => $v){

            $arraySet[] = $v->id;

        }

        return array('data' => $query->result(), 'count' => $count, 'array' => $arraySet);
    }

    function getSelectedEmployers($where = null, $request = null, $like = null, $limit = null, $offset = null){

        $this->db->limit($limit, $offset);

        $this->db->order_by($request);

        foreach( $where as $k => $v ){
            if( $k == '' ){
                $this->db->where($v);
            } else {
                $this->db->where($k, $v);
            }
        }

        $this->db->select('mploy_organisations.*');
        $this->db->where('organisation_type_id', 2);
        $this->db->join('mploy_organisations', 'mploy_rel_campaign_employers.org_id = mploy_organisations.id', 'left');
        $query = $this->db->get('mploy_rel_campaign_employers');

        foreach( $where as $k => $v ){
            if( $k == '' ){
                $this->db->where($v);
            } else {
                $this->db->where($k, $v);
            }
        }

        $this->db->select('mploy_organisations.*');
        $this->db->where('organisation_type_id', 2);
        $this->db->join('mploy_organisations', 'mploy_rel_campaign_employers.org_id = mploy_organisations.id', 'left');
        $count = $this->db->get('mploy_rel_campaign_employers');
        $count = count($count->result());
        return array('data' => $query->result(), 'count' => $count);

    }

    function countEmployers($where)
    {
        $this->db->select('campaign_employer_id ');
        $this->db->from('mploy_rel_campaign_employers');
        $query = $this->db->where($where)->count_all_results();

        return array($query);
    }


    public function campName($ref)
    {

        $this->db->select('campaign_name');
        $query = $this->db->get_where('mploy_campaigns', 'where campaign_ref =' . $ref);
        return $query->row_array();

    }

    public function availableCampaigns()
    {
        $this->db->join('mploy_contacts', 'mploy_campaigns.org_id = mploy_contacts.org_id');
        $this->db->join('mploy_organisations', 'mploy_campaigns.org_id = mploy_organisations.id');
        $this->db->group_by('mploy_campaigns.org_id');
        $company = $this->db->get_where('mploy_campaigns', 'mploy_campaigns.active =1 OR mploy_campaigns.active =2');

        return $company->result();

    }

    public function placements($id)
    {

        $query = "select * from mploy_organisation_contact_history where rag_status = 1 and org_id='" . $id . "' ";

        return $query->result();


    }

    function getCampaignTypes(){

        $query = $this->db->get('mploy_campaign_types');
        return $query->result();

    }

    public function getSchools()
    {

        $this->db->select('*');
        $this->db->order_by("name", "asc");
        $this->db->where('organisation_type_id', 1);
        $query = $this->db->get_where('mploy_organisations', 'id > 0');
        return $query->result();

    }


    public function updateCompanyContact($id, $data)
    {

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }

    public function updateHolidayDate($id, $data)
    {


        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_organisation_holidays', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();


    }

    public function updateCalendarDate($id, $data)
    {


        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_calendar', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();


    }

    public function getCompanyContact($id)
    {

        $query = $this->db->get_where('mploy_contacts', 'id =' . $id);
        return $query->row_array();

    }

    public function createCampaign($data)
    {

        $this->db->insert('mploy_campaigns', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;

    }


    public function employerDetails($ref, $id)
    {
        $this->db->select('mploy_organisations.*, mploy_contacts.first_name,mploy_contacts.last_name,mploy_contacts.job_title,mploy_contacts.phone,mploy_contacts.email,mploy_organisations.id');
        $this->db->join('mploy_contacts', 'mploy_organisations.id = mploy_contacts.org_id', 'left');
        $company = $this->db->get_where('mploy_organisations', 'mploy_organisations.id =' . $id);

        //$this->db->join('mploy_contacts','mploy_organisation_contact_history.user_id = mploy_contacts.id');

        //$calls = $this->db->get_where('mploy_organisation_contact_history','campaign_ref='.$ref);

        return ['company' => $company->result()];

    }

    public function campaignEmployerCalls($ref, $id = null)
    {

        if ($id == null) {

            $this->db->join('mploy_organisation_contact_history_types', 'mploy_organisation_contact_history_types.campaign_type_id = mploy_organisation_contact_history.campaign_activity_type_id');
            $this->db->join('users', 'users.id = mploy_organisation_contact_history.user_id');

            $calls = $this->db->get_where('mploy_organisation_contact_history', 'campaign_ref=' . $ref);
            return $calls->result();

        }

        $this->db->join('mploy_organisation_contact_history_types', 'mploy_organisation_contact_history_types.campaign_type_id = mploy_organisation_contact_history.campaign_activity_type_id');
        $this->db->join('users', 'users.id = mploy_organisation_contact_history.user_id');
        $this->db->where('org_id=' . $id);
        $this->db->order_by('date_time', 'DESC');
        $calls = $this->db->get_where('mploy_organisation_contact_history', 'campaign_ref=' . $ref);
        return $calls->result();
    }

    public function newCall($data)
    {

        $data['date_time'] = date("Y-m-d H:i:s");

        if ($data['placements'] > 0 && $data['rag_status'] < 3)
        {
            $data['rag_status'] = 1;
        }

        if(isset($data['placements']) && $data['placements'] > 0)
        {
            $placements = $data['placements'];
            $this->addPlacements( $data['org_id'], $data['campaign_id'], $placements );
        }

        $this->db->insert('mploy_organisation_contact_history', $data);

    }

    public function getActivity()
    {

        $query = $this->db->get('mploy_activity_types');
        return $query->result();

    }

    public function listCampaigns($campaign)
    {

        $query = $this->db->get_where('mploy_campaigns', 'org_id=' . $campaign);

        return $query->result_array();
    }

    public function lookupCampaign($id)
    {
        $this->db->select('*, mploy_campaigns.*');
        $this->db->join('mploy_contacts', 'mploy_campaigns.org_id = mploy_contacts.id', 'left');
        $query = $this->db->get_where('mploy_campaigns', 'mploy_campaigns.id=' . $id);
        return $query->row_array();
    }

    public function newCalendarEntry($id, $data)
    {

        $values = array_merge(['org_id' => $id], $data);

        $this->db->insert('mploy_calendar', $values);

        //return  $count;

        //$this->db->insert('mploy_calendar', $values)

    }

    function dropHoliday($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('mploy_organisation_holidays');


    }

    function setSchoolHoliday($data)
    {

        $this->db->insert('mploy_organisation_holidays', $data);


    }

    function getSchoolHoliday($id)
    {

        if( $id !== null ){
            $this->db->where('org_id', $id);
        }
        $query = $this->db->get('mploy_organisation_holidays');
        return $query->result_array();

    }

    function addHolidays($start, $end, $holiday, $hol_id){

        $dataModel = new DataModel();

        if (null !== $start) {

            for ($i = 0; $i < count($start); $i++) {

                if (isset($hol_id[$i])) {

                    $this->updateSchoolHoliday(
                        $hol_id[$i],
                        ['start_date' => $dataModel->convertDateToUnix($start[$i]),
                            'end_date' => $dataModel->convertDateToUnix($end[$i]),
                            'holiday_name' => $holiday[$i],
                            'org_id' => $this->input->post('org_id')]);

                } else {

                    if ($start[$i] != '' && $end[$i] != '' && $holiday[$i] != '') {

                        $this->setSchoolHoliday(['start_date' => $dataModel->convertDateToUnix($start[$i]),
                            'end_date' => $dataModel->convertDateToUnix($end[$i]),
                            'holiday_name' => $holiday[$i],
                            'org_id' => $this->input->post('org_id')]);
                    }
                }
            }

        }

    }

    function updateSchoolHoliday($id, $data)
    {

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_organisation_holidays', $data);
        $this->db->trans_complete();

    }


    function checkHoliday($id, $data)
    {

        $data['school_id'] = $id;

        $query = $this->db->get_where('mploy_organisation_holidays', $data);
        return $query->row_array();

    }


    public function getCalendarEntries($id)
    {

        if( $id !== null ){
            $this->db->where('mploy_campaigns.org_id', $id);
        }

        $this->db->join('mploy_campaigns', 'mploy_campaigns.org_id = mploy_calendar.org_id');
        $query = $this->db->get('mploy_calendar');
        return $query->result_array();

    }


    public function getCampaignDates($id)
    {

        if( $id !== null ){
            $this->db->where('org_id', $id);
        }

        $query = $this->db->get('mploy_campaigns');
        //$count = $this->db->from('mploy_organisations')->count_all_results();
        return $query->result_array();

    }


    public function editCampaign($id, $data)
    {

        if ($data['active'] == '') {
            $data['active'] = 2;
        }

        $this->db->trans_start();
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('mploy_campaigns');
        $this->db->trans_complete();
        return $this->db->trans_status();

    }

    public function addPlacements( $id, $campaign_ref, $placements){

        $this->db->set('placements', $placements, FALSE);
        $this->db->where('org_id', $id);
        $this->db->where('campaign_id', $campaign_ref);
        $this->db->update('mploy_rel_campaign_employers');

    }


    public function getCampaign($id)
    {
        $query = $this->db->get_where('mploy_campaigns', 'id = ' . $id);
        return $query->row_array();
    }

    function getPlacementsCount($org_id, $campaign_ref){
        $this->db->select('placements');
        $this->db->where('org_id', $org_id);
        $this->db->where('campaign_id', $campaign_ref);
        $query = $this->db->get('mploy_rel_campaign_employers');
        return $query->row_object()->placements;

    }

    public function getSchoolName($id)
    {

        $this->db->select('name');
        $query = $this->db->get_where('mploy_organisations', 'id = ' . $id)->row_array();
        return $query;

    }

    public function title($id)
    {

        $this->db->select('*');
        $this->db->where(['campaign_id' => $id]);
        $query = $this->db->get('mploy_campaigns');

        return $query->row_array();

    }

    public function getCompaniesByPostcode($where, $campaign = null)
    {

        $query = $this->db->query("SELECT * FROM  mploy_organisations o where organisation_type_id =2 AND optout = 0" . $where);
        return $query->result_array();

    }

    public function addCompaniesToCampaign($campaign_id, $data)
    {

        foreach( $data as $v ) {

            $insert_query = $this->db->insert_string('mploy_rel_campaign_employers', [ 'campaign_id' => $campaign_id, 'org_id' => $v ]);
            $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
            $this->db->query($insert_query);
        }

    }


    public function getCampaignCompanies($id)
    {

        $this->db->select('*');
        $this->db->join('mploy_organisations', 'mploy_organisations.comp_id = mploy_rel_campaign_employers.campaign_employer_id');
        $query = $this->db->get_where('mploy_rel_campaign_employers', 'org_id =' . $id);

        return $query->result_array();

    }


    public function getPlacements($school, $id)
    {

        $this->db->select('*');

        $query = $this->db->get_where('mploy_contacts', 'school_id =' . $school . ' and placement_company_id =' . $id);
        return $query->result();

    }


    public function getAllPlacements($school)
    {

        $this->db->select('*');

        $query = $this->db->get_where('mploy_contacts', 'school_id =' . $school);
        return $query->result();

    }

    public function getSuccessfulPlacement($id)
    {

        $this->db->select('*');
        $this->db->where("(rag_status = 1 OR rag_status = 2)");
        $this->db->where("placements >", 0);
        $this->db->where("campaign_ref", $id);
        $this->db->order_by('date_time', 'DESC');
        $query = $this->db->get('mploy_organisation_contact_history');
        return $query->result();
    }


    public function getStudents($school)
    {

        $this->db->select('*');
        $query = $this->db->get_where('mploy_contacts', 'school_id =' . $school);
        return $query->result();


    }


	public function getSentEmails($campaign,$mailshot)
	{
		$this->db->select('*');
		$this->db->join('users', 'users.id = mploy_organisation_contact_history.user_id' );

		$query = $this->db->get_where("mploy_organisation_contact_history","campaign_id=".$campaign." AND activity_type_id =". $mailshot);
		return $query->result_array();
	}


	public function getMailshot($campaign,$emails,$mailshot=7,$test=false){
		$emailString ='';
		if($test){
			$emails=null;
		}

		if($emails !=''|| null!=$emails){
			$emailString = " AND mploy_contacts.email not in (".$emails.") ";

		}

		$this->db->where('mploy_organisations.optout = 0');

		if($mailshot == 8){


			$this->db->select('mploy_organisations.*, mploy_campaigns.*, mploy_organisations.id as org_id, receiver as email');
			$this->db->where('campaign_id',$campaign);
			$this->db->where('activity_type_id',7);
			$this->db->not_like('mailshot_key','Responded');
            $this->db->join('mploy_organisations', 'mploy_organisation_contact_history.org_id = mploy_organisations.id' );
            $this->db->join('mploy_campaigns','mploy_campaigns.id = mploy_organisation_contact_history.campaign_id','left');

			if($emails !=''){
				$query = $this->db->get_where('mploy_organisation_contact_history','receiver not in ('.$emails.')');
			}else{
				$query = $this->db->get('mploy_organisation_contact_history');
			}

			//$query = $this->db->get_where('mploy_organisation_contact_history','receiver not in ('.$emails.')');
			return $query->result_array();
		}

		$this->db->select('mploy_organisations.*, mploy_contacts.*, mploy_campaigns.*, s.name, mploy_rel_campaign_employers.campaign_id,mploy_organisations.id as org_id');
		$this->db->join('mploy_organisations', 'mploy_rel_campaign_employers.org_id = mploy_organisations.id' );
		$this->db->join('mploy_contacts','mploy_organisations.main_contact_id = mploy_contacts.id','left');
		$this->db->join('mploy_campaigns','mploy_campaigns.id = mploy_rel_campaign_employers.campaign_id','left');
        $this->db->join('mploy_organisations s', 'mploy_campaigns.org_id = s.id', 'LEFT' );

		$query = $this->db->get_where('mploy_rel_campaign_employers', 'campaign_id='.$campaign.' '.$emailString);
		return $query->result_array();

	}

	public function getSector(){
    	$this->db->select('*');
    	$this->db->group_by('line_of_business');
    	$query =$this->db->get('mploy_organisations');
    	return $query->result_array();


	}

	public function updateOrganisation($data,$where){

		$this->db->set($data);
		$this->db->where($where);
		$this->db->update('mploy_organisations');


	}

	public function mailshotResponse($data,$key)
	{

		$this->db->set($data);
		$this->db->where('mailshot_key',$key);
		$this->db->update('mploy_organisation_contact_history');


	}



}
