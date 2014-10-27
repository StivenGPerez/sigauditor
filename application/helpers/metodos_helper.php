<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('validar_fecha')){
    //formateamos la fecha y la hora, función de cesarcancino.com
    function validar_fecha($date){

        $parte = explode(" ", $date);

        //if(count($parte)==1){
            if (preg_match("/(\d{2})\/(\d{2})\/(\d{4})$/", $parte[0])) {
                return true;
            }else{
                return false;
            }            
        //}
}
}


if(!function_exists('componer_fecha')){
    //formateamos la fecha y la hora, función de cesarcancino.com
    function componer_fecha($fecha){

    	$parte = explode(" ", $fecha);
		//echo $porciones[0]; // porción1
    	
    	
    		if(validar_fecha($parte[0])){
    			
                $date1 = str_replace("/","-",$parte[0]);
                $nueva=date('Y-m-d', strtotime($date1));
                //echo "<script>alert('".$nueva."');</script>";

                return $nueva;
    		}else{
    			return NULL;
    		}

    }
}

if(!function_exists('utf8_fopen_read')){
    //metodo para cargar archivos en formato utf-8
    function utf8_fopen_read($fileName) { 
        $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName)); 
        $handle=fopen("php://memory", "rw"); 
        fwrite($handle, $fc); 
        fseek($handle, 0); 
        return $handle; 
    } 
}


//end application/helpers/metodos_helper.php