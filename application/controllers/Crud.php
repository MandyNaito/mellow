<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Home.php");

class Crud extends Home {
	
	var $fields 		= array();
	var $cdfield 		= '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->grid->show_action_column = true;
		$this->grid->show_action_delete = false;
		$this->grid->url_action_view = $this->controller.'/visualizar/';
		$this->grid->url_action_edit = $this->controller.'/editar/';
	}
	
	public function index() {
		$this->data['title'] 	= $this->lang->str($this->str);
		$this->data['urlnovo'] 	= site_url($this->controller.'/novo');
				
		$this->load->template('list/'.$this->controller, $this->data);
	}
	
	public function childData($table, $model = '', $cdfield = -1){
		parent::childData($table, $this->model, $this->input->post($this->cdfield));
	}
	
	public function novo(){
		$this->data['target'] 			= "inserir";
		$this->data['title'] 			= $this->lang->replaceStringTags(100073, array(1 => array('text' => $this->lang->str($this->str))));
		$this->data[$this->cdfield] 	= -1;
		
		$this->load->template('form/'.$this->controller, $this->data);
	}
	
	public function inserir(){
		$this->data['target'] 			= "inserir";
		$this->data['title'] 			= $this->lang->replaceStringTags(100073, array(1 => array('text' => $this->lang->str($this->str))));
		$this->data[$this->cdfield] 	= -1;
		
		$this->salvar();
	}
	
	public function editar($cdfield){
		$this->data['target'] 		= $cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100069, array(1 => array('text' => $this->lang->str($this->str))));

		$this->salvar($cdfield);
	}
	
	public function visualizar($cdfield){
		$this->data['target'] 		= $cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100072, array(1 => array('text' => $this->lang->str($this->str))));
		$this->data['view'] 		= true;
		
		$_POST = array_merge($_POST, $this->model->getDataByCd($cdfield));
		
		$this->load->template('view/'.$this->controller, $this->data);
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
	
	public function salvar($cdfield = ''){	
		$fgedit = (!empty($cdfield) || $cdfield == -1);
		
		$fields = $this->fields;
		
		$this->form_validation->set_error_delimiters('<div ><label class="error">', '</label></div>');
		foreach($fields as $key => $field)
			$this->form_validation->set_rules($key, $field['label'], $field['rule'], $field['msg']);

		if ($this->form_validation->run() == FALSE) 
		{
			if($fgedit)
				$_POST = array_replace($_POST, $this->model->getDataByCd($cdfield));
			$this->load->template('form/'.$this->controller, $this->data);
		} 
		else 
		{
			$data = array();
			foreach($fields as  $key => $field){
				if($key != $this->cdfield && !empty($field['isField']))
					$data[$key] = $this->input->post($key);
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
				redirect($this->controller);
			} 
			else 
			{
				if($fgedit)
					$_POST = array_replace($_POST, $this->model->getDataByCd($cdfield));
				$this->load->template('form/'.$this->controller, $this->data);
			}
		}
	}	
}
?>