<?php

//Configurar nuestros datos de conexión a la BD ////////////////////////////////////////

$servidor = "db";
$usuario = "root";
$password ="test";

//$conexion = mysqli_connect($servidor, $usuario, $password) or die ("Error de conexión");


/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los vídeos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR MÁS POCO QUE SEA".
	*/
$conn = mysqli_connect('db','root','test') or die("Error, conexion");
$bd = mysqli_select_db($conn,'productosbd') or die("Error, Base de datos");
?>
