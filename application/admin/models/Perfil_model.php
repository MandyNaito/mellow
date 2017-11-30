<?php
require_once("Crud_model.php");

class Perfil_model extends Crud_Model {
	
	var $table 		= "perfil";
	var $cdfield 	= "cdperfil";
	
	public function insert($data){		
		$fgpermissao = array();
		if(!empty($data['fgpermissao'])){
			$fgpermissao = $data['fgpermissao'];
			unset($data['fgpermissao']);
		}
		
		$cdfield = parent::insert($data);
		
		if($cdfield){
			foreach($fgpermissao as $cdmenu => $value){
				$this->insertChild('menu_perfil', array('cdperfil' => $cdfield, 'cdmenu' => $cdmenu));
			}
		}

		return $cdfield;
	}
	
	public function update($cdfield, $data){
		
		$fgpermissao = array();
		if(!empty($data['fgpermissao'])){
			$fgpermissao = $data['fgpermissao'];
			unset($data['fgpermissao']);
		}
			
		$updated = parent::update($cdfield, $data);
		
		if($updated){
			$this->deleteChild('cdperfil', 'menu_perfil', $cdfield);
			foreach($fgpermissao as $cdmenu => $value){
				$this->insertChild('menu_perfil', array('cdperfil' => $cdfield, 'cdmenu' => $cdmenu));
			}
		}

		return $updated;
	}
	
	public function getChildData($table, $cdfield = -1) {
		
		$SQL = '';
		switch($table){
			case 'menu_perfil':
				$SQL = '
					SELECT 
						*
					FROM 
						menu M 
						INNER JOIN menu_perfil 	MP ON (MP.cdmenu = M.cdmenu)
					WHERE 
						MP.cdperfil = '.$cdfield;
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
		$from = ' perfil P ';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdperfil':		$where.= " AND P.{$field} = ".intval($value)." \n"; break;
				case 'nmperfil':		$where.= " AND P.{$field} = '{$value}' \n"; break;
				case 'buscarapida':	$where.= " AND (P.cdperfil = ".intval($value)." OR P.nmperfil LIKE '%{$value}%' \n"; break;
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
			'cdperfil' 	=> $this->lang->str(100027),
			'nmperfil' 	=> $this->lang->str(100009),
			'fgstatus' 	=> $this->lang->str(100037)
			);
		
		if(empty($dados['grid']))			
			return array('status' => true, 'data' => $fields);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdperfil']] = $values['nmperfil'];
			else
			{
				$itens[$values['cdperfil']] = array(
					'cdperfil' 	=> $values['cdperfil'],						
					'nmperfil' 	=> $values['nmperfil'],
					'fgstatus' 			=> $values['fgstatus']
				);
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}