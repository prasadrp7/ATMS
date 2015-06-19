<?php
class Template
{
	public $_ci;
	private $_folder_t;
	private $_folder_p;
	private $_default;

	function __construct() {
		$this->_ci = &get_instance();
		$this->_folder_t = "templates/";
		$this->_folder_p = "partials/";
		$this->_default = "admin_template";
	}

	function setTemplate($name='')
	{
		$this->_default = $name;
	}

	function renderPage($view='', $data=array()) {
		$body = $this->_ci->parser->parse($view, $data, TRUE);
		$render_arr = array('body'=>$body);
		$render_name = $this->_folder_t . $this->_default;
		$this->_ci->load->view($render_name, $render_arr);
	}

	function renderPartial($view='', $data=array()) {
		if (!isset($view) || trim($view) == "")
			return;
		
		$render_name = $this->_folder_p . $view;
		$this->_ci->load->view($render_name, $data);
	}
}