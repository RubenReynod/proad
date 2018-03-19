<?php
include('../db/conexion.php');
include('../db/datos.php');
session_start();

$sql="insert into subtemas(Nombre,fecha_programada,fecha_real,Actividad,Recurso,id_unidad) values('".$_POST['datos']['nombre']."','".$_POST['datos']['fecha_programada']."','".$_POST['datos']['fecha_real']."','".$_POST['datos']['actividad']."','".$_POST['datos']['recurso']."','".$_POST['datos']['id_unidad']."')";

$id=conectar();
$id->query($sql);

$status['status'] = empty($id)?false:true;

echo json_encode($status);

?>