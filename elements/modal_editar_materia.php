<?php include('../db/datos.php');
      session_start();
?>
<div class="lightbox">
    <div class="fondo" onclick="close_lightbox()},"></div>

    <div class="registrar body">
        <form id="form-registro" method="post" action="db/registro.php">
           <h1>Edición</h1>
           <hr>
           <div class="content">
             <input class="nombre" type="text" name="" placeholder="Nombre" required>
             <input class="creditos" type="number" name="" placeholder="Creditos"required>
             <div class="contenedor">
                   <select class="edificio" name="" required>
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
                   <select class="carrera" name="" required>
                        
                   </select>
                   <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </div>
             <input class="codigo" type="number" name="" placeholder="Codigo"required>
             <input class="contraseña" type="password" name="" placeholder="Contraseña"required>
             <input class="contraseña2" type="password" name="" placeholder="Confirmar contraseña"required>
             <div class="contenedor">
               <select class="sexo" name="">
                   <option value="">Sexo...</option>
                   <option value="Hombre">Hombre</option>
                   <option value="Mujer">Mujer</option>
               </select>
               <i class="fa fa-chevron-down" aria-hidden="true"></i>
             </div>

             <input type="submit" name="Guardar" value="Guardar">
           </div>
        </form>
        <div class="cerrar" onclick="close_lightbox();">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <div class="lapiz">
           <i class="fa fa-pencil" aria-hidden="true"></i>
        </div>
    </div>
</div>