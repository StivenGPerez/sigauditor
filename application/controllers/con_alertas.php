<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_alertas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_modulo_carga');
		$this->load->model('mod_interventoria');
		$this->load->model('mod_alertas');
	} 

	public function index(){
        $data['empresas']=$this->mod_modulo_carga->get_empresas();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('alertas/alertas',$data);
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

    public function alertas(){
		$inter_id=$this->input->post('inter_id');
		
		$data['alerta1']=$this->mod_alertas->activos_andromeda_informacion_faltante($inter_id);
		$data['alerta2']=$this->mod_alertas->cedulas_repetidas($inter_id);
		
	

		$html=$this->load->view('alertas/alertas_ajax',$data,'true');
		echo $html;
	}


	public function prueba(){
		$this->load->view('prueba', '', FALSE);
	}
}

/* End of file con_alertas.php */
/* Location: ./application/controllers/con_alertas.php */