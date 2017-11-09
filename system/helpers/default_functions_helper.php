<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('rand_card_colors'))
{
	function rand_card_colors($cont)
	{
		if($cont % 4 == 0)
			return "orange";
		if($cont % 3 == 0)
			return "green"; 
		if($cont % 2 == 0)
			return "blue"; 
		return "red";
	}
}