<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Comanda extends Crud {
	
	var $controller 	= 'comanda';
	var $item_active 	= 'comanda';
	var $cdfield 		= 'cdcomanda';
	var $str 			= 100006;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('comanda_model', 		'comanda');
        $this->load->model('estabelecimento_model', 'estabelecimento');
		
		$this->data['list_estabelecimento'] = $this->combolist($this->estabelecimento);		
		
		$this->filter['cdestabelecimento'] 	= $this->session->userdata('logged_in')['cdestabelecimento'];

		$this->model = $this->comanda;
	
		$this->fields = array(
			'cdcomanda'     			=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdestabelecimento'			=> array('label'=> $this->lang->str(100002), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'cdtipocomanda'   			=> array('label'=> $this->lang->str(100077), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'cdalergenio'   			=> array('label'=> $this->lang->str(100008), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmcomanda'     			=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'vlcomanda'     			=> array('label'=> $this->lang->str(100092), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'dscomanda'     			=> array('label'=> $this->lang->str(100080), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'fgalergenio'     			=> array('label'=> $this->lang->str(100091), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true)
		);
	}
}	
?>