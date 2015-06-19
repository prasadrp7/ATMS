<?php
class Assetmanager
{
	public $_ci;
	private $_css_arr = array();
	private $_js_arr = array();

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function add_file($path='', $type='css')
	{
		switch($type)
		{
			case 'css':
				$this->_css_arr[] = $path;
				break;

			case 'js':
				$this->_js_arr[] = $path;
				break;			
		}
	}

	function run_all()
	{
		$str = '';
		foreach ($this->_css_arr as $key => $value) {
			$str .= '<link href="'.base_url($value).'" rel="stylesheet">'.PHP_EOL;
		}
		foreach ($this->_js_arr as $key => $value) {
			$str .= '<script type="text/javascript" src="'.base_url($value).'" ></script>'.PHP_EOL;
		}
		return $str;
	}
}