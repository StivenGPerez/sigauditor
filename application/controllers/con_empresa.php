<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_empresa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_empresa');
	}

	public function index()
	{
		$data['empresa'] = $this->mod_empresa->lista_empresas();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('empresa/crear_empresa', $data);
		$this->load->view('footer');		
	}

	function crear_empresa()
	{
		$nit = $this->input->post('emp_nit');
		$nombre = $this->input->post('emp_nombre');
		$direccion = $this->input->post('emp_dir');
		$telefono = $this->input->post('emp_tel');

		//optiene el identificador del usuario para saber quien registro la empresa
		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['usu_id'];

		$data['crearempresa'] = $this->mod_empresa->crearempresa($nit, $nombre, $direccion, $telefono, $usuario);
		$data['empresa'] = $this->mod_empresa->lista_empresas();

		$vista_nueva = $this->load->view('empresa/crear_empresa',$data, true);
		echo $vista_nueva;
	}

	function buscarempresa()
	{
		$buscar = $this->input->post('emp_id');

		$data['consulta'] = $this->mod_empresa->consul_empresas($buscar);
		$data['empresa'] = $this->mod_empresa->lista_empresas();

		$html = $this->load->view('empresa/crear_empresa_ajax', $data, true);
		echo $html;
	}	

		function update_emp()
	{
		$ajax_id = $this->input->post('emp_id_ajax');
		$ajax_nit = $this->input->post('emp_nit_ajax');
		$ajax_nombre = $this->input->post('emp_nombre_ajax');
		$ajax_direccion = $this->input->post('emp_dir_ajax');
		$ajax_telefono = $this->input->post('emp_tel_ajax');

		$this->mod_empresa->update_empresa($ajax_nit, $ajax_nombre, $ajax_direccion, $ajax_telefono, $ajax_id);

		$data['empresa'] = $this->mod_empresa->lista_empresas();
		
		$vista_nueva_s = $this->load->view('empresa/crear_empresa_ajax', $data, true);
		echo $vista_nueva_s;
	}
}







/*	function crear_subempresa()
	{
		$data['empresa'] = $this->mod_empresa->lista_empresas();
		$sempresa = $this->input->post('emp_id');
		$snit = $this->input->post('semp_nit');
		$snombre = $this->input->post('semp_nombre');
		$sdireccion = $this->input->post('semp_dir');
		$stelefono = $this->input->post('semp_tel');
		
		$this->mod_empresa->crear_subempresa($snit, $snombre, $sdireccion, $stelefono, $sempresa);

		$this->load->view('header');
		$this->load->view('empresa/crear_empresa',$data);
		$this->load->view('footer');			
	}

	function tablasubcontr()
	{
		$data['empresa'] = $this->mod_empresa->lista_empresas();

		$tabla2 = $this->load->view('empresa/scontratista', $data, true);
		echo $tabla2;
	}
*/


/* Funcion Crear Empresa y SubEmpresa
	function crear_empresa()
	{

		if($this->input->post('emp_nit') != 0)
		{
			
		$nit = $this->input->post('emp_nit');
		$nombre = $this->input->post('emp_nombre');
		$direccion = $this->input->post('emp_dir');
		$telefono = $this->input->post('emp_tel');
		$usuario = $this->input->post('usuario');
		//$check = $this->input->post('check');

			if ($check == true) 
			{
				$this->mod_empresa->crear_empresa_subempresa($nit, $nombre, $direccion, $telefono, $usuario);
				$this->mod_empresa->crear_empresa($nit, $nombre, $direccion, $telefono, $usuario);
			}
			else
			{
				$this->mod_empresa->crear_empresa($nit, $nombre, $direccion, $telefono, $usuario);	
			}
			
		}
		else
		{
			return null;
		}
		
		$result = $this->mod_empresa->crearempresa($nit, $nombre, $direccion, $telefono, $usuario);
			
			if ($result) $data ['resultado'] = "La empresa se registro con exito";
			else  $data ['resultado'] = "Error al registrar la empresa";
		
		$data['crearempresa'] = $this->mod_empresa->crearempresa();
		$data['empresa'] = $this->mod_empresa->lista_empresas();

		$this->load->view('header');
		$this->load->view('empresa/crear_empresa_ajax',$data);
		$this->load->view('footer'); 				
	}
*/

/* End of file con_empresa.php */
/* Location: ./application/controllers/con_empresa.php */