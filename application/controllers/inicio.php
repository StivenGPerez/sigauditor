<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('usuario/cuerpo_login');
		$this->load->view('footer');
	}

	public function principal(){
		$this->load->view('header');
     	$this->load->view('barra_informacion');
		$this->load->view('cuerpo_principal');
		$this->load->view('footer');
	}


}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */