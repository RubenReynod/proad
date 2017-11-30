<?php 
include('conexion.php');
include('datos.php');
session_start();
function eliminar ($tabla, $clave){
	$consulta="DELETE  from $tabla where idMaterias='$clave'";
	$ejecutar=conectar()->query($consulta);
	$respuesta["respuesta"] =false;
  if ($ejecutar) {
  	$respuesta["respuesta"] = true;
  	unset($_SESSION['profesor']->avances[$clave]);
  }else{
    $respuesta["respuesta"] = false;
  }
  echo json_encode($respuesta,JSON_FORCE_OBJECT);
}

eliminar($_POST['tabla'],$_POST['id']);

 ?>