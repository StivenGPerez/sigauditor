	<form action="<?php echo base_url(); ?>index.php/con_empresa/crear_empresa" method="post" class="form-inline" role="form">
		
		<input type="text" class="hide" id="emp_id_ajax" value="<?php if (isset($consulta)) echo $consulta[0]->emp_id; ?>">	
			<table class="table table-striped table-bordered table-condensed">
					<tr>
						<td><label for="">Nit:</label></td>
						<td>
							<input type="text" class="form-control input" id="emp_nit_ajax" placeholder="nit empresa" 
						   value="<?php if (isset($consulta)) echo $consulta[0]->emp_nit; ?>">
						</td>
						<td><label for="">Nombre:</label></td>
						<td>
							<input type="text" class="form-control input" id="emp_nombre_ajax" placeholder="nombre" 
						   value="<?php if (isset($consulta)) echo $consulta[0]->emp_nombre; ?>">
						</td>
						<td rowspan="2">

						<label for="">Lista de empresas</label><br>
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
						<td>
							<input type="text" class="form-control input" id="emp_dir_ajax" placeholder="dirección" 
						   value="<?php if (isset($consulta)) echo $consulta[0]->emp_dir; ?>">
						</td>
						<td><label for="">Teléfono:</label></td>
						<td>
							<input type="text" class="form-control input" id="emp_tel_ajax" placeholder="teléfono" 
						   value="<?php if (isset($consulta)) echo $consulta[0]->emp_tel; ?>">
						</td>
					</tr>
					<tr>
						<td align="right" colspan="5">						
							    <input class="btn btn-primary active" type="submit" value="Registrar">
							    <input class="btn btn-primary active" type="button" value="Modificar" onclick="update_emp();">									
						</td>	
					</tr>								
			</table>		
	</form>	