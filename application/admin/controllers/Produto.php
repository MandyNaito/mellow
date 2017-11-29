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
		
        $this->load->model('produto_model', 		'produto');
        $this->load->model('tipoproduto_model', 	'tipoproduto');
        $this->load->model('alergenio_model', 		'alergenio');
        $this->load->model('estabelecimento_model', 'estabelecimento');
		
		$this->data['list_estabelecimento'] = $this->combolist($this->estabelecimento);		
		$this->data['list_tipoproduto'] 	= $this->combolist($this->tipoproduto);
		$this->data['list_alergenio'] 		= $this->combolist($this->alergenio, array('denyEmpty' => true, 'orderby' => 'nmalergenio ASC'));
		
		$this->filter['cdestabelecimento'] 	= $this->session->userdata('logged_in')['cdestabelecimento'];

		$this->model = $this->produto;
	
		$this->fields = array(
			'cdproduto'     			=> array('label'=> $this->lang->str(100057), 	'rule' => 'trim|required|xss_clean', 		'msg' => array(), 'isField' => true),
			'cdestabelecimento'			=> array('label'=> $this->lang->str(100002), 	'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100075).'%s'.$this->lang->str(100076)), 'isField' => true),
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
			
		$this->data['cdfield'] = $cdfield;

		parent::editar($cdfield);
	}
	
	public function visualizar($cdfield){
		$alergenio = $this->model->getChildData('produto_alergenio', $cdfield);
		foreach($alergenio as $k => $v)
			$_POST['cdalergenio'][] = $v['cdalergenio'];
			
		$this->data['cdfield'] = $cdfield;
			
		parent::visualizar($cdfield);
	}
	
	public function detalhe($cdfield){
		$alergenio = $this->model->getChildData('produto_alergenio', $cdfield);

		$this->data['alergenios'] 	= $alergenio;
		$this->data['cdfield'] 		= $cdfield;
		$this->data['title'] 		= $this->lang->replaceStringTags(100072, array(1 => array('text' => mb_strtolower($this->lang->str($this->str)))));
		$this->data['view'] 		= true;
		
		$_POST = array_merge($_POST, $this->model->getDataByCd($cdfield));
		
		$this->load->template($this->controller.'/detalhe', $this->data);
	}
	
	public function cardapio($cdestabelecimento = ''){
		$this->item_active = 'produto/cardapio';
		$this->loadBreadcrumbs();
		
		$this->data['item_active'] 	= $this->item_active;
		$this->data['title'] 		= $this->lang->str(100129);
		
		$cdestabelecimento = !empty($cdestabelecimento) ? $cdestabelecimento : $this->session->userdata('logged_in')['cdestabelecimento'];
		
		if(!empty($cdestabelecimento)){		
			$estabelecimento = $this->estabelecimento->getDataByCd($cdestabelecimento);
			
			$this->breadcrumbs->push('current_page', $estabelecimento['nmfantasia'], '');
		
			$this->data['title']  = $this->lang->str(100129).' | '.$estabelecimento['nmfantasia'];
			$this->data['target'] = $this->controller.'/detalhe';
		
			$tipoproduto = $this->tipoproduto->getListData(array('cdestabelecimento' => $cdestabelecimento, 'fgstatus' => 1));	
			if($tipoproduto['status']){
				foreach($tipoproduto['data'] as $key => $tipo){
					$produto = $this->produto->getListData(array('cdestabelecimento' => $cdestabelecimento, 'cdtipoproduto' => $tipo['cdtipoproduto'], 'fgstatus' => 1));	
					if($produto['status'])
						$tipoproduto['data'][$key]['produto'] = $produto['data'];
					else
						unset($tipoproduto['data'][$key]);				
				}
			}
			
			if(!empty($tipoproduto['data'])){
				$this->data['data_tipoproduto'] = $tipoproduto['data'];	
				$this->load->template($this->controller.'/cardapio', $this->data);
			}
			else
			{
				$this->session->set_flashdata('error_message', $this->lang->str(100130));
				redirect('produto/cardapio');
			}
			
		}
		else
		{
			$estabelecimento = $this->estabelecimento->getListData(array_replace($this->filter, array('fgstatus' => 1)));	
			if($estabelecimento['status'])
				$this->data['data_estabelecimento'] = $estabelecimento['data'];	
			$this->data['target'] = $this->controller.'/cardapio';
		
			$this->load->template('estabelecimento/explorar', $this->data);
		}
	}
}	
?>