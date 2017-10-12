<?php
include('conexion.php');
session_start();
$_SESSION['nrc']=$_POST['idMateria'];
$_SESSION['clave']=$_POST['clave'];
$_SESSION['nombreMateria']=$_POST['nombre'];
$creditos=$_POST['creditos'];
$edificio=$_POST['edificio'];
$departamento=$_POST['departamento'];
$carrera=$_POST['carreras'];

$consultaCiclo="select * from ciclo order by idCiclo desc";
$ciclo=$blabla->query($consultaCiclo);
$ciclo=mysqli_fetch_array($ciclo);
$ciclo=utf8_decode($ciclo['idCiclo']);


    $consulas="insert into materias values('".$_SESSION['clave']."','".$_SESSION['nombreMateria']."','$creditos','$edificio','$departamento','$carrera');";
    $consulas .="insert into nrc values('".$_SESSION['nrc']."','----','".$_SESSION['user']."','".$_SESSION['clave']."','$ciclo');";
    $consulas .="insert into avance_programatico(nrc,ciclo) values('".$_SESSION['nrc']."','$ciclo')";
    $ejecutar=$blabla->multi_query(UTF8_encode($consulas));
 if($ejecutar){
    echo "<script>
                swal('Guardando','Los datos se almacenaron correctamente','success');
                   if (boton=='Guardar') {
		    $('#peticion').load('html/instrucciones.html');
		}else if (boton=='Siguiente') {
		    $('#peticion').load('html/addtab.php');
		}
          </script>";
 }else{
    echo "<script> swal('Ups!','No se pudieron almacenar','error'); </script>";
	
 }
 ?>
