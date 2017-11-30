<?php
require_once("Crud_model.php");

class Pedido_model extends Crud_Model {
	
	var $table 		= "pedido";
	var $cdfield 	= "cdpedido";
		
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
		$from = ' 	pedido P
					INNER JOIN comanda C  	ON (C.cdcomanda = P.cdcomanda)
					INNER JOIN produto PD 	ON (P.cdproduto = PD.cdproduto)
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
					case 'cdpedido':			$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'cdestabelecimento':	$where.= " AND C.{$field} = ".intval($value)." \n"; break;
					case 'fgstatus':			$where.= " AND C.{$field} = '{$value}' \n"; break;
				}
			}
		}

		# Campos:
		$select = ' P.*,  PD.vlproduto, PD.nmproduto, C.cdestabelecimento, C.cdusuario';
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
			'dtpedido' 				=> $this->lang->str(100124),
			'nmproduto' 			=> $this->lang->str(100005),
			'nrquantidade' 			=> $this->lang->str(100125),
			'vlproduto'			 	=> $this->lang->str(100092)
			);
		
		if(empty($dados['grid']))			
			return array('status' => true, 'data' => $fields);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			$itens[$values['cdpedido']] = array(
				'dtpedido' 			=> $values['dtpedido'],
				'nmproduto' 		=> $values['nmproduto'],
				'nrquantidade' 		=> $values['nrquantidade'],
				'vlproduto' 		=> $values['vlproduto']
				);
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}