<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_hallazgos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_hallazgos');
		$this->load->model('mod_interventoria');
	}

	public function index(){

		$this->load->model('mod_modulo_carga');
        $data['empresas']=$this->mod_modulo_carga->get_empresas();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('hallazgos/hallazgos',$data);
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


	public function hallazgos(){
		$inter_id=$this->input->post('inter_id');
		//echo "hola";
		$data['hallazgo1']=$this->mod_hallazgos->monc_no_paso_por_rsc($inter_id);
		$data['hallazgo2']=$this->mod_hallazgos->moc_no_paso_por_rsc($inter_id);
		//$data['hallazgo3']=$this->mod_hallazgos->monc_si_paso_por_rsc_origen_vacio($emp_id);
		//$data['hallazgo4']=$this->mod_hallazgos->activos_andromeda_informacion_faltante($emp_id);
		$data['hallazgo5']=$this->mod_hallazgos->top_20_cargos($inter_id);
		$data['hallazgo6']=$this->mod_hallazgos->veredas_remitieron_monc_que_pasaron_rsc($inter_id);

		$html=$this->load->view('hallazgos/hallazgos_ajax',$data,'true');
		echo $html;
	}

}

/* End of file con_hallazgos.php */
/* Location: ./application/controllers/con_hallazgos.php */