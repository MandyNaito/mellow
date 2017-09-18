<?php
require_once("Crud_model.php");

class Candidato_model extends Crud_Model {
	
	var $table 		= "candidato";
	var $cdfield 	= "cdcandidato";
	
	
	public function getChildData($table, $cdfield = -1) {
		
		$SQL = '';
		switch($table){
			case 'formacao':
				$SQL = '
					SELECT 
						*, 
						CASE
							WHEN F.fgsituacao = 1 THEN \''.$this->lang->str(100142).'\'
							WHEN F.fgsituacao = 2 THEN \''.$this->lang->str(100143).'\'
							WHEN F.fgsituacao = 3 THEN \''.$this->lang->str(100144).'\'
							ELSE NULL
						END AS nmsituacao
					FROM 
						formacao F 
						INNER JOIN curso C ON (C.cdcurso = F.cdcurso) 
						INNER JOIN grau G ON (G.cdgrau = C.cdgrau) 
					WHERE 
						F.cdcandidato = '.$cdfield;
				break;
			case 'experiencia':	 
				$SQL = '
					SELECT 
						*,
						CASE
							WHEN E.fgatual = 1 THEN \'<i class="fa fa-check text-success"></i>\'
							ELSE \'<i class="fa fa-ban text-danger"></i>\'
						END AS nmatual
					FROM 
						experiencia E 
						INNER JOIN cargo C ON (C.cdcargo = E.cdcargo) 
						INNER JOIN segmento S ON (S.cdsegmento = E.cdsegmento) 
					WHERE 
						E.cdcandidato = '.$cdfield;
				break;
			case 'qualificacao':	 
				$SQL = '
					SELECT 
						* 
					FROM 
						qualificacao Q 
					WHERE 
						Q.cdcandidato = '.$cdfield;
				break;
			case 'idioma':	 
				$SQL = '
					SELECT 
						* 
					FROM 
						candidato_idioma CI
						INNER JOIN idioma I ON (CI.cdidioma = I.cdidioma) 
						INNER JOIN nivel N ON (CI.cdnivel = N.cdnivel) 
					WHERE 
						CI.cdcandidato = '.$cdfield;
				break;
			case 'referencia':	 
				$SQL = '
					SELECT 
						* 
					FROM 
						referencia R
						INNER JOIN cargo C ON (C.cdcargo = R.cdcargo) 
					WHERE 
						R.cdcandidato = '.$cdfield;
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
        if (isset($dados['ordeby']) && !empty($dados['ordeby']))
			$orderby = ' ORDER BY '.$dados['ordeby'];
		
		# Tabelas:
		$from = ' candidato C ';
		if (array_key_exists('from',$dados)) 
			$from = ' '.$dados['from'].' ';
		
		# Filtros:
		$where = "";
		foreach($dados as $field => $value)
		{
			switch(strtolower($field))
			{
				case 'cdcandidato':		$where.= " AND C.{$field} = ".intval($value)." \n"; break;
				case 'nmcandidato':		$where.= " AND C.{$field} = '{$value}' \n"; break;
				case 'dtcadastro':		$where.= " AND C.{$field} = '{$value}' \n"; break;
				case 'idvaga':	 		$where.= " AND C.{$field} = '{$value}' \n"; break;
				case 'buscarapida':	 	$where.= " AND (cdcandidato = ".intval($value)." OR C.nmcandidato LIKE '%{$value}%' OR C.idvaga LIKE '%{$value}%')\n"; break;
			}
		}
		
		# Campos:
		$select = '*, DATE_FORMAT(C.dtcadastro,\'%d/%m/%Y\') AS DTCADASTRO_FORMATADO ';
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
			'cdcandidato' 	=> $this->lang->str(100027),
			'idvaga' 		=> $this->lang->str(100072),
			'dtcadastro' 	=> $this->lang->str(100084),
			'nmcandidato' 	=> $this->lang->str(100019),
			'idcpf' 		=> $this->lang->str(100046)
			);
		
		if(empty($fields))
			return array('status' => false, 'data' => array('label' => $label));
		
		$itens = array();	
		
		foreach ($fields as $values)
		{
			$itens[$values['cdcandidato']] = array(
						'cdcandidato' 		=> $values['cdcandidato'],						
						'idvaga' 			=> $values['idvaga'],						
						'dtcadastro' 		=> $values['dtcadastro_formatado'],
						'nmcandidato' 		=> $values['nmcandidato'],						
						'idcpf' 			=> $values['idcpf']
						);
		}
		
		return array('status' => true, 'data' => array('label' => $label, 'item' => $itens));
	}
}