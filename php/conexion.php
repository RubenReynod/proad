<?php 
   function conectar()
   {
	$servidor="localhost";
	$usuario="root";
	$password="";
	$bd="programavance";
	$conexion= new mysqli($servidor,$usuario,$password,$bd)
	or die("No se puede Vato" );
	
     	return ($conexion);
   }
   $blabla=conectar();
?>