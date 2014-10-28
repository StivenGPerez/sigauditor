$( ".select" ).selectpicker();

function list_municipios()
{
	var mun_id_nac = document.getElementById('select_mun_nac').value;
  var mun_id_exp = document.getElementById('select_mun_exp').value;

	$.post(baseurl+'index.php/con_formulario/index',{'mun_id': mun_id_nac, 'mun_id': mun_id_exp},

		function(data)
		{
			$('#funciones_form').html(data);
		});
}

function list_tpcontrato()
{
  var tp_contrato_v = document.getElementById('con_tp_contrato').value

  $.post(baseurl+'index.php/con_formulario/index',{'tp_contrato_id': tp_contrato_v},

      function(data)
      {
          $('#funciones_form').html(data);
      });
}

function insertar_empleado(frm)
{
  var con_empleador = document.getElementById('emp_id_v').value;
  var con_nombre = document.getElementById('con_nombre').value;
  var con_cedula = document.getElementById('con_cedula').value;
  var con_ced_exp = document.getElementById('select_mun_exp').value;
  var con_lug_nac = document.getElementById('select_mun_nac').value;
  var con_cargo = document.getElementById('con_cargo').value;
  var con_per_sol = document.getElementById('con_per_sol').value;
  var con_tp_mobra = document.getElementById('con_tp_mobra').value;
  var con_tp_contrato = document.getElementById('con_tp_contrato').value;
  var con_fech_icontrato = document.getElementById('con_fech_icontrato').value;  
  var con_fech_fcontrato = document.getElementById('con_fech_fcontrato').value;
  var con_fren_trabajo = document.getElementById('con_fren_trabajo').value;
  var con_campo = document.getElementById('con_campo').value;

  if(con_empleador != '-1'){
   if(con_nombre != 0){
    if(con_ced_exp !=0){
     if(con_lug_nac !=0){
      if(con_cargo !=0){
       if(con_per_sol !=0){
        if(con_tp_mobra !=0){ 
         if(con_tp_contrato !=0){
          if(con_fech_icontrato !=0){
           if(con_fech_fcontrato !=0){ 
            if(con_fren_trabajo !=0){
             if(con_campo !=0){
              if( confirm('Esta seguro de registrar los datos') && validator(frm)){

                $.post(baseurl+'index.php/con_formulario/insertar_empleado', {'con_empleador':con_empleador, 'con_nombre':con_nombre,
                 'con_lug_nac':con_lug_nac, 'con_tp_mobra':con_tp_mobra, 'con_fren_trabajo':con_fren_trabajo, 'con_cedula':con_cedula,
                 'con_cargo':con_cargo, 'con_tp_contrato':con_tp_contrato, 'con_fech_fcontrato':con_fech_fcontrato, 
                 'con_ced_exp':con_ced_exp, 'con_per_sol':con_per_sol, 'con_fech_icontrato':con_fech_icontrato, 'con_campo':con_campo}, //'usuario':usuario, 'check':check, 

                function(data)
                {
                  $('#funciones_form').html(data);
                });

                alert("El Empleado Se Registro Con Exito");
              }else{return false;}
             }else{alert("Debe Ingresar El Campo.");}
            }else{alert("Debe Ingresar El Frente De Trabajo.");}      
           }else{alert("Debe Ingresar Fecha Final y/o Tentativa Finalización Contrato");}   
          }else{alert("Debe Ingresar Fecha de Inicio Del Contrato.");}
         }else{alert("Debe Ingresar Un Tipo De Contrato")}
        }else{alert("Debe Ingresar El Tipo Mano De Obra.");}  
       }else{alert("Debe Ingresar Perfil Solicitado.");}
      }else{alert("Debe Ingresar El Cargo.");} 
     }else{alert("Debe Ingresar El Lugar De Nacimiento.");}   
    }else{alert("Debe Ingresar El Lugar de Expecion de La Cedula");}
   }else{alert("Debe Ingresar El Nombre Del Empleado.");}
  }else{alert("Debe Ingresar Un Empleador.");}
}

function enviar_contratista()
{
//  alert("hola");
  var empresa =document.getElementById("emp_id_v").value;
  if(empresa == '-1')
  {
    alert("Por favor seleccione una empresa");
    document.getElementById("emp_id_v").focus();
    return false;
  }
  else
  {
    var ruta_contratista =document.getElementById("ruta_contratista").value;
    
    if (ruta_contratista.length == 0) 
    {
        alert("Por favor cargue un archivo CSV");
        document.getElementById("ruta_contratista").focus();
        return false;
    }
    else
    {
      document.form_con.submit();      
    }    
    
  }
}