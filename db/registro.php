<?php
session_start();
include('conexion.php');
include('datos.php');
$_SESSION['AES']='f95EaM10';
$_SESSION['login']=false;
if ($_POST['contraseña']==$_POST['contraseña2']) {

    $consulta="insert into profesores values('".$_POST['codigo']."','".$_POST['nombre']."','".$_POST['apellidoP']."','".$_POST['apellidoM']."','Activo',AES_ENCRYPT('".$_POST['contraseña']."','".$_SESSION['AES']."'),'".$_POST['sexo']."')";
    $ejecutar=conectar()->query($consulta);
    $_SESSION['login']=$ejecutar?true:false;

    if ($_SESSION['login']) {
        $_SESSION['profesor'] = new Usuario($_POST['codigo'],$_POST['nombre'],$_POST['apellidoP'],$_POST['apellidoM'],'activo',$_POST['sexo']);

        $consultaGeneral="select profesores.idprofesor as Codigo,idNRC as nrc,
               materias.idMaterias as IdMateria,materias.nombre as NombreMateria,materias.Creditos as Creditos,materias.Edificio as Edificio,materias.Carrera as Carrera,materias.Departamentos_idDepartamentos,
               unidad.idUnidad as IdUnidad,unidad.Nombre as NombreUnidad,unidad.Evaluacion_programado as UEvaluacionP,unidad.Evaluacion_real as UEvaluacionR,
               subtemas.idSubtemas as IdSubtema,subtemas.Nombre as NombreSubtema,subtemas.Fecha_pre as SEvaluacionP,Fecha_real as SEvaluacionR,subtemas.Actividad as Actividad,subtemas.Recurso as Recurso
               from profesores left join nrc on nrc.Profesores_idProfesores = profesores.idprofesor
               left join materias on nrc.Materias_idMaterias = materias.idMaterias
               left join unidad on unidad.idMateria=materias.idMaterias
               left join subtemas on subtemas.unidad=unidad.idUnidad where profesores.idprofesor='".$_POST['codigo']."'";

        $_SESSION['profesor']->addAvances($consultaGeneral);

        $consultaDep = 'SELECT * FROM departamentos';

        $ejecutar_consultaDep = conectar()->query($consultaDep);

        $_SESSION['departamentos'] = array();
        while ($fila=mysqli_fetch_array($ejecutar_consultaDep)) {
            $_SESSION['departamentos'][$fila['idDepartamentos']] = $fila['nombre'];
        }

        echo $_SESSION['login'];
    }

}else{

    echo 2;

}
?>
