<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_formulario extends CI_Model {
	
	public function lista_contratos()
	{
		
		$this->db->order_by('tp_contrato_nombre','asc');
		$list_contratos = $this->db->get('tp_contrato');
		return $list_contratos->result();
	}
					
	public function validar_empleado($val_con_cedula)
	{
		$this->db->query("SELECT con_cedula FROM contratista_normalizado WHERE con_cedula = '$val_con_cedula'");

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function insertar_empleado($con_empleador, $con_nombre, $con_cedula, $con_ced_exp,
									  $con_lug_nac, $con_cargo, $con_per_sol, $con_tp_mobra,
									  $con_tp_contrato, $con_fech_icontrato, $con_fech_fcontrato,
									  $con_fren_trabajo, $con_campo, $usuario)
	{
			$crearempleado = array(
				'con_empleador' => $con_empleador,
				'con_nombre' => $con_nombre,
				'con_cedula' => $con_cedula,
				'con_ced_exp' => $con_ced_exp,
				'con_lug_nac' => $con_lug_nac,
				'con_cargo' => $con_cargo,
				'con_per_sol' => $con_per_sol,						
				'con_tp_mobra' => $con_tp_mobra,
				'con_tp_contrato' => $con_tp_contrato,
				'con_fech_icontrato' => $con_fech_icontrato,
				'con_fech_fcontrato' => $con_fech_fcontrato,						
				'con_fren_trabajo' => $con_fren_trabajo,
				'con_campo' => $con_campo,
				'con_usuario' => $usuario);
			
			$this->db->insert('contratista_normalizado', $crearempleado);			

			if($this->db->affected_rows() > 0)
				return true;
			else
				return false;
	}

//Importar desde Excel con libreria de PHPExcel
	public function importarexcel_contr($data6, $data2, $data3, $data4, $data7, $data11, $data13, 
										$data14, $data9, $data15, $data16, $data17, $data18, $usuario)
	{
		$data15=componer_fecha($data15);	
		$data16=componer_fecha($data16);
	  
	  $arr_excel = array(

	      'con_cedula'  =>  $data6,
	      'con_empleador' =>  $data2,
	      'con_nombre'  =>  $data3,
	      'con_lug_nac'  =>  $data4,
	      'con_ced_exp'  =>  $data7,
	      'con_cargo'  =>  $data11,
	      'con_per_sol'  =>  $data13,
	      'con_tp_mobra'  =>  $data14,
	      'con_tp_contrato'  =>  $data9,
	      'con_fech_icontrato'  =>  $data15,
	      'con_fech_fcontrato'  =>  $data16,
	      'con_fren_trabajo'  =>  $data17,
	      'con_campo'  =>  $data18,
	      'con_usuario' => $usuario); 

		return $this->db->insert('contratista_normalizado',$arr_excel);
	}
}

/* End of file mod_formulario.php */
/* Location: ./application/models/mod_formulario.php */