<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Estabelecimento extends Crud {
	
	var $controller 	= 'estabelecimento';
	var $item_active 	= 'estabelecimento';
	var $cdfield 		= 'cdestabelecimento';
	var $str 			= 100002;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('estabelecimento_model', 'estabelecimento');
        $this->load->model('tipoestabelecimento_model', 'tipoestabelecimento');
		$this->data['list_tipoestabelecimento'] = $this->lista($this->tipoestabelecimento);

		$this->model = $this->estabelecimento;
	
		$this->fields = array(
			'cdestabelecimento'     	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdtipoestabelecimento'   	=> array('label'=> $this->lang->str(100077), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'nmrazaosocial'     		=> array('label'=> $this->lang->str(100078), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'nmfantasia'     			=> array('label'=> $this->lang->str(100079), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'dsestabelecimento'     	=> array('label'=> $this->lang->str(100080), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'idcnpj'     				=> array('label'=> $this->lang->str(100081), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'idtelefone'     			=> array('label'=> $this->lang->str(100082), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'idcelular'     			=> array('label'=> $this->lang->str(100083), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmemail'     				=> array('label'=> $this->lang->str(100084), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmsite'     				=> array('label'=> $this->lang->str(100085), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nrcapacidade'     			=> array('label'=> $this->lang->str(100086), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true)
		);
	}
}
?>