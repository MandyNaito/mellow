<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('rand_card_colors'))
{
	function rand_card_colors($cont)
	{
		$colors = array	(
							//'red',
							'pink',
							//'purple',
							//'deep-purple',
							//'indigo',
							//'blue',
							//'light-blue',
							'cyan',
							//'teal',
							//'green',
							//'light-green',
							'lime',
							//'yellow',
							'amber',
							'orange'
							//'deep-orange',
							//'brown',
							//'grey',
							//'blue-grey'
						);
		return $colors[floor(($cont) % count($colors))];
	}
}