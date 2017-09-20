<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Auth_Controller {
	
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->multi_menu->set_items($this->menu->getMenu());
		$this->data['wintitle'] = $this->lang->str(100000)." | ".$this->lang->str(100001);
		$this->data['nmusuario'] = $this->session->userdata('logged_in')['nmusuario'];
		$this->data['item_active'] = 'home';
	}
	
	public function index()
	{
		$this->load->template('home', $this->data);
	}
	
	public function grid($model)
	{
		$arr = $model->getListData($_REQUEST);
		$this->grid->set_label_column($arr['data']['label']);
		if($arr['status'])
			$this->grid->set_query_itens($arr['data']['item']);
		
		$dados = array('status' => true, 'data' => $this->grid->render());
		
		echo json_encode($dados);
	}
	
	public function lista($model, $params = array())
	{
		$item = array();
		
		$options = array('list' => true);
		if(!empty($params))
			$options =  array_replace($options, $params);

		$result = $model->getListData($options);
		if($result['status'])
			$item = array_replace(array('0' => ''), $result['data']['item']);

		return $item;
	}
	
	public function combolist($mod){
		$this->load->model($mod.'_model', $mod);
		$dados = $this->lista($this->{$mod}, $_REQUEST);
		if(!empty($dados))
			$result = array('status' => true, 'records' => $dados);
		else
			$result = array('status' => false);
		
		echo json_encode($result);
	}
	
	public function childData($table, $model, $cdfield){
		$dados = $model->getChildData($table, $cdfield);
		if(!empty($dados))
			$result = array('status' => true, 'records' => $dados);
		else
			$result = array('status' => false);
		echo json_encode($result);
	}
}
?>