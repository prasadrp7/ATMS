<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_batches');
	}
	
	public function index()
	{
		$batches = $this->model_batches->getData();
		$this->template->renderPage('index', array('batches'=>$batches));
	}

	public function add($id=0)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('batch_name', 'Name', array('required'));
		$this->form_validation->set_rules('batch_code', 'Code', 'required');

		// $this->form_validation->set_message('email', 'Enter valid email for the {field}');
		$addbtn = $this->input->post('addbtn');
		$batch_id = (intval($id)>0) ? $id : 0;
		$mode = (intval($id)>0) ? "edit" : "add";
		$pass_data = array('mode'=>$mode);
		if (isset($addbtn)) {
			if ($this->form_validation->run() !== FALSE) {
				$batch_name = $this->input->post('batch_name');
				$batch_code = $this->input->post('batch_code');
				$data = array();
				$data['batch_name'] = $batch_name;
				$data['batch_code'] = $batch_code;
				if ($mode == "edit") {
					$res = $this->model_batches->update($data, array("batch_id"=>$batch_id));
					if (!$res) {
						$this->session->set_flashdata('error', 'There are some errors in updating data.');
					} else {
						$this->session->set_flashdata('success', 'Data saved successfully.');
						$this->acl->redirectURI('batch/add/'.$batch_id);
					}
				} else {
					$res = $this->model_batches->insert($data);
					if (!$res) {
						$this->session->set_flashdata('error', 'There are some errors in adding data.');
					} else {
						$pass_data['mode'] = "edit";
						$this->session->set_flashdata('success', 'Data saved successfully.');
						$this->acl->redirectURI('batch/add/'.$res);
					}
				}
			}
		} else if($mode == "edit") {
			$_data = $this->model_batches->getData($id);
			$pass_data = array_merge($pass_data, $_data[0]);
		}
		$this->template->renderPage('add',$pass_data);
	}
}
