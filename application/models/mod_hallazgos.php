<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_hallazgos extends CI_Model {

	
public function monc_no_paso_por_rsc($inter_id){
	
	$query = $this->db->query("select * from consolidado where inter_id='$inter_id' and conso_tp_mobra='MONC' and conso_paso_rsc='NO'");
		return $query->result();
}

public function moc_no_paso_por_rsc($inter_id){
	
	$query = $this->db->query("select * from consolidado where inter_id='$inter_id' and conso_tp_mobra='MOC' and conso_paso_rsc='NO'");
		return $query->result();
}


public function top_20_cargos($inter_id){
	
	$query = $this->db->query("SELECT conso_cargo, count(conso_cargo) AS suma_cargo FROM consolidado where inter_id='$inter_id' GROUP BY conso_cargo ORDER BY suma_cargo desc limit 20");
		return $query->result();
}

public function veredas_remitieron_monc_que_pasaron_rsc($inter_id){
	
	$query = $this->db->query("SELECT conso_comunidad_rem, COUNT(conso_comunidad_rem) AS total from consolidado where conso_comunidad_rem <> '' and conso_comunidad_rem <> 'NULL' and  conso_tp_mobra='MONC' and conso_paso_rsc='SI' and inter_id='$inter_id' GROUP BY conso_comunidad_rem ORDER BY total desc");
		return $query->result();
}


public function empleados_moc_sin_rsc($inter_id){
	
	$query = $this->db->query("SELECT * from consolidado where conso_tp_mobra='MOC' and conso_paso_rsc='NO' and inter_id='$inter_id'");
		return $query->result();
}

 


}

/* End of file mod_hallazgos.php */
/* Location: ./application/models/mod_hallazgos.php */