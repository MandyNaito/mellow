<?php
require_once("Crud_model.php");

class Produto_model extends Crud_Model {
	
	var $table 		= "produto";
	var $cdfield 	= "cdproduto";
	
	public function insert($data){
		
		$cdalergenio = array();
		if(!empty($data['cdalergenio']))
			$cdalergenio = $data['cdalergenio'];
		
		unset($data['cdalergenio']);
		
		$this->db->insert($this->table, $data);
		$cdfield = $this->db->insert_id();
		
		if(!empty($cdfield)){
			foreach($cdalergenio as $key => $value){
				$this->insertChild('produto_alergenio', array('cdproduto' => $cdfield, 'cdalergenio' => $value));
			}
		}
		
		return $cdfield;
	}
	
	public function update($cdfield, $data){
		
		$cdalergenio = array();
		if(!empty($data['cdalergenio']))
			$cdalergenio = array_unique($data['cdalergenio']);
		
		unset($data['cdalergenio']);
		
		$updated = parent::update($cdfield, $data);
		
		if($updated){
			$deleted = $this->deleteChild('cdproduto', 'produto_alergenio', $cdfield);

			if($deleted){
				foreach($cdalergenio as $key => $value)
					$this->insertChild('produto_alergenio', array('cdproduto' => $cdfield, 'cdalergenio' => $value));
			}
			
		}

		return $updated;
	}
	
	public function getChildData($table, $cdfield = -1) {
		
		$SQL = '';
		switch($table){
			case 'produto_alergenio':
				$SQL = '
					SELECT 
						*
					FROM 
						produto P 
						INNER JOIN produto_alergenio 	PA ON (PA.cdproduto = P.cdproduto)
					WHERE 
						PA.cdproduto = '.$cdfield;
				break;
		}
		
		if(!empty($SQL))
			return $this->getChildTableData($SQL);
		
		return false;
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
		$from = ' 	produto P 
					INNER JOIN tipoproduto TP ON (P.cdtipoproduto = TP.cdtipoproduto)
					INNER JOIN estabelecimento E ON (P.cdestabelecimento = E.cdestabelecimento) 
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
					case 'cdestabelecimento':	$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'cdproduto':			$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'cdtipoproduto':		$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'cdalergenio':			$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'nmproduto':			$where.= " AND P.{$field} LIKE '%{$value}%' \n"; break;
					case 'dsproduto':			$where.= " AND P.{$field} LIKE '%{$value}%' \n"; break;
					case 'vlproduto':			$where.= " AND P.{$field} = '{$value}' \n"; break;
					case 'fgstatus':			$where.= " AND P.{$field} = '{$value}' \n"; break;
					case 'buscarapida':	 		$where.= " AND (P.cdproduto = ".intval($value)." OR P.nmproduto LIKE '%{$value}%')\n"; break;
				}
			}
		}
		
		# Campos:
		$select = ' P.*, TP.nmtipoproduto, E.nmfantasia AS nmestabelecimento ';
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
			'cdtipoproduto' 		=> $this->lang->str(100077),
			'nmproduto' 			=> $this->lang->str(100066),
			'nmestabelecimento' 	=> $this->lang->str(100002),
			'vlproduto' 			=> $this->lang->str(100092)
			);
		
		if(!empty($this->session->userdata('logged_in')['cdestabelecimento']))
			unset($label['nmestabelecimento']);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		if(empty($dados['grid']))			
			return array('status' => true, 'data' => $fields);
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdproduto']] = $values['nmproduto'];
			else
			{
				$itens[$values['cdproduto']] = array(
						'fgstatus' 			=> $values['fgstatus'],
						'cdtipoproduto' 	=> $values['nmtipoproduto'],
						'nmproduto' 		=> $values['nmproduto'],
						'nmestabelecimento' => $values['nmestabelecimento'],
						'vlproduto' 		=> $values['vlproduto'],
						);
				
				if(!empty($this->session->userdata('logged_in')['cdestabelecimento']))
					unset($itens[$values['cdproduto']]['nmestabelecimento']);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}