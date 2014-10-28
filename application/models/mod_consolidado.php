<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_consolidado extends CI_Model {
 

	 public function get_consolidado($inter_id){
	 	$query = $this->db->query("SELECT * FROM consolidado where inter_id='$inter_id'");
		return $query->result();
	 }

	

	public function crud_buscar($conso_id){
		$query = $this->db->query("SELECT * FROM consolidado where conso_id='$conso_id'");
		if ($this->db->affected_rows() > 0)
			return $query->result();
        else
        	return FALSE;
	}


	public function crud_eliminar($conso_id){
		$this->db->delete('consolidado', array('conso_id' => $conso_id));
		if ($this->db->affected_rows() > 0)
            return TRUE;
        else
        	return FALSE;
	}
  
}

/* End of file mod_consolidado.php */
/* Location: ./application/models/mod_consolidado.php */