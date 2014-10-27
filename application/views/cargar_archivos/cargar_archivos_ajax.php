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
            <input type="file" class="filestyle" data-input="false" name="ruta_con" id="ruta_con">
      		
            <input type="hidden" name="empresa_con" id="empresa_con" value="">
      		<input type="hidden" name="empresa_con_id" id="empresa_con_id" value="">

            <input type="hidden" name="inter_id" id="inter_id" value="">
            <input type="hidden" name="inter_nom" id="inter_nom" value="">

            </form>
            </td>
            <td align="center">
            <form action="<?php echo base_url(); ?>index.php/con_modulo_carga/cargar_activos_ajax" name="form_act" id="form_act" method='post' enctype="multipart/form-data">
            <input type="file" class="filestyle" data-input="false" name="ruta_act" id="ruta_act">
      		
            <input type="hidden" name="empresa_act" id="empresa_act" value="">
      		<input type="hidden" name="empresa_act_id" id="empresa_act_id" value="">

            <input type="hidden" name="inter_id_act" id="inter_id_act" value="">
            <input type="hidden" name="inter_nom_act" id="inter_nom_act" value="">

            </form>
            </td>
            <td align="center">
            <form action="<?php echo base_url(); ?>index.php/con_modulo_carga/cargar_remitidos_ajax" name="form_rem" id="form_rem" method='post' enctype="multipart/form-data">
            <input type='file' class='filestyle' data-input='false' name='ruta_rem' id='ruta_rem'>

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
            <button type="button" name="but_con" class="btn btn-success btn-lg btn-block" disabled onclick="registrar_contratista();">
            Archivo Cargado <i class="glyphicon glyphicon-ok"></i></button>
            <?php }else{ ?>
            <button type="button" name="but_con" class="btn btn-primary btn-lg btn-block" onclick="registrar_contratista();">
            <i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
            <?php } ?>
            </td>
            <td>
            <?php if(isset($can_act) && $can_act>0){ ?>
            <button type="button" class="btn btn-success btn-lg btn-block" disabled onclick="enviar_activos();">
            Archivo Cargado <i class="glyphicon glyphicon-ok"></i></button>
            <?php }else{ ?>
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="enviar_activos();">
            <i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
            <?php } ?>
            </td>
            <td>
            <?php if(isset($can_rem) && $can_rem>0){ ?>
            <button type="button" class="btn btn-success btn-lg btn-block" disabled onclick="enviar_remitidos();">
            Archivo Cargado <i class="glyphicon glyphicon-ok"></i></button>
            <?php }else{ ?>
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="enviar_remitidos();">
            <i class="glyphicon glyphicon-floppy-open"></i> CARGAR ARCHIVO</button>
            <?php } ?>
            </td>
            </tr>
            <tr>
            <td colspan="3">
            <?php if(isset($rel_con) && $rel_con>0 && isset($rel_act) && $rel_act>0 && isset($can_rem) && $can_rem>0 ){ ?>
              <button type="button" name="cruzar" id="cruzar" class="btn btn-warning btn-lg btn-block" onclick="cruzar_informacion();">
              <i class="glyphicon glyphicon-random"></i> Cruzar información</button>
            <?php }else{ ?>   
            <button type="button" name="cruzar" id="cruzar" class="btn btn-warning btn-lg btn-block" disabled onclick="cruzar_informacion();">
            <i class="glyphicon glyphicon-random"></i> Cruzar información</button>
            <?php } ?>
            </td>
            </tr>
        </tbody>
		</table>