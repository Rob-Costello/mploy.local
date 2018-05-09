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
			return true;
		}

		// If the previous process did not validate
		// then return false.
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
}
