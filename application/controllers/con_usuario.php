<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_usuario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

  

	public function login(){
		$usuario= $this->input->post('usuario'); 
        $password= $this->input->post('password');

        $this->load->model('mod_usuario');
        $result=$this->mod_usuario->validar_usuario($usuario,$password);

        if($result){
     		$datos_session = array();
     		foreach($result as $row){
       			$datos_session = array(
         			'usu_id' => $row->usu_id,
         			'usu_nombre' => $row->usu_nombre,
         			'usu_apellido' => $row->usu_apellido,
         			'usu_email' => $row->usu_email,
       			);
     		}
     		$this->session->set_userdata('nueva_session', $datos_session);

     		$this->load->view('header');
     		$this->load->view('barra_informacion');
			$this->load->view('cuerpo_principal');
			$this->load->view('footer');

   		}else{
     		$this->load->view('header');
			$this->load->view('usuario/estado_login');
			$this->load->view('footer');
   		}

		
	}


	function logout(){
	   $this->session->unset_userdata('nueva_session');
	   session_destroy();
	   redirect('inicio/', 'refresh');
 	}



}

/* End of file con_usuario.php */
/* Location: ./application/controllers/con_usuario.php */