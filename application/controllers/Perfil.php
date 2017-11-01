<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Perfil extends Crud {
	
	var $controller 	= 'perfil';
	var $item_active 	= 'perfil';
	var $cdfield 		= 'cdperfil';
	var $str 			= 100009;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('perfil_model', 'perfil');
        $this->load->model('menu_model', 'menu');

		$this->model = $this->perfil;
				
		$this->data['list_menu'] 	= $this->treelist($this->menu, array('orderby' => 'cdpai, cdordem ASC'));
		
		$this->fields = array(
			'cdperfil'     	=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true),
			'nmperfil'     	=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 	'msg' => array(), 'isField' => true),
			'fgpermissao'   => array('label'=> $this->lang->str(100057), 	'rule' => 'trim|xss_clean', 			'msg' => array(), 'isField' => true)
		);
	}
	
	public function editar($cdfield){
		$permissao = $this->model->getChildData('menu_perfil', $cdfield);
		foreach($permissao as $k => $v)
			$_POST['fgpermissao_'.$v['cdmenu']] = 1;

		parent::editar($cdfield);
	}
	
	public function visualizar($cdfield){
		$permissao = $this->model->getChildData('menu_perfil', $cdfield);
		foreach($permissao as $k => $v)
			$_POST['fgpermissao_'.$v['cdmenu']] = 1;
			
		$this->data['fgmenu'] = $this->childlist('menu_perfil', $cdfield);
		parent::visualizar($cdfield);
	}
}
?>