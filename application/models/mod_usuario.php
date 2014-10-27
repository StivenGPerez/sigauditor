<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_usuario extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


	public function validar_usuario($usuario,$password){

		$consulta = $this->db->get_where('usuario', array('usu_usuario' => $usuario, 'usu_password' => $password));

		if($consulta -> num_rows() == 1){
		     return $consulta->result();
		}else{
		     return false;
		}

	}

	

}

/* End of file mod_usuario.php */
/* Location: ./application/models/mod_usuario.php */