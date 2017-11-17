<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Usuario extends Crud {
	
	var $controller 	= 'usuario';
	var $item_active 	= 'usuario';
	var $cdfield 		= 'cdusuario';
	var $str 			= 100012;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('perfil_model', 'perfil');
        $this->load->model('estabelecimento_model', 'estabelecimento');

		$this->model = $this->usuario;		
	
		$this->data['list_perfil'] 					= $this->combolist($this->perfil);
		$this->data['list_estabelecimento'] 		= $this->combolist($this->estabelecimento);
		
		$this->fields = array(
			'txfoto'			=> array('label'=> $this->lang->str(100087), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => true),
			'idlogin'			=> array('label'=> $this->lang->str(100093), 	'rule' => 'trim|required|max_length[100]|xss_clean', 					'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idsenha'			=> array('label'=> $this->lang->str(100032), 	'rule' => 'trim|required|min_length[6]|max_length[100]|xss_clean', 		'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idsenhaconfirm'	=> array('label'=> $this->lang->str(100067), 	'rule' => 'trim|required|matches[idsenha]|xss_clean', 					'msg' => array(), 'isField' => false, 	'isFile' => false),
			'nmusuario'     	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false),
			'cdperfil'   		=> array('label'=> $this->lang->str(100009), 	'rule' => 'trim|required|xss_clean|greater_than[0]', 					'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true, 'isFile' => false),
			'cdestabelecimento'	=> array('label'=> $this->lang->str(100002), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idcpf'				=> array('label'=> $this->lang->str(100107), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idrg'				=> array('label'=> $this->lang->str(100106), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'dtnascimento'		=> array('label'=> $this->lang->str(100105), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idtelefone'		=> array('label'=> $this->lang->str(100082), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idcelular'			=> array('label'=> $this->lang->str(100083), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false),
			'nmemail'			=> array('label'=> $this->lang->str(100084), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => false)
		);
	}
	
	public function conta($cdfield){		
		$this->data['cdfield'] 		= $cdfield;
		$this->data['target'] 		= $this->controller.'/conta/'.$cdfield;
		$this->data['edit_target'] 	= $this->controller.'/alterar/'.$cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100072, array(1 => array('text' => strtolower($this->lang->str($this->str)))));
		$this->data['view'] 		= true;
		
		$this->redir = 'home';
		
		$_POST = array_merge($_POST, $this->model->getDataByCd($cdfield));
		
		$this->load->template($this->controller.'/view', $this->data);
	}
	
	public function alterar($cdfield){
		$this->data['target'] 		= $this->controller.'/alterar/'.$cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100069, array(1 => array('text' => strtolower($this->lang->str($this->str)))));
		$this->data['alterar'] 		= true;
		$this->redir = 'home';

		$this->salvar($this->fields, $cdfield);
	}
	
	
}
?>