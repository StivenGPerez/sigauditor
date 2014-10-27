<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_alertas extends CI_Model {

	public function activos_andromeda_informacion_faltante($inter_id){
	
	$query = $this->db->query("SELECT * from consolidado where inter_id='$inter_id' 
								and conso_base_org='ACTIVO EN ANDROMEDA' 
								and (
									conso_lug_nac='' or conso_lug_nac IS NULL 
									or conso_ced_exp='' or conso_ced_exp IS NULL 
									or conso_cargo='' or conso_cargo IS NULL
									or conso_frente_trabajo='' or conso_frente_trabajo IS NULL
									or conso_campo='' or conso_campo IS NULL
									or conso_tp_contrato='' or conso_tp_contrato IS NULL
									) 
							  ");
		return $query->result();
}

}

/* End of file mod_alertas.php */
/* Location: ./application/models/mod_alertas.php */