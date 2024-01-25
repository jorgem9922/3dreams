<?php

$servidor = "db";
$usuario = "root";
$password ="test";

$conn = mysqli_connect('db','root','test') or die("Error, conexion");
$bd = mysqli_select_db($conn,'productosbd') or die("Error, Base de datos");
?>
