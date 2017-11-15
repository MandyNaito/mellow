<?php
require_once("Crud_model.php");

class Usuario_model extends Crud_Model {
	
	var $table 		= "usuario";
	var $cdfield 	= "cdusuario";
		
	public function insert($data){		
		if(empty($data['cdestabelecimento']))
			$data['cdestabelecimento'] = null;
		
		if(!empty($data['idsenha']))
			$data['idsenha'] = md5($data['idsenha']);
		
		return parent::insert($data);
	}
	
	public function update($cdfield, $data){
		
		if(empty($data['cdestabelecimento']))
			$data['cdestabelecimento'] = null;
		
		if(!empty($data['idsenha']))
			$data['idsenha'] = md5($data['idsenha']);
		
		$updated = parent::update($cdfield, $data);
		
		if($updated && ($cdfield == $this->session->userdata('logged_in')['cdusuario']))
			$this->session->set_userdata('logged_in', array_replace($this->session->userdata('logged_in'), $data));

		return $updated;
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
		$from = ' 	usuario U 
					INNER JOIN perfil P ON (U.cdperfil = P.cdperfil)
				';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdusuario':		$where.= " AND U.{$field} = ".intval($value)." \n"; break;
				case 'cdperfil':		$where.= " AND U.{$field} = ".intval($value)." \n"; break;
				case 'idlogin':			$where.= " AND U.{$field} = '{$value}' \n"; break;
				case 'fgstatus':		$where.= " AND U.{$field} = '{$value}' \n"; break;
				case 'buscarapida':	 	$where.= " AND (U.cdusuario = ".intval($value)." OR U.idlogin LIKE '%{$value}%')\n"; break;
			}
		}
		
		# Campos:
		$select = ' U.*, P.nmperfil ';
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
			'cdusuario' => $this->lang->str(100027),
			'cdperfil' 	=> $this->lang->str(100009),
			'idlogin' 	=> $this->lang->str(100093),
			'fgstatus' 	=> $this->lang->str(100037)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			$itens[$values['cdusuario']] = array(
						'cdusuario' 		=> $values['cdusuario'],
						'cdperfil' 			=> $values['nmperfil'],
						'idlogin' 			=> $values['idlogin'],
						'fgstatus' 			=> $values['fgstatus']
						);
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}