<?php

class login extends CI_Model{

	function login_check($time = NULL, $group = NULL){
		// check if logged in
		if($this->ion_auth->logged_in()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function login_check_force(){
		// check if logged in
		if($this->ion_auth->logged_in()) {
			return TRUE;
		}else{
			$this->logout();
		}
	}

	function login_user(){
		// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$remember = $this->security->xss_clean($this->input->post('remember'));
		// Let's check if there are any results
		if($this->ion_auth->login($username, $password, $remember)){
		    $this->log_login(true);
			return true;
		}

		// If the previous process did not validate
		// then return false.
        $this->log_login(false);
		return false;
	}

	function logout(){
		// logout
		$this->ion_auth->logout();

		header('Location: /auth/login');
	}

	function change_password($user_id, $current, $new, $confirm, $identity){
		if ($this->ion_auth->hash_password_db($user_id, $current) !== TRUE){
			$this->sa_message_model->set_error('Your current password was not correct.');
			return FALSE;
		}elseif($new != $confirm){
			$this->sa_message_model->set_error('Your passwords do not match.');
			return FALSE;
		}else{
			if($this->ion_auth->change_password($identity, $current, $new)){
				return TRUE;
			}else{
				$this->sa_message_model->set_error('There was a problem trying to update your password.');
				return FALSE;
			}
		}
	}

	function loginsCount(){
	    
	    $return = array();
	    $temp = array();
	    $temp2 = array();

        $this->db->select('dayofmonth(`date_time`) as day, month(`date_time`) as month, count(*) as records, SUM(case when success = 1 then 1 else 0 end) as success, SUM(case when success = 0 then 1 else 0 end) as fail');
        $this->db->group_by('dayofmonth(`date_time`)');
        $query = $this->db->get_where('log_logins','date_time > "'.date('Y-m-d', strtotime('-30 days')).' 00:00:00" AND date_time <=  "'.date('Y-m-d').' 23:59:59"');
        foreach($query->result() as $result){
            
            $temp[$result->day] = $result;
            
        }

        $this->db->select('dayofmonth(FROM_UNIXTIME(`created_on`)) as day, month(FROM_UNIXTIME(`created_on`)) as month, count(*) as records');
        $this->db->group_by('dayofmonth(FROM_UNIXTIME(`created_on`))');
        $query = $this->db->get_where('users','created_on >= UNIX_TIMESTAMP(DATE(NOW() - INTERVAL 30 DAY))');
        foreach($query->result() as $result){

            $temp2[$result->day] = $result;

        }

        $begin = new DateTime(date('Y-m-d', strtotime('-30 days')));
        $end = new DateTime(date('Y-m-d', strtotime('+1 day')));

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt) {
            if(!isset($temp[$dt->format("d")])){
                $return[$dt->format("d")] = new stdClass();
                $return[$dt->format("d")]->day = $dt->format("d");
                $return[$dt->format("d")]->month = $dt->format("m");
                $return[$dt->format("d")]->records = 0;
                $return[$dt->format("d")]->success = 0;
                $return[$dt->format("d")]->fail = 0;
            } else {

                $return[$dt->format("d")] = $temp[$dt->format("d")];

            }

            if(!isset($temp2[$dt->format("d")])){
                $return[$dt->format("d")]->created = 0;
            } else {
                $return[$dt->format("d")]->created = $temp2[$dt->format("d")]->records;
            }
        }
        
        return $return;


    }


}
