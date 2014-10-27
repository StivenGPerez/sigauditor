<section class="container sombra">
	
	<div class="panel panel-warning">
		<div class="panel-heading">
	        <h3 class="panel-title">
	        <span class="glyphicon glyphicon-upload"></span> Carga de Archivos
			<span class="pull-right glyphicon glyphicon-pushpin"></span>
	        </h3>
	    </div>
	  <div class="panel-body">
	  

	  <div class="row">
		  <div class="col-lg-9">
		  	<p><strong>En este módulo podrá cargar los archivos correspondientes a CONTRATISTA, ACTIVOS Y REMITIDOS.</strong></p>
		  	<p>Por favor seleccione la empresa y la dependencia de la empresa para la carga de los archivos</p>
		  </div>
		  <div class="col-lg-3" id="logosig"><img src="<?php echo base_url(); ?>/img/logoweb.png" class="img-responsive" alt=""></div>
	  </div>
	 <div class="row">

		<div class="col-lg-12">
		<table class="table table-striped">
			<tr>
				<td><strong>Empresa: </strong></td>
				<td>
					<select class="form-control" id="emp_id" name="emp_id" onchange="consecutivos();">
						<?php 
							if(isset($nom_empresa)){
								echo "<option value='$empresa_id' selected>$nom_empresa</option>";
							}else{
								echo "<option value='-1' selected>Seleccione..</option>";
							}

			    			foreach($empresas as $emp){
				    			if($emp->emp_nombre !== $nom_empresa){}
			       				echo "<option value='".$emp->emp_id."'>".$emp->emp_nombre."</option>";
		     				}
		     				?>
		     		</select>
		     	</td>
		     	<td><strong>Innterventoria: </strong></td>
		     	<td>
					<div id="interven">
						<select id='interventoria' name='interventoria' class='form-control'>
						<?php 
							if(isset($inter_nom) and isset($inter_id)){
								echo "<optgroup label='$nom_empresa'>";
								echo "<option value='$inter_id' selected>$inter_nom</option>";
								echo "</optgroup>";
							}else{
								echo "<option value='-1' selected>Seleccione..</option>";
							}
						?>
						</select>
					</div>
				</td>
				<td>
				 <button type="button" class="btn btn-fresh text-uppercase btn-sm" onclick="nueva_interventoria();">
				 	Nueva Interventoria
				 	<i class="glyphicon glyphicon-plus-sign"></i>
				 </button>
					
				</td>
			</tr>
		</table>
		</div>
	</div>

	<div class="row" id="carga">
		<table class="table table-bordered table-striped">
		<thead>
          <tr>
            <th>Archivo Contratista</th>
            <th>Archivo Personal Activo</th>
            <th>Archivo Personal Remitido</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center">
            <form action="<?php echo base_url(); ?>index.php/con_modulo_carga/cargar_contratista_ajax" name="form_con" id="form_con" method='post' enctype="multipart/form-data">
            <input type="file" data-input="false" name="ruta_con" id="ruta_con">

			<input type="hidden" name="empresa_con" id="empresa_con" value="">
			<input type="hidden" name="empresa_con_id" id="empresa_con_id" value="">

			<input type="hidden" name="inter_id" id="inter_id" value="">
			<input type="hidden" name="inter_nom" id="inter_nom" value="">

            </form>
            </td>
            <td align="center">
            <form action="<?php echo base_url(); ?>index.php/con_modulo_carga/cargar_activos_ajax" name="form_act" id="form_act" method='post' enctype="multipart/form-data">
            <input type="file" name="ruta_act" id="ruta_act">

			<input type="hidden" name="empresa_act" id="empresa_act" value="">
			<input type="hidden" name="empresa_act_id" id="empresa_act_id" value="">

			<input type="hidden" name="inter_id_act" id="inter_id_act" value="">
			<input type="hidden" name="inter_nom_act" id="inter_nom_act" value="">

            </form>
            </td>
            <td align="center">
            <form action="<?php echo base_url(); ?>index.php/con_modulo_carga/cargar_remitidos_ajax" name="form_rem" id="form_rem" method='post' enctype="multipart/form-data">
            <input type="file" name="ruta_rem" id="ruta_rem">

			<input type="hidden" name="empresa_rem" id="empresa_rem" value="">
			<input type="hidden" name="empresa_rem_id" id="empresa_rem_id" value="">

			<input type="hidden" name="inter_id_rem" id="inter_id_rem" value="">
			<input type="hidden" name="inter_nom_rem" id="inter_nom_rem" value="">
			
            </form>
            </td>
          </tr> 
          <tr>
          	<td>
          	<?php if(isset($can_con) && $can_con>0){ ?>
          	<button type="button" name="but_con" class="btn btn-success btn-lg btn-block" disabled onclick="enviar_contratista();">Archivo Cargado <i class="glyphicon glyphicon-ok"></i></button>
          	<?php }else{ ?>
          	<button type="button" name="but_con" class="btn btn-primary btn-lg btn-block" onclick="enviar_contratista();"><i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
          	<?php } ?>
          	</td>
          	<td>
          	<?php if(isset($can_act) && $can_act>0){ ?>
          	<button type="button" class="btn btn-success btn-lg btn-block" disabled onclick="enviar_activos();">Archivo Cargado <i class="glyphicon glyphicon-ok"></i></button>
          	<?php }else{ ?>
          	<button type="button" class="btn btn-primary btn-lg btn-block" onclick="enviar_activos();"><i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
          	<?php } ?>
          	</td>
          	<td>
          	<?php if(isset($can_rem) && $can_rem>0){ ?>
          	<button type="button" class="btn btn-success btn-lg btn-block" disabled onclick="enviar_remitidos();">Archivo Cargado <i class="glyphicon glyphicon-ok"></i></button>
			<?php }else{ ?>
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="enviar_remitidos();"><i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
			<?php } ?>
          	</td>
          </tr>
          <tr>
          	<td colspan="3">
          	<?php if(isset($rel_con) && $rel_con>0 && isset($rel_act) && $rel_act>0 && isset($can_rem) && $can_rem>0){ ?>
          		<button type="button" name="cruzar" id="cruzar" class="btn btn-warning btn-lg btn-block" onclick="cruzar_informacion();"><i class="glyphicon glyphicon-random"></i> Cruzar información</button>
          	<?php }else{ ?>		
          	<button type="button" name="cruzar" id="cruzar" class="btn btn-warning btn-lg btn-block" disabled onclick="cruzar_informacion();"><i class="glyphicon glyphicon-random"></i> Cruzar información</button>
          	<?php } ?>
          	</td>
          </tr>
          </tbody>
		</table>
	</div>
 
	<div class="row">
		<div class="well well-lg text-center" id="pista_contratista">
		<?php 
			if(isset($resultado))echo "<strong>".$resultado."</strong>";
		?>
		</div>
	</div>

			
	  </div>
	  <div class="panel-footer">
	  	<!--<a href="javascript:volver();" class="btn btn-danger btn-block"><strong>Volver</strong></a>-->

	  	<button type="button" class="btn btn-hot text-uppercase btn-block" onclick="javascript:volver();">
			<i class="glyphicon glyphicon-chevron-left"></i>
			 Volver 
		</button>

	  </div>
	</div>
</section>