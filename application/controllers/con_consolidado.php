 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_consolidado extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_consolidado');
        $this->load->model('mod_interventoria');
        $this->load->model('mod_modulo_carga');
        $this->load->library('grocery_CRUD');
	}
	public function index(){
        $data['empresas']=$this->mod_modulo_carga->get_empresas();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('consolidado/consolidado',$data);
		$this->load->view('footer');
	}


    //Carga las interventorias de una empresa en un select
    public function selec_interventoria(){
        $emp_id=$this->input->post('emp_id');

        $interv=$this->mod_interventoria->get_interventoria($emp_id);

       echo "<select id='interventoria' name='interventoria' class='form-control' required='required'>";
       echo "<option value=''  disabled='disabled' selected='selected'>Seleccione Interventoría</option>";
        foreach ($interv as $key => $value) {
            echo "<option value='".$value->inter_id."''>".$value->inter_nombre."   ".$value->inter_fecha."</option>";
        }
        echo "</select>";
    }



	function consolidado(){
        $inter_id = $this->input->get_post('interventoria'); //optenenemos el id de la interventoria

        $datos_session = $this->session->userdata('nueva_session'); //accedemos a los datos globales de usuarios
        if($inter_id != '') $datos_session['intera'] = $inter_id;   //creamos una variable global para enviarla al CRUD
        $this->session->set_userdata("nueva_session", $datos_session); //guardamos la variable creada en el array global

        //echo "<script>alert('".$inter_id."');</script>";  //este alert es para hacer pruebas unitarias en cualquier parte
        
        try{
            $datos_session = $this->session->userdata("nueva_session"); //se accede al arreglo global para tomar el dato anterior mente dicho
           // echo $sess['book_id'];

            /* Creamos el objeto */
            $crud = new grocery_CRUD();

            $crud->where('inter_id', $datos_session['intera']);
//            $crud->where('inter_id', $datos_session['intera']);
            
            /* Seleccionamos el tema */
            $crud->set_theme('flexigrid');

            /* Seleccionmos el nombre de la tabla de nuestra base de datos*/
            $crud->set_table('consolidado');

            /* Le asignamos un nombre */
            $crud->set_subject('Persona');

            /* Asignamos el idioma español */
            $crud->set_language('spanish');

            

            /* Aqui le decimos a grocery que estos campos son obligatorios para insertar*/
            $crud->required_fields(
                'conso_subcontratista',
                'conso_nombre', 
                'conso_lug_nac', 
                'conso_cedula',
                'conso_ced_exp',
               /* 'conso_cargo',
                'conso_per_sol',
                'conso_tp_mobra',
                'conso_tp_contrato',
                'conso_base_org',
                'conso_base_org',
                'conso_paso_rsc',
                'conso_sp',
                'conso_estado_and',
                'conso_estado_evid',*/
                'conso_comunidad_rem'
            );

            /* Aqui le indicamos que campos deseamos mostrar */
            $crud->columns(
                'conso_subcontratista',
                'conso_nombre', 
                'conso_lug_nac', 
                'conso_cedula',
                'conso_ced_exp',
                'conso_cargo',
                'conso_per_sol',
                'conso_tp_mobra',
                'conso_tp_contrato',
                'conso_base_org',
                'conso_paso_rsc',
                'conso_sp',
                'conso_estado_and',
                'conso_estado_evid',
                'conso_comunidad_rem'
            );

            //renombramos los nombres de los campos que vienen de la base de datos
            $crud->display_as('conso_subcontratista','Subcont')
                    ->display_as('conso_nombre','Nombre')
                    ->display_as('conso_lug_nac','Lug. Nac')
                    ->display_as('conso_cedula','Cedula')
                    ->display_as('conso_ced_exp','Exped')
                    ->display_as('conso_cargo','Cargo')
                    ->display_as('conso_per_sol','Perf. Sol')
                    ->display_as('conso_tp_mobra','M. Obra')
                    ->display_as('conso_tp_contrato','Tipo Contr.')
                    ->display_as('conso_base_org','Base Org.')
                    ->display_as('conso_paso_rsc','Paso RSC.')
                    ->display_as('conso_sp','Sp')
                    ->display_as('conso_estado_and','Estado And.')
                    ->display_as('conso_estado_evid','Estado Evid.')
                    ->display_as('conso_comunidad_rem','Comunidad Rem.');

            //para ocultas campos al momento de registrar una persona
            $crud->field_type('inter_id', 'hidden');
            $crud->field_type('conso_tp_mobra','dropdown', array('MONC' => 'MONC', 'MOC' => 'MOC'));
            $crud->field_type('conso_cedula', 'integer');

            /* Generamos la tabla */
            $output = $crud->render();
            
            // La cargamos en la vista situada en 
                       
            $this->load->view('header');
            $this->load->view('barra_informacion');
            $this->load->view('consolidado/consolidado_ajax', $output);

            //echo $html;
            
        }catch(Exception $e){
            /* Si algo sale mal cachamos el error y lo mostramos */
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }


    public function excel_consolidado(){

    	$this->load->library('PHPExcel');

    	$emp_id=$this->input->post('emp_id');

    	$cons_con=$this->mod_consolidado->controlador_consolidado($emp_id);
    	$cons_act=$this->mod_consolidado->acivos_consolidado($emp_id);
    	$cons_rem=$this->mod_consolidado->remitidos_consolidado($emp_id);



        //creando un objeto excel
    	$objPHPExcel = new PHPExcel();
    
		// Set document properties 		
 	$objPHPExcel->getProperties()
        ->setCreator("TEDnologia.com")
        ->setLastModifiedBy("TEDnologia.com")
        ->setTitle("Exportar Excel con PHP")
        ->setSubject("Documento de prueba")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("usuarios phpexcel")
        ->setCategory("reportes");

    $objPHPExcel->setActiveSheetIndex(0); 				//poniendo active hoja 1
    $objPHPExcel->getActiveSheet()->setTitle("Hoja1");	//título de la hoja 1


        //llenando celdas
             $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'N°')
            ->setCellValue('B1', 'Contratista')
            ->setCellValue('C1', 'Subcontratista')
            ->setCellValue('D1', 'Nombres Completos')
            ->setCellValue('E1', 'Lugar Nacimiento')
            ->setCellValue('F1', 'Número de identificación')
            ->setCellValue('G1', 'Cédula expedida en')
            ->setCellValue('H1', 'Cargo')
            ->setCellValue('I1', 'Perfil solicitado')
            ->setCellValue('J1', 'Tipo de Mano de Obra')
            ->setCellValue('K1', 'Tipo de contrato')
            ->setCellValue('L1', 'Base de datos de origen')
            ->setCellValue('M1', 'Paso por RSC')
            ->setCellValue('N1', 'Debio haber pasado por RSC')
            ->setCellValue('O1', 'SP')
            ->setCellValue('P1', 'Estado del candidato en Andrómeda')
            ->setCellValue('Q1', 'Fecha de creación SP')
            ->setCellValue('R1', 'Fecha inicio')
            ->setCellValue('S1', 'Fecha finalización del contrato')
            ->setCellValue('T1', 'Frente de trabajo actual')
            ->setCellValue('U1', 'Campo');

            $con=1;
            foreach ($cons_con as $key => $value) {
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($key+2), $con);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($key+2), $value->emp_nombre);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($key+2), $value->con_empleador);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($key+2), $value->con_nombre);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.($key+2), $value->con_lug_nac);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.($key+2), $value->con_cedula);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.($key+2), $value->con_ced_exp);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.($key+2), $value->con_cargo);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.($key+2), $value->con_per_sol);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.($key+2), $value->con_tp_mobra);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.($key+2), $value->con_tp_contrato);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($key+2), $value->con_act_and);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.($key+2), $value->con_rem_rsc);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.($key+2), $value->con_sp);

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.($key+2), $value->con_fech_icontrato);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.($key+2), $value->con_fech_fcontrato);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.($key+2), $value->con_fren_trabajo);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U'.($key+2), $value->con_campo);          
				$con++;  	
            }
            
            	$objPHPExcel->getActiveSheet()->getStyle('A'.($con+1).':U'.($con+1))->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('FF0000');
             
           	foreach ($cons_act as $key => $value) {
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($con+1), $con);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($con+1), $value->emp_nombre);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($con+1), $value->pact_empresa);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($con+1), $value->pact_nombre);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.($con+1), $value->pact_lug_nac);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.($con+1), $value->pact_cedula);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.($con+1), $value->pact_cargo_pre);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.($con+1), $value->pact_tp_mobra);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($con+1), $value->pact_lista_contratista);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.($con+1), $value->pact_org_rsc);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.($con+1), $value->pact_estado_pre);

            	$con++;
            }


            $objPHPExcel->getActiveSheet()->getStyle('A'.($con+1).':U'.($con+1))->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('FF0000');
             //$con=$con+1;
           	foreach ($cons_rem as $key => $value) {
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($con+1), $con);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($con+1), $value->emp_nombre);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($con+1), $value->prem_contratista);
            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($con+1), $value->prem_nombre);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.($con+1), $value->prem_cedula);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.($con+1), $value->prem_cargo_sol);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.($con+1), $value->prem_tp_mobra);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.($con+1), $value->prem_estado_cand);

            	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.($con+1), $value->prem_fech_crea);
            	$con++;
            }
 			
 			
        //poniendo en negritas la fila de los títulos
        //$styleArray = array('font' => array('bold' => true));
        $objPHPExcel->getActiveSheet()->getStyle("A1:U1")->getFont()->setBold(true)
                                ->setName('Verdana')
                                ->setSize(10)
                                ->getColor()->setRGB('FFFFFF');

        $objPHPExcel->getActiveSheet()->getStyle('A1:U1')->getFill()
                    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('000066');

        //altura de la fila
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

        $objPHPExcel->getActiveSheet()->setAutoFilter('A1:U1');
 
        //poniendo columnas con tamaño auto según el contenido, asumiendo N como la última
        for ($i = 'A'; $i<= 'U'; $i++)
                $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
    

        

