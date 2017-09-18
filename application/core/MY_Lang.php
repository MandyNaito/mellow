<?php
class MY_Lang extends CI_Lang 
{
	function str($line, $log_errors = TRUE)
	{
		return $this->line("s_".$line, $log_errors);
	}
	
	function all($log_errors = TRUE)
	{
		$value = !empty($this->language) ? $this->language : FALSE;
		
		if ($value === FALSE && $log_errors === TRUE)
		{
			log_message('error', 'Could not find the language');
		}

		return $value;
	}
	
	function replaceStringTags($string,  $replacement = array())
	{
		$replace = array();
		foreach ($replacement as $key => $props)
		{
			$text = $props['text'];
			if(!empty($props['link']))
				$text = '<a id=\''.$props['link']['id'].'\' class=\''.$props['link']['class'].'\' href=\''.$props['link']['href'].'\' onClick=\''.$props['link']['onClick'].'\'>'.$text.'</a>';
			
			if(!empty($props['style']))
				$text = '<font style=\''.$props['style'].'\'>'.$text.'</font>';
			$replace[$key] = $text;
		}

		if(!empty($string))
		{
			if(is_numeric($string))
				$string = $this->str($string);
			
			# Substituição ordenada alfabeticamente:
			preg_match_all('/\%([A-Za-z])/', $string, $matches);
			
			# Substituição ordenada numericamente:
			preg_match_all('/\%([0-9])/', $string, $pos_matches);

			if(!empty($pos_matches[0]))
			{
				foreach ($pos_matches[0] as $key => $match)
				{
					$pos = $pos_matches[1][$key];
					$string = str_replace($match, $replace[$pos], $string);
				}
			}
			else
			{
				$i = 0;
				foreach ($matches[0] as $match)
				{
					$string = preg_replace('/'.$match.'/', $replace[$i], $string, 1);
					$i++;
				}
			}
		}
		else
			$string = $replace[key($replace)];
			
		return $string;
	}
}
?>