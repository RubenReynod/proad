<?php
session_start();
include('conexion.php');
$_SESSION['AES']='f95EaM10';
$_SESSION['user'] =$_POST['Codigo'];
$consulta ="insert into profesores values('".$_SESSION['user']."','".$_POST['Nombre']."','".$_POST['ApellidoP']."','".$_POST['ApellidoM']."','Activo',AES_ENCRYPT('".$_POST['Contrasena']."','".$_SESSION['AES']."'),'".$_POST['Sexo']."')";
$ejecutar=$blabla->query($consulta);
if ($ejecutar){
    header('Location: ../principal.php');
}else{
    echo '<script>window.history.back();</script>';
}
?>