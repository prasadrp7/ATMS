<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('site/model_users');
		$this->load->model('batch/model_batches');
		$this->load->library('sitesettings');
	}
	
	public function index()
	{
		$userinfo = $this->session->userdata('user');
		$user_id = $userinfo['user_id'];
		$users = $this->model_users->getData("user_type='Admin' AND user_id <> '".$user_id."'");
		$this->template->renderPage('index', array('users'=>$users));
	}

	public function add($id=0)
	{
		$this->load->model('batch/model_userbatches');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', array('required'));
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('user_type', 'User Type', 'required');

		// $this->form_validation->set_message('email', 'Enter valid email for the {field}');
		$addbtn = $this->input->post('addbtn');
		$user_id = (intval($id)>0) ? $id : 0;
		$mode = (intval($id)>0) ? "edit" : "add";
		$pass_data = array('mode'=>$mode);
		if (isset($addbtn)) {
			if ($this->form_validation->run() !== FALSE) {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$user_type = $this->input->post('user_type');
				$data = array();
				$data['name'] = $name;
				$data['email'] = $email;
				$data['username'] = $username;
				$data['password'] = $password;
				$data['user_type'] = $user_type;
				$data['updated_at'] = date("Y-m-d H:i:s");
				if ($mode == "edit") {
					$res = $this->model_users->update($data, array("user_id"=>$user_id));
					if (!$res) {
						$this->session->set_flashdata('error', 'There are some errors in updating data.');
					} else {
						$this->session->set_flashdata('success', 'Data saved successfully.');
						$this->acl->redirectURI('member/add/'.$user_id);
					}
				} else {
					$data['created_at'] = date("Y-m-d H:i:s");
					$res = $this->model_users->insert($data);
					if (!$res) {
						$this->session->set_flashdata('error', 'There are some errors in adding data.');
					} else {
						$pass_data['mode'] = "edit";
						$this->session->set_flashdata('success', 'Data saved successfully.');
						$this->acl->redirectURI('member/add/'.$res);
					}
				}
			}
		} else if($mode == "edit") {
			$_data = $this->model_users->getData($user_id);
			$pass_data = array_merge($pass_data, $_data[0]);
		}
		$this->template->renderPage('add',$pass_data);
	}
}
