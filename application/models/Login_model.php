<?php
Class Login_model extends CI_Model
{
	public function insertUsuario($data) 
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where("idlogin = '".$data['idlogin']."'");
		$this->db->limit(1);
		
		$query = $this->db->get();	
		if ($query->num_rows() == 0) 
		{
			$this->db->insert('usuario', $data);
			if ($this->db->affected_rows() > 0)
				return true;
		} 
		else 
			return false;
	}

	// Realiza o login:
	public function validate($data) 
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where("idlogin = '".$data['idlogin']."' AND idsenha = MD5('".$data['idsenha']."')");
		$this->db->limit(1);
		$query = $this->db->get();

		return ($query->num_rows() == 1) ? true : false;
	}

	// Read data from database to show data in admin page
	public function getUserData($idlogin) 
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where("idlogin LIKE ('".$idlogin ."')");
		$this->db->limit(1);
		$query = $this->db->get();

		return ($query->num_rows() == 1) ? $query->result() : false;
	}
	
	// Read data from database to show data in admin page
	public function getEnabledUser($cdusuario) 
	{
		$this->db->select('1');
		$this->db->from('usuario');
		$this->db->where("cdusuario = ".$cdusuario ." AND fgstatus = 1");
		$this->db->limit(1);
		$query = $this->db->get();

		return ($query->num_rows() == 1) ? true : false;
	}

}

?>