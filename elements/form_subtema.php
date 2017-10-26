<?php include('../db/datos.php');
      session_start();
?>
<div class="row">
      <div class="info_materia">
            <p class="nrc"><b>NRC: </b><?php echo $_SESSION['profesor']->avances[$_GET['clave']]['Nrc']; ?></p>
            <p class="clave" id="<?=$_GET['clave'];?>"><b>Clave: </b><?php echo $_GET['clave']; ?></p>
            <p class="nombre"><b>Nombre de la materia: </b><?php echo $_SESSION['profesor']->avances[$_GET['clave']]['NombreMateria']; ?></p>
      </div>
      <div class="col-xs-2">
            <?php foreach ($_SESSION['profesor']->avances[$_GET['clave']]['Unidades'] as $key => $value) : ?>
                 <div id="u-<?php echo $key ?>" class="tabs__" status="inactive" onclick="show_forms(this);">
                      <p><?php echo $value['NombreUnidad']; ?></p>
                 </div>
            <?php endforeach; ?>
      </div>
      <?php foreach ($_SESSION['profesor']->avances[$_GET['clave']]['Unidades'] as $key => $value) : ?>
      <div class="col-xs-10 forms__" id="<?='form-'.$key ?>" status="inactive">
            <div class="row">
                   <div class="col-xs-9">
                         <nav id="tab_subtema<?=$key;?>" class="table_tabs">

                         </nav>
                   </div>
                   <div class="col-xs-3">
                           <button class="btn_form btn_agregar" onclick="show_lightbox('lightbox-add','subtema',<?=$key;?>);"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Subtema</button>
                   </div>
            </div>
            <div class="row">
                <div class="col-sm-5 formularios">

                </div>
                <div class="col-sm-7 table_">
                     <div class="row table_title">
                         <div class="col-xs-4 col-xs-offset-2 ">
                             <p>fecha</p>
                         </div>
                     </div>
                     <div class="row table_title">
                         <div class="col-xs-2 nopadding">
                             <p>Subtema</p>
                         </div>
                         <div class="col-xs-2 nopadding">
                             <p>Programada</p>
                         </div>
                         <div class="col-xs-2 nopadding">
                             <p>Real</p>
                         </div>
                         <div class="col-xs-3 nopadding">
                             <p>Actividad</p>
                         </div>
                         <div class="col-xs-3 nopadding">
                             <p>Recursos</p>
                         </div>
                     </div>
                     <?php $cont=2;
                     foreach ($value['Subtemas'] as $key2 => $value2) : ?>
                         <div class="row row_table <?=(($cont%2)==0?'clear':'dark')?>">
                              <div class="col-xs-2 nopadding">
                                  <p>Subtema</p>
                              </div>
                              <div class="col-xs-2 nopadding">
                                  <p>Programada</p>
                              </div>
                              <div class="col-xs-2 nopadding">
                                  <p>Real</p>
                              </div>
                              <div class="col-xs-3 nopadding">
                                  <p>Actividad</p>
                              </div>
                              <div class="col-xs-3 nopadding">
                                  <p>Recursos</p>
                              </div>
                         </div>
                     <?php endforeach; ?>
                </div>
            </div>
            <button type="button" class ="btn_form" onclick="guardar_subtema(this);">Guardar</button>
      </div>
      <?php endforeach; ?>
</div>
