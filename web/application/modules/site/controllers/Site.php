<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_users');
		$this->template->setTemplate('default');
	}
	
	public function index()
	{
		$this->template->renderPage('index');
	}
	
	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('useremail', 'Username', array('required'));
		$this->form_validation->set_rules('password', 'Password', 'required');

		// $this->form_validation->set_message('email', 'Enter valid email for the {field}');
		$loginbtn = $this->input->post('loginbtn');
		if (isset($loginbtn)) {
			if ($this->form_validation->run() !== FALSE) {
				$email = $this->input->post('useremail');
				$password = $this->input->post('password');
				$valid = $this->model_users->checkUser($email, $password);
				if ($valid['flag'])
				{
					$this->session->set_flashdata('success', 'Logged in successfully');
					$user = $this->session->userdata('user');
					$this->acl->updateStudentLogin();
					// if ($user['user_type'] == 'SuperAdmin')
					// 	$this->acl->redirectURI('admin');
					// elseif ($user['user_type'] == 'Admin')
					// 	$this->acl->redirectURI('admin');
					// else
						$this->acl->redirectURI('dashboard');
				}
				$this->session->set_flashdata('error', $valid['message']);
			}
		}
		$this->template->renderPage('login');
	}

	public function logout()
	{
		$this->acl->updateStudentLogout();
		$this->session->unset_userdata('user');
		$this->acl->redirectURI('site/login');
	}
}