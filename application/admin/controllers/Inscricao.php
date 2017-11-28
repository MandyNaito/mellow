<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao extends CI_Controller {
	
	var $data 			= array();
	var $fields 		= array();
	var $controller 	= 'inscricao';
	var $cdfield 		= 'cdusuario';
	var $model 			= '';
	
	public function __construct(){
		parent::__construct();
		
		$this->multi_menu->set_items(array());
		
        $this->load->model('usuario_model', 'usuario');
		$this->model = $this->usuario;
		
		$this->data['wintitle'] 	= $this->lang->str(100097)." | ".$this->lang->str(100132);
		$this->data['title'] 		= $this->lang->str(100132);
		$this->data['controller'] 	= $this->controller;
		$this->data[$this->cdfield] = -1;
		
		$this->fields = array(
			'txfoto'			=> array('label'=> $this->lang->str(100087), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => true),
			'idlogin'			=> array('label'=> $this->lang->str(100093), 	'rule' => 'trim|required|max_length[100]|xss_clean', 					'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idsenha'			=> array('label'=> $this->lang->str(100032), 	'rule' => 'trim|required|min_length[6]|max_length[100]|xss_clean', 		'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idsenhaconfirm'	=> array('label'=> $this->lang->str(100067), 	'rule' => 'trim|required|matches[idsenha]|xss_clean', 					'msg' => array(), 'isField' => false, 	'isFile' => false),
			'nmusuario'     	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false),
			'cdperfil'   		=> array('label'=> $this->lang->str(100009), 	'rule' => 'trim|required|xss_clean|greater_than[0]', 					'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true, 'isFile' => false),
			'idcpf'				=> array('label'=> $this->lang->str(100107), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idrg'				=> array('label'=> $this->lang->str(100106), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'dtnascimento'		=> array('label'=> $this->lang->str(100105), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idtelefone'		=> array('label'=> $this->lang->str(100082), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idcelular'			=> array('label'=> $this->lang->str(100083), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false),
			'nmemail'			=> array('label'=> $this->lang->str(100084), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false)
		);
	}
	
	public function index() {
		$this->data['target'] 		= $this->controller.'/cadastrar';
		$this->load->view('cadastrar', $this->data);
	}
	
	public function cadastrar(){
		$this->data['target'] 		= $this->controller.'/cadastrar';
		$this->data['title'] 		= $this->lang->str(100132);
		$this->data[$this->cdfield] = -1;
		
		$this->salvar($this->fields);
	}
	
	public function salvar($fields){
		$this->form_validation->set_error_delimiters('<div ><label class="error">', '</label></div>');
		foreach($fields as $key => $field)
			$this->form_validation->set_rules($key, $field['label'], $field['rule'], $field['msg']);

		if ($this->form_validation->run() == FALSE) 
			$this->load->view('cadastrar', $this->data);
		else 
		{
			$data = array();
			foreach($fields as  $key => $field){
				if($key != $this->cdfield && !empty($field['isField']))
					$data[$key] = (empty($field['isFile'])) ? $this->input->post($key) : $this->uploadImage($key);
			}
			
			$cdfield = $this->model->insert($data);
			if(!empty($cdfield) && $cdfield != -1){
				$this->session->set_flashdata('success_message', $this->lang->str(100071));
				redirect('login');
			} 
			else 
				$this->load->view('cadastrar', $this->data);
		}
	}
	
	function uploadImage($id){
		$config['upload_path']	 	= './upload/usuario/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_filename'] 	= '100';
		$config['encrypt_name'] 	= true;
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload($id))
			return  'upload/usuario/'.$this->upload->data()['file_name'];
		return $this->input->post('hidden_'.$id);
	}
}
?>