<?php
include('../db/conexion.php');
include('../db/datos.php');
session_start();

$consulta="insert into subtemas(Nombre,Fecha_pre,Fecha_real,Actividad,Recurso,unidad) values('".$_POST['nombre']."','".$_POST['fecha_programada']."','".$_POST['fecha_real']."','".$_POST['actividad']."','".$_POST['recurso']."','".$_POST['unidad']."')";
$id=conectar();
if($id->query($consulta)){
    $subtema=array(
         'IdMateria' => $_POST['id_materia'], 
         'IdUnidad' => $_POST['unidad'],
         'IdSubtema' => $id->insert_id,
         'NombreSubtema' =>  $_POST['nombre'],
         'SEvaluacionP' => $_POST['fecha_programada'],
         'SEvaluacionR' => $_POST['fecha_real'],
         'Actividad' => $_POST['actividad'],
         'Recurso' => $_POST['recurso']
    );
    $_SESSION['profesor']->addNewSubtema($subtema);
    echo true;
}else{
    echo false;
}


?>