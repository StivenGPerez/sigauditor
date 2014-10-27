<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_interventoria extends CI_Model {

//optiene las interventorias de una empresa espesificas
public function get_interventoria($emp_id){
		$query = $this->db->query("SELECT * FROM interventoria where emp_id='$emp_id'");
		return $query->result();
	}
	

}

/* End of file mod_interventoria.php */
/* Location: ./application/models/mod_interventoria.php */