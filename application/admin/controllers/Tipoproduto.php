<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Tipoproduto extends Crud {
	
	var $controller 	= 'tipoproduto';
	var $item_active 	= 'tipoproduto';
	var $cdfield 		= 'cdtipoproduto';
	var $str 			= 100011;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('tipoproduto_model', 'tipoproduto');
        $this->load->model('estabelecimento_model', 'estabelecimento');

		$this->model = $this->tipoproduto;
		
		$this->data['list_estabelecimento'] 		= $this->combolist($this->estabelecimento);
		$this->filter['cdestabelecimento'] 			= $this->session->userdata('logged_in')['cdestabelecimento'];
			
		$this->fields = array(
			'cdtipoproduto' 	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true),
			'nmtipoproduto' 	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true),
			'dstipoproduto'		=> array('label'=> $this->lang->str(100080), 	'rule' => 'trim|xss_clean', 			'msg' => array(), 'isField' => true),
			'cdestabelecimento' => array('label'=> $this->lang->str(100002), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true)
		);
	}
}
?>