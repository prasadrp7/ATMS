<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {
	
	public $table_name;
	
	function __construct() {
		$this->table_name = "users";
	}

	function getData($where="")
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		if (intval($where)>0)
			$this->db->where("user_id",$where);
		elseif (trim($where)!="")
			$this->db->where($where);
		$result = $this->db->get();
		$data = $result->result_array();
		return $data;
	}

	function checkUser($email,$password)
	{
		$ret_arr = array();
		$msg = "";
		$this->db->select("user_id,name,email,password,user_type");
		$this->db->from($this->table_name);
		$this->db->where("username", $email);
		$this->db->where("password", ($password));
		$result = $this->db->get()->result_array();
		if (!is_array($result) || count($result)==0) {
			$flag = false;
			$msg = "Wrong username/password";
		} else {
			$flag = true;
			$this->session->set_userdata('user', $result[0]);
		}
		$ret_arr['flag'] = $flag;
		$ret_arr['message'] = $msg;
		return $ret_arr;
	}

	function insert($data)
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	function update($data,$where)
	{
		$this->db->where($where);
		return $this->db->update($this->table_name, $data);
	}

	function getDropdownUsers($where="")
	{
		$this->db->select("user_id,name");
		$this->db->from($this->table_name);
		if (trim($where)!="")
			$this->db->where($where);
		$result = $this->db->get();
		$data = $result->result_array();
		$pass_arr = array();
		foreach ($data as $key => $value) {
			$pass_arr[$value['user_id']] = $value['name'];
		}
		return $pass_arr;
	}

	function getDropdownData()
	{
		$arr = array('Admin'=>'Admin', 'Student'=>'Student');
		return $arr;
	}

	function getBatchesIds($user_id)
	{
		$this->load->model('batch/model_userbatches');
		$batch_arr = $this->model_userbatches->getData("user_id='".$user_id."'");
		return $batch_arr;
	}
}
