<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Auth_Controller {
	
	var $data 			= array();
	var $controller 	= 'home';
	var $item_active 	= 'home';
	var $str 			= 100001;
	var $model		 	= '';
	
	public function __construct()
	{
		parent::__construct();
		
		$menu = $this->menu->getMenu();
		$this->multi_menu->set_items($menu);
		
		
		$items = array_column($menu, 'slug');
		foreach($items as $k => $value){
			if(strpos($value, "/"))
				$items[$k] = explode('/', $value)[1];
		}
		if(!in_array($this->item_active, $items))
			$this->item_active = 'home';		
		
		$this->data['wintitle'] 			= $this->lang->str(100000)." | ".$this->lang->str($this->str);
		$this->data['session_cdusuario'] 	= $this->session->userdata('logged_in')['cdusuario'];
		$this->data['session_nmusuario']	= $this->session->userdata('logged_in')['nmusuario'];
		$this->data['session_txfoto'] 		= $this->session->userdata('logged_in')['txfoto'];
		$this->data['session_nmtipo'] 		= $this->session->userdata('logged_in')['nmtipo'];
		$this->data['item_active'] 			= $this->item_active;
		$this->data['controller'] 			= $this->controller;
		$this->data['welcome'] 				= $this->lang->replaceStringTags(100102, array(1 => array('text' => $this->lang->str(100094))));
			
		$this->breadcrumbs->reset();
		$bread = $this->menu->getBreadcrumbs('home');
		foreach($bread as $k => $v)
			$this->breadcrumbs->push($v['cdmenu'], $this->lang->menu($v['cdtermo']), $v['nmslug'], $v['idiconmenu']);
			
		$bread = $this->menu->getBreadcrumbs($this->data['item_active']);
		foreach($bread as $k => $v)
			$this->breadcrumbs->push($v['cdmenu'], $this->lang->menu($v['cdtermo']), $v['nmslug'], $v['idiconmenu']);
	}
	
	public function index()
	{
		$this->load->template('home', $this->data);
	}
	
	public function grid()
	{
		$arr = $this->model->getListData($_REQUEST);
		$this->grid->set_label_column($arr['data']['label']);
		if($arr['status'])
			$this->grid->set_query_itens($arr['data']['item']);
		
		$dados = array('status' => true, 'data' => $this->grid->render());
		
		header('Content-Type: application/json'); 
		
		echo json_encode($dados);
	}
	
	public function combolist($model, $params = array())
	{
		$item = array();
		
		$options = array('list' => true);
		if(!empty($params))
			$options =  array_replace($options, $params);

		$result = $model->getListData($options);
		if($result['status']){
			if(empty($options['denyEmpty']))
				array_unshift($result['data']['item'], '');
			$item = $result['data']['item'];
		}
		
		return $item;
	}
	
	public function treelist($model, $params = array())
	{
		$item = array();
		
		$options = array('denyEmpty' => true, 'noparent' => true);
		if(!empty($params))
			$options =  array_replace($options, $params);

		$result = $model->getListData($options);
		if($result['status']){
			if(empty($options['denyEmpty']))
				array_unshift($result['data']['item'], '');
			$item = $result['data']['item'];
		}
		
		return $item;
	}
	
	public function combolist2($mod){
		$this->load->model($mod.'_model', $mod);
		$dados = $this->combolist($this->{$mod}, $_REQUEST);
		if(!empty($dados))
			$result = array('status' => true, 'records' => $dados);
		else
			$result = array('status' => false);
		
		echo json_encode($result);
	}
	
	public function childData($table, $cdfield){
		$dados = $this->model->getChildData($table, $cdfield);
		if(!empty($dados))
			$result = array('status' => true, 'records' => $dados);
		else
			$result = array('status' => false);
		echo json_encode($result);
	}
}
?>