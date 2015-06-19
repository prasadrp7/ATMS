<?php
class Acl
{
	public $_ci;
	public $access_arr;

	function __construct()
	{
		$this->_ci = &get_instance();
		$this->checkRouteAccess();
	}

	function getAcl()
	{
		$arr = array();
		/*$arr['SuperAdmin'] = array('batch','member','student','attendance','admin');
		$arr['Admin'] = array('batch','member','student','attendance');
		$arr['Student'] = array('student');*/

		$arr['batch'] = array('SuperAdmin','Admin');
		$arr['member'] = array('SuperAdmin');
		$arr['student'] = array('SuperAdmin','Admin');
		$arr['attendance'] = array('SuperAdmin','Admin','Student');
		$arr['admin'] = array('SuperAdmin','Admin','Student');
		$this->access_arr = $arr;
	}

	function checkRouteAccess()
	{
		$this->getAcl();
		$module = $this->_ci->router->fetch_module();
		$method = $this->_ci->router->fetch_method();
		if (array_key_exists($module, $this->access_arr)) {
			if (!$this->checkLoggedIn()) {
				$this->redirectURI('site/login');
			} else {
				$user = $this->_ci->session->userdata('user');
				if (!in_array($user['user_type'], $this->access_arr[$module]) && $method != 'profile')
					$this->redirectURI('profile');
			}
		}
	}

	function checkLoggedIn()
	{
		$user = $this->_ci->session->userdata('user');
		if (isset($user) && intval($user['user_id'])>0)
			return true;

		return false;
	}

	function redirectURI($uri)
	{
		redirect(base_url($uri));
	}

	public function updateStudentLogin()
	{
		$userinfo = $this->_ci->session->userdata('user');
		$user_id = $userinfo['user_id'];
		$user_type = $userinfo['user_type'];
		if ($user_type != "Student")
			return;

		$this->_ci->load->model('attendance/model_attendance');
		$arr = $this->_ci->model_attendance->getData("ac.user_id='".$user_id."' AND ac.date=CURDATE()");
		if (is_array($arr) && count($arr)>0)
			return;
		
		$date = date("Y-m-d");
		$starttime = date("H:i:s");
		$endtime = "00:00:00";

		$data = array();
		$data['date'] = $date;
		$data['user_id'] = $user_id;
		$data['starttime'] = $starttime;
		$data['endtime'] = $endtime;

		$res = $this->_ci->model_attendance->insert($data);
		if (!$res) {
			$this->_ci->session->set_flashdata('error', 'There are some errors in adding data.');
		} else {
			$this->_ci->session->set_flashdata('success', 'Data saved successfully.');
		}
	}

	public function updateStudentLogout()
	{
		$userinfo = $this->_ci->session->userdata('user');
		$user_id = $userinfo['user_id'];
		$user_type = $userinfo['user_type'];
		if ($user_type == "Student") {
			$this->_ci->load->model('attendance/model_attendance');
			$data = array();
			$data['endtime'] = date("H:i:s");
			$res = $this->_ci->model_attendance->update($data, "user_id='".$user_id."' AND date=CURDATE()");
		}
	}
}