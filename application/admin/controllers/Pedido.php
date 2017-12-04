<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class pedido extends Crud {
	
	var $controller 	= 'pedido';
	var $item_active 	= 'pedido';
	var $cdfield 		= 'cdpedido';
	var $str 			= 100137;
	
	public function __construct()
	{		
		parent::__construct();
		
		$this->grid->show_action_delete 	= true;
		$this->grid->show_action_view 		= false;
		$this->grid->show_action_active 	= false;
		$this->grid->show_action_inactive 	= false;
		$this->grid->disab_edit_inactive 	= true;
		
        $this->load->model('pedido_model', 	'pedido');
        $this->load->model('produto_model', 'produto');
        $this->load->model('comanda_model', 'comanda');
		
		$this->filter['cdestabelecimento'] 	= $this->session->userdata('logged_in')['cdestabelecimento'];
			
		$this->data['list_comanda'] 		= $this->combolist($this->comanda, array('fgstatus' => 1, 'cdestabelecimento' => $this->filter['cdestabelecimento']));		
		$this->data['list_produto'] 		= $this->combolist($this->produto, array('fgstatus' => 1, 'cdestabelecimento' => $this->filter['cdestabelecimento']));		
		
		$this->model = $this->pedido;
	
		$this->fields = array(
			'cdpedido'     			=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdcomanda'   			=> array('label'=> $this->lang->str(100006), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'cdproduto'   			=> array('label'=> $this->lang->str(100005), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'nrquantidade'     		=> array('label'=> $this->lang->str(100125), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true)
		);
	}
	
	public function index()
	{
		$this->data['title'] 	= $this->lang->str($this->str);
		$this->data['urlnovo'] 	= site_url($this->controller.'/novo');
		
		$this->load->template($this->controller.'/list', $this->data);
	}
}	
?>