<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Home.php");

class Usuario extends Home {
	
	var $data 			= array();
	var $fields 		= array();
	var $controller 	= 'usuario';
	var $item_active 	= 'usuario';
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('tipoestabelecimento_model', 'tipoestabelecimento');
		
		$this->grid->show_action_column = true;
		$this->grid->url_action_view = $this->controller.'/visualizar/';
		$this->grid->url_action_edit = $this->controller.'/editar/';
		
		$this->data['wintitle'] = $this->lang->str(100000)." | ".$this->lang->str(100011);
		$this->data['list_tipoestabelecimento'] 	= $this->lista($this->tipoestabelecimento);
		
		$this->fields = array(
			'idlogin'			=> array('label'=> $this->lang->str(100047), 	'rule' => 'trim|required|max_length[100]|xss_clean', 					'msg' => array()),
			'idsenha'			=> array('label'=> $this->lang->str(100034), 	'rule' => 'trim|required|min_length[6]|max_length[100]|xss_clean', 		'msg' => array()),
			'idsenhaconfirm'	=> array('label'=> $this->lang->str(100035), 	'rule' => 'trim|required|matches[idsenha]|xss_clean', 					'msg' => array()),
			'nmusuario'     	=> array('label'=> $this->lang->str(100019), 	'rule' => 'trim|required|xss_clean', 									'msg' => array())
		);
	}
	
	public function index() {
		$this->data['title'] 	= $this->lang->str(100011);
		$this->data['urlnovo'] 	= site_url('usuario/novo');
				
		$this->load->template('list/usuario', $this->data);
	}
	
	public function grid($model = ''){
		parent::grid($this->usuario);
	}
	
	public function childData($table, $model = '', $cdfield = -1){
		parent::childData($table, $this->usuario, $this->input->post('cdusuario'));
	}
	
	public function novo(){
		$this->data['target'] 		= "inserir";
		$this->data['title'] 		= $this->lang->replaceStringTags(100017, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['cdusuario'] 	= -1;
		
		$this->load->template('form/usuario', $this->data);
	}
	
	public function inserir(){
		$this->data['target'] 		= "inserir";
		$this->data['title'] 		= $this->lang->replaceStringTags(100017, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['cdusuario'] 	= -1;
		
		$this->salvar();
	}
	
	public function editar($cdusuario){
		$this->data['target'] = $cdusuario;
		$this->data['title'] = $this->lang->replaceStringTags(100088, array(1 => array('text' => $this->lang->str(100086))));

		$this->salvar($cdusuario);
	}
	
	public function visualizar($cdusuario){
		$this->data['target'] = $cdusuario;
		$this->data['title'] = $this->lang->replaceStringTags(100087, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['view'] = true;
		
		$_POST = array_merge($_POST, $this->usuario->getDataByCd($cdusuario));
		
		$this->load->template('view/usuario', $this->data);
	}
	
	public function deletar($cdusuario){
		$return = $this->usuario->delete($cdusuario);

		$dados = array('status' => true, 'msg' => $this->lang->str(100091));
		
		echo json_encode($dados);
	}
	
	public function salvar($cdusuario = ''){	
		$fgedit = (!empty($cdusuario) || $cdusuario == -1);
		
		$fields = $this->fields;
		
		$this->form_validation->set_error_delimiters('<div class="error-label">', '</div>');
		foreach($fields as $key => $field)
			$this->form_validation->set_rules($key, $field['label'], $field['rule'], $field['msg']);

		if ($this->form_validation->run() == FALSE) 
		{
			if($fgedit)
				$_POST = array_replace($_POST, $this->usuario->getDataByCd($cdusuario));
			$this->load->template('form/usuario', $this->data);
		} 
		else 
		{
			$data = array();
			foreach($fields as  $key => $field)
				if($key != 'cdusuario')
					$data[$key] = $this->input->post($key);

			$str = '';
			if($fgedit){
				$this->usuario->update($cdusuario, $data);
				$str = 100015;
			}
			else{
				$data['dtcadastro'] = date("Y-m-d");
				$cdusuario = $this->usuario->insert($data);
				$str = 100014;
			}

			if(!empty($cdusuario) && $cdusuario != -1){				
				$this->session->set_flashdata('success_message', $this->lang->str($str));
				redirect('usuario');
			} 
			else 
			{
				if($fgedit)
					$_POST = array_replace($_POST, $this->usuario->getDataByCd($cdusuario));
				$this->load->template('form/usuario', $this->data);
			}
		}
	}
}
?>