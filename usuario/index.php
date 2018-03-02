<?php include('../db/datos.php');
      session_start();?>
<?php if (!empty($_SESSION['profesor'])):?>
<html>
<?php $_SESSION['vista']='usuario'; ?>
<!-- header -->
   <?php echo include('../elements/header.php'); ?>
<!-- header -->
  <body>
     <!-- lightbox unidad -->
     <?php echo include('../elements/lightbox-unidad.php'); ?>
     <!-- lightbox unidad -->
     <div class="usuario">
       <!-- menu -->
          <?php echo include('../elements/menufixed.php') ?>
       <!-- menu -->
       <!-- body -->
       <div class="container">
         <h3>Lugar ideal para crear tu avance programatico</h3>
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1 secciones active" id="instrucciones">
                <div class="row">
                    <div class="col-sm-4 ">
                        <div class="rojo inicio">
                             <h2>Instrucciones</h2>
                             <p>Inicio: Te muestra el menú de instrucciones.</p>
                             <p class="gris">Crear: Puedes generar contenido nuevo ya sea: Materia, unidad y subtema.</p>
                             <p>Edición: Te permite modificar, imprimir y seleccionar.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="azul inicio">
                            <h2>Beneficios</h2>
                            <p>En esta seccion puedes crear un avance nuevo</p>
                            <p class="gris">Registrar las unidades que necesites</p>
                            <p>Comodo y facil de usar</p>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="rojo inicio">
                             <h2>Editar</h2>
                             <p>Aqui podras modificár cualquier avance programatico</p>
                             <p class="gris">Quitar y poner datos en un avance programatico</p>
                             <p>Crear un avance basado en un avance programatico</p>
                             <p class="gris">Podrás consultar tus avances</p>
                             <p>Seleccionar uno y editarlo</p>
                             <p class="gris">Revisar los avances que has hecho</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-1 secciones" id="crear_materia">
                  <!-- formulario materia -->
                  <?php echo include('../elements/form_materia.php'); ?>
                  <!-- formulario materia -->
            </div>
            <div class="col-sm-10 col-sm-offset-1 secciones " id="crear_unidades">
              <!-- select materia -->
              <!-- select materia -->
            </div>
            <div class="col-sm-10 col-sm-offset-1 secciones" id="crear_subtemas">
              <!-- select materia -->
              <!-- select materia -->
            </div>
            <div class="col-sm-10 col-sm-offset-1 secciones" id="edicion">
              <!-- acciones de edición -->
              <?php echo include('../elements/seccion_edicion.php'); ?>
              <!-- acciones de edición -->
            </div>
            <div class="col-sm-10 col-sm-offset-1 secciones" id="nosotros">
       <div class="row">
         <div class="col-sm-4 ">
           <div class="recuadro  subir">
         <div class="imagen" style=" background-image: url('../imagenes/mario.jpg') ;">



         </div>
         <div class="texto">
           <p>Mario Efrain Torres Macias</p>
           <p>metm2692@hotmail.com</p>

         </div>
         </div>
       </div>
         <div class="col-sm-4 ">
           <div class="recuadro bajar">
           <div class="imagen" style=" background-image: url('../imagenes/ruben.jpg') ;" >

           </div>
           <div class="texto">
             <p>Ruben Ramirez Briseño</p>
             <p>ruben_23292@hotmail.com</p>
           </div>
         </div>
       </div>
         <div class="col-sm-4 ">
           <div class="recuadro  subir">
           <div class="imagen " style=" background-image: url('../imagenes/mia.jpg') ;">

           </div>
           <div class="texto">
             <p>Flavio Cesar Carrillo Blanquel</p>
             <p>nose@hotmail.com</p>

           </div>
         </div>
       </div>
       </div>
            </div>
         </div>
       </div>
       <!-- body -->
     </div>
  </body>
  <!-- footer -->
     <?php echo include('../elements/footer.php'); ?>
  <!-- footer -->
</html>
<?php else :
          header("Location: ../");
      endif;?>
