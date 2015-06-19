<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_userbatches extends CI_Model {
	
	public $table_name;
	
	function __construct() {
		$this->table_name = "user_batches";
	}

	function getData($where="")
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		if (intval($where) > 0)
			$this->db->where("ubid", $where);
		else if (trim($where)!="")
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

	function delete($where)
	{
		$this->db->where($where);
		$this->db->delete($this->table_name);
	}
}
