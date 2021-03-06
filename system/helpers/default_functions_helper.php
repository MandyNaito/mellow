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
if ( ! function_exists('rand_card_icons'))
{
	function rand_card_icons($cont)
	{
		$colors = array	(
							'blur_on',
							'star', 
							'music_note',
							'toys',
							'mood',
							'thumb_up',
							'favorite'
						);
		return $colors[floor(($cont) % count($colors))];
	}
}
if ( ! function_exists('format_money'))
{
	function format_money($value)
	{
		return 'R$ '.number_format($value,2,',','.');
	}
}