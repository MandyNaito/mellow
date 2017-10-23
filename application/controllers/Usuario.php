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

		$this->model = $this->usuario;		
	
		$this->data['list_perfil'] 				= $this->lista($this->perfil);
		
		$this->fields = array(
			'txfoto'			=> array('label'=> $this->lang->str(100087), 	'rule' => 'trim|xss_clean', 											'msg' => array(), 'isField' => true, 	'isFile' => true),
			'idlogin'			=> array('label'=> $this->lang->str(100013), 	'rule' => 'trim|required|max_length[100]|xss_clean', 					'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idsenha'			=> array('label'=> $this->lang->str(100032), 	'rule' => 'trim|required|min_length[6]|max_length[100]|xss_clean', 		'msg' => array(), 'isField' => true, 	'isFile' => false),
			'idsenhaconfirm'	=> array('label'=> $this->lang->str(100067), 	'rule' => 'trim|required|matches[idsenha]|xss_clean', 					'msg' => array(), 'isField' => false, 	'isFile' => false),
			'nmusuario'     	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 									'msg' => array(), 'isField' => true, 	'isFile' => false),
			'cdperfil'   		=> array('label'=> $this->lang->str(100009), 	'rule' => 'trim|required|greater_than[0]', 								'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true, 'isFile' => false)
		);
	}
}
?>