<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_municipio extends CI_Model {

	public function lista_municipios()
	{
		$this->db->select('mun_id, mun_nombre');
		//$this->db->order_by('mun_nombre','asc');
		$list_munic = $this->db->get('municipios');
		return $list_munic->result();
	}

}

/* End of file mod_municipio.php */
/* Location: ./application/models/mod_municipio.php */