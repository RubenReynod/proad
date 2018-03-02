<?php
session_start();
include('conexion.php');
include('datos.php');
$_SESSION['AES']='f95EaM10';
$_SESSION['login']=false;

    $consulta="insert into profesores values('".$_POST['datos']['Codigo']."','".$_POST['datos']['Nombre']."','".$_POST['datos']['ApellidoP']."','".$_POST['datos']['ApellidoM']."','Activo',AES_ENCRYPT('".$_POST['datos']['password']."','".$_SESSION['AES']."'),'".$_POST['datos']['sexo']."')";

    $ejecutar=conectar()->query($consulta);
    $_SESSION['login']=$ejecutar?true:false;

    $resp['status']=$_SESSION['login'];

    $consulta_datos = "SELECT p.Codigo, p.Nombre as nombre_profesor,p.ApellidoM, p.ApellidoP, p.sexo,n.id as nrc, c.id as ciclo, m.*,u.id as id_unidad, u.Nombre as nombre_unidad, u.Evaluacion_programada, u.Evaluacion_real, d.nombre as nombre_departamento,ca.id as id_carrera,ca.nombre as nombre_carreras, ca.siglas, s.id as id_subtema, s.fecha_programada, s.fecha_real, s.Nombre as nombre_subtema, s.Actividad, s.Recurso from profesores p ".
                                                       "left join nrc n on n.id_profesor=p.Codigo ".
                                                       "left join avance_programatico ap on ap.id_nrc=n.id ".
                                                       "left join ciclo c on c.id=ap.id_ciclo ".
                                                       "left join materias m on m.id_avance=ap.id ".
                                                       "left join departamentos d on m.id_departamento=d.id ".
                                                       "left join carreras ca on m.id_carrera=ca.id ".
                                                       "left join unidades u on u.id_materia=m.Clave ".
                                                       "left join subtemas s on s.id_unidad=u.id ".
                                                       "where p.Codigo=".$_POST['datos']['Codigo'];

    $_SESSION['profesor'] = new Usuario($_POST['datos']['Codigo'],$_POST['datos']['Nombre'],$_POST['datos']['ApellidoP'],$_POST['datos']['ApellidoM'],$_POST['datos']['sexo']);

    $_SESSION['profesor']->addAvances($consultaGeneral);

    echo json_encode($resp,JSON_FORCE_OBJECT);

    
    /*if ($_SESSION['login']) {
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
    }*/


?>
