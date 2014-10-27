<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_empresa extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function crearempresa($nit,$nombre,$direccion,$telefono,$usuario)
	{
		

		$crearempresas = array(
			'emp_nit' => $nit,
			'emp_nombre' => $nombre,
			'emp_dir' => $direccion,
			'emp_tel' => $telefono,
			'usu_id' => $usuario);

		return $this->db->insert('empresa', $crearempresas);	

	}

	public function lista_empresas()
	{
		$this->db->order_by('emp_nombre','asc');
		$list_sql = $this->db->get('empresa');
		return $list_sql->result();
	}
	
	public function consul_empresas($buscar)
	{

		$busdata = $this->db->query("select * from empresa where emp_id='$buscar'");
		return $busdata->result();
		
	}

	public function update_empresa($ajax_nit, $ajax_nombre, $ajax_direccion, $ajax_telefono, $ajax_id)
	{
		$data = array('emp_nit' => $ajax_nit,
					  'emp_nombre' => $ajax_nombre,
					  'emp_dir' => $ajax_direccion,
					  'emp_tel' => $ajax_telefono );
		
		$this->db->where('emp_id', $ajax_id);
		return $this->db->update('empresa', $data);
	}
}

/*	public function crear_empresa_subempresa($nit,$nombre,$direccion,$telefono,$usuario)
	{
		$fecha = date('Y/m/d');

		$insertempresa = array(
			'emp_nit' => $nit,
			'emp_nombre' => $nombre,
			'emp_dir' => $direccion,
			'emp_tel' => $telefono,
			'usu_id' => $usuario,
			'emp_fec_crea' => $fecha);
		$this->db->insert('empresa', $insertempresa);

		$sql_id_emp = $this->db->query("select emp_id from empresa where emp_nit = '$nit'");
		$id_emp_array = $sql_id_emp->result();

		$insertsubemp = array(
			'semp_nit' => $nit,
			'semp_nombre' => $nombre,
			'semp_dir' => $direccion,
			'semp_tel' => $telefono,
			'emp_id' => $id_emp_array[0]->emp_id,
			'semp_fec_crea' => $fecha);

		$this->db->insert('subempresa', $insertsubemp);
	}

	public function crear_subempresa($snit,$snombre,$sdireccion,$stelefono,$sempresa)
	{
		$fecha = date('Y/m/d');

		$insertsubemp = array(
			'semp_nit' => $snit,
			'semp_nombre' => $snombre,
			'semp_dir' => $sdireccion,
			'semp_tel' => $stelefono,
			'emp_id' => $sempresa,
			'semp_fec_crea' => $fecha);

		$this->db->insert('subempresa', $insertsubemp);
	}	
*/

/* End of file mod_empresa.php */
/* Location: ./application/models/mod_empresa.php */