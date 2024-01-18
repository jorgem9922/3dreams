<?php 
include "../conexion.php";

mysqli_select_db($conexion, "productosbd");


$reseñaborrar = $_GET["id"];
$borrar="DELETE FROM reseña WHERE id_reseña = '$reseñaborrar'";
mysqli_Query($conexion, $borrar);
header("Location: baja_ok.php");
?>