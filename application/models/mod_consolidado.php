<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_consolidado extends CI_Model {
 

	 public function get_consolidado($inter_id){
	 	$query = $this->db->query("SELECT * FROM consolidado where inter_id='$inter_id'");
		return $query->result();
	 }

	
  
}

/* End of file mod_consolidado.php */
/* Location: ./application/models/mod_consolidado.php */