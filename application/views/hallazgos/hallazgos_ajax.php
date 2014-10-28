<div class="panel-group" id="accordion">

<?php if(isset($hallazgo1) and count($hallazgo1)==0 and
          isset($hallazgo2) and count($hallazgo2)==0 and
          isset($hallazgo3) and count($hallazgo3)==0 and
          isset($hallazgo4) and count($hallazgo4)==0 and
          isset($hallazgo5) and count($hallazgo5)==0 and
          isset($hallazgo6) and count($hallazgo6)==0
  ){ 
      echo "<strong>No existe información de esta empresa en la base de datos</strong>";
    }else{ 

?>

<?php if(isset($hallazgo1) and count($hallazgo1)!=0){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Personal MONC que no paso RSC <span class="badge badge-important"><?php if(isset($hallazgo1)) echo count($hallazgo1); else echo "0";?> Hallazgos</span>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        

      <div class="scroll">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th class="tdtable"></th>
              <th class="tdtable">Nombre</th>
              <th class="tdtable">Cedula</th>
              <th class="tdtable">Mano de Obra</th>
              <th class="tdtable">Activo en Andromeda</th>
              <th class="tdtable">RSC</th>
              <th class="tdtable">SP</th>
            </tr>
          </tbody>
          
          <?php foreach ($hallazgo1 as $key => $value){
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->conso_nombre."</td>";
              echo "<td class='tdtable'>".$value->conso_cedula."</td>";
              echo "<td class='tdtable'>".$value->conso_tp_mobra."</td>";
              echo "<td class='tdtable'>".$value->conso_estado_and."</td>";
              echo "<td class='tdtable'>".$value->conso_paso_rsc."</td>";
              echo "<td class='tdtable'>".$value->conso_sp."</td>";
            echo "</tr>";
          } ?>

        </table>
      </div>


      </div>
    </div>
  </div>
  <?php } ?>

<?php if(isset($hallazgo2) and count($hallazgo2)!=0){ ?>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Personal MOC que no paso RSC <span class="badge badge-important"><?php if(isset($hallazgo2)) echo count($hallazgo2); else echo "0"; ?> Hallazgos</span>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        

      <div class="scroll">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th class="tdtable">#</th>
              <th class="tdtable">Nombre</th>
              <th class="tdtable">Cedula</th>
              <th class="tdtable">Mano de Obra</th>
              <th class="tdtable">Activo en Andromeda</th>
              <th class="tdtable">RSC</th>
              <th class="tdtable">SP</th>
            </tr>
          </tbody>
          
          <?php foreach ($hallazgo2 as $key => $value) {
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->conso_nombre."</td>";
              echo "<td class='tdtable'>".$value->conso_cedula."</td>";
              echo "<td class='tdtable'>".$value->conso_tp_mobra."</td>";
              echo "<td class='tdtable'>".$value->conso_estado_and."</td>";
              echo "<td class='tdtable'>".$value->conso_paso_rsc."</td>";
              echo "<td class='tdtable'>".$value->conso_sp."</td>";
            echo "</tr>";
          } ?>

        </table>
      </div>


      </div>
    </div>
  </div>
  <?php } ?>

<?php if(isset($hallazgo3) and count($hallazgo3)!=0){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Personal MOC que NO paso por RSC<span class="badge badge-danger"><?php if(isset($hallazgo3)) echo count($hallazgo3); else echo "0"; ?> Hallazgos</span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        

      <div class="scroll">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th class="tdtable">#</th>
              <th class="tdtable">Nombre</th>
              <th class="tdtable">Cedula</th>
              <th class="tdtable">Comunidad</th>
              <th class="tdtable">Mano de Obra</th>
              <th class="tdtable">Activo en Andromeda</th>
              <th class="tdtable">RSC</th>
              <th class="tdtable">SP</th>
            </tr>
          </tbody>
          
          <?php foreach ($hallazgo3 as $key => $value) {
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->con_nombre."</td>";
              echo "<td class='tdtable'>".$value->con_cedula."</td>";
              echo "<td class='tdtable'>".$value->prem_org_cand."</td>";
              echo "<td class='tdtable'>".$value->con_tp_mobra."</td>";
              echo "<td class='tdtable'>".$value->con_act_and."</td>";
              echo "<td class='tdtable'>".$value->con_rem_rsc."</td>";
              echo "<td class='tdtable'>".$value->con_sp."</td>";
            echo "</tr>";
          } ?>

        </table>
      </div>


      </div>
    </div>
  </div>
  <?php } ?>



<?php if(isset($hallazgo4) and count($hallazgo4)!=0){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#hallazgo4">
          Personal activo en andrómeda con información faltante <span class="badge badge-danger"><?php if(isset($hallazgo4)) echo count($hallazgo4); else echo "0"; ?> Hallazgos</span>
        </a>
      </h4>
    </div>
    <div id="hallazgo4" class="panel-collapse collapse">
      <div class="panel-body">
        

      <div class="scroll">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th class="tdtable">#</th>
              <th class="tdtable">Nombre</th>
              <th class="tdtable">Cedula</th>
              <th class="tdtable">L. Nacimiento</th>
              <th class="tdtable">Cargo</th>
              <th class="tdtable">Mano de Obra</th>
              <th class="tdtable">Activo en Andromeda</th>
              <th class="tdtable">T. Contrato</th>

              <th class="tdtable">RSC</th>
              <th class="tdtable">SP</th>
            </tr>
          </tbody>
          
          <?php foreach ($hallazgo4 as $key => $value) {
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->con_nombre."</td>";
              echo "<td class='tdtable'>".$value->con_cedula."</td>";
              echo "<td class='tdtable'>".$value->con_lug_nac."</td>";
              echo "<td class='tdtable'>".$value->con_cargo."</td>";
              echo "<td class='tdtable'>".$value->con_tp_mobra."</td>";
              echo "<td class='tdtable'>".$value->con_act_and."</td>";
              echo "<td class='tdtable'>".$value->con_tp_contrato."</td>";

              echo "<td class='tdtable'>".$value->con_rem_rsc."</td>";
              echo "<td class='tdtable'>".$value->con_sp."</td>";
            echo "</tr>";
          } ?>

        </table>
      </div>


      </div>
    </div>
  </div>
  <?php } ?>




<?php if(isset($hallazgo5) and count($hallazgo5)!=0){ ?>
 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#hallazgo5">
          TOP 20 Cargos más empleados 
          <span class="badge badge-danger">
            <?php if(isset($hallazgo5)) echo count($hallazgo5); else echo "0"; ?> 
            Hallazgos
          </span>
        </a>
      </h4>
    </div>
    <div id="hallazgo5" class="panel-collapse collapse">
      <div class="panel-body">
        

      <div class="scroll">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th class="tdtable">#</th>
              <th class="tdtable">Cargo</th>
              <th class="tdtable">Ocupantes</th>
            </tr>
          </tbody>
          
          <?php foreach ($hallazgo5 as $key => $value) {
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->conso_cargo."</td>";
              echo "<td class='tdtable'>".$value->suma_cargo."</td>";
            echo "</tr>";
          } ?>

        </table>
      </div>


      </div>
    </div>
  </div>
  <?php } ?>


<?php if(isset($hallazgo6) and count($hallazgo6)!=0){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#hallazgo6">
          Comunidades que remitieron a los MONC que pasaron por RSC <span class="badge badge-danger"><?php if(isset($hallazgo6)) echo count($hallazgo6); else echo "0"; ?> Hallazgos</span>
        </a>
      </h4>
    </div>
    <div id="hallazgo6" class="panel-collapse collapse">
      <div class="panel-body">
        

      <div class="scroll">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th class="tdtable">#</th>
              <th class="tdtable">Comunidad</th>
              <th class="tdtable">Remitidos</th>
            </tr>
          </tbody>
          
          <?php foreach ($hallazgo6 as $key => $value) {
            echo "<tr>";
              echo "<td class='tdtable'>".($key+1)."</td>";
              echo "<td class='tdtable'>".$value->conso_comunidad_rem."</td>";
              echo "<td class='tdtable'>".$value->total."</td>";
            echo "</tr>";
          } ?>

        </table>
      </div>


      </div>
    </div>
  </div>


  <?php 
    } 
  }
  ?>


 
</div>