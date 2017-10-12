<?php
include('conexion.php');
session_start();
$consulas="insert into subtemas(Nombre,Fecha_pre,Fecha_real,Actividad,Recurso,unidad) values";
    $data = json_decode($_POST['arreglo'], true);
    $unidad=json_decode($_POST['unidad'], true);
  for($i=0;$i<count($data);$i++){
      $coma=$i==count($data)-1?"":",";
      
      $consulas=$consulas.$data[$i].$coma;
  }


 $ejecutar=$blabla->query(UTF8_encode($consulas));
 if($ejecutar){
    echo "<script>
                swal('Guardando','Los datos se almacenaron correctamente','success');
                lista.get(tab).forEach(function(item){
                $( '#' + item ).remove() ;
                $('#li'+ item.substring(8)).closest('li').remove();
                 tabs.tabs( 'refresh' );
                 
              }); 
              lista.get(tab).clear(); 
          </script>";
          $consulta="select idUnidad,Ciclo_idCiclo,materias.nombre,idMaterias,unidad.nombre as NombreUni,subtemas.nombre as nomsub,Fecha_pre,Fecha_real,Actividad,Recurso from unidad,materias,nrc,subtemas where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias and idMaterias=idMateria and idMaterias='".$_SESSION['clave']."' and unidad='".$unidad."' and  unidad=idUnidad";
          $ejecutar=$blabla->query($consulta);
          echo '<table id="'.json_decode($_POST['idtabla'],true).'">
	                         <thead>
                                 <tr>
                                       <th width="85" rowspan="2">Subtema</th>
                                       <th colspan="2">Fecha</th>
                                       <th width="100" rowspan="2">Actividad</th>
                                       <th width="100" rowspan="2">Recursos</th>
                                 </tr>
                                 <tr>
                                       <th width="85">Programada</th>
                                       <th width="85">Real</th>
                                 </tr></thead><tbody>';
               while ($fila=$ejecutar->fetch_assoc()) {
                echo "<tr>
                    <td width='85px'>".$fila['nomsub']."</td>
                    <td width='85px'>".$fila['Fecha_pre']."</td>
                    <td width='85px'>".$fila['Fecha_real']."</td>
                    <td width='100px'>".$fila['Actividad']."</td>
                    <td width='100px'>".$fila['Recurso']."</td>
                </tr>"; 
               }
          echo "</tbody></table> ";
 }else{
    echo "<script> swal('Ups!','No se pudieron almacenar','error'); </script>";
	
 }

?>
