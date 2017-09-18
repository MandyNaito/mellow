<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Home.php");

class Candidato extends Home {
	
	var $data = array();
	var $fields = array();
	var $controller = 'candidato';
	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->model('candidato_model', 'candidato');
        $this->load->model('estadocivil_model', 'estadocivil');
        $this->load->model('nacionalidade_model', 'nacionalidade');
        $this->load->model('habilitacao_model', 'habilitacao');
        $this->load->model('tipocontrato_model', 'tipocontrato');
        $this->load->model('pretensao_model', 'pretensao');
        $this->load->model('segmento_model', 'segmento');
        $this->load->model('cargo_model', 'cargo');
        $this->load->model('vaga_model', 'vaga');
        $this->load->model('idioma_model', 'idioma');
        $this->load->model('nivel_model', 'nivel');
        $this->load->model('grau_model', 'grau');
		
		$this->data['wintitle'] = $this->lang->str(100000)." | ".$this->lang->str(100004);
		$this->data['item_active'] = 'candidato';
		
		$this->grid->show_action_column = true;
		$this->grid->url_action_view = 'candidato/visualizar/';
		$this->grid->url_action_edit = 'candidato/editar/';
		
		$this->data['controller'] 			= $this->controller;
		
		$this->data['list_estadocivil'] 	= $this->lista($this->estadocivil);
		$this->data['list_nacionalidade'] 	= $this->lista($this->nacionalidade);
		$this->data['list_habilitacao'] 	= $this->lista($this->habilitacao);
		$this->data['list_tipocontrato'] 	= $this->lista($this->tipocontrato);
		$this->data['list_pretensao'] 		= $this->lista($this->pretensao);
		$this->data['list_segmento'] 		= $this->lista($this->segmento);
		$this->data['list_cargo'] 			= $this->lista($this->cargo);
		$this->data['list_vaga'] 			= $this->lista($this->vaga);
		$this->data['list_idioma'] 			= $this->lista($this->idioma);
		$this->data['list_nivel'] 			= $this->lista($this->nivel);
		$this->data['list_grau'] 			= $this->lista($this->grau);
		
