<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Home.php");

class Crud extends Home {
	
	var $fields 		= array();
	var $cdfield 		= '';
	var $redir 			= '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->grid->show_action_column = true;
		$this->grid->show_action_delete = false;
		$this->grid->url_action_view = site_url($this->controller.'/visualizar/');
		$this->grid->url_action_edit = site_url($this->controller.'/editar/');
		
		$this->redir = $this->controller;
		
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
			$this->redir = $this->agent->referrer();
	}
	
	public function index() {
		$this->gestao();
	}
	
	public function gestao() {
		$this->data['title'] 	= $this->lang->str($this->str);
		$this->data['urlnovo'] 	= site_url($this->controller.'/novo');
				
		$this->load->template($this->controller.'/list', $this->data);
	}
		
	public function novo(){
		$this->data['target'] 		= $this->controller.'/inserir';
		$this->data['title'] 		= $this->lang->replaceStringTags(100073, array(1 => array('text' => mb_strtolower($this->lang->str($this->str)))));
		$this->data[$this->cdfield] = -1;
		
		$this->load->template($this->controller.'/form', $this->data);
	}
	
	public function inserir(){
		$this->data['target'] 		= $this->controller.'/inserir';
		$this->data['title'] 		= $this->lang->replaceStringTags(100073, array(1 => array('text' => mb_strtolower($this->lang->str($this->str)))));
		$this->data[$this->cdfield] = -1;
		
		$this->salvar($this->fields);
	}
	
	public function editar($cdfield){
		$this->data['cdfield'] 		= $cdfield;
		$this->data['target'] 		= $this->controller.'/editar/'.$cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100069, array(1 => array('text' => mb_strtolower($this->lang->str($this->str)))));

		$this->salvar($this->fields, $cdfield);
	}
	
	public function visualizar($cdfield){
		$this->data['cdfield'] 		= $cdfield;
		$this->data['target'] 		= $this->controller.'/visualizar/'.$cdfield;
		$this->data['edit_target'] 	= $this->controller.'/editar/'.$cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100072, array(1 => array('text' => mb_strtolower($this->lang->str($this->str)))));
		$this->data['view'] 		= true;
		
		$_POST = array_merge($_POST, $this->model->getDataByCd($cdfield));
		
		$this->load->template($this->controller.'/view', $this->data);
	}
	
	public function deletar($cdfield){
		$return = $this->model->delete($cdfield);
		if($return)
			$dados = array('status' => true, 'msg' => $this->lang->str(100045));
		else
			$dados = array('status' => false, 'msg' => $this->lang->str(100046));
		
		echo json_encode($dados);
	}
	
	public function ativar($cdfield){
		$return = $this->model->enable($cdfield);
		if($return)
			$dados = array('status' => true, 'msg' => $this->lang->str(100064));
		else
			$dados = array('status' => false, 'msg' => $this->lang->str(100046));
		
		echo json_encode($dados);
	}
	
	public function inativar($cdfield){
		$return = $this->model->disable($cdfield);
		if($return)
			$dados = array('status' => true, 'msg' => $this->lang->str(100065));
		else
			$dados = array('status' => false, 'msg' => $this->lang->str(100046));
		
		echo json_encode($dados);
	}
	
	public function salvar($fields, $cdfield = ''){	
		$fgedit = (!empty($cdfield) || $cdfield == -1);
		
		$this->form_validation->set_error_delimiters('<div ><label class="error">', '</label></div>');
		foreach($fields as $key => $field)
			$this->form_validation->set_rules($key, $field['label'], $field['rule'], $field['msg']);

		if ($this->form_validation->run() == FALSE) 
		{
			if($fgedit)
				$_POST = array_replace($_POST, $this->model->getDataByCd($cdfield));
			
			$this->load->template($this->controller.'/form', $this->data);
		} 
		else 
		{
			$data = array();
			foreach($fields as  $key => $field){
				if($key != $this->cdfield && !empty($field['isField'])){
					if(empty($field['isFile']))
						$data[$key] = $this->input->post($key);
					else
						$data[$key] = $this->uploadImage($key);
				} 
			}
			
			$str = '';
			if($fgedit){
				$this->model->update($cdfield, $data);
				$str = 100070;
			}
			else{
				$cdfield = $this->model->insert($data);
				$str = 100071;
			}

			if(!empty($cdfield) && $cdfield != -1){
				$this->session->set_flashdata('success_message', $this->lang->str($str));
				redirect($this->redir);
			} 
			else 
			{
				if($fgedit)
					$_POST = array_replace($_POST, $this->model->getDataByCd($cdfield));
				$this->load->template($this->controller.'/form', $this->data);
			}
		}
	}
	
	function uploadImage($id){
		$config['upload_path']	 	= './upload/'.$this->controller.'/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_filename'] 	= '100';
		$config['encrypt_name'] 	= true;
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload($id))
			return  'upload/'.$this->controller.'/'.$this->upload->data()['file_name'];
		return $this->input->post('hidden_'.$id);
	}
}
?>