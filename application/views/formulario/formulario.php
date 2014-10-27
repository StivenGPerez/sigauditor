<div class="container sombra">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-cog"></span> Ingreso Empleados</h3>
        </div>

        <div class="panel-body">
            <div id="lista_municipios">
            <div id="lista_empresas">  
                <form action="<?php echo base_url(); ?>index.php/con_formulario/listar_empresa" method="post" class="form-inline" role="form">
                                        
                    <label for="">Empleador</label>  

                    <select onchange="list_empresa();" id="emp_id_v" class="form-control">
                        <!--<option selected value="-1"> </option>-->
                        <?php 
                        foreach ($empresa as $key => $value):
                            echo "<option value=".$value->emp_id.">".$value->emp_nombre."</option>";
                        endforeach 
                        ?>
                    </select>
          
                        <div class="row"></br>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tr>
                                        <td><label for="">Lugar Expedición </label></td>
                                        <td>
                                            <input id="mun_id" class="form-control" list="list_mun_id">
                                                <option selected value="-1"> </option>
                                                <?php 
                                                foreach ($municipios as $key => $value):
                                                    echo "<option value=".$value->mun_id.">".$value->mun_nombre."</option>";
                                                endforeach 
                                                ?>
                                        </td>                   
                                    </tr>
                                    <tr>
                                        <td><label for="">Perfil </label></td>
                                        <td><input type="text" placeholder="perfil" class="form-control" id="perfil"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Fecha Inicio </label></td>
                                        <td><input type="text" placeholder="fecha inicio" class="form-control" id="fec_inicio"></td>                    
                                    </tr>
                                    <tr>
                                        <td><label for="">Frente Trabajo </label></td>
                                        <td><input type="text" placeholder="frente trabajo" class="form-control" id="fec_inicio"></td>
                                    </tr>               
                                    <tr>
                                        <td align="left"><input type="button" class="btn btn-primary active" value="Cargar Archivo" onclick=""></td>
                                        <td><label for=""></label></td>
                                    </tr>   
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tr>
                                        <td><label for="">Nombre </label></td>
                                        <td><input type="text" class="form-control input" placeholder="nombre" id="nombre"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Lugar Nacimiento </label></td>
                                        <td><input type="text" class="form-control input" placeholder="lugar necimiento" id="lugar_nac"></td>                   
                                    </tr>
                                    <tr>
                                        <td><label for="">Mano De Obra </label></td>
                                        <td><input type="text" placeholder="mano de obra" class="form-control" id="mano_obra"></td>                 
                                    </tr>
                                    <tr>
                                        <td><label for="">Fecha Finalización </label></td>
                                        <td><input type="text" placeholder="fecha finalizacion" class="form-control" id="fec_final"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tr>
                                        <td><label for="">Cedula </label></td>
                                        <td><input type="text" class="form-control input" placeholder="cedula" id="cedula"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Cargo </label></td>
                                        <td><input type="text" placeholder="cargo" class="form-control" id="cargo"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Contrato: </label></td>
                                        <td><input type="text" placeholder="contrato" class="form-control" id="contrato"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Campo </label></td>
                                        <td><input type="text" placeholder="campo" class="form-control" id="campo"></td>                    
                                    </tr>
                                    <tr>
                                        <td><label for=""></label></td>
                                        <td align="right"><input type="button" class="btn btn-primary active" value="Guardar" onclick="crear_empleado();"></td>                 
                                    </tr>
                                </table>
                            </div>

                   </div> 
                </form>
            </div>    
            </div>
	    </div>

        <div class="panel-footer">
			<a href="javascript:volver();" class="btn btn-danger btn-block"><strong>Volver</strong></a>
        </div>        

    </div>
</div>



