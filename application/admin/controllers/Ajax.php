<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Location');
	}
	
	public function consulta_cep($cep)
	{
		$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

		$status = $reg->resultado;
		
		$dados = array();
		if(!empty($status)){
			$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
			$dados['bairro']  = (string) $reg->bairro;
			$dados['cidade']  = (string) $reg->cidade;
			$dados['estado']  = (string) $reg->uf;
			
			$endereco = $dados['rua'].' - '.$dados['bairro'].', '.$dados['cidade'].' - '.$dados['estado'];
			$geometry = $this->location->reverseAddress($endereco);
			if($geometry['meta']['status'] == 200){
				$dados['latitude']  	= $geometry['response']['lat'];
				$dados['longitude']  	= $geometry['response']['lng'];
			}
		}

		echo json_encode(array('status' => $status, 'data' => $dados));
	}
	
	public function verifica_comanda()
	{
        $this->load->model('comanda_model', 'comanda');
		$comanda = $this->comanda->getListData(array('cdusuario'=> $this->session->userdata('logged_in')['cdusuario'], 'fgstatus' => 1))['data'];		
		if(!empty($comanda)){
			$this->output
				->set_content_type("application/json")
				->set_output(json_encode(array('status'=>true, 'redirect' => site_url('comanda/extrato') )));
		}
		else {
			$this->output
				->set_content_type("application/json")
				->set_output(json_encode(array('status'=>false)));
		}   
	}
}
?>