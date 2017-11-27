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
        $this->load->model('usuario_model', 		'usuario');
		
		$this->data['list_estabelecimento'] = $this->combolist($this->estabelecimento);		
		$this->data['list_usuario'] 		= $this->combolist($this->usuario);		
		
		$this->filter['cdestabelecimento'] 	= $this->session->userdata('logged_in')['cdestabelecimento'];
		$this->model = $this->comanda;
	
		$this->fields = array(
			'cdcomanda'     			=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdestabelecimento'			=> array('label'=> $this->lang->str(100002), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'cdusuario'   				=> array('label'=> $this->lang->str(100004), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true)
		);
	}
	
	public function extrato(){
		$this->item_active = 'comanda/extrato';
		$this->loadBreadcrumbs();
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str(100126);
		
		$cdfield = $this->session->userdata('logged_in')['cdcomanda'];
		
		if(empty($cdfield))
		{
			$this->session->set_flashdata('error_message', $this->lang->str(100128));
			redirect('home');
		}
		else
		{
			$this->data['cdfield'] 		= $cdfield;
			$this->data['target'] 		= $this->controller.'/visualizar/'.$cdfield;
			$this->data['view'] 		= true;
			
			$_POST = array_merge($_POST, $this->model->getDataByCd($cdfield));
			
			$this->load->template($this->controller.'/view', $this->data);
		}
	}
	
	public function historico() {
		$this->item_active = 'comanda/historico';
		$this->loadBreadcrumbs();
		
		$this->filter['cdestabelecimento'] 	= '';
		$this->filter['cdusuario'] 			= $this->session->userdata('logged_in')['cdusuario'];
		
		$options = array('grid' => true);
		if(!empty($this->filter))
			$options =  array_replace($options, $this->filter);
		
		$arr = $this->model->getListData(array_replace($options, $_REQUEST));
		
		$this->grid->show_action_edit 		= false;
		$this->grid->show_action_delete 	= false;
		$this->grid->show_action_active 	= false;
		$this->grid->show_action_inactive 	= false;
		$this->grid->set_label_column($arr['data']['label']);
		if($arr['status'])
			$this->grid->set_query_itens($arr['data']['item']);
		
		$this->data['title'] 			= $this->lang->str(100127);
		$this->data['grid_historico'] 	= $this->grid->render();
		
		$this->load->template($this->controller.'/historico', $this->data);
	}
}	
?>