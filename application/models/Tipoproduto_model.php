<?php
require_once("Crud_model.php");

class Tipoproduto_model extends Crud_Model {
	
	var $table 		= "tipoproduto";
	var $cdfield 	= "cdtipoproduto";

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
		$from = ' tipoproduto TP ';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdtipoproduto':		$where.= " AND TP.{$field} = ".intval($value)." \n"; break;
				case 'nmtipoproduto':		$where.= " AND TP.{$field} = '{$value}' \n"; break;
				case 'dstipoproduto':		$where.= " AND TP.{$field} LIKE '%{$value}%' \n"; break;
				case 'buscarapida':			$where.= " AND (TP.cdtipoproduto = ".intval($value)." OR TP.nmtipoproduto LIKE '%{$value}%' \n"; break;
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
			'cdtipoproduto' 	=> $this->lang->str(100027),
			'nmtipoproduto' 	=> $this->lang->str(100066),
			'fgstatus' 			=> $this->lang->str(100037)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdtipoproduto']] = $values['nmtipoproduto'];
			else
			{
				$itens[$values['cdtipoproduto']] = array(
					'cdtipoproduto' 	=> $values['cdtipoproduto'],						
					'nmtipoproduto' 	=> $values['nmtipoproduto'],
					'fgstatus' 			=> $values['fgstatus']
				);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}