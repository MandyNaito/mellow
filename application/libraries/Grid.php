<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Grid
 */
class Grid {
	
	private $itens_grid 		= array();
	private $label_grid 		= array();
	private $grid_open 			= '<div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">';
	private $grid_close 		= '</div> ';
	private $grid_size_open 	= '<div class="col-md-12">';
	private $grid_size_close 	= '</div> ';
	private $grid_table_open 	= '<table class="table table-striped table-responsive table-hover " cellspacing="0" cellpadding="0">';
	private $grid_table_close 	= '</table> ';
	public 	$url_action_print	= '';
	public 	$url_action_view	= '';
	public 	$url_action_edit	= '';
	public 	$show_action_send	= false;
	public 	$show_action_link	= false;
	public 	$show_action_print	= false;
	public 	$show_action_view	= true;
	public 	$show_action_edit	= true;
	public 	$show_action_delete	= true;
	public  $show_action_column	= true;
	

	public function __construct($config = array())
	{
		$this->ci =& get_instance();

		$this->initialize($config);
	}
	
	public function initialize($config = array())
	{
		foreach ($config as $key => $value)
			$this->$key = $value;

		$this->show_action_column = ($this->show_action_view || $this->show_action_edit || $this->show_action_delete);
	}
	
	// --------------------------------------------------------------------

	/**
	 * Inclui no final da pilha.
	 */		
	function set_query_itens($itens)
	{
		$this->itens_grid = $itens;
	}
	
	function set_label_column($itens)
	{
		$this->label_grid = $itens;
	}
	
	function render()
	{
		$output  = $this->grid_open;
		$output .= $this->grid_size_open;
		$output .= $this->grid_table_open;
		
		$output .= '<thead><tr>';
		foreach ($this->label_grid as $header) 
			$output .= "<th>".$header."</th>";
			
		if($this->show_action_column)
			$output .= '<th class="actions">'.$this->ci->lang->str(100025).'</th>';
		$output .= '</tr></thead>';
		
		$output .= '<tbody>';
		if ($this->itens_grid) 
		{
			foreach ($this->itens_grid as $cod => $itens) 
			{
				$output .= '<tr>';
				foreach ($itens as $fields)
					$output .= "<td>".$fields."</td>";
				
				if($this->show_action_column)
				{
					$output .= '<td class="actions">';
					if($this->show_action_view)
						$output .= '<a class="btn btn-success btn-md btn-view" href="'.$this->url_action_view.$cod.'" data-index="'.$cod.'" title="'.$this->ci->lang->str(100022).'"><i class="glyphicon glyphicon-eye-open"></i></a> ';
					if($this->show_action_edit)
						$output .= '<a class="btn btn-warning btn-md btn-edit" href="'.$this->url_action_edit.$cod.'" data-index="'.$cod.'" title="'.$this->ci->lang->str(100023).'"><i class="glyphicon glyphicon-pencil"></i></a> ';
					if($this->show_action_send)
						$output .= '<a class="btn btn-primary btn-md btn-send" data-index="'.$cod.'" data-toggle="modal" data-target="#send-modal" title="'.$this->ci->lang->str(100109).'"><i class="glyphicon glyphicon-envelope"></i></a> ';
					if($this->show_action_link)
						$output .= '<a class="btn btn-default btn-md btn-link" data-index="'.$cod.'" data-toggle="modal" data-target="#link-modal" title="'.$this->ci->lang->str(100112).'"><i class="glyphicon glyphicon-link"></i></a> ';
					if($this->show_action_print)
						$output .= '<a class="btn btn-info btn-md btn-print" href="'.$this->url_action_print.$cod.'" data-index="'.$cod.'" title="'.$this->ci->lang->str(100108).'"><i class="glyphicon glyphicon-print"></i></a> ';
					if($this->show_action_delete)					
						$output .= '<a class="btn btn-danger btn-md btn-delete" data-index="'.$cod.'" data-toggle="modal" data-target="#delete-modal" title="'.$this->ci->lang->str(100024).'"><i class="glyphicon glyphicon-trash"></i></a> ';
					$output .= "</td>";
				}
				$output .= '</tr>';
			}
			
		}
		else
		{
			$output .= '<tr>';
			$output .= '<td colspan="'.(count($this->label_grid)+1).'">'.$this->ci->lang->str(100085).'';
			$output .= '</td>';
			$output .= '</tr>';
		}
		$output .= '</tbody>';
		
		$output .= $this->grid_table_close;
		$output .= $this->grid_size_close;
		$output .= $this->grid_close;
		
		return $output;
	}
}
