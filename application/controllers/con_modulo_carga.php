<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_modulo_carga extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mod_modulo_carga');
        $this->load->model('mod_interventoria');
	}  

	public function index(){
		$data['empresas']=$this->mod_modulo_carga->get_empresas();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('cargar_archivos/cargar_archivos',$data);
		$this->load->view('footer');
	}



  public function carga(){
    $emp_id=$this->input->post('emp_id');
    $inter_id=$this->input->post('inter_id');

    $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($emp_id, $inter_id);

    $data['can_con']=$existe[0];
    $data['can_act']=$existe[1];
    $data['can_rem']=$existe[2];
    $data['rel_con']=$existe[3];
    $data['rel_act']=$existe[4];

    $html=$this->load->view('cargar_archivos/cargar_archivos_ajax',$data, true);
    echo $html;
    
  }

    //desabilitado por que no se tuvo en cuenta el tema de subempresa como valor independiente
	public function selec_interventoria(){
		$emp_id=$this->input->post('emp_id');

		$interv=$this->mod_interventoria->get_interventoria($emp_id);

	   echo "<select id='interventoria' name='interventoria' class='form-control' onChange='verificar_si_debe_cargar();'>";
	   echo "<option value='-1' selected>Seleccione..</option>";
		foreach ($interv as $key => $value) {
			echo "<option value='".$value->inter_id."''>".$value->inter_nombre."   ".$value->inter_fecha."</option>";
		}
        echo "</select>";
	}


    public function crear_interventoria(){
        $emp_id=$this->input->post('emp_id');

        $res=$this->mod_modulo_carga->crear_interventoria($emp_id);

        if($res){
            $interv=$this->mod_modulo_carga->get_interventoria($emp_id);

            echo "<select id='interventoria' name='interventoria' class='form-control' onChange='verificar_si_debe_cargar();'>";
            echo "<option value='-1' selected>Seleccione..</option>";
            foreach ($interv as $key => $value) {
                echo "<option value='".$value->inter_id."''>".$value->inter_nombre."   ".$value->inter_fecha."</option>";
            }
            echo "</select>";
        }
    }
 
	public function cargar_contratista_ajax(){
        
        $nom_empresa=$this->input->post('empresa_con');
        $empresa_id=$this->input->post('empresa_con_id');

        $inter_id=$this->input->post('inter_id');
        $inter_nom=$this->input->post('inter_nom');


        $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($empresa_id, $inter_id);

        if ($existe[0]!=0) {
            $resultado="La empresa ".strtoupper($nom_empresa)." ya tiene la información de contratista guardada";
        }else{
        
            $fname = $_FILES['ruta_con']['name']; //captura el archivo guardado en memoria

            //extrae la extencion del archivo para verificar si es un archivo .csv
            $chk_ext = explode(".",$fname);
            $cont=0;
            if(strtolower(end($chk_ext)) == "csv"){ //extrae la exten
                //si es correcto, entonces damos permisos de lectura para subir
                $filename = $_FILES['ruta_con']['tmp_name'];
                $handle = utf8_fopen_read($filename, "r");
        	
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE){

                    if(strpos(strtolower($data[2]), 'nomb')===false and strpos(strtolower($data[6]), 'carg')===false){
                      //Insertamos los datos con los valores... 	
                 	  $this->mod_modulo_carga->insertar_contratista($inter_id,$data[0],$data[1],$data[2],$data[3],
                        $data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],
                        $data[14],$data[15]);
          			  $cont++;
                    }
                }

                //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
                fclose($handle);
                $resultado="Importación de contratista exitosa! ".$cont." Registros ingresados";
            }else{
                //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             //ver si esta separado por " , "
                $resultado="Archivo invalido!";
            }
        }

        $data['empresas']=$this->mod_modulo_carga->get_empresas();
        $data['resultado']=$resultado;

        $data['nom_empresa']=$nom_empresa;
        $data['empresa_id']=$empresa_id;

        $data['inter_id']=$inter_id;
        $data['inter_nom']=$inter_nom;

        $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($empresa_id, $inter_id);

        $data['can_con']=$existe[0];
        $data['can_act']=$existe[1];
        $data['can_rem']=$existe[2];
        $data['rel_con']=$existe[3];
        $data['rel_act']=$existe[4];

        $this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('cargar_archivos/cargar_archivos',$data);
		$this->load->view('footer');
	} 

	public function cargar_activos_ajax(){
       
        $nom_empresa=$this->input->post('empresa_act');
        $empresa_id=$this->input->post('empresa_act_id');

        $inter_id=$this->input->post('inter_id_act');
        $inter_nom=$this->input->post('inter_nom_act');

         $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($empresa_id, $inter_id);

        if ($existe[1]!=0) {
            $resultado="La empresa ".strtoupper($nom_empresa)." ya tiene su información personal activo guardada";
        }else{

            $fname = $_FILES['ruta_act']['name']; //captura la informacion del archivo
            $chk_ext = explode(".",$fname); //extrae la extencion del archivo
        
            if(strtolower(end($chk_ext)) == "csv"){
                //si es correcto, entonces damos permisos de lectura para subir
                $filename = $_FILES['ruta_act']['tmp_name'];
                $handle = utf8_fopen_read($filename, "r");
        	
        	   $cont=0;
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE){
                    if(strpos($data[0], 'Nomb')===false and strpos($data[3], 'Empre')===false){
                       //Insertamos los datos con los valores... 	
                 	  $this->mod_modulo_carga->insertar_activos($inter_id,$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15]);
          			  $cont++;
                    }
                }

                fclose($handle);  //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
                $resultado="Importación de Personar Activo exitosa! ".$cont." Registros ingresados";
            }else{
                //si aparece esto es posible que el archivo no tenga el formato adecuado, 
                //inclusive cuando es cvs, revisarlo para ver si esta separado por " , "
                $resultado="Archivo invalido!";
            }
        }

        $data['empresas']=$this->mod_modulo_carga->get_empresas();
        $data['resultado']=$resultado;

        $data['nom_empresa']=$nom_empresa;
        $data['empresa_id']=$empresa_id;

        $data['inter_id']=$inter_id;
        $data['inter_nom']=$inter_nom;

        $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($empresa_id, $inter_id);

        $data['can_con']=$existe[0];
        $data['can_act']=$existe[1];
        $data['can_rem']=$existe[2];
        $data['rel_con']=$existe[3];
        $data['rel_act']=$existe[4];

        $this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('cargar_archivos/cargar_archivos',$data);
		$this->load->view('footer');
	}

    public function cargar_remitidos_ajax(){
        
        $nom_empresa=$this->input->post('empresa_rem');
        $empresa_id=$this->input->post('empresa_rem_id');

        $inter_id=$this->input->post('inter_id_rem');
        $inter_nom=$this->input->post('inter_nom_rem');

        $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($empresa_id, $inter_id);

        if ($existe[2]!=0) {
            $resultado="La empresa ".strtoupper($nom_empresa)." ya tiene la información personal remitido guardada";
        }else{

            $fname = $_FILES['ruta_rem']['name'];

            $chk_ext = explode(".",$fname);
        
            if(strtolower(end($chk_ext)) == "csv"){
                //si es correcto, entonces damos permisos de lectura para subir
                $filename = $_FILES['ruta_rem']['tmp_name'];
                //abre el archivo aplicandole formato UTF-8 para la utilizacion de comas y acentos
                $handle = utf8_fopen_read($filename, "r"); 
            
                $cont=0;
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE){
                    if(strpos($data[0], 'regi')===false and strpos($data[3], 'contr')===false){
                    //Insertamos los datos con los valores...    
                    $this->mod_modulo_carga->insertar_remitidos($inter_id,$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],
                                                            $data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],
                                                            $data[15],$data[16],$data[17],$data[18],$data[19],$data[20],$data[21],$data[22]);
                    $cont++;
                    }
                }

                fclose($handle); //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             
                $resultado="Importación de Personal Remitido exitosa! ".$cont." Registros ingresados";
            }else{
                //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
                //ver si esta separado por " , "
                $resultado="Archivo invalido!";
            }
        }

        $data['empresas']=$this->mod_modulo_carga->get_empresas();
        $data['resultado']=$resultado;

        $data['nom_empresa']=$nom_empresa;
        $data['empresa_id']=$empresa_id;

        $data['inter_id']=$inter_id;
        $data['inter_nom']=$inter_nom;

        $existe=$this->mod_modulo_carga->verificar_si_se_debe_cargar_archivos($empresa_id, $inter_id);

        $data['can_con']=$existe[0];
        $data['can_act']=$existe[1];
        $data['can_rem']=$existe[2];
        $data['rel_con']=$existe[3];
        $data['rel_act']=$existe[4];

        $this->load->view('header');
        $this->load->view('barra_informacion');
        $this->load->view('cargar_archivos/cargar_archivos',$data);
        $this->load->view('footer');
    }

    public function cruzar_informacion(){
        $empresa_id = $this->input->post('emp_id');
        $empresa_nom = $this->input->post('emp_nom');

        $inter_id = $this->input->post('inter_id');
        $inter_nom = $this->input->post('inter_nom');
        
        $resultado=$this->mod_modulo_carga->cruzar_informacion($empresa_id, $inter_id);
        if($resultado==FALSE){
            echo "La empresa <strong>".strtoupper($empresa_nom)."</strong> no tiene información cargada para relacionar";
        }else{

            if($resultado===-1){
                echo "La información de la empresa <strong>".strtoupper($empresa_nom)."</strong> ya fue relacionada";
            }else{
                $this->mod_modulo_carga->crear_consolidado($inter_id);
                echo "<table align='center' class='table table table-striped'>";
                echo "<caption><strong>$empresa_nom INTERVENTORIA $inter_nom</strong></caption>";
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td align='center'><strong>Relación CONTRATISTA – PERSONAL ACTIVO – PERSONAL REMITIDO exitosa, CONSOLIDADO CREADO.</strong></td>";
                    echo "</tbody>";
                echo "</table>";

            }
        }
    }
}
        


/* End of file con_modulo_carga.php */
/* Location: ./application/controllers/con_modulo_carga.php */