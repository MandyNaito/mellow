<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Auth_Controller {
	
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->multi_menu->set_items($this->menu->getMenu());
		$this->data['wintitle'] = $this->lang->str(100000)." | ".$this->lang->str(100002);
		$this->data['nmusuario'] = $this->session->userdata('logged_in')['nmusuario'];
		$this->data['item_active'] = 'home';
	}
	
	public function index()
	{
		$this->load->template('home', $this->data);
	}
}
?>