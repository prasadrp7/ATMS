<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_attendance extends CI_Model {
	
	public $table_name;
	
	function __construct() {
		$this->table_name = "attendance";
	}

	function getData($where="")
	{
		$this->db->select("ac.*,u.name");
		$this->db->from($this->table_name." ac");
		$this->db->join("users u","u.user_id = ac.user_id","left");
		if (intval($where) > 0)
			$this->db->where("attend_id", intval($where));
		else if (trim($where) != "")
			$this->db->where($where);
		$result = $this->db->get();
		$data = $result->result_array();
		return $data;
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

	function execQuery($query)
	{
		return $this->db->query($query)->result_array();
	}
}
