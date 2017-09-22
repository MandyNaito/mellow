<?php
class Crud_Model extends CI_Model {

	var $table 		= "";
	var $cdfield 	= "";
	
	public function all()
	{
		return $this->db->get($this->table)->result_array();
	}
	
	public function insert($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	
	public function delete($cdfield) {
		$this->db->delete($this->table, array($this->cdfield => $cdfield)); 
		if (!$this->db->affected_rows()) 
			return false;		
		return true;
	}
	
	public function update($cdfield, $data){
		$this->db->where($this->cdfield, $cdfield);
		return $this->db->update($this->table, $data);
	}
	
	public function getDataByCd($cdfield) {
		$this->db->where($this->cdfield, $cdfield);
		return $this->all($this->table)[0];
	}
	
	public function saveChild($field, $table, $cdfield, $data){
		if(!empty($this->getChildTableByCd($field, $table, $cdfield)))
			return $this->updateChild($field, $table, $cdfield, $data);
		else
			return $this->insertChild($table, $data);
	}
	
	public function updateChild($field, $table, $cdfield, $data){
		$this->db->where($field, $cdfield);
		return $this->db->update($table, $data);
	}
	
	public function deleteChild($field, $table, $cdfield){
		return $this->db->delete($table, array($field => $cdfield)); 
	}
	
	public function insertChild($table, $data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	
	public function getChildTableData($SQL) {
		return $this->db->query($SQL)->result_array();
	}

	public function getChildTableByCd($field, $table, $cdfield = -1) {
		$this->db->where($field, $cdfield);
		return $this->db->get($table)->result_array();
	}		
}