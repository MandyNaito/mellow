<?php
require_once("Crud_model.php");

class Estabelecimento_model extends Crud_Model {
	
	var $table 		= "estabelecimento";
	var $cdfield 	= "cdestabelecimento";
	
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
		$from = ' 	estabelecimento E 
					INNER JOIN tipoestabelecimento TE ON (E.cdtipoestabelecimento = TE.cdtipoestabelecimento)
				';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdestabelecimento':		$where.= " AND E.{$field} = ".intval($value)." \n"; break;
				case 'cdtipoestabelecimento':	$where.= " AND E.{$field} = ".intval($value)." \n"; break;
				case 'nmfantasia':				$where.= " AND E.{$field} LIKE '%{$value}%' \n"; break;
				case 'nmrazaosocial':			$where.= " AND E.{$field} LIKE '%{$value}%' \n"; break;
				case 'dsestabelecimento':		$where.= " AND E.{$field} LIKE '%{$value}%' \n"; break;
				case 'fgstatus':				$where.= " AND E.{$field} = '{$value}' \n"; break;
				case 'buscarapida':	 			$where.= " AND (E.cdestabelecimento = ".intval($value)." OR E.nmfantasia LIKE '%{$value}%' OR E.nmrazaosocial LIKE '%{$value}%')\n"; break;
			}
		}
		
		# Campos:
		$select = ' E.*, TE.nmtipoestabelecimento ';
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
			'cdestabelecimento' 	=> $this->lang->str(100027),
			'cdtipoestabelecimento' => $this->lang->str(100077),
			'nmfantasia' 			=> $this->lang->str(100079),
			'fgstatus' 				=> $this->lang->str(100037)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			$itens[$values['cdestabelecimento']] = array(
						'cdestabelecimento' 		=> $values['cdestabelecimento'],
						'cdtipoestabelecimento' 	=> $values['nmtipoestabelecimento'],
						'nmfantasia' 				=> $values['nmfantasia'],
						'fgstatus' 					=> $values['fgstatus']
						);
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}