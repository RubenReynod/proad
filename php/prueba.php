<?php
    // Se carga el archivo principal de la librería
    require_once('html2pdf/html2pdf.class.php');
	session_start();
	

	    include("Conexion.php");
		$consultaUni="select unidad.nombre as nombre_eva,subtemas.nombre as nombre_sub,Actividad,Recurso,Fecha_pre,Fecha_real,Evaluacion_programado,Evaluacion_real,subtemas.nombre as nombre_sub from nrc,materias,unidad,subtemas where unidad=idunidad and profesores_idprofesores='".$_SESSION['user']."' and materias_idmaterias='".$_GET['Clave']."' and materias_idmaterias=idmateria and idmateria=idmaterias";
		
		$Datos="select profesores.nombre as nombre_prof,apellidoP,apellidoM,idprofesor,idNRC,Ciclo_idCiclo,materias.nombre as nombre_mat,idMaterias,carrera,departamentos.nombre as nombre_dep from profesores,nrc,materias,departamentos where profesores_idprofesores=idprofesor and idprofesor='".$_SESSION['user']."' and idmaterias='".$_GET['Clave']."'  and Materias_idMaterias=idMaterias and Departamentos_idDepartamentos=idDepartamentos";
		$cont="select count(*) from unidad where idMateria='".$_GET['Clave']."'";
		$cont=$blabla->query($cont);
		$cont=mysqli_fetch_assoc($cont);
	    $consulta=$blabla->query($Datos);
	    
	 $consulta2=$blabla->query($consultaUni);
         $fila=mysqli_fetch_array($consulta);
	       
	$materia="";
    
    ob_start();
	if($consulta2==FALSE | $Datos==FALSE){
            die(mysqli_error('Algo fallo'));
     }else{ 
	echo '<style type="text/css">
     #UDG {margin-top:-80px;
	       text-align: right; width:90%;
     }
	 #datos{
		   margin-left:60px;
     }
	 #nrc{
	      margin-top: -44px;
		  margin-left:460px;	 
     }
	 #datos2{
	      margin-top: -57px;
		  margin-left:750px;	 
     }
     
#encabezado {
            position:absolute;
            text-align:center;
            top:35px;
            left:40px;
        }

     .centrar{
     	height:400px;
     	width:900px;
     	margin-top:-100px;
     	margin-left:-450px;
     	left:50%;
     	top:50%;
     	position:absolute;
     }
     table {
  empty-cells: hide;
  border-collapse: collapse;
        }
	table td strong{
	    font-family:trapro-b;
	}
</style>';
echo '<IMG SRC="../imagenes/escudo.png" style="position:absolute; left:30px; top:15px; WIDTH=50 HEIGHT=70 BORDER=2 ALT="Obra de K. Haring">';

echo '<div id="UDG">';

    echo '<p>Universidad de Guadalajara <br> Centro Universitario Cucienega</p>';

    echo '</div>';
	
	echo'<br><br><br><br><br><br>';
	echo '<DIV align="center">';
        echo'<h3 style="font-family:trapro-b;">PROGRAMACIÓN DE CURSO Y AVANCE PROGRAMATICO</h3>';
    echo'</DIV>';
    // Datos avance programatico (inicio)
echo '<div class="posicion">';  
echo '<table style="font-size: 15px;">
          <tr>
	        <td colspan="2"><strong>Fecha: </strong>'.date('d-m-Y').'</td>
		<td><strong>Departamento:</strong> '.utf8_decode($fila['nombre_dep']).'</td>
	  </tr>
	  <tr>
	        <td colspan="2"><strong>Materia: </strong>'.utf8_decode($fila['nombre_mat']).'</td>
		<td><strong>Total de unidades: </strong>'.$cont['count(*)'].'</td>
	  </tr>
	  <tr>
	        <td width="270"><strong>NRC: </strong>'.utf8_decode($fila['idNRC']).'</td>
		<td width="270"><strong>Clave: </strong>'.utf8_decode($fila['idMaterias']).'</td>
		<td width="394"><strong>Carrera: </strong>'.utf8_decode($fila['carrera']).'</td>
	  </tr>
	  <tr>
	        <td colspan="2" ><strong>Profesor: </strong>'.utf8_decode($fila['apellidoP']).' '.utf8_decode($fila['apellidoM']).' '.utf8_decode($fila['nombre_prof']).'</td>
		<td><strong>Ciclo Escolar: </strong>'.utf8_decode($fila['Ciclo_idCiclo']).'</td>
	  </tr>
      </table>';
echo '<br>';
// Datos avance programatico (Fin)

echo '<style>
 table, th, td {
	border:1px solid black;
	/*cellpadding="5px" cellspacing="1px"*/
 }
 th {
    text-align:center;
 }
 .bordo {
	 border-top:1px solid black;
 }
 .posicion{
    position:relative;
    left:60px;
 }
 .margen td{
    border: #95908F 1px solid;
    color: #95908F;
 }
 div {
    font-family:trapro-r;
 }
