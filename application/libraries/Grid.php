<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Grid
 */
class Grid {
	
	private $itens_grid 		= array();
	private $label_grid 		= array();
	private $icon_view 			= '<i class="glyphicon glyphicon-eye-open"></i>';
	private $icon_edit 			= '<i class="glyphicon glyphicon-eye-pencil"></i>';
	private $icon_delete		= '<i class="glyphicon glyphicon-eye-trash"></i>';
	private $grid_open 			= '<div class="body">';
	private $grid_close 		= '</div> ';
	private $grid_size_open 	= '<div class="table-responsive">';
	private $grid_size_close 	= '</div> ';
	private $grid_table_open 	= '<table class="table table-bordered table-striped table-hover grid_datatable dataTable">';
	private $grid_table_close 	= '</table> ';
	public 	$url_action_print	= '';
	public 	$url_action_view	= '';
	public 	$url_action_edit	= '';
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
			$output .= '<th class="actions">'.$this->ci->lang->str(100029).'</th>';
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
						$output .= '<a class="btn btn-sm btn-success waves-effect btn-view" href="'.$this->url_action_view.$cod.'" data-index="'.$cod.'" title="'.$this->ci->lang->str(100038).'">'.$this->icon_view.'</a> ';
					if($this->show_action_edit)
						$output .= '<a class="btn btn-sm btn-warning waves-effect btn-edit" href="'.$this->url_action_edit.$cod.'" data-index="'.$cod.'" title="'.$this->ci->lang->str(100039).'">'.$this->icon_edit.'</a> ';
					if($this->show_action_delete)					
						$output .= '<a class="btn btn-sm btn-danger waves-effect btn-delete" data-index="'.$cod.'" data-toggle="modal" data-target="#delete-modal" title="'.$this->ci->lang->str(100040).'">'.$this->icon_delete.'</a> ';
					$output .= "</td>";
				}
				$output .= '</tr>';
			}
			
		}
		
		$output .= '</tbody>';
		
		$output .= $this->grid_table_close;
		$output .= $this->grid_size_close;
		$output .= $this->grid_close;
		
		return $output;
	}
}
