<?php
require_once("Crud_model.php");

class Alergenio_model extends Crud_Model {
	
	var $table 		= "alergenio";
	var $cdfield 	= "cdalergenio";

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
		$from = ' alergenio A ';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdalergenio':		$where.= " AND A.{$field} = ".intval($value)." \n"; break;
				case 'nmalergenio':		$where.= " AND A.{$field} = '{$value}' \n"; break;
				case 'buscarapida':		$where.= " AND (A.cdalergenio = ".intval($value)." OR A.nmalergenio LIKE '%{$value}%' \n"; break;
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
			'cdalergenio' 	=> $this->lang->str(100027),
			'nmalergenio' 	=> $this->lang->str(100066),
			'fgstatus' 		=> $this->lang->str(100037)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdalergenio']] = $values['nmalergenio'];
			else
			{
				$itens[$values['cdalergenio']] = array(
					'cdalergenio' 	=> $values['cdalergenio'],						
					'nmalergenio' 	=> $values['nmalergenio'],
					'fgstatus' 		=> $values['fgstatus']
				);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}