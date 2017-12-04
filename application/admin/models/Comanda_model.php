<?php
require_once("Crud_model.php");

class Comanda_model extends Crud_Model {
	
	var $table 		= "comanda";
	var $cdfield 	= "cdcomanda";
	
	public function getChildData($table, $cdfield = -1) {
		$SQL = '';
		switch($table){
			case 'pedido':
				$SQL = '
					SELECT 
						*, 
						DATE_FORMAT(P.dtpedido, "%d/%m/%Y %H:%i") AS dtpedido_formatada, 
						DATE_FORMAT(C.dtentrada, "%d/%m/%Y %H:%i") AS dtentrada_formatada, 
						DATE_FORMAT(C.dtsaida, "%d/%m/%Y %H:%i") AS dtsaida_formatada
					FROM 
						comanda C 
						INNER JOIN pedido P 	ON (C.cdcomanda = P.cdcomanda)
						INNER JOIN produto PD 	ON (P.cdproduto = PD.cdproduto)
					WHERE 
						C.cdcomanda = '.$cdfield;
				break;
		}
		
		if(!empty($SQL))
			return $this->getChildTableData($SQL);
		
		return false;
	}
	
	public function getChildGrid($fields) {
		$label = array(
			'dtpedido' 				=> $this->lang->str(100124),
			'nmproduto' 			=> $this->lang->str(100005),
			'nrquantidade' 			=> $this->lang->str(100125),
			'vlproduto'			 	=> $this->lang->str(100092)
			);
					
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		foreach ($fields as $values)
		{
			$itens[$values['cdpedido']] = array(
					'dtpedido' 			=> $values['dtpedido_formatada'],
					'nmproduto' 		=> $values['nmproduto'],
					'nrquantidade' 		=> $values['nrquantidade'],
					'vlproduto' 		=> format_money($values['vlproduto'])
					);
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
	
	public function disable($cdfield){
        $this->db->set('dtsaida', 'NOW()', FALSE);
		return parent::disable($cdfield);
	}
	
	public function getListData($dados = array()) {
		# Limite:
		$limit = '';
		if (array_key_exists('limit',$dados) && !empty($dados['limit']) && array_key_exists('page',$dados)) 
            $limit = ' LIMIT '.($dados['limit'] * $dados['page']).','.$dados['limit'].' ';
        elseif (array_key_exists('limit',$dados) && !empty($dados['limit']) && array_key_exists('start',$dados))
            $limit = ' LIMIT '.$dados['limit'].','.$dados['start'].' ';
        elseif (array_key_exists('limit',$dados) && !empty($dados['limit']))
            $limit = ' LIMIT '.$dados['limit'];
        
		# Ordenação:
		$orderby = "";
        if (isset($dados['orderby']) && !empty($dados['orderby']))
			$orderby = ' ORDER BY '.$dados['orderby'];
		
		# Tabelas:
		$from = ' 	comanda C
					INNER JOIN estabelecimento 	E ON (C.cdestabelecimento = E.cdestabelecimento) 
					INNER JOIN usuario 			U ON (C.cdusuario = U.cdusuario) 
				';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			if($value != ''){
				switch(strtolower($field))
				{
					case 'cdcomanda':			$where.= " AND C.{$field} = ".intval($value)." \n"; break;
					case 'cdusuario':			$where.= " AND C.{$field} = ".intval($value)." \n"; break;
					case 'cdestabelecimento':	$where.= " AND C.{$field} = ".intval($value)." \n"; break;
					case 'fgstatus':			$where.= " AND C.{$field} = '{$value}' \n"; break;
				}
			}
		}
		
		# Campos:
		$select = ' C.*, 
					(SELECT SUM((SELECT vlproduto FROM produto WHERE cdproduto = P.cdproduto) * nrquantidade) FROM pedido P WHERE P.cdcomanda = C.cdcomanda) AS vltotal,
					DATE_FORMAT(C.dtentrada, "%d/%m/%Y %H:%i") AS dtentrada_formatada, 
					DATE_FORMAT(C.dtsaida, "%d/%m/%Y %H:%i") AS dtsaida_formatada, 
					E.nmfantasia AS nmestabelecimento, 
					U.nmusuario';
		if (array_key_exists('totalRecords',$dados)){
			$select = ' COUNT(1) as totalRecords';
            $limit = $orderby = '';
        }
		elseif (array_key_exists('select',$dados)) 
			$select = ' '.$dados['select'].' ';
		
		$SQL = "
			SELECT * FROM (
				SELECT 
					$select
				FROM
					$from 
				WHERE 1  
					$where 
			) A
            $orderby 
                $limit                     
        ";
		
		$fields = $this->db->query($SQL)->result_array();

		$label = array(
			'fgstatus' 				=> $this->lang->str(100037),
			'cdcomanda' 			=> $this->lang->str(100027),
			'nmestabelecimento' 	=> $this->lang->str(100002),
			'nmusuario'			 	=> $this->lang->str(100004),
			'dtentrada'			 	=> $this->lang->str(100122),
			'dtsaida'			 	=> $this->lang->str(100123),
			'vltotal'			 	=> $this->lang->str(100143)
			);
		
		if(!empty($this->session->userdata('logged_in')['cdestabelecimento']))
			unset($label['nmestabelecimento']);
		
		if(empty($dados['grid']))			
			return array('status' => true, 'data' => $fields);
	
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdcomanda']] = $values['nmusuario'];
			else
			{
				$itens[$values['cdcomanda']] = array(
						'fgstatus' 			=> $values['fgstatus'],
						'cdcomanda' 		=> $values['cdcomanda'],
						'nmestabelecimento' => $values['nmestabelecimento'],
						'nmusuario' 		=> $values['nmusuario'],
						'dtentrada' 		=> $values['dtentrada_formatada'],
						'dtsaida' 			=> $values['dtsaida_formatada'],
						'vltotal' 			=> format_money($values['vltotal'])
						);
				
				if(!empty($this->session->userdata('logged_in')['cdestabelecimento']))
					unset($itens[$values['cdcomanda']]['nmestabelecimento']);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}