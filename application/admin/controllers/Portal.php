<?php
Class Portal extends CI_Controller 
{
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index() 
	{
		$this->data['wintitle'] = $this->lang->str(100097);
		$this->load->view('portal', $this->data);
	}
}

?>