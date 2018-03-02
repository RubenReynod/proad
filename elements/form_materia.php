<div class="row">
     <div class="col-sm-6 col-sm-offset-3">
          <form class="form_registro" action="../db/registro-avance.php" method="post" type-form="unidades">
               <input class="clave" type="number" name="datos[clave]" value="" placeholder="Clave" required>
               <input class="nrc" type="text" name="datos[nrc]" value="" placeholder="NRC" required>
               <input class="nombre" type="text" name="datos[nombre]" value="" placeholder="Nombre" required>
               <input class="creditos" type="text" name="datos[creditos]" value="" placeholder="Creditos" required>
               <div class="contenedor">
                   <select class="edificio" name="datos[edificio]" required>
                        <option value="">Edificio..</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="Ñ">Ñ</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                   </select>
                   <i class="fa fa-chevron-down" aria-hidden="true"></i>
               </div>
               <div class="contenedor">
                   <select class="carrera" name="datos[carrera]" required>
                        <option value="">Carrera..</option>
                        <?php foreach ($_SESSION['carreras'] as $key => $value) : ?>
                            <option value="<?=$value[0];?>"><?=$value[1];?></option>
                        <?php endforeach; ?>
                   </select>
                   <i class="fa fa-chevron-down" aria-hidden="true"></i>
               </div>
               <div class="contenedor">
                   <select class="departamento" name="datos[departamento]" required>
                        <option value="">Departamento..</option>
                        <?php foreach ($_SESSION['departamentos'] as $key => $value): ?>
                             <option value="<?php echo $value[0];?>"><?php echo $value[1]; ?></option>
                        <?php endforeach; ?>
                   </select>
                   <i class="fa fa-chevron-down" aria-hidden="true"></i>
               </div>
               <button type="input" name="button" class="btn_form">Guardar y continuar</button>
          </form>

     </div>
</div>
<!--
