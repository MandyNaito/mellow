<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Sessao extends Home {
	
	var $controller 	= 'sessao';
	var $item_active 	= 'sessao';
	var $str 			= 100002;
	
	public function __construct()
	{
		parent::__construct();

        $this->load->model('estabelecimento_model', 'estabelecimento');
		$this->model = $this->estabelecimento;
		
	}
	
	public function verificar(){		
		error_log(print_r($this->input->post('qrcode'), true));
		error_log(print_r($_FILES, true));
	}
	
	public function verificador(){
		$this->item_active = 'sessao/verificador';
		$this->data['target'] 		= $this->controller.'/verificar';
		$this->loadBreadcrumbs();
		
		$data = $this->model->getListData($this->filter);		
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str($this->str);
		
		$this->load->template($this->controller.'/verificador', $this->data);
	}
	
	public function checkin(){
		$this->item_active = 'sessao/checkin';
		$this->loadBreadcrumbs();
		
		$data = $this->model->getListData($this->filter);		
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str($this->str);
		
		$this->load->library('ciqrcode');
		
		$hash = md5($this->session->userdata('logged_in')['cdusuario']);
		
		$params['data'] 			= $hash;
		$params['level'] 			= 'H';
		$params['size']			 	= 8;
		$params['savename']	 		= './upload/'.$this->controller.'/'.$hash.'.png';
		$params['cacheable']		= false; 
		$params['cachedir']			= APPPATH.'cache/'; 
		$params['errorlog']			= APPPATH.'logs/'; 
			
		$this->ciqrcode->generate($params);
		
		
		$this->data['qrcode'] 		= $params['savename'];

		$this->load->template($this->controller.'/checkin', $this->data);
	}
}
?>