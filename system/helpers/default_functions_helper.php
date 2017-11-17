<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('rand_card_colors'))
{
	function rand_card_colors($cont)
	{
		if(intval($cont) % 3 == 0)
			return "orange"; 
		if(intval($cont) % 2 == 0)
			return "cyan"; 
		
		return "pink";
	}
}