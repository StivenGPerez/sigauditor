<div id="retornarempresa">
<section class="container sombra">
	<div class="panel panel-primary">
		<div class="panel-heading">
	        <h3 class="panel-title">
	        <span class="glyphicon glyphicon-upload"></span> Registrar Empresa</h3> 
	    </div>
		<div class="panel-body">
          
          <div class="row">
              <div class="col-lg-9">
                <p><strong>En este módulo usted podrá ingresar y modificar las empresas con las cuales hay contratos vigentes.</strong></p>
                <p>Por favor diligenciar todos los campo que se encuentran en este modulo</p>
              </div>
              <div class="col-lg-3" id="logosig"><img src="<?php echo base_url(); ?>/img/logoweb.png" class="img-responsive"></div>
          </div></br>

			<div class="row">
				<div class="col-lg-12">
					<div id="empresa_dos">
						<form action="<?php echo base_url(); ?>index.php/con_empresa/crear_empresa" method="post" class="form-inline" role="form">
							<table class="table table-striped table-bordered table-condensed">
								<tr>
									<td><label for="">Nit:</label></td>
									<td><input type="text" class="form-control input" id="emp_nit" placeholder="nit empresa" ></td>
									<td><label for="">Nombre:</label></td>
									<td><input type="text" class="form-control input" id="emp_nombre" placeholder="nombre" ></td>
									<td rowspan="2">

									<label for="">Lista de empresas</label></br>
									
										<select onchange="traer_empresa();" id="emp_id_v" class="form-control" size="6">
											<!--<option selected value="-1"> </option>-->
											<?php 
											foreach ($empresa as $key => $value):
												echo "<option value=".$value->emp_id.">".$value->emp_nombre."</option>";
										 	endforeach 
										 	?>
										</select>
									
									</td>
								</tr>
								<tr>
									<td><label for="">Dirección:</label></td>
									<td><input type="text" class="form-control input" id="emp_dir" placeholder="dirección" ></td>
									<td><label for="">Teléfono:</label></td>
									<td><input type="text" class="form-control input" id="emp_tel" placeholder="teléfono" ></td>
								</tr>
								<tr>
									<td align="right" colspan="5"><input type="button" class="btn btn-primary active" value="Registrar" onclick="crearempresa();"></td>
								</tr>								
							</table>
						</form>
					</div>
				</div>
			</div>	
			<div class="row">
			  	<div class="well text-center" >
			  	</div>
			</div>
		</div>

		<div class="panel-footer">
			<a href="javascript:volver();" class="btn btn-danger btn-block"><strong>Volver</strong></a>
		</div>
	</div>
</section>
</div>