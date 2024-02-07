<?php

//Configurar nuestros datos de conexión a la BD ////////////////////////////////////////



$servidor = "db";
$usuario = "root";
$password ="test";

$conexion = mysqli_connect($servidor, $usuario, $password) or die ("Error de conexión");



$conn = mysqli_connect('db','root','test') or die("Error, conexion");

$bd = mysqli_select_db($conn,'prueba') or die("Error, Base de datos");

?>