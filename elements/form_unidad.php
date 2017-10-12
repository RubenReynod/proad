<?php include('../db/datos.php');
      session_start();
?>
<div class="row">
      <div class="info_materia">
            <p class="nrc"><b>NRC: </b><?php echo $_SESSION['profesor']->avances[$_GET['clave']]['Nrc']; ?></p>
            <p class="clave" id="<?=$_GET['clave'];?>"><b>Clave: </b><?php echo $_GET['clave']; ?></p>
            <p class="nombre"><b>Nombre de la materia: </b><?php echo $_SESSION['profesor']->avances[$_GET['clave']]['NombreMateria']; ?></p>
      </div>
      <div class="col-xs-9">
              <nav id="tab_unidad"  class="table_tabs">

              </nav>
      </div>
      <div class="col-xs-3">
              <button class="btn_form btn_agregar" onclick="show_lightbox('lightbox-add','unidad');"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar unidad</button>
      </div>
      <div class="col-sm-7" id="formularios">

      </div>
      <div class="col-sm-5 table_">

          <div class="row table_title">
              <div class="col-xs-8 col-xs-offset-4 ">
                  <p>fecha</p>
              </div>
              <div class="col-xs-4 nopadding">
                  <p>Nombre</p>
              </div>
              <div class="col-xs-4 nopadding">
                  <p>Programada</p>
              </div>
              <div class="col-xs-4 nopadding">
                  <p>Real</p>
              </div>
          </div>
          <?php $cont = 1;
              foreach ($_SESSION['profesor']->avances[$_GET['clave']]['Unidades'] as $key => $value) : ?>
              <div class="row row_table <?php echo ($cont%2)==0?"dark":"clear"; ?>">
                   <div class="nombre col-xs-4 nopadding" id="row-<?php ?> ">
                        <p><?php echo $value['NombreUnidad']; ?></p>
                   </div>
                   <div class="fecha_pro col-xs-4 nopadding" id="row-<?php ?> ">
                        <p><?php echo $value['UEvaluacionP']; ?></p>
                   </div>
                   <div class="fecha_real col-xs-4 nopadding" id="row-<?php ?> ">
                        <p><?php echo $value['UEvaluacionR']; ?></p>
                   </div>
              </div>
          <?php $cont = $cont + 1;
               endforeach;?>
      </div>
      <button type="button" class ="btn_form" onclick="guardar_unidad();">Guardar</button>
</div>
<!--
