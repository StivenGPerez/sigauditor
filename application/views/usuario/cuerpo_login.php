<section>
	<div class="container centering">

		<div class="row">
		<div class="col-lg-12">
		<img src="<?php echo base_url(); ?>img/bannersig1.png" alt="bannersig" width="500" class="center-block">
		</div>
		</div>

		<div class="row sombra login center-block">
			<div class="panel panel-success">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><h4><strong>Bienvenido!</strong></h4></div>
			  
	
			  <form action="<?php echo base_url(); ?>index.php/con_usuario/login" method="POST" role="form">
			  <table class="table">
			    <tr>
			    	<td align="right"><label for="">Usuario:</label></td>
			    	<td>
			    		<div class="input-group">
						  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						  <input type="text" class="form-control" name="usuario" placeholder="SP1234567890">
						  <span class="input-group-addon"><abbr title="Su usuario son las primeras letras de su nombre y apellido sumado a su número de cedula"><span class="glyphicon glyphicon-question-sign"></span></abbr></span>
						</div>
			    	</td>
			    </tr>
			    <tr>
			    	<td align="right"><label for="">Password:</label></td>
			    	<td>
			    		<div class="input-group">
						  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						  <input type="password" class="form-control" name="password" placeholder="********">
						</div>
			    	</td>
			    </tr>
			    <tr>
			    	<td colspan="2" align="center">
			    	<input type="submit" class="btn btn-sky text-uppercase btn-sm" value="Ingresar">
			    	<!--<button type="button" class="btn btn-primary" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);">Ingresar</button>-->
			    	</td>
			    </tr>
			  </table>
			  </form>

			</div>
		</div>
	</div>
</section>