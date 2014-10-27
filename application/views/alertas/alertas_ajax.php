<div class="panel-group" id="accordion">

<?php if(isset($alerta1) and count($alerta1)==0){ 
        echo "<strong>No existe información de esta empresa en la base de datos</strong>";
      }else{ 
?>

<?php if(isset($alerta1) and count($alerta1)!=0){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Personal faltante de informacion <span class="badge badge-important"><?php if(isset($alerta1)) echo count($alerta1); else echo "0";?> Alertas</span>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
    <div class="panel-body">
        
      <div class="scroll">
        <table class="table table-hover table-condensed">
          <tbody>
            <tr>
              <th class="tdtable">#</th>
              <th class="tdtable">SubContratista</th>
              <th class="tdtable">Nombre</th>
              <th class="tdtable">Lug. Nac.</th>
              <th class="tdtable">Cedula</th>
              <th class="tdtable">Exp. Cedula</th>
              <th class="tdtable">Cargo</th>
              <th class="tdtable">Perf. Sol.</th>
              <th class="tdtable">Mano de Obra</th>
              <th class="tdtable">Tipo Contrato</th>
              <th class="tdtable">Base Origen</th>
              <th class="tdtable">RSC</th>
              <th class="tdtable">SP</th>
              <th class="tdtable">Estado en And.</th>
              <th class="tdtable">Estado Evid.</th>             
              <th class="tdtable">Comunidad</th>
              
            </tr>
          </tbody>
          
          <?php foreach ($alerta1 as $key => $value){
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->conso_subcontratista."</td>";
              echo "<td class='tdtable'>".$value->conso_nombre."</td>";
              echo "<td class='tdtable'>".$value->conso_lug_nac."</td>";
              echo "<td class='tdtable'>".$value->conso_cedula."</td>";
              echo "<td class='tdtable'>".$value->conso_ced_exp."</td>";
              echo "<td class='tdtable'>".$value->conso_cargo."</td>";
              echo "<td class='tdtable'>".$value->conso_per_sol."</td>";
              echo "<td class='tdtable'>".$value->conso_tp_mobra."</td>";
              echo "<td class='tdtable'>".$value->conso_tp_contrato."</td>";
              echo "<td class='tdtable'>".$value->conso_base_org."</td>";
              echo "<td class='tdtable'>".$value->conso_paso_rsc."</td>";
              echo "<td class='tdtable'>".$value->conso_sp."</td>";
              echo "<td class='tdtable'>".$value->conso_estado_and."</td>";
              echo "<td class='tdtable'>".$value->conso_estado_evid."</td>";
              echo "<td class='tdtable'>".$value->conso_comunidad_rem."</td>";
            echo "</tr>";
          } ?>

          $a == 4 ? 'four' : 'other'

        </table>
      </div>

    </div>
    </div>
  </div>
<?php } ?>




<?php } ?>

</div>