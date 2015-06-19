<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_attendance');
		$this->load->model('site/model_users');
		$this->load->library('sitesettings');
	}
	
	public function index()
	{
		$userinfo = $this->session->userdata('user');
		$user_id = $userinfo['user_id'];
		$user_type = $userinfo['user_type'];

		if ($user_type == "Student") {
			$attendance = $this->model_attendance->getData("ac.user_id='".$user_id."'");
			$this->template->renderPage('index_student', array('attendance'=>$attendance));
		} else {
			$attendance = $this->model_attendance->getData();
			$this->template->renderPage('index', array('attendance'=>$attendance));
		}
	}

	public function add($id=0)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'Date', array('required'));
		$this->form_validation->set_rules('user_id', 'Name', 'required');
		$this->form_validation->set_rules('starttime', 'Start Time', 'required');
		$this->form_validation->set_rules('endtime', 'End Time', 'required');

		$addbtn = $this->input->post('addbtn');
		$attend_id = (intval($id)>0) ? $id : 0;
		$mode = (intval($id)>0) ? "edit" : "add";
		$pass_data = array('mode'=>$mode);
		if (isset($addbtn)) {
			if ($this->form_validation->run() !== FALSE) {
				$date = $this->input->post('date');
				$user_id = $this->input->post('user_id');
				$cond = "date='".$date."' AND user_id='".$user_id."'";
				if ($mode == "edit") {
					$cond .= " AND attend_id <> '".$attend_id."'";
				}
				$arr = $this->model_attendance->execQuery("SELECT * FROM attendance WHERE ".$cond);
				if (is_array($arr) && count($arr)>0) {
					$this->session->set_flashdata('error','Record already exists');
					$this->acl->redirectURI('attendance/add');
				}
				$starttime = $this->input->post('starttime');
				$endtime = $this->input->post('endtime');
				$data = array();
				$data['date'] = $date;
				$data['user_id'] = $user_id;
				$data['starttime'] = $starttime;
				$data['endtime'] = $endtime;
				if ($mode == "edit") {
					$res = $this->model_attendance->update($data, array("attend_id"=>$attend_id));
					if (!$res) {
						$this->session->set_flashdata('error', 'There are some errors in updating data.');
					} else {
						$this->session->set_flashdata('success', 'Data saved successfully.');
						$this->acl->redirectURI('attendance/add/'.$attend_id);
					}
				} else {
					$res = $this->model_attendance->insert($data);
					if (!$res) {
						$this->session->set_flashdata('error', 'There are some errors in adding data.');
					} else {
						$pass_data['mode'] = "edit";
						$this->session->set_flashdata('success', 'Data saved successfully.');
						$this->acl->redirectURI('attendance/add/'.$res);
					}
				}
			}
		} else if($mode == "edit") {
			$_data = $this->model_attendance->getData($id);
			$pass_data = array_merge($pass_data, $_data[0]);
		}
		$this->template->renderPage('add',$pass_data);
	}
}
