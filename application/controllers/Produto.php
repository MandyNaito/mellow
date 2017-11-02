<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Crud.php");

class Produto extends Crud {
	
	var $controller 	= 'produto';
	var $item_active 	= 'produto';
	var $cdfield 		= 'cdproduto';
	var $str 			= 100005;
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('produto_model', 	'produto');
        $this->load->model('tipoproduto_model', 'tipoproduto');
        $this->load->model('alergenio_model', 	'alergenio');
		
		$this->data['list_tipoproduto'] = $this->lista($this->tipoproduto);
		$this->data['list_alergenio'] 	= $this->lista($this->alergenio, array('denyEmpty' => true, 'orderby' => 'nmalergenio ASC'));

		$this->model = $this->produto;
	
		$this->fields = array(
			'cdproduto'     			=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdtipoproduto'   			=> array('label'=> $this->lang->str(100077), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
			'cdalergenio'   			=> array('label'=> $this->lang->str(100008), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'nmproduto'     			=> array('label'=> $this->lang->str(100066), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'vlproduto'     			=> array('label'=> $this->lang->str(100092), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'dsproduto'     			=> array('label'=> $this->lang->str(100080), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true),
			'fgalergenio'     			=> array('label'=> $this->lang->str(100091), 	'rule' => 'trim|xss_clean', 				'msg' => array(), 'isField' => true)
		);
	}
	
	public function editar($cdfield){
		$alergenio = $this->model->getChildData('produto_alergenio', $cdfield);
		foreach($alergenio as $k => $v)
			$_POST['cdalergenio'][] = $v['cdalergenio'];

		parent::editar($cdfield);
	}
	
	public function visualizar($cdfield){
		$alergenio = $this->model->getChildData('produto_alergenio', $cdfield);
		foreach($alergenio as $k => $v)
			$_POST['cdalergenio'][] = $v['cdalergenio'];
			
		parent::visualizar($cdfield);
	}
	
	public function salvar($fields, $cdfield = ''){	
	
		/*if(!empty($this->input->post('fgalergenio'))){
			$fields['cdalergenio']['rule'] .= "|required";
		}*/
		
		return parent::salvar($fields, $cdfield);
	}
}	
?>