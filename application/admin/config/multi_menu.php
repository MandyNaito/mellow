<?php defined('BASEPATH') OR exit('No direct script access allowed');

// $config["menu_id"]               = 'id';
// $config["menu_label"]            = 'name';
// $config["menu_parent"]           = 'parent';
// $config["menu_icon"] 			 = 'icon';
$config["menu_key"]              = 'slug';
$config["menu_order"]            = 'order';

$config["nav_tag_open"]          = '<ul class="list">';
$config["nav_tag_close"]         = '</ul>';
$config["item_tag_open"]         = '<li>'; 
$config["item_tag_close"]        = '</li>';	
$config["parent_tag_open"]       = '<li>';	
$config["parent_tag_close"]      = '</li>';	
$config["parent_anchor"]    	 = '<a href="javascript:void(0);" class="menu-toggle">%s</a>';	
$config["children_tag_open"]     = '<ul class="ml-menu">';	
$config["children_tag_close"]    = '</ul>';	
$config['icon_position']		 = 'left'; // 'left' or 'right'
$config["item_active_class"] 	 = 'active';  
$config["item_active"] 	 		 = 'home';  
$config["set_active_parent"] 	 = true;  
$config["href_parent"] 	 		 = false;  
$config['menu_icons_list']		 = array();
// these for the future version
$config['icon_img_base_url']	 = ''; 