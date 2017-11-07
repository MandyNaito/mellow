<?php
Class Login extends CI_Controller 
{
	var $data = array();
	var $type = 'app';
	
	public function __construct()
	{
		parent::__construct();
		$this->data['wintitle'] = $this->lang->str(100097);

		$this->multi_menu->set_items(array());
        $this->load->model('login_model', 'login');
	}
	
	public function index() 
	{
		$this->load->view('portal', $this->data);
		
		if(!empty($this->session->userdata['logged_in']))
			redirect('home');
	}
	
	public function admin() 
	{
		$this->data['wintitle'] = $this->lang->str(100094)." | ".$this->lang->str(100093);
		$this->load->view('login/admin', $this->data);
		$this->type = 'admin';
		
		if(!empty($this->session->userdata['logged_in']))
			redirect('home');
		
	}
	
	public function business() 
	{
		$this->data['wintitle'] = $this->lang->str(100095)." | ".$this->lang->str(100093);
		$this->load->view('login/business', $this->data);
		$this->type = 'business';
		
		if(!empty($this->session->userdata['logged_in']))
			redirect('home');
		
	}

	public function app() 
	{
		$this->data['wintitle'] = $this->lang->str(100096)." | ".$this->lang->str(100093);
		$this->load->view('login/app', $this->data);
		$this->type = 'app';
		
		if(!empty($this->session->userdata['logged_in']))
			redirect('home');
		
	}
	
	public function cadastro($type){
		$this->type = $type;
		$this->load->view('sign-up/'.$this->type, $this->data);
	}

	public function login_process()
	{
		$this->form_validation->set_rules('idlogin', $this->lang->str(100012), 'trim|required|xss_clean');
		$this->form_validation->set_rules('idsenha', $this->lang->str(100032), 'trim|required|xss_clean');

		$run = $this->form_validation->run();
		if ($run  == FALSE) 
		{
			if(!empty($this->session->userdata['logged_in']))
				redirect('home');
			else
				redirect('login/'.$this->type);
		} 
		else 
		{
			$data = array	
			(
				'idlogin' => $this->input->post('idlogin'),
				'idsenha' => $this->input->post('idsenha')
			);
			
			$result = $this->login->validate($data);
			if ($result == TRUE) 
			{
				$result 	= $this->login->getUserData($this->input->post('idlogin'));	
				if ($result != false) 
				{
					$session_data = array
									(
										'cdusuario' => $result[0]->cdusuario,
										'idlogin' 	=> $result[0]->idlogin,
										'nmusuario' => $result[0]->nmusuario,
										'nmtipo' 	=> $result[0]->nmtipo,
										'txfoto' 	=> (!(empty($result[0]->txfoto)) ? $result[0]->txfoto : 'assets/images/user-default.png')
									);
									
					$result = $this->login->getEnabledUser($session_data['cdusuario']);
					
					if ($result != false) 
					{
						$this->session->set_userdata('logged_in', $session_data);
						redirect('home');
					}
					else
					{
						$this->data['error_message'] = $this->lang->str(100033);
						$this->load->view('login/'.$this->type, $this->data);
					}
						
				}
				else 
				{
					$this->data['error_message'] = $this->lang->str(100034);
					$this->load->view('login/'.$this->type, $this->data);
				}
			} 
			else 
			{
				$this->data['error_message'] = $this->lang->str(100034);
				$this->load->view('login/'.$this->type, $this->data);
			}
		}
	}

	public function logout() 
	{
		$sess_array = 	array
						(
							'cdusuario' => '',
							'idlogin' 	=> '',
							'nmusuario' => ''
						);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->data['success_message'] = $this->lang->str(100035);
		$this->load->view('login/'.$this->type, $this->data);
	}
}

?>