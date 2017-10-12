<?php
   function conectar()
   {
	$servidor="localhost";
	$usuario="root";
	$password="";
	$bd="proad";
	$conexion= new mysqli($servidor,$usuario,$password,$bd)
	or die("Ocurrio un error al conectarse a la base de datos :(" );
     	return ($conexion);
   }
?>
