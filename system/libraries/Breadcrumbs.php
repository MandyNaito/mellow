<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Breadcrumbs Class
 *
 * This class manages the breadcrumb object
 *
 * @package		Breadcrumb
 * @version		1.0
 * @author 		Buti <buti@nobuti.com>
 * @copyright 	Copyright (c) 2012, Buti
 * @link		https://github.com/nobuti/codeigniter-breadcrumb
 */
class CI_Breadcrumbs {
	
	/**
	 * Breadcrumbs stack
	 *
     */
	private $breadcrumbs = array();
	 	
	 /**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{	
		$this->ci =& get_instance();
		// Load config file
		$this->ci->load->config('breadcrumbs');
		// Get breadcrumbs display options
		$this->tag_open = $this->ci->config->item('tag_open');
		$this->tag_close = $this->ci->config->item('tag_close');
		$this->divider = $this->ci->config->item('divider');
		$this->crumb_open = $this->ci->config->item('crumb_open');
		$this->crumb_close = $this->ci->config->item('crumb_close');
		$this->crumb_last_open = $this->ci->config->item('crumb_last_open');
		$this->crumb_divider = $this->ci->config->item('crumb_divider');
		
		log_message('debug', "Breadcrumbs Class Initialized");
	}
	
	// --------------------------------------------------------------------

	/**
	 * Append crumb to stack
	 *
	 * @access	public
	 * @param	string $page
	 * @param	string $href
	 * @return	void
	 */		
	function push($id, $page = "", $href = "#", $icon = null)
	{
		// no page or href provided
		if (!$id) return;
		
		// Prepend site url
		if(!empty($href))
			$href = site_url($href);
		
		// push breadcrumb
		$this->breadcrumbs[$id] = array('page' => $page, 'href' => $href,  'icon' => $icon);
	}
	
	// --------------------------------------------------------------------

	/**
	 * Prepend crumb to stack
	 *
	 * @access	public
	 * @param	string $page
	 * @param	string $href
	 * @return	void
	 */		
	function unshift($id, $page = "",  $href = "#", $icon = null)
	{
		// no crumb provided
		if (!$id OR !$href) return;
		
		// Prepend site url
		$href = site_url($href);
		
		// add at firts
		array_unshift($this->breadcrumbs, array('page' => $page, 'href' => $href,  'icon' => $icon));
	}
	
	function reset(){
		$this->breadcrumbs = array();
	}
	
	// --------------------------------------------------------------------

	/**
	 * Generate breadcrumb
	 *
	 * @access	public
	 * @return	string
	 */		
	function show()
	{
		if ($this->breadcrumbs) {
			// set output variable
			$output = $this->tag_open;
			
			// construct output
			foreach ($this->breadcrumbs as $key => $crumb) {
				$keys = array_keys($this->breadcrumbs);
				$icon = (!empty($crumb['icon']) ? $crumb['icon']." " : "") ;
				$href = (!empty($crumb['href']) ? 'href="' . $crumb['href'] . '"' : "") ;
				
				if (end($keys) == $key) {
					$output .= $this->crumb_last_open .'<a ' . $href . '>' . $icon. $crumb['page'] . '</a> '. $this->crumb_close;
				} else {
					$output .= $this->crumb_open.'<a ' . $href . '>' . $icon. $crumb['page'] . '</a> '.$this->crumb_divider.$this->crumb_close;
				}
			}
			
			// return output
			return $output . $this->tag_close . PHP_EOL;
		}
		
		// no crumbs
		return '';
	}

}
// END Breadcrumbs Class

/* End of file Breadcrumbs.php */
/* Location: ./application/libraries/Breadcrumbs.php */
