<?php  
function get_avances($id){
	$consulta_datos = "SELECT p.Codigo, p.Nombre as nombre_profesor,p.ApellidoM, p.ApellidoP, p.sexo,n.id as nrc, c.id as ciclo, m.*,u.id as id_unidad, u.Nombre as nombre_unidad, u.Evaluacion_programada, u.Evaluacion_real, d.nombre as nombre_departamento,ca.id as id_carrera,ca.nombre as nombre_carreras, ca.siglas, s.id as id_subtema, s.fecha_programada, s.fecha_real, s.Nombre as nombre_subtema, s.Actividad, s.Recurso from profesores p ".
                                                       "left join nrc n on n.id_profesor=p.Codigo ".
                                                       "left join avance_programatico ap on ap.id_nrc=n.id ".
                                                       "left join ciclo c on c.id=ap.id_ciclo ".
                                                       "left join materias m on m.id_avance=ap.id ".
                                                       "left join departamentos d on m.id_departamento=d.id ".
                                                       "left join carreras ca on m.id_carrera=ca.id ".
                                                       "left join unidades u on u.id_materia=m.Clave ".
                                                       "left join subtemas s on s.id_unidad=u.id ".
                                                       "where p.Codigo=".$id;
    $_SESSION['profesor']->addAvances($consulta_datos);                                                       
}
?>