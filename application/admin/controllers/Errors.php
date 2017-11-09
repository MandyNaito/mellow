<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
	
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
		
		$this->data['wintitle'] = $this->lang->str(100000)." | ".$this->lang->str(100050);
	}
	
	public function page_missing()
	{
		$this->data['heading']	= '404';
		$this->data['message'] 	= $this->lang->str(100051);
		$this->data['url'] 		= site_url($this->router->default_controller);
		
		$this->output->set_status_header('404'); 
		$this->load->view('errors/custom/error', $this->data);
	}
	
	public function internal_error()
	{
		$this->data['heading'] 	= '500';
		$this->data['message']	= $this->lang->str(100052);
		$this->data['url'] 		= site_url($this->router->default_controller);
		
		$this->output->set_status_header('500'); 
		$this->load->view('errors/custom/error', $this->data);
	}
}
?>