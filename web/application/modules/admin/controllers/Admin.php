<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('site/model_users');
		$this->load->library('sitesettings');
	}
	
	public function index()
	{
		$this->assetmanager->add_file('assets/js/plugins/flot/jquery.flot.js','js');
		$this->assetmanager->add_file('assets/js/plugins/flot/jquery.flot.tooltip.min.js','js');
		$this->assetmanager->add_file('assets/js/dashboard.js','js');

		$this->template->renderPage('index');
	}

	public function profile()
	{
		$userinfo = $this->session->userdata('user');
		$user_id = $userinfo['user_id'];
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', array('required'));
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$addbtn = $this->input->post('addbtn');
		if (isset($addbtn)) {
			if ($this->form_validation->run() !== FALSE) {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = array();
				$data['name'] = $name;
				$data['email'] = $email;
				$data['username'] = $username;
				$data['password'] = $password;
				$data['updated_at'] = date("Y-m-d H:i:s");
				$res = $this->model_users->update($data, array("user_id"=>$user_id));
				if (!$res) {
					$this->session->set_flashdata('error', 'There are some errors in updating data.');
				} else {
					$this->session->set_flashdata('success', 'Profile updated successfully.');
					$this->acl->redirectURI('profile');
				}
			}
		}
		$_data = $this->model_users->getData($user_id);
		$data = $_data[0];
		$this->template->renderPage('profile',$data);
	}
}
