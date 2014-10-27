<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_formulario extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function lista_empresas()
	{
		$this->db->order_by('emp_nombre','asc');
		$list_sql = $this->db->get('empresa');
		return $list_sql->result();
	}	
	
	public function lista_municipios()
	{
		$this->db->order_by('mun_nombre','asc');
		$list_munic = $this->db->get('municipios');
		return $list_munic->result();
	}

}

/* End of file mod_formulario.php */
/* Location: ./application/models/mod_formulario.php */