		$this->fields = array(	
			'idvaga'			=> array('label'=> $this->lang->str(100072), 'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'nmcandidato'		=> array('label'=> $this->lang->str(100031), 'rule' => 'trim|required', 					'msg' => array()),
			'dtnascimento'     	=> array('label'=> $this->lang->str(100033), 'rule' => 'trim|required', 					'msg' => array()),
			'idcpf'            	=> array('label'=> $this->lang->str(100046), 'rule' => 'trim|required', 					'msg' => array()),
			'idrg'             	=> array('label'=> $this->lang->str(100045), 'rule' => 'trim|required', 					'msg' => array()),
			'fggenero'         	=> array('label'=> $this->lang->str(100094), 'rule' => 'trim|required', 					'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'cdnacionalidade'  	=> array('label'=> $this->lang->str(100095), 'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'cdestadocivil'    	=> array('label'=> $this->lang->str(100096), 'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'nrfilho'          	=> array('label'=> $this->lang->str(100097), 'rule' => 'integer', 							'msg' => array()),
			'nmestado'			=> array('label'=> $this->lang->str(100010), 'rule' => 'trim|required', 					'msg' => array()),
			'nmcidade'         	=> array('label'=> $this->lang->str(100011), 'rule' => 'trim|required', 					'msg' => array()),
			'nrtelefone'       	=> array('label'=> $this->lang->str(100048), 'rule' => 'trim|required', 					'msg' => array()),
			'nrcelular'        	=> array('label'=> $this->lang->str(100049), 'rule' => 'trim|required', 					'msg' => array()),
			'nmemail'          	=> array('label'=> $this->lang->str(100032), 'rule' => 'trim|required|valid_email', 		'msg' => array()),
			'nmskype'          	=> array('label'=> $this->lang->str(100118), 'rule' => 'trim',		 						'msg' => array()),
			'nmlinkedin'       	=> array('label'=> $this->lang->str(100119), 'rule' => 'trim|valid_url',			 		'msg' => array()),
			'cdpretensao'      	=> array('label'=> $this->lang->str(100116), 'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'cdtipocontrato'   	=> array('label'=> $this->lang->str(100117), 'rule' => 'trim|required|greater_than[0]', 	'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'cdhabilitacao' 	=> array('label'=> $this->lang->str(100127), 'rule' => 'trim', 								'msg' => array('greater_than' => $this->lang->str(100029).'%s'.$this->lang->str(100030))),
			'fgmudar'  			=> array('label'=> $this->lang->str(100125), 'rule' => 'trim', 								'msg' => array()),
			'fgviajar'  		=> array('label'=> $this->lang->str(100126), 'rule' => 'trim', 								'msg' => array()),
			'fgdeficiencia' 	=> array('label'=> $this->lang->str(100124), 'rule' => 'trim', 								'msg' => array()),
			'nmdeficiencia' 	=> array('label'=> $this->lang->str(100139), 'rule' => 'trim', 								'msg' => array()),
			'txcurso'  			=> array('label'=> $this->lang->str(100123), 'rule' => 'trim', 								'msg' => array()),
			'txinformacao'  	=> array('label'=> $this->lang->str(100122), 'rule' => 'trim', 								'msg' => array())
		);
	}
	
	public function index() {
		$this->data['title'] 	= $this->lang->str(100004);
		$this->data['urlnovo'] 	= site_url('candidato/novo');
				
		$this->load->template('list/candidato', $this->data);
	}
	
	public function grid($model = ''){
		parent::grid($this->candidato);
	}
	
	public function childData($table, $model = '', $cdfield = -1){
		parent::childData($table, $this->candidato, $this->input->post('cdcandidato'));
	}
	
	public function novo(){
		$this->data['target'] 		= "inserir";
		$this->data['title'] 		= $this->lang->replaceStringTags(100017, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['cdcandidato'] 	= -1;
		$this->data['fgvaga']		= true;
		
		$this->load->template('form/candidato', $this->data);
	}
	
	public function inserir(){
		$this->data['target'] 		= "inserir";
		$this->data['title'] 		= $this->lang->replaceStringTags(100017, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['cdcandidato'] 	= -1;
		$this->data['fgvaga'] 		= true;
		
		$this->salvar();
	}
	
	public function editar($cdcandidato){
		$this->data['target'] = $cdcandidato;
		$this->data['title'] = $this->lang->replaceStringTags(100088, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['fgvaga'] = true;
		
		$this->salvar($cdcandidato);
	}
	
	public function visualizar($cdcandidato){
		$this->data['target'] = $cdcandidato;
		$this->data['title'] = $this->lang->replaceStringTags(100087, array(1 => array('text' => $this->lang->str(100086))));
		$this->data['view'] = true;
		
		$_POST = array_merge($_POST, $this->candidato->getDataByCd($cdcandidato));
		
		if(!empty($_POST['idvaga'])){
			$vaga = $this->vaga->getDataByCd($_POST['idvaga']);
			if(!empty($vaga)){
				$this->data['idvaga']		= $vaga['ID'];
				$this->data['nmvaga']		= '['.$vaga['ID'].'] - '.$vaga['post_title'];
				$this->data['dsvaga']		= nl2br($vaga['post_content']);
			}
		}
		
		$this->load->template('view/candidato', $this->data);
	}
	
	public function deletar($cdcandidato){
		$return = $this->candidato->delete($cdcandidato);

		$dados = array('status' => true, 'msg' => $this->lang->str(100091));
		
		echo json_encode($dados);
	}
	
	public function salvar($cdcandidato = ''){	
		$fgedit = (!empty($cdcandidato) || $cdcandidato == -1);
		
		$fields = $this->fields;
		
		$fields['nrtelefone']['rule'] = (!empty($this->input->post('nrcelular'))) ? 'trim' : 'trim|required';
		if(!empty($this->input->post('fgdeficiencia')))
			$fields['nmdeficiencia']['rule'] .= "|required";

		$this->form_validation->set_error_delimiters('<div class="error-label">', '</div>');
		foreach($fields as $key => $field)
			$this->form_validation->set_rules($key, $field['label'], $field['rule'], $field['msg']);

		if ($this->form_validation->run() == FALSE) 
		{
			if($fgedit)
				$_POST = array_replace($_POST, $this->candidato->getDataByCd($cdcandidato));
			$this->load->template('form/candidato', $this->data);
		} 
		else 
		{
			$data = array();
			foreach($fields as  $key => $field)
				if($key != 'cdcandidato')
					$data[$key] = $this->input->post($key);

			$str = '';
			if($fgedit){
				$this->candidato->update($cdcandidato, $data);
				$str = 100015;
			}
			else{
				$data['dtcadastro'] = date("Y-m-d");
				$cdcandidato = $this->candidato->insert($data);
				$str = 100014;
			}

			if(!empty($cdcandidato) && $cdcandidato != -1){
				$formacao = array();
				if(!empty($this->input->post('formacao'))){
					$formacao = json_decode($this->input->post('formacao'), true);
					
					$this->candidato->deleteChild('cdcandidato', 'formacao', $cdcandidato);
					
					foreach($formacao as $form)
					{
						$dataFormacao = array(
							'cdcandidato' 		=> $cdcandidato,
							'nminstituicao' 	=> $form['nminstituicao'],
							'cdcurso' 			=> $form['cdcurso'],
							'dtinicio' 			=> $form['dtinicio'],
							'dttermino' 		=> $form['dttermino'],
							'fgsituacao' 		=> $form['fgsituacao'],
							'nmpais' 			=> $form['nmpais'],
							'nmestado' 			=> $form['nmestado'],
							'nmcidade' 			=> $form['nmcidade']
						);
						
						$this->candidato->saveChild('cdformacao', 'formacao', $form['cdformacao'], $dataFormacao);
					}
				}
				
				$experiencia = array();
				if(!empty($this->input->post('experiencia'))){
					$experiencia = json_decode($this->input->post('experiencia'), true);
					
					$this->candidato->deleteChild('cdcandidato', 'experiencia', $cdcandidato);
				
					foreach($experiencia as $form)
					{
						$dataExperiencia = array(
							'cdcandidato' 			=> $cdcandidato,
							'nmempresa'				=> $form['nmempresa'],
							'dtentrada' 			=> $form['dtentrada'],
							'dtsaida' 				=> $form['dtsaida'],
							'fgatual' 				=> $form['fgatual'],
							'txresponsabilidade' 	=> $form['txresponsabilidade'],
							'txcase' 				=> $form['txcase'],
							'txmotivosaida' 		=> $form['txmotivosaida'],
							'nmcidade' 				=> $form['nmcidade'],
							'nmestado' 				=> $form['nmestado'],
							'nmpais' 				=> $form['nmpais'],
							'cdcargo' 				=> $form['cdcargo'],
							'cdsegmento' 			=> $form['cdsegmento']
						);
						
						$this->candidato->saveChild('cdexperiencia', 'experiencia', $form['cdexperiencia'], $dataExperiencia);
					}
				}
				
				$qualificacao = array();
				if(!empty($this->input->post('qualificacao'))){
					$qualificacao = json_decode($this->input->post('qualificacao'), true);
				
					$this->candidato->deleteChild('cdcandidato', 'qualificacao', $cdcandidato);
					
					foreach($qualificacao as $form)
					{
						$dataQualificacao = array(
							'cdcandidato' 			=> $cdcandidato,
							'nmqualificacao'		=> $form['nmqualificacao'],
							'dtqualificacao' 		=> $form['dtqualificacao'],
							'nminstituicao' 		=> $form['nminstituicao'],
							'dsqualificacao' 		=> $form['dsqualificacao']
						);
						
						$this->candidato->saveChild('cdqualificacao', 'qualificacao', $form['cdqualificacao'], $dataQualificacao);
					}
				}
				
				$idioma = array();
				if(!empty($this->input->post('idioma'))){
					$idioma = json_decode($this->input->post('idioma'), true);
					
					$this->candidato->deleteChild('cdcandidato', 'candidato_idioma', $cdcandidato);
					
					foreach($idioma as $form)
					{
						$dataIdioma = array(
							'cdcandidato' 			=> $cdcandidato,
							'cdidioma'				=> $form['cdidioma'],
							'cdnivel' 				=> $form['cdnivel']
						);
						
						$this->candidato->saveChild('cdcandidato_idioma', 'candidato_idioma', $form['cdcandidato_idioma'], $dataIdioma);
					}
				}
				
				$referencia = array();
				if(!empty($this->input->post('referencia'))){
					$referencia = json_decode($this->input->post('referencia'), true);
					
					$this->candidato->deleteChild('cdcandidato', 'referencia', $cdcandidato);
					foreach($referencia as $form)
					{
						$dataReferencia = array(
							'cdcandidato' 			=> $cdcandidato,
							'nmreferencia'			=> $form['nmreferencia'],
							'cdcargo' 				=> $form['cdcargo'],
							'nrtelefone' 			=> $form['nrtelefone'],
							'nrcelular' 			=> $form['nrcelular'],
							'nmemail' 				=> $form['nmemail']
						);
						
						$this->candidato->saveChild('cdreferencia', 'referencia', $form['cdreferencia'], $dataReferencia);
					}
				}
				
				$this->session->set_flashdata('success_message', $this->lang->str($str));
				redirect('candidato');
			} 
			else 
			{
				if($fgedit)
					$_POST = array_replace($_POST, $this->candidato->getDataByCd($cdcandidato));
				$this->load->template('form/candidato', $this->data);
			}
		}
	}
}
?>