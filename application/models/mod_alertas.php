<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_alertas extends CI_Model {

	public function activos_andromeda_informacion_faltante($inter_id){
	
	$query = $this->db->query("SELECT * from consolidado where inter_id='$inter_id' 
								and conso_base_org='ACTIVO EN ANDROMEDA' 
								and (
									conso_subcontratista='' or conso_subcontratista IS NULL 
									or conso_nombre='' or conso_nombre IS NULL 
									or conso_lug_nac='' or conso_lug_nac IS NULL 
									or conso_cedula='' or conso_cedula IS NULL 
									or conso_ced_exp='' or conso_ced_exp IS NULL 
									or conso_cargo='' or conso_cargo IS NULL
									or conso_per_sol='' or conso_per_sol IS NULL
									or conso_tp_mobra='' or conso_tp_mobra IS NULL
									or conso_tp_contrato='' or conso_tp_contrato IS NULL
									or conso_base_org='' or conso_base_org IS NULL
									or conso_paso_rsc='' or conso_paso_rsc IS NULL
									or conso_sp='' or conso_sp IS NULL
									or conso_estado_and='' or conso_estado_and IS NULL
									or conso_estado_evid='' or conso_estado_evid IS NULL
									or conso_frente_trabajo='' or conso_frente_trabajo IS NULL
									or conso_campo='' or conso_campo IS NULL
									or conso_comunidad_rem='' or conso_comunidad_rem IS NULL
									) 
							  ");
		return $query->result();
}
 
 

 public function cedulas_repetidas($inter_id){
	
	$query = $this->db->query("SELECT * FROM consolidado WHERE inter_id='$inter_id' and conso_cedula IN (SELECT conso_cedula FROM consolidado GROUP BY conso_cedula HAVING count(conso_cedula) > 1) ORDER BY conso_cedula");
		return $query->result();
}




 
}

/* End of file mod_alertas.php */
/* Location: ./application/models/mod_alertas.php */