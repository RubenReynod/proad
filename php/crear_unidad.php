<?php
include('conexion.php');
session_start();
    $consulas="insert into unidad(idMateria,nombre,Evaluacion_programado,Evaluacion_real,avance) values";
    $data = json_decode($_POST['arreglo'], true);
    $consulta="select unidad.nombre as NombreUni,Evaluacion_programado,Evaluacion_real from unidad,materias,nrc where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias and idMaterias=idMateria and idMaterias='".$_SESSION['clave']."'";
    
  for($i=0;$i<count($data);$i++){
      $coma=$i==count($data)-1?"":",";
      $consulas=$consulas.$data[$i].$coma;
  }
    $ejecutar=$blabla->query(UTF8_encode($consulas));
    echo json_decode($_POST['btn']);
 if($ejecutar){
     $ejecutar=$blabla->query($consulta);
     echo "<script> swal('Guardando','Los datos se almacenaron correctamente','success'); </script>";
    switch(json_decode($_POST['btn'],true)){
	case 'Guardar':
	            echo '<table class="tabla">
                                 <thead>
                                 <tr>
                                       <th width="85px" rowspan="2">Nombre</th>
                                       <th colspan="2">Fecha</th>
                                 </tr>
                                 <tr>
                                       <th width="85px" >Programada</th>
                                       <th width="85px" >Real</th>
                                 </tr></thead><tbody>';
                            
                        while($fila=$ejecutar->fetch_assoc()){
                            echo '<tr>
                                       <td width="85px">'.$fila['NombreUni'].'</td>
                                       <td width="85px">'.$fila['Evaluacion_programado'].'</td>
                                       <td width="85px">'.$fila['Evaluacion_real'].'</td>
                                  </tr>';
                        }
                        echo '</tbody></table>';
			
			echo "<script>
		lista.forEach(function(item){
                 $('#li'+ item).closest('li').remove();
		$( '#tabs-' + item ).remove();
              }); 
              lista.clear();
	      document.getElementById('Siguiente').disabled=false;
			</script>";
	    break;
	case 'Siguiente':
	    echo '<script>
	           $("#peticion").load("php/tabSubtema.php");
	    </script>';
	    break;
    }
    /*echo "<script>
                swal('Guardando','Los datos se almacenaron correctamente','success');
                   if (boton=='Guardar') {
		    $('#peticion').load('html/instrucciones.html');
		}else if (boton=='Siguiente') {
		    $('#peticion').load('php/tabSubtema.php');
		}
          </script>";*/
 }else{
    echo "<script> swal('Ups!','No se pudieron almacenar','error'); </script>";
	
 }
?>
