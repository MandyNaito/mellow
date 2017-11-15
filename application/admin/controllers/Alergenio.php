<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Alergenio extends Crud {
	
	var $controller 	= 'alergenio';
	var $item_active 	= 'alergenio';
	var $cdfield 		= 'cdalergenio';
	var $str 			= 100008;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('alergenio_model', 'alergenio');
        $this->load->model('estabelecimento_model', 'estabelecimento');

		$this->model = $this->alergenio;

		$this->data['list_estabelecimento'] 		= $this->combolist($this->estabelecimento);
		$this->filter['cdestabelecimento'] 			= $this->session->userdata('logged_in')['cdestabelecimento'];
		
		$this->grid->show_action_view = false;
	
		$this->fields = array(
			'cdalergenio'     	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 'msg' => array(), 'isField' => true),
			'nmalergenio'     	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 'msg' => array(), 'isField' => true),
			'cdestabelecimento' => array('label'=> $this->lang->str(100002), 	'rule' => 'trim|required|xss_clean', 'msg' => array(), 'isField' => true)
		);
	}
}
?>