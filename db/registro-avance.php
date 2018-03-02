<?php
include('conexion.php');
include('datos.php');
session_start();

// insert tabla nrc
$sql = "insert into nrc values('".($_POST["datos"]["nrc"])."','".($_SESSION["profesor"]->id)."')";
$bandera = conectar()->query($sql);
// insert tabla avance
$sql = "insert into avance_programatico(id_nrc) values('".$_POST["datos"]["nrc"]."')";
$id = conectar();
$id->query($sql);
// insert tabla materias
$sql = "insert into materias values('".$_POST["datos"]["clave"]."','".$_POST["datos"]["nombre"]."','".$_POST["datos"]["creditos"]."',".
                                    "'".$_POST["datos"]["edificio"]."','".$id->insert_id."','".$_POST["datos"]["departamento"]."','".$_POST["datos"]["carrera"]."')";
                                    
$bandera = conectar()->query($sql);                                    

$status['status'] = $bandera;

echo json_encode($status);

?>
