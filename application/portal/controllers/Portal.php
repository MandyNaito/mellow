<?php
Class Portal extends CI_Controller 
{
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->data['wintitle'] = $this->lang->str(100097);
	}

	public function index() 
	{
		$this->load->view('portal', $this->data);		
	}
}

?>