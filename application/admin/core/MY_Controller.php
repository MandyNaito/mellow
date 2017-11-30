<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
        if (empty($this->session->userdata['NOSESSION']) && !isset($this->session->userdata['logged_in'])) 
			redirect('login/login_process/');
		
		$menu = $this->menu->getMenu();
		$this->multi_menu->set_items($menu);
		
		$items = array_column($menu, 'slug');
		foreach($items as $k => $value){
			if(strpos($value, "/"))
				$items[$k] = explode('/', $value)[1];
		}
		if(!in_array($this->item_active, $items))
			$this->item_active = 'home';	
    }
}