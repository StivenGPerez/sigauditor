<div class="container sombra">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-cog"></span> <strong>Ingreso Empleados</strong>
            <a href="#" onclick="javascript:volver();">
                <span class='pull-right label label-danger'><h5><i class="glyphicon glyphicon-chevron-left"></i><strong>Volver</strong></h5></span>
            </a>
        </div>

        <div class="panel-body">
          
          <div class="row">
              <div class="col-lg-9">
                <p><strong>En este módulo usted podrá ingresar cada uno de los EMPLEADOS que trabajan para su compañía y/o empresa.</strong></p>
                <p>Por favor debe diligenciar todos los campos que se encuentran en este modulo</p>
              </div>
              <div class="col-lg-3" id="logosig"><img src="<?php echo base_url(); ?>/img/logoweb.png" class="img-responsive" alt=""></div>
          </div>  

            <div id="funciones_form">
            <div id="lista_empresas">  
                <form action="<?php echo base_url(); ?>index.php/con_formulario/insertar_empleado" name="form1" id="form1" method="post" class="form-inline" role="form">                                        
                    <label for="">Empleador</label>  

                    <select onchange="list_empresa();" id="emp_id_v" class="form-control" Tabindex="1"> <!-- Variable con_empleador-->
                        <option selected value="-1"> </option>
                        <?php 
                        foreach ($empresa as $key => $value):
                            echo "<option value=".$value->emp_id.">".$value->emp_nombre."</option>";
                        endforeach 
                        ?>
                    </select>
          
                        <div class="row">
                            <div class="col-lg-4">
                                <table class="table">
                                    <tr>
                                        <td><label for="">Nombre</label></td>
                                        <td><input type="text" class="form-control input" placeholder="nombre" id="con_nombre" name="con_nombre" Tabindex="2"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Lugar Nacimiento </label></td>
                                        <td>
                                            <select class="selectpicker show-tick form-control" data-live-search="true" id="select_mun_nac" data-width="190px" Tabindex="5"> <!-- Variable con_lug_nac-->
                                                <?php 
                                                foreach ($municipios as $key => $value):
                                                    echo "<option value=".$value->mun_id.">".$value->mun_nombre."</option>";
                                                endforeach 
                                                ?>
                                            </select>                                             
                                        </td>                                    
                                    </tr>
                                    <tr>
                                        <td><label for="">Mano De Obra </label></td>
                                        <td>
                                            <select class="form-control" id="con_tp_mobra" Tabindex="8">
                                            <option value="1">MOC</option>
                                            <option value="2">MONC</option>  
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Fecha Finalización </label></td>
                                        <td><input type="date" Tabindex="11" placeholder="fecha finalizacion" class="form-control" id="con_fech_fcontrato"></td>
                                    </tr>               
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tr>
                                        <td><label id="field_con_cedula">Cedula </label></td>
                                        <td>
                                        <input name="con_cedula" Tabindex="3" class="form-control input" placeholder="cedula" type="text" id="con_cedula" validate="[{type:'required'},{type:'integer'}]"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Cargo </label></td>
                                        <td><input type="text" Tabindex="6" placeholder="cargo" class="form-control" id="con_cargo"></td>                                    
                                    </tr>
                                    <tr>
                                        <td><label for="">Tipo Contrato: </label></td>
                                            <td>
                                            <select class="selectpicker" Tabindex="9" id="con_tp_contrato" data-width="190px"> <!-- Variable con_lug_nac-->
                                                <?php 
                                                foreach ($tp_contrato as $key => $value):
                                                    echo "<option value=".$value->tp_contrato_id.">".$value->tp_contrato_nombre."</option>";
                                                endforeach 
                                                ?>
                                            </select>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Frente Trabajo </label></td>
                                        <td><input type="text" Tabindex="12" placeholder="frente trabajo" class="form-control" id="con_fren_trabajo"></td>                                    
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tr>
                                        <td><label for="">Lugar Expedición </label></td>
                                        <td>
                                            <select class="selectpicker" Tabindex="4" data-live-search="true" id="select_mun_exp" data-width="190px"> <!-- Variable con_ced_exp-->
                                                <?php 
                                                foreach ($municipios as $key => $value):
                                                    echo "<option value=".$value->mun_id.">".$value->mun_nombre."</option>";
                                                endforeach 
                                                ?>
                                            </select>     
                                        </td>                                     
                                    </tr>
                                    <tr>
                                        <td><label for="">Perfil </label></td>
                                        <td><input type="text" Tabindex="7" placeholder="perfil" class="form-control" id="con_per_sol"></td>                   
                                    </tr>
                                    <tr>
                                        <td><label for="">Fecha Inicio </label></td>
                                        <td><input type="date" Tabindex="10" placeholder="fecha inicio" class="form-control" id="con_fech_icontrato"></td>                                                        
                                    </tr>
                                    <tr>
                                        <td><label for="">Campo </label></td>
                                        <td><input type="text" Tabindex="13" placeholder="campo" class="form-control" id="con_campo"></td>                    
                                    </tr>
                                    <tr>
                                        <td><label for=""></label></td>
                                        <td align="right">
                                           <input type="button" class="btn btn-primary active" name="boton" id="boton" onClick="javascript:insertar_empleado(document.forms['form1']);" value="Guardar" validate="[{type:'required'},{type:'string'}]"/>
                                        </td>                 
                                    </tr>
                                </table>
                            </div>
                   </div> 
                </form>
                <form action="<?php echo base_url(); ?>index.php/con_formulario/cargar_excel_contr" name="form_con" id="form_con" method='post' enctype="multipart/form-data">
                    <input type="file" name="ruta_contratista" id="ruta_contratista"><button type="button" name="button_con" class="btn btn-primary active" onclick="enviar_contratista();"><i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
                    <bottom type="buttom" id="formulario_excel" class="btn btn-primary active" onclick="location.href='<?php echo base_url(); ?>documentos/Planilla_excel.xlsx'">DESCARGAR FORMULARIO EXCEL</bottom>   
                </form>                 
            </div>
            </div>
            <div class="row">
                <div class="well text-center">
                    <?php 
                        if(isset($resultado))echo "<strong>".$resultado."</strong>";
                    ?>
                </div>
            </div>

	    </div>
                    
        <div class="panel-footer">
		<button type="button" class="btn btn-hot text-uppercase btn-block" onclick="javascript:volver();">
            <i class="glyphicon glyphicon-chevron-left"></i>
             Volver 
        </button>
        </div>        

    </div>
</div>



