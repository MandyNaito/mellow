<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Home.php");

class Usuario2S extends Home {
	
	var $data 	= array();
	var $fields = array();
	var $controller = 'usuario';
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('usuario_model', 'usuario');
		
		$this->data['wintitle'] 	= $this->lang->str(100000)." | ".$this->lang->str(1000);
		$this->data['item_active'] 	= '';
		$this->data['controller'] 	= $this->controller;
		
		$this->fields = array(	
			'idlogin'			=> array('label'=> $this->lang->str(100047), 	'rule' => 'trim|required|max_length[100]|xss_clean', 					'msg' => array()),
			'idsenha'			=> array('label'=> $this->lang->str(100034), 	'rule' => 'trim|required|min_length[6]|max_length[100]|xss_clean', 		'msg' => array()),
			'idsenhaconfirm'	=> array('label'=> $this->lang->str(100035), 	'rule' => 'trim|required|matches[idsenha]|xss_clean', 					'msg' => array()),
			'nmusuario'     	=> array('label'=> $this->lang->str(100019), 	'rule' => 'trim|required|xss_clean', 									'msg' => array())
		);
	}
	
	public function index() {
		
		$cdusuario = $this->session->userdata('logged_in')['cdusuario'];
		
		$this->data['target'] 	= "usuario/editar/".$cdusuario;
		$this->data['title'] 	= $this->lang->replaceStringTags(100088, array(1 => array('text' => $this->lang->str(100086))));
		
		$_POST = array_replace($_POST, $this->usuario->getDataByCd($cdusuario));
		$this->load->template('form/usuario', $this->data);
	}
	
	public function editar($cdusuario){
		$this->data['target'] = $cdusuario;
		$this->data['title'] = $this->lang->replaceStringTags(100088, array(1 => array('text' => $this->lang->str(100086))));

		$this->salvar($cdusuario);
	}
	
	public function salvar($cdusuario){	
		$fields = $this->fields;

		$this->form_validation->set_error_delimiters('<div class="error-label">', '</div>');
		foreach($fields as $key => $field)
			$this->form_validation->set_rules($key, $field['label'], $field['rule'], $field['msg']);

		if ($this->form_validation->run() == FALSE) 
		{
			$_POST = array_replace($_POST, $this->usuario->getDataByCd($cdusuario));
			$this->load->template('form/usuario', $this->data);
		} 
		else 
		{
			$data = array();
			foreach($fields as  $key => $field)
				if(!in_array($key, array('cdusuario', 'idsenhaconfirm')))
					$data[$key] = ($key == 'idsenha') ? md5($this->input->post($key)) : $this->input->post($key);

			$this->usuario->update($cdusuario, $data);	
			if(!empty($cdusuario) && $cdusuario != -1){
				$session_data = array
				(
					'cdusuario' => $this->input->post('cdusuario'),
					'idlogin' 	=> $this->input->post('idlogin'),
					'nmusuario' => $this->input->post('nmusuario')
				);
				$this->session->set_userdata('logged_in', $session_data);
				
				$this->session->set_flashdata('success_message', $this->lang->str(100015));
				redirect('home');
			} 
			else 
			{
				$_POST = array_replace($_POST, $this->usuario->getDataByCd($cdusuario));
				$this->load->template('form/usuario', $this->data);
			}
		}
	}
}
?>