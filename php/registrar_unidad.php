<?php
include('conexion.php');
$consultaDepartamento="select * from departamentos";
$ejecutar_consultaDepartamentos=$blabla->query($consultaDepartamento);
$consultaAvance="select * from avance_programatico";
$ejecutar_consultaAvance=$blabla->query($consultaAvance);
$Id_formulario='<script> document.write("Formulario-"+tabCounter);</script>';
?>

<body>
   <head>
      <script src="js/idioma.js"></script>
   </head>
   <script>
      form.setAttribute("id","Form-"+(tabCounter-1));
   </script>
   
<form  id="form" action="crear_unidad.php" method="post">
 
<input class="campo campo_form"  type="text" name="Nombre"  title="Nombre" placeholder="Nombre" required="required"/>
<br />
<input class="campo fecha campo_form"  type="date" value="Evaluaccion Programada" title="Evaluaccion Programada" required="required"/>

<br />
<input class="campo fecha campo_form"  type="date" value="Evaluaccion Real" title="Evaluaccion Real" required="required"/>
      <br />
</form> 
</body>
</html>