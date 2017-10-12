<?php
include('conexion.php');
include('datos.php');
session_start();

$registrar = "insert into materias values('".$_POST['clave']."','".$_POST['nombre']."','".$_POST['creditos']."','".$_POST['edificio']."','".$_POST['departamento']."','".$_POST['carrera']."');".
             "insert into nrc values('".$_POST['nrc']."',null,'".$_SESSION['profesor']->idprofesor."','".$_POST['clave']."','2017B');".
             "insert into avance_programatico(nrc,ciclo) values('".$_POST['nrc']."','2017B')";
$ejecutar = conectar()->multi_query(UTF8_encode($registrar));

if ($ejecutar) {
  $avance=array(
          'IdMateria' => $_POST['clave'],
          'nrc' => $_POST['nrc'],
          'NombreMateria' =>$_POST['nombre'],
          'Creditos' => $_POST['creditos'],
          'Edificio' => $_POST['edificio'],
          'Departamentos_idDepartamentos' => $_POST['departamento'],
          'Carrera' => $_POST['carrera'],
          'Unidades' => array());
  $_SESSION['profesor']->addNewMateria($avance);
  echo true;

}else{
   echo false;
}

 ?>
