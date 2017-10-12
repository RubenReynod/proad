<?php
include('conexion.php');
$consultaDepartamento="select * from departamentos";
$ejecutar_consultaDepartamentos=$blabla->query($consultaDepartamento);

$consultaCarrera="select * from carreras";
$ejecutar_carrera=$blabla->query($consultaCarrera);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script src='js/materia.js'></script>
</head>
     
<body>
    <div  style="color: red" id="mensaje"></div>
    <form id="RegistroMateria" action="php/crear_materia.php" method="post">
<br />
<input class="campo campo_form" type="number" name="clave" placeholder="Clave" title="Clave" required="required">
<br />
<input class="campo campo_form" type="text" name="idMateria"  placeholder="NRC" title="nrc" required="required"/>
<br />
<input class="campo campo_form" type="text" name="nombre"  placeholder="Nombre" title="nombre" required="required"/>
<br />
<input class="campo campo_form" type="text" name="creditos"  placeholder="Creditos" title="creditos" required="required"/>
<br />
<select class="campo campo_form" title="edificio" name="edificio" required="required" ><option value="" >Edificio..</option>'+  
                '<option value="A">A</option>'+
                '<option value="B">B</option>'+
                '<option value="C">C</option>'+
                '<option value="D">D</option>'+
                '<option value="E">E</option>'+
                '<option value="F">F</option>'+
                '<option value="G">G</option>'+
                '<option value="H">H</option>'+
                '<option value="I">I</option>'+
                '<option value="J">J</option>'+
                '<option value="K">K</option>'+
                '<option value="L">L</option>'+
                '<option value="M">M</option>'+
                '<option value="N">N</option>'+
                '<option value="O">O</option>'+
                '<option value="P">P</option>'+
                '</select>
<br/>
<select class="campo campo_form" name="carreras" required="required">
    <option value="">Carrera...</option>
    <?php
         while($registro=$ejecutar_carrera->fetch_assoc()){
         echo '<option value="'.$registro["Nombre"].'">'.$registro["Nombre"].'</option>';
         }
    ?>
</select>

<br />
<select class="campo campo_form" name="departamento" required="required">
   <option  value="">Departamento...</option>
   <?php
       while($registro=$ejecutar_consultaDepartamentos->fetch_assoc()){
		   echo"<option value=".$registro['idDepartamentos'].">".$registro['nombre']."</option>";
		   }
   ?>
</select>

<br />
<input class="btn_materia btn_form" id="Guardar" type="submit" name="Guardar" value="Guardar"/>
<input class="btn_materia btn_form" id="Siguiente" type="submit" name="Siguiente" value="Siguiente"/>
    </form>

    <!--<input value="alerta" type="button" onclick="javascript:cargar('php/registrar_unidad.php')" />-->
</body>
</html>