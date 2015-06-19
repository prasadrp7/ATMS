<?php
class SiteSettings
{
	public $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function getDateFormats($date='',$format='')
	{
		$date = trim($date);
		if (in_array($date, array("","0000:00:00","0000:00:00 00:00:00","00:00:00")))
			return "---";
		return date($format, strtotime($date));
	}
}