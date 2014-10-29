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


	public function crud_actualizar($conso_id, $nombre, $lug_nac, $cedula, $ced_exp, $cargo, $per_sol,
                                    $tp_mobra, $tp_contrato, $base_org, $paso_rsc, $sp, $frente_trabajo/*, $campo, $comunidad,
                                    $fecha_crea, $fecha_ini_cont, $fecha_fin_cont*/){

		$data = array(
				'conso_nombre' => $nombre, 'conso_lug_nac' => $lug_nac, 
				'conso_cedula' => $cedula, 'conso_ced_exp' => $ced_exp,
				'conso_cargo' => $cargo, 'conso_per_sol' => $per_sol,
				'conso_tp_mobra' => $tp_mobra, 'conso_tp_contrato' => $tp_contrato,
				'conso_base_org' => $base_org, 'conso_paso_rsc' => $paso_rsc,
				'conso_sp' => $sp, 'conso_frente_trabajo' => $frente_trabajo/*,
				'conso_campo' => $campo, 'conso_comunidad' => $comunidad,
				'conso_fecha_crea' => $fecha_crea, 'conso_fecha_inicio_cont' => $fecha_ini_cont,
				'conso_fecha_final_cont' => $fecha_fin_cont*/
		);

		$this->db->where('conso_id', $conso_id);
        return $this->db->update('consolidado', $data);

		if ($this->db->affected_rows() > 0)
            return TRUE;
        else
        	return FALSE;


	}

  
}

/* End of file mod_consolidado.php */
/* Location: ./application/models/mod_consolidado.php */