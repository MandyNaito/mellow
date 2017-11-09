<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Tipoestabelecimento extends Crud {
	
	var $controller 	= 'tipoestabelecimento';
	var $item_active 	= 'tipoestabelecimento';
	var $cdfield 		= 'cdtipoestabelecimento';
	var $str 			= 100010;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('tipoestabelecimento_model', 'tipoestabelecimento');

		$this->model = $this->tipoestabelecimento;
	
		$this->fields = array(
			'cdtipoestabelecimento'    	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true),
			'nmtipoestabelecimento'    	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true),
			'dstipoestabelecimento'     => array('label'=> $this->lang->str(100080), 	'rule' => 'trim|xss_clean', 			'msg' => array(), 'isField' => true)
		);
	}
}
?>