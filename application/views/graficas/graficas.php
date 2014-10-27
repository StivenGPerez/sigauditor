<section class="container sombra">
	<div class="panel panel-primary">
		<div class="panel-heading">
	        <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Graficas</h3>
	    </div>
	  	<div class="panel-body">
		
			<div class="row">
			  	<div class="col-lg-9">
			  		<p><strong>En este módulo encontrara graficas que le ayudaran a entender o encontrar falencias en los datos cargados previamente</strong></p>
			  		<p>Por favor seleccione una empresa para graficar datos</p>
			  	</div>
			  	<div class="col-lg-3" id="logosig"><img src="<?php echo base_url(); ?>/img/logoweb.png" id="logo" class="img-responsive" alt=""></div>
		  	</div>
 
		  	<div class="row">
			<div class="col-lg-12"> 
		<!--<form action="<?php echo base_url(); ?>index.php/con_consolidado/consolidado" name="form1" id="form1" method='post' enctype="multipart/form-data">-->
			<table class="table table-striped">
				<tr>
					<td><strong>Empresa: </strong></td>
					<td>
						<select class="form-control" id="emp_id" name="emp_id" onchange="consecutivos_graficas();" required="required">
						<option value="-1" selected="selected">Seleccione Empresa</option>
							<?php 
								/*if(isset($nom_empresa)){
									echo "<option value='$empresa_id' selected>$nom_empresa</option>";
								}else{
									echo "<option value='-1' selected>Seleccione..</option>";
								}*/

				    			foreach($empresas as $emp){
				       				echo "<option value='".$emp->emp_id."'>".$emp->emp_nombre."</option>";
			     				}
			     				
			     				?>
			     		</select>
			     	</td>
			     	<td><strong>Innterventoria: </strong></td>
			     	<td>
						<div id="interven">
							<select id='interventoria' name='interventoria' class='form-control' required="required">
							<option value="-1" selected="selected">Seleccione Interventoría</option>
							<?php /* 
								if(isset($inter_nom) and isset($inter_id)){
									echo "<optgroup label='$nom_empresa'>";
									echo "<option value='$inter_id' selected>$inter_nom</option>";
									echo "</optgroup>";
								}else{
									echo "<option value='-1' selected>Seleccione..</option>";
								}*/
							?>
							</select>
						</div>
					</td>
					<td>
					<button type="button" class="btn btn-fresh text-uppercase btn-sm" onclick="graficar();">
					 	Ver 
					 	<i class="glyphicon glyphicon-search"></i>
					 </button>

					 <!--<button type="button" class="btn btn-sky text-uppercase btn-sm" onclick="waitingDialog.show('Generando archivo EXCEL Por favor espere....');setTimeout(function () {waitingDialog.hide();}, 3000);">
					 	Generar Consolidado XLS
					 	<i class="glyphicon glyphicon-floppy-save"></i>
					 </button>-->
						
					</td>
				</tr>
			</table>
		<!--</form>-->
		</div>
			</div>

			<!--<div id="excel"></div>-->

			<!--<div class="col-lg-12">-->
			
			<div class="row">
				<div class="col-lg-12"><div id="top_20_moc" style="width:100%; height:350px;"></div></div>
				<div class="col-lg-12"><div id="veredas_rem" style="width:100%; height:350px;"></div></div>
			</div>
			<div class="row">
				<div class="col-lg-6"><div id="dis_per_act" style="width:100%; height:500px;"></div></div>
				<div class="col-lg-6"><div id="dis_tp_mobra" style="width:100%; height:400px;"></div></div>
			</div>
			
				
				
			   	
			   
			<!--</div>-->
			
			
			
			

 

			

 	



	  	</div>
	  	<div class="panel-footer">
	  		<a href="<?php echo base_url(); ?>index.php/inicio/principal" class="btn btn-danger btn-block">Volver</a>
	  	</div>
	</div>
</section>