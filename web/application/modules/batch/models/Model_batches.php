<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_batches extends CI_Model {
	
	public $table_name;
	
	function __construct() {
		$this->table_name = "batches";
	}

	function getData($id=0)
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		if ($id > 0)
			$this->db->where("batch_id", $id);
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

	function getDropdownData()
	{
		$this->db->select("batch_id,batch_name");
		$this->db->from($this->table_name);
		$arr = $this->db->get()->result_array();
		$drop_arr = array();
		foreach ($arr as $key => $value) {
			$drop_arr[$value['batch_id']] = $value['batch_name'];
		}
		return $drop_arr;
	}
}
