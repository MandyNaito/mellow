<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
        if (empty($this->session->userdata['NOSESSION']) && !isset($this->session->userdata['logged_in'])) 
			redirect('login/login_process/');
    }
}