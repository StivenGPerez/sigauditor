<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_graficas extends CI_Model {

public function veredas_remitieron_monc_que_pasaron_rsc($inter_id){
	$query = $this->db->query("SELECT conso_comunidad_rem, COUNT(conso_comunidad_rem) AS total from consolidado where conso_comunidad_rem <> '' and conso_comunidad_rem <> 'NULL' and  conso_tp_mobra='MONC' and conso_paso_rsc='SI' and inter_id='$inter_id' GROUP BY conso_comunidad_rem ORDER BY total desc");
		return $query->result();
}



public function distri_personal_activo($inter_id){
	$query = $this->db->query("SELECT conso_subcontratista, COUNT(conso_subcontratista) AS total from consolidado where conso_estado_evid='NO LIQUIDADO' and inter_id='$inter_id' GROUP BY conso_subcontratista ORDER BY total desc");
		return $query->result();
}


public function top_20_cargos_moc($inter_id){
	$query = $this->db->query("SELECT conso_cargo, count(conso_cargo) AS suma_cargo FROM consolidado where conso_tp_mobra='MONC' and inter_id='$inter_id' GROUP BY conso_cargo ORDER BY suma_cargo desc limit 20");
		return $query->result();
}

public function distri_mobra_calificada($inter_id){
	$query = $this->db->query("SELECT conso_paso_rsc, count(conso_paso_rsc) AS suma_paso_rsc FROM consolidado where conso_tp_mobra='MOC' and conso_estado_evid='NO LIQUIDADO' and inter_id='$inter_id' GROUP BY conso_paso_rsc ORDER BY suma_paso_rsc desc");
		return $query->result();
}

}

/* End of file mod_graficas.php */
/* Location: ./application/models/mod_graficas.php */