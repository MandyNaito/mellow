<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Perfil extends Crud {
	
	var $controller 	= 'perfil';
	var $item_active 	= 'perfil';
	var $cdfield 		= 'cdperfil';
	var $str 			= 100009;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('perfil_model', 'perfil');

		$this->model = $this->perfil;
	
		$this->fields = array(
			'cdperfil'     	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 'msg' => array(), 'isField' => true),
			'nmperfil'     	=> array('label'=> $this->lang->str(100019), 	'rule' => 'trim|required|xss_clean', 'msg' => array(), 'isField' => true)
		);
	}
}
?>