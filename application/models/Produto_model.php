<?php
require_once("Crud_model.php");

class Produto_model extends Crud_Model {
	
	var $table 		= "produto";
	var $cdfield 	= "cdproduto";
	
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
		$from = ' 	produto P 
					INNER JOIN tipoproduto TP ON (P.cdtipoproduto = TP.cdtipoproduto)
				';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdproduto':		$where.= " AND P.{$field} = ".intval($value)." \n"; break;
				case 'cdtipoproduto':	$where.= " AND P.{$field} = ".intval($value)." \n"; break;
				case 'cdalergenio':		$where.= " AND P.{$field} = ".intval($value)." \n"; break;
				case 'nmproduto':		$where.= " AND P.{$field} LIKE '%{$value}%' \n"; break;
				case 'dsproduto':		$where.= " AND P.{$field} LIKE '%{$value}%' \n"; break;
				case 'vlproduto':		$where.= " AND P.{$field} = '{$value}' \n"; break;
				case 'fgstatus':		$where.= " AND P.{$field} = '{$value}' \n"; break;
				case 'buscarapida':	 	$where.= " AND (P.cdproduto = ".intval($value)." OR P.nmproduto LIKE '%{$value}%')\n"; break;
			}
		}
		
		# Campos:
		$select = ' P.*, TP.nmtipoproduto ';
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
			'cdproduto' 		=> $this->lang->str(100027),
			'cdtipoproduto' 	=> $this->lang->str(100077),
			'nmproduto' 		=> $this->lang->str(100066),
			'vlproduto' 		=> $this->lang->str(100092),
			'fgstatus' 			=> $this->lang->str(100037)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			$itens[$values['cdproduto']] = array(
						'cdproduto' 		=> $values['cdproduto'],
						'cdtipoproduto' 	=> $values['nmtipoproduto'],
						'nmproduto' 		=> $values['nmproduto'],
						'vlproduto' 		=> $values['vlproduto'],
						'fgstatus' 			=> $values['fgstatus']
						);
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}