<?php

class secure extends CI_Controller{

	function index(){

		$this->load->model('login');
		$this->load->model('messages');
		$this->load->library('ion_auth');

		// get current URL
		$data['current_url'] = $this->uri->uri_string();

		if($this->input->post('username')){
			$this->login->login_user();
		}


		if($this->login->login_check()){

			$data['user'] = $this->ion_auth->user()->row();
			// convert menu json string to array

			if($this->input->get("r")) {
				header("Location: " . $this->input->get("r") );
			} else {
				header('Location: /dashboard/');
			}

		}else{

			if($this->input->post('username')) {

				$this->messages->set_error('<strong>Login failed!</strong> Please check your username and password.');

			} elseif( $this->input->post('email') ) {

				$forgotten = $this->ion_auth->forgotten_password( $this->input->post('email') );
				$edata = array();

				if ($forgotten) { //if there were no errors

					$return['user'] = $this->sa_db->get_user('forgotten_password_code = "'.$forgotten['forgotten_password_code'].'"');
					$this->messages->set_message('<strong>Success!</strong> We have sent you an email to reset your password.');
					$this->load->library('email');
					$config = array (
						'mailtype' => 'html',
						'charset'  => 'utf-8',
						'priority' => '1'
					);

					$this->email->initialize($config);
					$this->email->from($this->config->item('admin_email'), 'Mploy Admin');
					$this->email->to($return['user']->email);
					$this->email->subject('Password reset');

					$edata['code'] = $forgotten['forgotten_password_code'];
					$message = $this->load->view('/standard/emails/forgot_password', $edata, TRUE);
					$this->email->message($message);
					$this->email->send();

				} else {

					$this->messages->set_error('<strong>Error!</strong> '.$this->ion_auth->errors());

				}

			}

			$data['messages'] = $this->messages->get_messages();
			$data['errors'] = $this->messages->get_errors();

			$this->load->view('pages/login', $data);

		}

	}

	function logout(){

		$this->load->model('login');
		$this->load->library('ion_auth');
		$this->login->logout();

		if($this->input->get("r")) {

			header("Location: " . $this->input->get("r") );

		}

		$this->load->view('pages/login');

	}

	function passwordReset(){

		$this->load->model('login');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address', 'required');

		if ($this->form_validation->run() == false) {

			//setup the input
			$this->data['email'] = array('name'    => 'email',
				'id'      => 'email',
			);
			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth/forgot_password', $this->data);

		} else {

			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if ($forgotten) { //if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

		}

	}

}