</style>';
// contenido de la tabla del avance programatico (inicio)
echo '<table width="500px"  >';

echo  '<tr>
            <td height="30" colspan="9"><strong>Objetivo de la materia:</strong></td>
       </tr>';

echo  '<tr style="font-family:trapro-b;">
            <th rowspan="2">Unidad Tematica</th>
	    <th rowspan="2">Subtema</th>
            <th colspan="2">Fecha</th>
            <th colspan="2">Evaluacion</th>
            <th width="105" rowspan="2">Actividad Desarrollada</th>
            <th width="100" rowspan="2">Recursos Didacticos empleados</th>
            <th width="120" rowspan="2">Observaciones</th>
       </tr>';
       
echo '<tr style="font-family:trapro-b;">
            <th>Programada</th>
	    <th>Real</th>
            <th>Programada</th>
            <th>Real</th>
      </tr>';
      $materiaAnterior="";
	while($fila2=mysqli_fetch_array($consulta2)){	 
echo '<tr>';	 
	$materia = 0==strcmp(utf8_decode($fila2['nombre_eva']),$materiaAnterior)?null:(utf8_decode($fila2['nombre_eva']));
	$materiaAnterior=$fila2['nombre_eva'];
	    echo "<td width='100'>$materia</td>
		       <td width='110'>".utf8_decode($fila2['nombre_sub'])."</td>
		       <td width='80'>".utf8_decode($fila2['Fecha_pre'])."</td>
		       <td width='80'>".utf8_decode($fila2['Fecha_real'])."</td>
		       <td width='80'>".utf8_decode($fila2['Evaluacion_programado'])."</td>
		       <td width='80'>".utf8_decode($fila2['Evaluacion_real'])."</td>
		       <td width='80'>".utf8_decode($fila2['Actividad'])."</td>
		       <td width='80'>".utf8_decode($fila2['Recurso'])."</td>
		       <td></td>
		  </tr>";
	}
    echo '</table>';
    echo '<br>';
// contenido de la tabla del avance programatico (Fin)
// contenido tabla de revision del avance programatico (Inicio)
    echo '<table class="margen">
               <tr style="text-align:center;">
	           <td colspan="3">Revision de Avance programatico por la Academia</td>
	       </tr>
	       <tr>
	           <td>Fecha</td>
		   <td>Observaciones, Sugerencias, Recomendaciones</td>
		   <td>Nombre y Firma</td>
	       </tr>
	       <tr>
	           <td height="12"></td>
		   <td></td>
		   <td></td>
	       </tr>
	       <tr>
	           <td height="12"></td>
		   <td></td>
		   <td></td>
	       </tr>
	       <tr>
	           <td width="290" height="80">Nombre del profesor:</td>
		   <td width="290">Presidente de la Academia:</td>
		   <td width="290">Jefe de Departamento:</td>
	       </tr>
          </table>';
// contenido tabla de revision del avance programatico (Fin)
	echo '</div>';
	
	
	 }
	$contenido = ob_get_clean();
    
    
	
    // Se preprocesa el contenido a parsear
    //$contenido = isset($_POST['contenido'])&&$_POST['contenido']!='' ? $_POST['contenido'] : $inicial;
    //$contenido = !empty($_POST['php']) && isset($_POST['css']) ? require('probar.php') : $inicial;
    //$contenido = $contenido['css']."\n".$contenido['php'];
    try {
        // Se invoca la librería con D para hoja vertical (L horizontal), tamaño carta (Letter) e idioma español para los textos de la librería
        $html2pdf = new HTML2PDF('L', 'Letter', 'es');
        //$html2pdf->addFont('trapro-r');
	//$html2pdf->setDefaultFont('trapro-r');
        // Permisos permitidos: print=imprimir, modify=modificar, copy=copiar texto, annot-forms=uso de forms
        // Segundo parámetro es una contraseña de apertura del documento
        // Tercer parámetro es una contraseña para proteger el documento de los permisos denegados
        $html2pdf->pdf->SetProtection(array('print','copy'),false,sha1('ContraseñaGENIAL'));
        
        // Propiedades del documento...
        $html2pdf->pdf->SetAuthor('Ruben Ramirez y Mario Torres');
        $html2pdf->pdf->SetTitle('Avance Programatico');
        $html2pdf->pdf->SetSubject('Ejemplificar');
        $html2pdf->pdf->SetKeywords('documento,html2pdf,ajax,liga');
        
        // Se parsea el código recibido hacia TCPDF
        $html2pdf->writeHTML($contenido);
        
        // Se envía el documento al navegador con I, D forza la descarga
        $html2pdf->Output('Avance Programatico.pdf','I');
    } catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>