<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_formulario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_formulario');
	}

	public function index()
	{
		$data['empresa'] = $this->mod_formulario->lista_empresas();
		$data['municipios'] = $this->mod_formulario->lista_municipios();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('formulario/formulario', $data);
		$this->load->view('footer');		
	}

	function ingreso_datos()
	{
		$this->load->view('header');
		$this->load->view('formulario/formulario');
		$this->load->view('footer'); 	
	}	
}

/* End of file con_formulario.php */
/* Location: ./application/controllers/con_formulario.php */