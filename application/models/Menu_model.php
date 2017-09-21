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
			$termo = $this->lang->str($values['cdtermo']);
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

}