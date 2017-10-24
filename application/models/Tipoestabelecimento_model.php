<?php
require_once("Crud_model.php");

class Tipoestabelecimento_model extends Crud_Model {
	
	var $table 		= "tipoestabelecimento";
	var $cdfield 	= "cdtipoestabelecimento";

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
        if (isset($dados['ordeby']) && !empty($dados['ordeby']))
			$orderby = ' ORDER BY '.$dados['ordeby'];
		
		# Tabelas:
		$from = ' tipoestabelecimento TE ';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdtipoestabelecimento':		$where.= " AND TE.{$field} = ".intval($value)." \n"; break;
				case 'nmtipoestabelecimento':		$where.= " AND TE.{$field} = '{$value}' \n"; break;
				case 'dstipoestabelecimento':		$where.= " AND TE.{$field} LIKE '%{$value}%' \n"; break;
				case 'buscarapida':					$where.= " AND (TE.cdtipoestabelecimento = ".intval($value)." OR TE.nmtipoestabelecimento LIKE '%{$value}%' \n"; break;
			}
		}
		
		# Campos:
		$select = '*';
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
			'cdtipoestabelecimento' 	=> $this->lang->str(100027),
			'nmtipoestabelecimento' 	=> $this->lang->str(100066),
			'fgstatus' 					=> $this->lang->str(100037)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdtipoestabelecimento']] = $values['nmtipoestabelecimento'];
			else
			{
				$itens[$values['cdtipoestabelecimento']] = array(
					'cdtipoestabelecimento' 	=> $values['cdtipoestabelecimento'],						
					'nmtipoestabelecimento' 	=> $values['nmtipoestabelecimento'],
					'fgstatus' 					=> $values['fgstatus']
				);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}