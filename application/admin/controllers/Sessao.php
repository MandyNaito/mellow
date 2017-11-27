<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Sessao extends Home {
	
	var $controller 			= 'sessao';
	var $item_active 			= 'sessao';
	var $str 					= 100120;
	
	public function __construct()
	{
		parent::__construct();

        $this->load->model('estabelecimento_model', 'estabelecimento');
		$this->model = $this->estabelecimento;
		$this->load->library('encryption');
		$this->load->library('encrypt');
		
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
		//$hash2 = $this->encryption->decrypt($hash);
		$this->load->template($this->controller.'/verificador', $this->data);
	}
	
	public function checkin($cdestabelecimento = ''){
		$this->item_active = 'sessao/checkin';
		$this->loadBreadcrumbs();
		
		$data = $this->model->getListData($this->filter);		
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str($this->str);
		
		if(!empty($this->session->userdata('logged_in')['comanda']))
		{
			redirect('home');
		}
		else
		{
			if(!empty($cdestabelecimento)){
				$estabelecimento = $this->estabelecimento->getDataByCd($cdestabelecimento);
				
				$this->load->library('ciqrcode');
				$this->load->library('crypter');
				
				$hash = $this->session->userdata('logged_in')['cdusuario'].'-'.$cdestabelecimento;

				
				$params['data'] 			= $this->encryption->encrypt($hash);
				$params['level'] 			= 'H';
				$params['size']			 	= 10;
				$params['savename']	 		= './upload/'.$this->controller.'/'.$hash.'.png';
				$params['cacheable']		= false; 
				$params['cachedir']			= APPPATH.'cache/'; 
				$params['errorlog']			= APPPATH.'logs/'; 
					
				$this->ciqrcode->generate($params);
				
				$this->data['qrcode'] 		= $params['savename'];
				$this->data['nrcode'] 		= $this->crypter->encrypt($hash);
				$this->data['title'] 		= $this->lang->str(100119).' | '.$estabelecimento['nmfantasia'];
				$this->data['target']		= $this->controller.'/checkin';
				$this->load->template($this->controller.'/checkin', $this->data);
			}
			else
			{
				$this->data['target'] = $this->controller.'/checkin';
				$data = $this->model->getListData($this->filter);		
				if($data['status'])
					$this->data['data_estabelecimento'] = $data['data'];
			
				$this->load->template('estabelecimento/explorar', $this->data);
			}
		}
	}
}
?>