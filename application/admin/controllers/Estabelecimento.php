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
		$this->data['list_tipoestabelecimento'] = $this->combolist($this->tipoestabelecimento);
		
		$this->filter['cdestabelecimento'] 	= $this->session->userdata('logged_in')['cdestabelecimento'];
		
		$this->model = $this->estabelecimento;
	
		$this->fields = array(
			'cdestabelecimento'     	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdtipoestabelecimento'   	=> array('label'=> $this->lang->str(100077), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'txfoto'					=> array('label'=> $this->lang->str(100087), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true, 	'isFile' => true),
			'nmrazaosocial'     		=> array('label'=> $this->lang->str(100078), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'nmfantasia'     			=> array('label'=> $this->lang->str(100079), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'dsestabelecimento'     	=> array('label'=> $this->lang->str(100080), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'idcnpj'     				=> array('label'=> $this->lang->str(100081), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'idtelefone'     			=> array('label'=> $this->lang->str(100082), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'idcelular'     			=> array('label'=> $this->lang->str(100083), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmemail'     				=> array('label'=> $this->lang->str(100084), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmsite'     				=> array('label'=> $this->lang->str(100085), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nrcapacidade'     			=> array('label'=> $this->lang->str(100086), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'idcep'     				=> array('label'=> $this->lang->str(100110), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'dsendereco'     			=> array('label'=> $this->lang->str(100109), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nrnumero'     				=> array('label'=> $this->lang->str(100111), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmcomplemento'     		=> array('label'=> $this->lang->str(100112), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmpais'     				=> array('label'=> $this->lang->str(100113), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmestado'     				=> array('label'=> $this->lang->str(100114), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmcidade'     				=> array('label'=> $this->lang->str(100115), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmbairro'     				=> array('label'=> $this->lang->str(100116), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nrlatitude'     			=> array('label'=> $this->lang->str(100117), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nrlongitude'     			=> array('label'=> $this->lang->str(100118), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true)
		);
	}
	
	
	public function visualizar($cdfield){
		$this->data['checkin_target'] = 'sessao/checkin/'.$cdfield;
		
		parent::visualizar($cdfield);
	}
	
	
	public function explorar(){
		$this->item_active = 'estabelecimento/explorar';
		$this->loadBreadcrumbs();
		
		$data = $this->model->getListData($this->filter);		
		if($data['status'])
			$this->data['data_estabelecimento'] = $data['data'];
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str($this->str);
		$this->data['target']		= $this->controller.'/visualizar';
		$this->load->template($this->controller.'/explorar', $this->data);
	}	
}
?>