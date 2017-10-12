<?php   
session_start();
include('conexion.php');
$_SESSION['AES']='f95EaM10';
$_SESSION['start'] = 'puerta';
$_SESSION['user'] =$_POST['user'];
$_SESSION['password']=$_POST['password'];
 if (isset($_SESSION['start']) && $_SESSION['start']=='puerta') {
      $consulta="select idprofesor,password from profesores where idprofesor='".$_SESSION['user']."' and AES_DECRYPT(password,'".$_SESSION['AES']."')='".$_SESSION['password']."'";
      $ejecutar_consulta=$blabla->query($consulta);
      $fila=mysqli_fetch_array($ejecutar_consulta);
      if(!empty($fila['idprofesor'])){
	 header('Location: ../principal.php');
      }else{
	 header('Location: ../index.html');
      }
 }
?>
