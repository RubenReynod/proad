<?php include('../db/datos.php');
      include('../db/conexion.php');
      session_start();
      include('../db/avances.php');
      get_avances($_SESSION['profesor']->id);
?>
<div class="row">

    <div class="col-sm-5 col-sm-offset-7">
        <h2 class="nube">Selecciona una materia para continuar</h2>
    </div>

    <div class="col-sm-6 col-sm-offset-3">

          <div class="contenedor">
                <select name="" id="select_avance">
                   <option value="">NRC - Clave - Nombre</option>
                    <?php if ($_GET['btn']=='unidades') : ?>
                        <?php foreach ($_SESSION['profesor']->avances as $key => $value): ?>
                            <option value="<?php echo $key; ?>"><b style="color:#000;"><?php echo $value['nrc']." - ".$key." - ".$value['nombre']; ?></b></option>
                        <?php endforeach; ?>
                    <?php elseif ($_GET['btn']=='subtemas') : ?>
                        <?php foreach ($_SESSION['profesor']->avances as $key => $value): ?>
                            <?php if (count($value['unidades']) > 0) :  ?>
                                 <option value="<?php echo $key; ?>"><b style="color:#000;"><?php echo $value['nrc']." - ".$key." - ".$value['nombre']; ?></b></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </div>

    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <button onclick="add_content('<?php echo $_GET['btn'];?>');" type="button" name="button" class="btn_form">Continuar</button>
    </div>

</div>
<!--
