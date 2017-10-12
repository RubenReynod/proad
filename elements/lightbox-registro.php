
<div class="lightbox">
    <div class="fondo" onclick="close_lightbox()},"></div>

    <div class="registrar body">
        <form id="form-registro" method="post" action="db/registro.php">
           <h1>Registro</h1>
           <hr>
           <div class="content">
             <input class="nombre" type="text" name="" placeholder="Nombre" required>
             <input class="apellidoP" type="text" name="" placeholder="Apellido Paterno"required>
             <input class="apellidoM" type="text" name="" placeholder="Apellido Materno"required>
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
<!--
