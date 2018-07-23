<?php


class Campaigns extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('login');
        $this->load->library('ion_auth');
        $this->load->model('CampaignsModel');
        $this->load->model('CompaniesModel');
        $this->load->model('DataModel');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
        $this->perPage = 20;
        $this->offset = 0;
        $this->load->library('pagination');
        $this->load->library('helpers');
        $campaigns = new CampaignsModel();
        $this->availableCampaigns = $campaigns->availableCampaigns();
    }


    function index($pageNo = 0)
    {
        $data['campaign_list'] = $this->availableCampaigns;
        $orderby = 'campaign_name';
        $data['orderby'] = '';
        if (isset($_GET['orderby'])) {
            $orderby = $this->input->get('orderby');
            $data['orderby'] = '?orderby=' . $orderby;
        }

        $data['headings'] = ['campaign_name', 'campaign_place_start_date', 'campaign_place_end_date', 'active', 'name'];
        $companies = new CampaignsModel();
        $offset = 0;

        if ($pageNo > 0) {

            $offset = $pageNo * $this->perPage;
        }

        $where = null;

        if (!empty($_POST)) {

            $where = "campaign_name like '%" . $this->input->post('search') . "%'";

        }

        $data['campaigns'] = $companies->getCampaigns($where, $orderby, $this->perPage, $offset);

        $page = $this->helpers->page($data['campaigns'], '/campaigns', $this->perPage, $data['orderby']);
        $this->pagination->initialize($page);
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;

        if ($data['pagination_end'] > $data['campaigns']['count']) {
            $data['pagination_end'] = $data['campaigns']['count'];
        }

        $data['message'] = $this->session->flashdata('message');
        $data['pagination'] = $this->pagination->create_links();
        $data['user'] = $this->user;
        $data['title'] = 'Campaigns';
        $data['nav'] = 'campaigns';
        $this->load->view('pages/campaigns/campaigns', $data);
    }

    function edit($id)
    {

        $campaignModel = new CampaignsModel();
        $dataModel = new DataModel();
        $data['user'] = $this->user;
        $data['campaign_list'] = $this->availableCampaigns;

        // Get Campaign data and format dates
        $campaignData = $campaignModel->getCampaign($id);
        $campaignDates = array(
            'campaign_start_date', 'campaign_place_start_date',
            'campaign_place_end_date', 'mailshot_1_date', 'mailshot_2_date',
            'employer_engagement_start', 'employer_engagement_end', 'self_place_deadline',
            'matching_start', 'matching_end');

        foreach ($campaignDates as $date) {

            $campaignData[$date] = $dataModel->convertDateToFriendly($campaignData[$date]);
        }

        //Handle form post
        if (!empty($_POST)) {

            //Prepare campaign dates to store in DB
            foreach ($campaignDates as $d) {
                $_POST[$d] = $dataModel->convertDateToUnix($this->input->post($d));
            }

            $campaignModel->addHolidays(
                $this->input->post('start_date'),
                $this->input->post('end_date'),
                $this->input->post('holiday'),
                $this->input->post('hol_id')
            );
            unset($_POST['start_date'], $_POST['end_date'], $_POST['holiday'], $_POST['hol_id']);


            //Add companies to campaign
            if (null !== ($this->input->post('campaign_employer_id'))) {

                $campaignModel->addCompaniesToCampaign($id, $this->input->post('campaign_employer_id'));

                unset($_POST['campaign_employer_id']);

            }

            //Remove posts not needed for campaign update
            unset($_POST['name'], $_POST['address1'], $_POST['postcode'], $_POST['industry_id'], $_POST['status']);

            $campaignModel->editCampaign($id, $this->input->post());
            $data['message'] = 'Campaign  ' . $this->input->post('campaign_name') . ' Updated ';
            $this->session->set_flashdata('message', 'Campaign  ' . $this->input->post('campaign_name') . ' Updated ');
            redirect('campaigns', 'refresh');

        }

        $data['org_id'] = $campaignData['org_id'];
        $schoolHolidays = $campaignModel->getSchoolHoliday($data['org_id']);
        $holidays = [];

        foreach ($schoolHolidays as $hol) {
            if ($hol['start_date'] == '1970-01-01' || $hol['end_date'] == '1970-01-01' || $hol['holiday_name'] == '') {
                continue;
            }
            $holidays[] = ['start_date' => $dataModel->convertDateToFriendly($hol['start_date'], '/', '-'),
                'end_date' => $dataModel->convertDateToFriendly($hol['end_date'], '/', '-'),
                'holiday_name' => $hol['holiday_name'],
                'hol_id' => $hol['id']];
        }

        $data['holiday'] = $holidays;
        $data['schools'] = $campaignModel->getSchools();
        $data['companies'] = $campaignModel->getSelectedEmployers(['campaign_id' => $id, "status like '%%'"]);
        $data['campaign'] = $campaignData;
        $this->load->view('pages/campaigns/campaign_edit', $data);

    }


    function removeHoliday()
    {

        $campaign = new CampaignsModel();
        if (!empty($_POST)) {
            $id = $this->input->post('hol_id');
            $campaign->dropHoliday($id);
        }

    }


    function getSelectedCompanies($id)
    {

        $campaign = new CampaignsModel();

        $companies = $campaign->getCampaignCompanies($id);

        echo json_encode($companies);

    }


    function newCampaign()
    {
        $data['campaign_list'] = $this->availableCampaigns;
        $data['user'] = $this->user;
        $campaignModel = new CampaignsModel();

        if (!empty($_POST)) {

            $dates = ['campaign_start_date', 'campaign_place_start_date',
                'campaign_place_end_date', 'mailshot_1_date', 'mailshot_2_date',
                'employer_engagement_start', 'employer_engagement_end', 'self_place_deadline',
                'matching_start', 'matching_end'];

            foreach ($dates as $d) {
                $_POST[$d] = date("Y-m-d", strtotime(strtr($this->input->post($d), '/', '-')));
            }


            $campaignModel->addHolidays(
                $this->input->post('start_date'),
                $this->input->post('end_date'),
                $this->input->post('holiday'),
                $this->input->post('hol_id')
            );
            unset($_POST['start_date'], $_POST['end_date'], $_POST['holiday'], $_POST['hol_id']);

            //remove employer id to stop error
            unset($_POST['campaign_employer_id']);
            unset($_POST['search']);
            unset($_POST['name']);
            unset($_POST['address1']);
            unset($_POST['postcode']);
            unset($_POST['industry_id']);


            //get id for insert as campaign reference
            $campaign_id = $campaignModel->createCampaign($this->input->post());

            $data['message'] = 'New Campaign  ' . $this->input->post('campaign_name') . ' Created ';
            $this->session->set_flashdata('message', 'New Campaign  ' . $this->input->post('campaign_name') . ' Created ');
            redirect('campaigns', 'refresh');

        }

        $data['schools'] = $campaignModel->getSchools();
        $data['types'] = $campaignModel->getCampaignTypes();
        $data['values'] = array();
        foreach ($_POST as $k => $p) {

            $data['values'][$k] = $p;


        }
        //var_dump($data['values']);
        $this->load->view('pages/campaigns/new_campaign', $data);

    }


    function employers($camp_ref, $pageNo = 0)
    {

        $data['campaign_list'] = $this->availableCampaigns;
        $campaignModel = new campaignsModel();
        $campaign = $campaignModel->lookupCampaign($camp_ref);
        $data['camp_data'] = $campaign;
        $data['call_data'] = $campaignModel->campaignCalls($camp_ref);
        $orderby = 'mploy_organisations.id';
        $data['orderby'] = '';
        $like = null;
        $data['school_id'] = $campaign['org_id'];
        if (isset($_GET['orderby'])) {
            $orderby = $this->input->get('orderby');
            $data['orderby'] = '?orderby=' . $orderby;

        }

        $data['user'] = $this->user;
        $data['headings'] = ['Name', 'Main Telephone', 'Address', 'Line of Business', 'Last Contacted', 'Status'];
        $data['fields'] = ['name', 'phone', 'address1', 'line_of_business', 'date_time', 'status'];
        $offset = 0;

        if ($pageNo > 0) {
            $offset = $pageNo * $this->perPage;
        }

        $data['status'] = 'all';
        $where['mploy_rel_campaign_employers.campaign_id'] = $camp_ref;

        if (isset($_GET['status'])) {

            if ($_GET['status'] == 2) {
                $where[] = "( rag_status = 1 OR rag_status = 2 )";

            } else if ($_GET['status'] == 3) {
                $where[] = "( rag_status = 3 OR rag_status IS NULL )";

            } else if ($_GET['status'] !== 'all') {
                $where['rag_status'] = $_GET['status'];
            }

            $data['status'] = $_GET['status'];

        }

        if (isset($_GET['search'])) {

            $where[] = "( mploy_organisations.name LIKE '%" . $_GET['search'] . "%' OR mploy_organisations.address1 LIKE '%" . $_GET['search'] . "%' OR mploy_organisations.address2 LIKE '%" . $_GET['search'] . "%' OR mploy_organisations.town LIKE '%" . $_GET['search'] . "%' OR mploy_organisations.county LIKE '%" . $_GET['search'] . "%' OR mploy_organisations.country LIKE '%" . $_GET['search'] . "%' OR mploy_organisations.postcode LIKE '%" . $_GET['search'] . "%')";

        }

        if (count($where) == 1) {

            //$where[] = " (rag_status > 1 OR rag_status IS NULL)";
            $orderby = 'date_time ASC';

        }

        $data['campaign'] = $campaignModel->getEmployers($where, $orderby, $like, $this->perPage, $offset, $camp_ref);

        $this->session->set_userdata('company_nav', $data['campaign']['array']);

        $page = $this->helpers->page($data['campaign'], '/campaigns/employers/' . $camp_ref, $this->perPage);
        $this->pagination->initialize($page);

        $data['campaign_dropdown'] = $camp_ref;
        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $this->perPage;

        if ($data['pagination_end'] > $data['campaign']['count']) {
            $data['pagination_end'] = $data['campaign']['count'];
        }

        $data['campaign_name'] = $campaign['campaign_name'];
        $data['pagination'] = $this->pagination->create_links();
        $data['user'] = $this->user;
        $data['title'] = 'Employers';
        $data['nav'] = 'campaign';
        $data['camp_ref'] = $camp_ref;
        $data['table'] = $campaignModel->getEmployers($where, null, $this->perPage, $offset);
        $this->load->view('pages/campaigns/campaign_employers', $data);

    }

    function employerDetails($camp_ref, $id)
    {

        if (!empty($_POST)) {

            if ($this->input->post('update_company') == 'Save') {

                unset($_POST['update_company']);

                $company = new companiesModel();
                $company->updateCompany($id, $this->input->post());
                $this->session->set_flashdata('company_message', 'Updated company details');
                $data['company_message'] = 'Updated Company Successfully';

                //redirect('campaigns/employerdetails/' . $camp_ref . '/' . $id);
            }

        }

        $data['entries'] = $camp_ref;
        $data['school_id'] = $camp_ref;
        $campaign_id = $this->input->get('campid');
        $campaign = new campaignsModel();
        $company = new CompaniesModel();

        $info = $campaign->employerDetails($campaign_id, $id);
        $data['call_message'] = $this->session->flashdata('call_message');
        $data['employer'] = $info['company'][0];
        $data['company'] = $info['company'];
        $data['company_message'] = $this->session->flashdata('company_message');

        $data['prev'] = null;
        $data['next'] = null;

        if( count($this->session->company_nav) > 1) {
            if (array_search($id, $this->session->company_nav) > 0)
                $data['prev'] = $this->session->company_nav[array_search($id, $this->session->company_nav) - 1];
            if (array_search($id, $this->session->company_nav)+1 != count($this->session->company_nav))
                $data['next'] = $this->session->company_nav[array_search($id, $this->session->company_nav) + 1];
        }

        $data['calls'] = $company->getCompanyCalls($id);
        $data['comp_id'] = $id;
        $data['user'] = $this->user;
        $data['title'] = 'Campaign';
        $data['nav'] = 'campaign';
        $data['contacts_table'] = ['Name', 'Position', 'Phone', 'Email'];
        $data['call_table'] = ['User', 'Type', 'Reciprocant', 'Notes', 'Date', 'Outcome'];
        $data['placements'] = $company->getCompanyPlacements($info['company'][0]->id);
        $data['placements_total'] = $campaign->getPlacementsCount($info['company'][0]->id, $campaign_id);
        $data['campaign'] = $campaign_id;
        $data['student_message'] = $this->session->flashdata('student_message');
        $data['campaign_dropdown'] = $camp_ref;

        $data['campaign_list'] = $this->availableCampaigns;
        $data['campaign_dropdown'] = $campaign_id;
        $data['camp_id'] = $camp_ref;
        $this->load->view('pages/campaigns/campaign_employer_details', $data);
    }


    function newCall($camp_ref, $id)
    {

        $campaign = new campaignsModel();
        $campid = $this->input->get('campid');

        if (!empty($_POST)) {

            $campaign->newCall($this->input->post());
            $this->session->set_flashdata('call_message', 'New Call Logged');
            redirect('campaigns/employerdetails/' . $camp_ref . '/' . $id . '?campid=' . $campid, 'refresh');

        }

        $data['campaign_list'] = $this->availableCampaigns;
        $data['entries'] = $camp_ref;
        $data['campaign_list'] = $this->availableCampaigns;

        $data['date'] = date('d/m/Y H:i:s');
        $data['user'] = $this->user;
        $data['activity'] = $campaign->getActivity();
        $data['messages'] = '';
        $data['camp_id'] = $camp_ref;

        if ($campid == null || $campid == '') {
            $data['camp_id'] = $camp_ref;
        }

        $data['comp_id'] = $id;

        $data['campaign_dropdown'] = $campid;
        $data['dropdown'] = $campid;
        $info = $campaign->employerDetails(null, $id);
        $data['company_root_id'] = $info['company'][0]->id;
        $this->load->view('pages/campaigns/campaign_employer_new_call', $data);
    }


    function findCampaigns($school = null)
    {

        $campaign = new campaignsModel();

        if ($school !== null) {
            $list = $campaign->listCampaigns($school);
            $option = '<option>Select Campaign</option>';
            foreach ($list as $k => $item) {

                $option .= '<option value="' . $item['campaign_id'] . '">' . $item['campaign_name'] . '</option>';

            }
            return $option;

        }

        if (!empty($_POST)) {
            $school = $this->input->post('school');
            $list = $campaign->listCampaigns($school);
            $camp = $this->input->post('camp');

            $option = '<option>Select Campaign</option>';
            foreach ($list as $k => $item) {

                if ($item['campaign_id'] == $camp) {
                    $option .= '<option selected value="' . $item['campaign_id'] . '">' . $item['campaign_name'] . '</option>';
                } else {

                    $option .= '<option value="' . $item['campaign_id'] . '">' . $item['campaign_name'] . '</option>';
                }

            }
            echo $option;
        }
        //echo json_encode( "nothing");
    }


    function calendar($id, $campaign = null)
    {
        $data['title'] = 'Calendar';
        $data['user'] = $this->user;
        $campaign = new campaignsModel();
        $data['campaign_list'] = $this->availableCampaigns;
        $data['school_name'] = $campaign->getSchoolName($id)['name'];

        if (!empty($_POST)) {

            $campaign->newCalendarEntry($id, $this->input->post());

        }

        $data['entries'] = $campaign->getCalendarEntries($id);
        $calendar = $campaign->getCalendarEntries($id);
        $campaignDates = $campaign->getCampaignDates($id);
        $data['entries'] = '';

        $dates = [['campaign_place_start_date', 'campaign_place_end_date'],
            'mailshot_1_date',
            'mailshot_2_date',
            ['employer_engagement_start', 'employer_engagement_end'],
            'self_place_deadline',
            'matching_start', 'matching_end'];

        $calendarDates = $campaign->getCalendarEntries($id);
        $holidayDates = $campaign->getSchoolHoliday($id);

        foreach ($holidayDates as $hol) {

            $id = 'id		:\'hol-' . $hol['id'] . '\',';
            $title = $hol['holiday_name'];
            $start = 'start		:\'' . date('Y-m-d H:i:s', strtotime($hol['start_date'])) . '\',';
            $end = 'end		:\'' . date('Y-m-d H:i:s', strtotime($hol['end_date'])) . '\',';

            $data['entries'] .= '{
                    	title          : \'' . $hol['holiday_name'] . ' \',
                    	' . $start . '
                    	' . $end . '
                    	' . $id . '
                    	backgroundColor: \'#80ba27\', //green
                    	borderColor    : \'#80ba27\' //green
                		},';

        }

        foreach ($calendarDates as $cal) {

            $id = 'id		:\'cal-' . $cal['id'] . '\',';
            $title = $cal['title'];
            $start = 'start		:\'' . date('Y-m-d H:i:s', strtotime($cal['start'])) . '\',';
            $end = 'end		:\'' . date('Y-m-d H:i:s', strtotime($cal['end'])) . '\',';

            $data['entries'] .= '{
                    	title          : \'' . $cal['title'] . ' \',
                    	' . $start . '
                    	' . $end . '
                    	' . $id . '
                    	
                    	backgroundColor: \'#86d0f4\', //blue
                    	borderColor    : \'#86d0f4\' //blue
                		},';

        }

        foreach ($campaignDates as $key => $camp) {

            foreach ($dates as $k => $d) {

                if (is_array($d)) {

                    //$start = 'start		:$.fullCalendar.formatDate('.strtotime($camp[$d[0]]).',"yyyy-MM-dd"), ';
                    $id = 'id		:\'cam-' . $camp['id'] . '\',';
                    $title = 'title          : \'' . $camp['campaign_name'] . ': ' . str_replace(['_', 'date'], ' ', $d[0]) . '\',';
                    $start = 'start		:\'' . date('Y-m-d H:i:s', strtotime($camp[$d[0]])) . '\',';
                    $end = 'end		:\'' . date('Y-m-d H:i:s', strtotime($camp[$d[1]])) . '\',';

                } else {
                    $id = 'id		:\'cam-' . $camp['id'] . '\',';
                    $title = 'title          : \'' . $camp['campaign_name'] . ': ' . str_replace('_', ' ', $d) . '\',';
                    $start = 'start		:\'' . date('Y-m-d H:i:s', strtotime($camp[$d])) . '\',';
                    $end = 'end		:\'' . date('Y-m-d H:i:s', strtotime($camp[$d])) . '\',';

                }

                $data['entries'] .= '{
                    	' . $id . '
                    	' . $title . '
                    	' . $start . '
                    	' . $end . '
                    	
                    	backgroundColor: \'#f39c12\', //yellow
                    	borderColor    : \'#f39c12\' //yellow
                		},';
            }

        }


        $this->load->view('pages/campaigns/campaign_calendar', $data);

    }


    function updateCalendar()
    {
        $campaign = new campaignsModel();
        if (!empty($_POST)) {

            $id = $this->input->post('id');
            $start = $this->input->post('start');
            $end = $this->input->post('end');
            $type = $this->input->post('type');
            $title = $this->input->post('title');

            if ($type == 'hol') {

                $data = ['start_date' => date('Y-m-d', strtotime($start)),
                    'end_date' => date('Y-m-d', strtotime($end))];
                $campaign->updateHolidayDate($id, $data);
            }
            if ($type == 'cal') {

                $data = ['start' => date('Y-m-d', strtotime($start)),
                    'end' => date('Y-m-d', strtotime($end))];
                $campaign->updateCalendarDate($id, $data);
            }

            /*if($type == 'cam'){

                $dates= [['campaign_place_start_date','campaign_place_end_date'],
                    'mailshot_1_date',
                    'mailshot_2_date',
                    ['employer_engagement_start','employer_engagement_end'],
                    'self_place_deadline',
                    'matching_start','matching_end'];




                $data = ['start'=>date('Y-m-d',strtotime($start)),
                    'end' => date('Y-m-d',strtotime($end))];
                $campaign->updateCalendarDate($id,$data);

            }*/


        }

    }


    function getSchoolHolidays($id)
    {
        $campaign = new CampaignsModel();
        $holidays = $campaign->getSchoolHoliday($id);
        $dates = array();
        if ($holidays !== null) {

            foreach ($holidays as $h) {
                if ($h['start_date'] == '1970-01-01' || $h['end_date'] == '1970-01-01') {
                    continue;


                }
                $dates[] = $h;
            }


        }
        echo json_encode($dates);
    }


    function newplacement($school, $company)
    {
        $data['user'] = $this->user;
        $campaign = new CampaignsModel();
        $data['company'] = $company;
        $data['school'] = $school;

        $data['students'] = $campaign->getStudents($school);

        if (!empty($_POST)) {
            $_POST['placement_start_date'] = date("Y-m-d", strtotime($this->input->post('placement_start_date')));
            $_POST['placement_end_date'] = date("Y-m-d", strtotime($this->input->post('placement_end_date')));
            $id = $this->input->post('id');
            unset($_POST['id']);
            $campaign->updateCompanyContact($id, $this->input->post());
            $this->session->set_flashdata('student_message', 'Student Added to Company');
            redirect('campaigns/employerdetails/' . $school . '/' . $company, 'refresh');
            //$success = $school->createCall($this->input->post(),$id);

        }
        $this->load->view('pages/campaigns/campaign_new_placement', $data);

    }


    function calculateDates()
    {
        //need to get info from config set static for now
        $dates = ['mailshot_1_date' => '+7 day', 'mailshot_2_date' => '+14 day',
            'employer_engagement_start' => ' +14 day', 'employer_engagement_end' => '-9 week', 'self_place_deadline' => '-7 week',
            'matching_end' => '-7 week'];

        $placement = ['employer_engagement_end' => '-9 week', 'self_place_deadline' => '-7 week', 'matching_end' => '-7 week'];
        if (!empty($_POST)) {
            if ($this->input->post('campaign_place_start_date')) {
                $start = date('Y/m/d', strtotime(str_replace('/', '-', $this->input->post('campaign_start_date'))));
                $place_start = date('Y/m/d', strtotime(str_replace('/', '-', $this->input->post('campaign_place_start_date'))));
                $array = [];
                foreach ($dates as $k => $day) {
                    if (in_array($k, (array_keys($placement)))) {
                        $array[$k] = date('d/m/Y', strtotime($place_start . ' ' . $day));
                    } else {
                        $array[$k] = date('d/m/Y', strtotime($start . ' ' . $day));
                    }
                }

                echo json_encode($array, true);
            }
        }
    }


    function getBusiness($campaign_id = null)
    {
        $campaign = new CampaignsModel();
        if (!empty($_POST)) {
            $where = '';
            foreach ($_POST as $k => $v) {
                if ($v !== '') {
                    $where .= " and " . $k . " like '%" . $v . "%'";
                }
            }
            $dates = $campaign->getCompaniesByPostcode($where);
            echo json_encode($dates);
        }
    }


}
