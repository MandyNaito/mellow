<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function consulta_cep()
	{
		$cep = trim($_POST['nrcep']);
 
		$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

		$dados['sucesso'] = (string) $reg->resultado;
		$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
		$dados['bairro']  = (string) $reg->bairro;
		$dados['cidade']  = (string) $reg->cidade;
		$dados['estado']  = (string) $reg->uf;

		echo json_encode($dados);
		 
	}
}
?>