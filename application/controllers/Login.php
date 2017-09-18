<?php
Class Login extends CI_Controller 
{
	var $data = array();
	
	public function __construct()
	{
		parent::__construct();

		$this->multi_menu->set_items(array());
        $this->load->model('login_model', 'login');
		$this->data['wintitle'] = $this->lang->str(100000)." | ".$this->lang->str(100047);
	}

	public function index() 
	{
		$this->load->view('login', $this->data);
		
		if(!empty($this->session->userdata['logged_in']))
			redirect('home');
		
	}

	// Check for user login process
	public function login_process()
	{
		$this->form_validation->set_rules('idlogin', $this->lang->str(100012), 'trim|required|xss_clean');
		$this->form_validation->set_rules('idsenha', $this->lang->str(100034), 'trim|required|xss_clean');

		$run = $this->form_validation->run();
		if ($run  == FALSE) 
		{
			if(!empty($this->session->userdata['logged_in']))
				redirect('home');
			else
				redirect('login');
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
										'nmusuario' => $result[0]->nmusuario
									);
									
					$result = $this->login->getEnabledUser($session_data['cdusuario']);
					
					if ($result != false) 
					{
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						redirect('home');
					}
					else
					{
						$this->data['error_message'] = $this->lang->str(100077);
						$this->load->view('login', $this->data);
					}
						
				}
				else 
				{
					$this->data['error_message'] = $this->lang->str(100076);
					$this->load->view('login', $this->data);
				}
			} 
			else 
			{
				$this->data['error_message'] = $this->lang->str(100076);
				$this->load->view('login', $this->data);
			}
		}
	}

	// Logout from admin page
	public function logout() 
	{
		// Removing session data
		$sess_array = 	array
						(
							'cdusuario' => '',
							'idlogin' 	=> '',
							'nmusuario' => ''
						);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->data['success_message'] = $this->lang->str(100079);
		$this->load->view('login', $this->data);
	}

}

?>