<?php
/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los vídeos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR MÁS POCO QUE SEA".
	*/
	$servidor = "db";
$usuario = "root";
$password ="test";

$conexion = mysqli_connect($servidor, $usuario, $password) or die ("Error de conexión");



$conn = mysqli_connect('db','root','test') or die("Error, conexion");

$bd = mysqli_select_db($conn,'prueba') or die("Error, Base de datos");
?>
