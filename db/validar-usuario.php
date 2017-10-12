<?php
session_start();
include('conexion.php');
include('datos.php');
//Llave para desencriptar contraseña
$_SESSION['AES']='f95EaM10';
$_SESSION['user'] =$_POST['user'];
$_SESSION['password']=$_POST['password'];
$_SESSION['login'] = false;


$consulta="select * from profesores where idprofesor='".$_SESSION['user']."' and AES_DECRYPT(password,'".$_SESSION['AES']."')='".$_SESSION['password']."'";
$ejecutar_consulta=conectar()->query($consulta);
$fila=mysqli_fetch_array($ejecutar_consulta);

// Verificamos si la consulta obtubo datos
if(!empty($fila['idprofesor']) ){
     $_SESSION['login'] = true;
     //Datos del profesor
     $_SESSION['profesor'] = new Usuario($fila['idprofesor'],$fila['Nombre'],$fila['ApellidoP'],$fila['ApellidoM'],$fila['Status'],$fila['sexo']);
     // consulta de los avances programaticos
$consultaGeneral="select profesores.idprofesor as Codigo,idNRC as nrc,
       materias.idMaterias as IdMateria,materias.nombre as NombreMateria,materias.Creditos as Creditos,materias.Edificio as Edificio,materias.Carrera as Carrera,materias.Departamentos_idDepartamentos,
       unidad.idUnidad as IdUnidad,unidad.Nombre as NombreUnidad,unidad.Evaluacion_programado as UEvaluacionP,unidad.Evaluacion_real as UEvaluacionR,
       subtemas.idSubtemas as IdSubtema,subtemas.Nombre as NombreSubtema,subtemas.Fecha_pre as SEvaluacionP,Fecha_real as SEvaluacionR,subtemas.Actividad as Actividad,subtemas.Recurso as Recurso
       from profesores left join nrc on nrc.Profesores_idProfesores = profesores.idprofesor
       left join materias on nrc.Materias_idMaterias = materias.idMaterias
       left join unidad on unidad.idMateria=materias.idMaterias
       left join subtemas on subtemas.unidad=unidad.idUnidad where profesores.idprofesor='".$fila['idprofesor']."'";

$_SESSION['profesor']->addAvances($consultaGeneral);

$consultaDep = 'SELECT * FROM departamentos';

$ejecutar_consultaDep = conectar()->query($consultaDep);

$_SESSION['departamentos'] = array();
while ($fila=mysqli_fetch_array($ejecutar_consultaDep)) {
    $_SESSION['departamentos'][$fila['idDepartamentos']] = $fila['nombre'];
}
//$Usuario->Avance($ejecutar_consulta2);
}else{
     $_SESSION['login'] = false;
}



// mandamos una respuesta al js
echo $_SESSION['login'];
?>
