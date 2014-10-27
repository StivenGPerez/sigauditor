<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_graficas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_graficas');
		$this->load->model('mod_interventoria');
	}

	public function index(){
		$this->load->model('mod_modulo_carga');
        $data['empresas']=$this->mod_modulo_carga->get_empresas();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('graficas/graficas',$data);
		$this->load->view('footer');
	}


	public function selec_interventoria(){
        $emp_id=$this->input->post('emp_id');

        $interv=$this->mod_interventoria->get_interventoria($emp_id);

       echo "<select id='interventoria' name='interventoria' class='form-control' required='required'>";
       echo "<option value='-1' selected='selected'>Seleccione Interventoría</option>";
        foreach ($interv as $key => $value) {
            echo "<option value='".$value->inter_id."''>".$value->inter_nombre."   ".$value->inter_fecha."</option>";
        }
        echo "</select>";
    }


    public function veredas_rem(){
    	//echo "<script>alert('hola');</script>";


    	//$inter_id=$this->input->get_post('inter_id');

    	$inter_id=$this->input->get('inter_id');

		   	

		   	$data=$this->mod_graficas->veredas_remitieron_monc_que_pasaron_rsc($inter_id);

		   	$category = array();
	        $series1 = array();
	        	       
	        foreach ($data as $key => $value) {
	        	$category['data'][] = $value->conso_comunidad_rem;
	            $series1['data'][] = $value->total;
	            
	            
	        }

	        $result = array();
	        array_push($result,$category);
	        array_push($result,$series1);
	       
	        print json_encode($result, JSON_NUMERIC_CHECK);

    }


    public function distri_personal_activo(){
    	//echo "<script>alert('hola');</script>";


    	//$inter_id=$this->input->get_post('inter_id');

    	$inter_id=$this->input->get('inter_id');

		   	

		   	$data=$this->mod_graficas->distri_personal_activo($inter_id);

		   	//$category = array();
	        $series1 = array();
	        	       
	        foreach ($data as $key => $value) {
	        	//$category['data'][] = $value->conso_estado_evid;
	            $series1['data'][] = [$value->conso_subcontratista, $value->total];
	            
	            
	        }

	        $result = array();
	        //array_push($result,$category);
	        array_push($result,$series1);
	       
	        print json_encode($result, JSON_NUMERIC_CHECK);

    }



    public function top_20_cargos_moc(){
   
    	$inter_id=$this->input->get('inter_id');

		   	

		   	$data=$this->mod_graficas->top_20_cargos_moc($inter_id);

		   	$category = array();
	        $series1 = array();
	        	       
	        foreach ($data as $key => $value) {
	        	$category['data'][] = $value->conso_cargo;
	            $series1['data'][] = $value->suma_cargo;
	            
	            
	        }

	        $result = array();
	        array_push($result,$category);
	        array_push($result,$series1);
	       
	        print json_encode($result, JSON_NUMERIC_CHECK);

    }



        public function distri_mobra_calificada(){
    	//echo "<script>alert('hola');</script>";


    	//$inter_id=$this->input->get_post('inter_id');

    	$inter_id=$this->input->get('inter_id');

		   	

		   	$data=$this->mod_graficas->distri_mobra_calificada($inter_id);

		   	//$category = array();
	        $series1 = array();
	        	       
	        foreach ($data as $key => $value) {
	        	//$category['data'][] = $value->conso_estado_evid;
	            $series1['data'][] = [$value->conso_paso_rsc, $value->suma_paso_rsc];
	            
	            
	        }

	        $result = array();
	        //array_push($result,$category);
	        array_push($result,$series1);
	       
	        print json_encode($result, JSON_NUMERIC_CHECK);

    }


    
 
}

/* End of file con_graficas.php */
/* Location: ./application/controllers/con_graficas.php */