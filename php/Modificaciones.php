<?php
session_start();
include('conexion.php');
$ejecutar=$blabla->query(json_decode($_POST['Edicion'],true));

if ($ejecutar) {
	switch (json_decode($_POST['MUS'],true)) {
		case 'm':

                        echo '<script> CambiosTablaM('.json_decode($_POST['MUSC'],true).'); </script>';
			break;
		case 'u':
			echo '<script> CambiosTablaU('.json_decode($_POST['MUSC'],true).'); </script>';
		        break;
		case 's':
			echo '<script> CambiosTablaS('.json_decode($_POST['MUSC'],true).'); </script>';
			break;
		case 'se':
		
			echo '<script> var fseleccion = document.getElementById("'.json_decode($_POST['MUSC'],true).'").rowIndex;
			document.getElementById("tablasubtema").deleteRow(fseleccion);</script>';
			break;
		case 'su':
		
		echo '<script> var fseleccion = document.getElementById("'.json_decode($_POST['MUSC'],true).'").rowIndex;
			document.getElementById("TablaUnidad").deleteRow(fseleccion);
			$("#Subtema").load(" ");
			if("'.json_decode($_POST['MUSC'],true).'"+""==UltimouIDU+""){
				
				UltimouIDU="";
			}
			</script>';
			
			break;
		case 'sm':
		
		echo '<script> var fseleccion = document.getElementById("'.json_decode($_POST['MUSC'],true).'").rowIndex;
			document.getElementById("Tabla_materia").deleteRow(fseleccion);
			$("#Subtema").load(" ");
			$("#Unidad").load(" ");
			if("'.json_decode($_POST['MUSC'],true).'"+""==UltimoID+""){
				
				
				UltimoID="";
			}
			
			</script>';
			
			break;
			
	}
	
}else{
	echo "FATAL Lo siento u_u";

}
?>