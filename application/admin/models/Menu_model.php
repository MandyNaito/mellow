<?php
class Menu_model extends CI_Model {

	public function all()
	{
		return $this->db->get("menu")->result_array();
	}
	
	public function get_menu_permitido($cdusuario)
	{
		$SQL = "SELECT 
					M.cdmenu, 
					M.cdpai,
					M.cdtermo, 
					M.idiconmenu,
					M.nmslug,
					M.cdordem
				FROM 
					menu M
					INNER JOIN menu_perfil MP ON (MP.cdmenu = M.cdmenu)
					INNER JOIN perfil P ON (MP.cdperfil = P.cdperfil)
					INNER JOIN usuario U ON (P.cdperfil = U.cdperfil)
				WHERE 
					U.cdusuario = $cdusuario";
		return $this->db->query($SQL)->result_array();
	}
	
	public function childs($cod, $fields = array())
	{
		$select = (!empty($fields)) ? implode(",", $fields) : "*";
		return $this->db->query("SELECT $select FROM menu WHERE cdpai = $cod")->result_array();
	}
	
	public function getBreadcrumbs($nmslug)
	{
		$cdusuario = (!empty($this->session->userdata('logged_in')['cdusuario'])) ? $this->session->userdata('logged_in')['cdusuario'] : -1;
		
		$SQL = "
			SELECT 
				T2.cdmenu, 
				T2.cdtermo, 
				T2.idiconmenu,
				CASE 
					WHEN T1.lvl = 1 THEN T2.nmslug
					ELSE NULL
				END AS nmslug
			FROM 
				(
					SELECT
						@r AS _cdmenu,
						(SELECT @r := cdpai FROM menu WHERE cdmenu = _cdmenu) AS cdpai,
						@l := @l + 1 AS lvl
					FROM
						(SELECT @r := (SELECT cdmenu FROM menu where nmslug = '$nmslug' limit 1), @l := 0) vars,
						menu M
						INNER JOIN menu_perfil MP ON (MP.cdmenu = M.cdmenu)
						INNER JOIN perfil 		P ON (MP.cdperfil = P.cdperfil)
						INNER JOIN usuario 		U ON (P.cdperfil = U.cdperfil)
					WHERE 
						@r <> 0
						AND U.cdusuario = $cdusuario
				) T1
				INNER JOIN menu T2 ON (T1._cdmenu = T2.cdmenu)
			ORDER BY 
				T1.lvl DESC;";
				
		return $this->db->query($SQL)->result_array();
	}
	
	public function getMenu()
	{
		$cdusuario = (!empty($this->session->userdata('logged_in')['cdusuario'])) ? $this->session->userdata('logged_in')['cdusuario'] : -1;
		$fields = $this->get_menu_permitido($cdusuario);
		
		$itens = array();		
		foreach ($fields as $values)
		{
			$termo = $this->lang->menu($values['cdtermo']);
			if(substr_count($termo, '<%') > 0)
				$termo = $this->session->userdata('logged_in')[strtolower(explode("%>",explode("<%", $termo)[1])[0])];

			$itens[] = array(
							'id'		=> $values['cdmenu'],
							'parent' 	=> $values['cdpai'],
							'name' 		=> $termo,
							'icon' 		=> $values['idiconmenu'],
							'slug' 		=> $values['nmslug'],
							'order' 	=> $values['cdordem']
						);
		}
		
		return $itens;
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
		$from = ' menu M ';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdmenu':			$where.= " AND M.{$field} = ".intval($value)." \n"; break;
				case 'nmslug':			$where.= " AND M.{$field} = '{$value}' \n"; break;
				case 'noparent':		$where.= " AND (M.cdpai IS NULL OR M.cdpai = '') \n"; break;
				case 'buscarapida':	 	$where.= " AND (M.cdmenu = ".intval($value)." OR M.nmslug LIKE '%{$value}%' \n"; break;
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
			'cdmenu' 	=> $this->lang->str(100027),
			'nmmenu' 	=> $this->lang->str(100066)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));

		$itens = array();		
		foreach ($fields as $values)
		{
			if (array_key_exists('list',$dados) && !empty($dados['list']))
				$itens[$values['cdmenu']] = $this->lang->menu($values['cdtermo']);	
			else
			{
				$itens[$values['cdmenu']] = array(
					'cdmenu' 	=> $values['cdmenu'],						
					'nmmenu' 	=> $this->lang->menu($values['cdtermo'])
				);
				
				$childs = $this->childs($values['cdmenu']);
				if(!empty($childs)){
					foreach($childs as $k => $v){
						$itens[$values['cdmenu']]['childs'][$v['cdmenu']] = array(
							'cdmenu' 	=> $v['cdmenu'],						
							'nmmenu' 	=> $this->lang->menu($v['cdtermo'])
						);
					}
				}
			}
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}

}