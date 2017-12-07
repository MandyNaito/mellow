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
        $this->load->model('comanda_model', 'comanda');
		
		$this->load->library('encryption');
		$this->load->library('encrypt');
		$this->load->library('crypter');
		
		$this->model = $this->estabelecimento;	
	}
	
	public function verificar(){		
		$nrcode = $this->input->post('nrcode');
		$qrcode = $this->input->post('qrtoken');
		
		if(!empty($nrcode) || !empty($qrcode)){
			$hash = (!empty($nrcode) ? $this->crypter->decrypt($nrcode) : (!empty($qrcode) ? $this->crypter->decrypt($qrcode) : ''));
			if(!empty($hash)){
				$data = explode('-', $hash);
				$cdusuario 			= $data[0];
				$cdestabelecimento 	= $data[1];
				
				$cdcomanda = $this->comanda->insert(array('cdusuario' => $cdusuario, 'cdestabelecimento' => $cdestabelecimento));
				if(!empty($cdcomanda))
					$this->session->set_flashdata('success_message', $this->lang->replaceStringTags(100141, array(1 => array('text' => $cdcomanda))));
				else
					$this->session->set_flashdata('error_message', $this->lang->str(100140));
			}
			else
				$this->session->set_flashdata('error_message', $this->lang->str(100140));
		}
		else
			$this->session->set_flashdata('error_message', $this->lang->str(100140));
		
		redirect($this->controller.'/verificador');
	}
	
	public function verificador(){
		$this->item_active = 'sessao/verificador';
		$this->data['target'] 		= $this->controller.'/verificar';
		$this->loadBreadcrumbs();
		
		$data = $this->model->getListData($this->filter);		
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str(100139);
		
		$this->load->template($this->controller.'/verificador', $this->data);
	}
	
	public function checkin($cdestabelecimento = ''){
		$this->item_active = 'sessao/checkin';
		$this->loadBreadcrumbs();
		
		$data = $this->model->getListData($this->filter);		
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str($this->str);
		
		$comanda = $this->comanda->getListData(array('cdusuario'=> $this->session->userdata('logged_in')['cdusuario'], 'fgstatus' => 1))['data'];		
		if(!empty($comanda)){
			$this->session->set_flashdata('error_message', $this->lang->str(100142));
			redirect('comanda/extrato');
		}
		else
		{
			if(!empty($cdestabelecimento)){
				$estabelecimento = $this->estabelecimento->getDataByCd($cdestabelecimento);
				
				$this->load->library('ciqrcode');
				
				$hash = $this->session->userdata('logged_in')['cdusuario'].'-'.$cdestabelecimento;

				$params['data'] 			= $this->crypter->encrypt($hash);
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