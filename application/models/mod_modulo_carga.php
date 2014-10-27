<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_modulo_carga extends CI_Model {
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}
	

	public function get_empresas(){
		$query = $this->db->get('empresa');
		return $query->result();
	}

    
	public function get_interventoria($emp_id){
		$query = $this->db->query("SELECT * FROM interventoria where emp_id='$emp_id'");
		return $query->result();
	}

    public function crear_interventoria($emp_id){
        $query = $this->db->query("SELECT MAX(inter_numero) as inter_numero FROM interventoria where emp_id='$emp_id'");

        $inter=$query->result();
        $numero=$inter[0]->inter_numero;

        $numero++;

        if($numero>9) $nombre="INTERV-".$numero; else $nombre="INTERV-0".$numero;

        $data = array('emp_id' => $emp_id, 'inter_numero' => $numero, 'inter_nombre' => $nombre);

        return $this->db->insert('interventoria', $data);
    }

	public function insertar_contratista($inter_id,$dato0,$dato1,$dato2,$dato3,$dato4,$dato5,$dato6,$dato7,$dato8,
                                        $dato9,$dato10,$dato11,$dato12,$dato13,$dato14,$dato15){

            $dato10=componer_fecha($dato10);
            $dato11=componer_fecha($dato11);

 
		$data = array( 
                'inter_id' => $inter_id,
                'con_cedula' => $dato0,
                'con_empleador' => $dato1,
                'con_nombre' => $dato2,
                'con_cedula2' => $dato3,
                'con_lug_nac' => $dato4,
                'con_ced_exp' => $dato5,
                'con_cargo' => $dato6,
                'con_per_sol' => $dato7,
                'con_tp_mobra' => $dato8,
                'con_tp_contrato' => $dato9,
                'con_fech_icontrato' => $dato10,
                'con_fech_fcontrato' => $dato11,
                'con_fren_trabajo' => $dato12,
                'con_campo' => $dato13,
                'con_rem_rsc' => $dato14,
                'con_sp' => $dato15
                );
      
        $this->db->insert('contratista',$data);
	}

        public function insertar_activos($inter_id,$dato0,$dato1,$dato2,$dato3,$dato4,$dato5,$dato6,$dato7,$dato8,$dato9,
                                        $dato10,$dato11,$dato12,$dato13,$dato14,$dato15){

                $dato11=componer_fecha($dato11);

                $data = array( 
                'inter_id' => $inter_id,
                'pact_nombre' => $dato0,
                'pact_cargo_pre' => $dato1,
                'pact_cedula' => $dato2,
                'pact_empresa' => $dato3,
                'pact_tp_relacion' => $dato4,
                'pact_rol_con' => $dato5,
                'pact_lug_nac' => $dato6,
                'pact_org_cand' => $dato7,
                'pact_org_rsc' => $dato8,
                'pact_zona_inf' => $dato9,
                'pact_desc_cargo' => $dato10,
                'pact_fech_ingreso' => $dato11,
                'pact_tp_contratacion' => $dato12,
                'pact_estado_pre' => $dato13,
                'pact_nom_cargo' => $dato14,
                'pact_tp_mobra' => $dato15
                );
      
        $this->db->insert('personal_activo',$data);
        }

        public function insertar_remitidos($dato1,$dato2,$dato3,$dato4,$dato5,$dato6,$dato7,$dato8,$dato9,
                                        $dato10,$dato11,$dato12,$dato13,$dato14,$dato15,$dato16,$dato17,
                                        $dato18,$dato19,$dato20,$dato21,$dato22,$dato23,$dato24){

            $dato16=componer_fecha($dato16);
            $dato17=componer_fecha($dato17);
            $dato18=componer_fecha($dato18);
            $dato19=componer_fecha($dato19);
            $dato20=componer_fecha($dato20);

                $data = array( 
                'inter_id' => $dato1,
                'prem_id_reg_per' => $dato2,
                'prem_reg_cargo_sol' => $dato3,
                'prem_id_sol' => $dato4,
                'prem_contrato' => $dato5,
                'prem_contratista' => $dato6,
                'prem_cargo_sol' => $dato7,
                'prem_tp_mobra' => $dato8,
                'prem_nombre' => $dato9,
                'prem_estado_cand' => $dato10,
                'prem_pro_por' => $dato11,
                'prem_rev_seguridad' => $dato12,
                'prem_causa_no_vinc' => $dato13,
                'prem_dias_rsc_dec' => $dato14,
                'prem_dias_conf_carga' => $dato15,
                'prem_fech_contra' => $dato16,
                'prem_fech_crea' => $dato17,
                'prem_fech_envio' => $dato18,
                'prem_fech_mod' => $dato19,
                'prem_fech_revision' => $dato20,
                'prem_org_cand' => $dato21,
                'prem_det_adc' => $dato22,
                'prem_obser' => $dato23,
                'prem_cedula' => $dato24
                );
      
        $this->db->insert('personal_remitido',$data);
        }

        public function cruzar_informacion($emp_id, $inter_id){

                
                //esta consulta verifica que la dependencia tenga informacion si no tiene le envia 
                //un mensaje al usuario confirmandole que la dependencia no tiene informacion que por favor la cargue
                $query = $this->db->query("SELECT * FROM personal_activo where inter_id='$inter_id'"); 
                $hay_act=$this->db->affected_rows(); 

                $query = $this->db->query("SELECT * FROM contratista where inter_id='$inter_id'"); 
                $hay_con=$this->db->affected_rows(); 

                if($hay_con==0 && $hay_act==0){
                        $resultado=false;
                }else{
                //estas consulta verifica que la tabla contratista y personas activo ya tengan la informacion cruzada
                $query = $this->db->query("SELECT * FROM contratista WHERE con_act_and is null and inter_id='$inter_id'"); 
                $cant_con=(int)$this->db->affected_rows(); 

                $query = $this->db->query("SELECT * FROM personal_activo WHERE pact_lista_contratista is null and inter_id='$inter_id'"); 
                $cant_act=(int)$this->db->affected_rows(); 
                
                if($cant_con===0 && $cant_act===0){
                
                $resultado=-1;
                        
                }else{                          
                        
                        $query = $this->db->query("UPDATE contratista set con_act_and = 'ACTIVO EN ANDROMEDA' 
                                        where exists (select * from personal_activo where pact_cedula like con_cedula and inter_id='$inter_id') 
                                        and inter_id='$inter_id'"); 
                        $activos_and=$this->db->affected_rows(); 


                        $query = $this->db->query("UPDATE contratista set con_act_and = 'NO ACTIVO EN ANDROMEDA' 
                                                where not exists (select * from personal_activo where pact_cedula like con_cedula and inter_id='$inter_id') 
                                                and inter_id='$inter_id'"); 
                        $no_activos_and=$this->db->affected_rows(); 


                        $query = $this->db->query("UPDATE personal_activo SET pact_lista_contratista = 'ACTIVO EN ANDROMEDA'
                                                WHERE EXISTS (SELECT * FROM contratista where con_cedula  like pact_cedula and inter_id='$inter_id') 
                                                and inter_id='$inter_id'"); 
                        $activos_con=$this->db->affected_rows(); 


                        $query = $this->db->query("UPDATE personal_activo SET pact_lista_contratista = 'NO ACTIVO EN CONTRATISTA'
                                                WHERE NOT EXISTS (SELECT * FROM contratista where con_cedula  like pact_cedula and inter_id='$inter_id') 
                                                and inter_id='$inter_id'"); 
                        $no_activos_con=$this->db->affected_rows(); 


                        $resultado[0]=$activos_and;
                        $resultado[1]=$no_activos_and;
                        $resultado[2]=$activos_con;
                        $resultado[3]=$no_activos_con;

                }
                }

                return $resultado;        

        }

        public function verificar_si_se_debe_cargar_archivos($emp_id, $inter_id){

            $query = $this->db->query("select * from contratista natural join interventoria where inter_id='$inter_id'"); 
            $existe[0]=$this->db->affected_rows();

            $query = $this->db->query("select * from personal_activo natural join interventoria where inter_id='$inter_id'"); 
            $existe[1]=$this->db->affected_rows();

            $query = $this->db->query("select * from personal_remitido natural join interventoria where inter_id='$inter_id'"); 
            $existe[2]=$this->db->affected_rows();

            $query = $this->db->query("SELECT * FROM contratista WHERE con_act_and is null and inter_id='$inter_id'"); 
            $existe[3]=$this->db->affected_rows(); 

            $query = $this->db->query("SELECT * FROM personal_activo WHERE pact_lista_contratista is null and inter_id='$inter_id'"); 
            $existe[4]=$this->db->affected_rows();

            

              return $existe;
        }


        public function crear_consolidado($inter_id){

        //Informacion del contratista----------------------------------------------------------------
            $query = $this->db->query("select * from contratista where inter_id='$inter_id'");
            $contratista=$query->result();

            foreach ($contratista as $key => $value) {

                $data = array( 
                'inter_id' => $inter_id,
                'conso_subcontratista' => $value->con_empleador,
                'conso_nombre' => $value->con_nombre,
                'conso_lug_nac' => $value->con_lug_nac,
                'conso_cedula' => $value->con_cedula,
                'conso_ced_exp' => $value->con_ced_exp,
                'conso_cargo' => $value->con_cargo,
                'conso_per_sol' => $value->con_per_sol,
                'conso_tp_mobra' => $value->con_tp_mobra,
                'conso_tp_contrato' => $value->con_tp_contrato,
                'conso_base_org' => $value->con_act_and,
                'conso_paso_rsc' => $value->con_rem_rsc,
                'conso_sp' => $value->con_sp,
                'conso_fecha_inicio_cont' => $value->con_fech_icontrato,
                'conso_fecha_final_cont' => $value->con_fech_fcontrato,
                'conso_frente_trabajo' => $value->con_fren_trabajo,
                'conso_campo' => $value->con_campo,
                'conso_comunidad_rem' => NULL
                );

                $this->db->insert('consolidado',$data);
            }
        //Fin informacion del contratista----------------------------------------------------------------


        //Informacion del personal activo----------------------------------------------------------------
            $query = $this->db->query("SELECT * FROM personal_activo WHERE pact_lista_contratista = 'NO ACTIVO EN CONTRATISTA' AND inter_id='$inter_id'");
            $per_activo=$query->result();

            foreach ($per_activo as $key => $value) {

                $data = array( 
                'inter_id' => $inter_id,
                'conso_subcontratista' => $value->pact_empresa,
                'conso_nombre' => $value->pact_nombre,
                'conso_lug_nac' => $value->pact_lug_nac,
                'conso_cedula' => $value->pact_cedula,
                'conso_cargo' => $value->pact_cargo_pre,
                'conso_tp_mobra' => $value->pact_tp_mobra,
                'conso_tp_contrato' => $value->pact_tp_contratacion,
                'conso_base_org' => $value->pact_lista_contratista
                );

                $this->db->insert('consolidado',$data);
            }
        //Fin informacion del PERSONAL ACTIVO----------------------------------------------------------------


        //Informacion del PERSONAL REMITIDO----------------------------------------------------------------
            $query = $this->db->query("select * from personal_remitido where (prem_estado_cand='En análisis' or prem_estado_cand='no vinculado') and inter_id='$inter_id'");
            $per_remitido=$query->result();

            foreach ($per_remitido as $key => $value) {

                $data = array( 
                'inter_id' => $inter_id,
                'conso_subcontratista' => $value->prem_contratista,
                'conso_nombre' => $value->prem_nombre,
                'conso_fecha_crea_per' => $value->prem_fech_crea,
                'conso_cedula' => $value->prem_cedula,
                'conso_cargo' => $value->prem_cargo_sol,
                'conso_tp_mobra' => $value->prem_tp_mobra,
                'conso_base_org' => 'NO ACTIVO EN CONTRATISTA'
                );

                $this->db->insert('consolidado',$data);
            }
        //Fin informacion del contratista----------------------------------------------------------------
        }

        
        
}

/* End of file mod_modulo_carga.php */
/* Location: ./application/models/mod_modulo_carga.php */