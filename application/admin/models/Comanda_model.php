<?php
require_once("Crud_model.php");

class Comanda_model extends Crud_Model {
	
	var $table 		= "comanda";
	var $cdfield 	= "cdcomanda";
	/*
	public function insert($data){
		
		$cdalergenio = array();
		if(!empty($data['cdalergenio']))
			$cdalergenio = $data['cdalergenio'];
		
		unset($data['cdalergenio']);
		
		$this->db->insert($this->table, $data);
		$cdfield = $this->db->insert_id();
		
		if(!empty($cdfield)){
			foreach($cdalergenio as $key => $value){
				$this->insertChild('comanda_alergenio', array('cdcomanda' => $cdfield, 'cdalergenio' => $value));
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
			$deleted = $this->deleteChild('cdcomanda', 'comanda_alergenio', $cdfield);

			if($deleted){
				foreach($cdalergenio as $key => $value)
					$this->insertChild('comanda_alergenio', array('cdcomanda' => $cdfield, 'cdalergenio' => $value));
			}
			
		}

		return $updated;
	}
	public function getChildData($table, $cdfield = -1) {
		
		$SQL = '';
		switch($table){
			case 'comanda_alergenio':
				$SQL = '
					SELECT 
						*
					FROM 
						comanda P 
						INNER JOIN comanda_alergenio 	PA ON (PA.cdcomanda = P.cdcomanda)
					WHERE 
						PA.cdcomanda = '.$cdfield;
				break;
		}
		
		if(!empty($SQL))
			return $this->getChildTableData($SQL);
		
		return false;
	}
	*/
	
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
					case 'cdcomanda':			$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'cdusuario':			$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'cdusuario':			$where.= " AND P.{$field} = ".intval($value)." \n"; break;
					case 'fgstatus':			$where.= " AND P.{$field} = '{$value}' \n"; break;
				}
			}
		}
		
		# Campos:
		$select = ' C.*, E.nmfantasia AS nmestabelecimento, U.nmusuario';
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
			'dtsaida'			 	=> $this->lang->str(100123)
			);
		
		if(!empty($this->session->userdata('logged_in')['cdestabelecimento']))
			unset($label['nmestabelecimento']);
		
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
						'dtentrada' 		=> $values['dtentrada'],
						'dtsaida' 			=> $values['dtsaida'],
						);
				
				if(!empty($this->session->userdata('logged_in')['cdestabelecimento']))
					unset($itens[$values['cdcomanda']]['nmestabelecimento']);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}