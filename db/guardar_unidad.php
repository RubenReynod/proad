<?php
include('../db/conexion.php');
include('../db/datos.php');
session_start();

$sql="insert into unidades(id_materia,Nombre,Evaluacion_programada,Evaluacion_real) values(".$_POST['datos']['id'].",'".$_POST['datos']['nombre']."','".$_POST['datos']['fecha_programada']."','".$_POST['datos']['fecha_real']."')";
$id=conectar();
$id->query($sql);

$status['status'] = empty($id)?false:true;
echo json_encode($status);

/*if($id->query($consulta)){
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
}*/


?>