// Save Excel 2007 file
#echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
// It will be called file.xls
header('Content-Disposition: attachment; filename="'.$cons_con[0]->emp_nombre.'".xlsx"');
echo $objWriter->save('php://output');
    }



    public function crud_buscar(){
        $conso_id=$this->input->get('conso_id');

        $datos=$this->mod_consolidado->crud_buscar($conso_id);
        //print_r(json_encode($datos));
        
        $persona = array(
            "nombre"=>$datos[0]->conso_nombre,
            "lug_nac"=>$datos[0]->conso_lug_nac,
            "cedula"=>$datos[0]->conso_cedula,
            "ced_exp"=>$datos[0]->conso_ced_exp,
            "cargo"=>$datos[0]->conso_cargo,
            "per_sol"=>$datos[0]->conso_per_sol,
            "tp_mobra"=>$datos[0]->conso_tp_mobra,
            "tp_contrato"=>$datos[0]->conso_tp_contrato,
            "base_org"=>$datos[0]->conso_base_org,
            "paso_rsc"=>$datos[0]->conso_paso_rsc,
            "sp"=>$datos[0]->conso_sp,
            "fecha_crea"=>$datos[0]->conso_fecha_crea_per,
            "fecha_ini_cont"=>$datos[0]->conso_fecha_inicio_cont,
            "fecha_fin_cont"=>$datos[0]->conso_fecha_final_cont
        );

        print_r(json_encode($persona));
    }

    public function crud_eliminar(){
        $conso_id=$this->input->get('conso_id');

        $confirm=$this->mod_consolidado->crud_eliminar($conso_id);
        print_r(json_encode($confirm));
    }





} 

/* End of file con_consolidado.php */
/* Location: ./application/controllers/con_consolidado.php */