<?php 
include "../conexion.php";

mysqli_select_db($conn, "productosbd");


$reseñaborrar = $_GET["id"];
$borrar="DELETE FROM reseña WHERE id_reseña = '$reseñaborrar'";
mysqli_Query($conn, $borrar);
header("Location: baja_ok.php");
?>