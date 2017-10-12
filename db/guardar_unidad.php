<?php
include('../db/conexion.php');
include('../db/datos.php');
session_start();

$consulta="insert into unidad(idMateria,Nombre,Evaluacion_programado,Evaluacion_real) values(".$_POST['clave'].",'".$_POST['nombre']."','".$_POST['Fecha_programada']."','".$_POST['Fecha_real']."')";
$id=conectar();
if($id->query($consulta)){
    $unidad=array(
         'IdMateria' => $_POST['clave'],
         'IdUnidad' => $id->insert_id,
         'NombreUnidad' => $_POST['nombre'],
         'UEvaluacionP' => $_POST['Fecha_programada'],
         'UEvaluacionR' => $_POST['Fecha_real']
    );
    $_SESSION['profesor']->addNewUnidad($unidad);
    echo true;
}else{
   echo false;
}


?>
