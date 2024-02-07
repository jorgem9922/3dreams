<?php

//Configurar nuestros datos de conexión a la BD ////////////////////////////////////////

$servidor = "127.0.0.1";
$usuario = "root";

$conn = mysqli_connect('db','root','test') or die("Error, conexion");
$bd = mysqli_select_db($conn,'dreams') or die("Error, Base de datos");

?>