<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "conexioncrud.php";

mysqli_Select_db($conexion, "productosbd");

$productoborrar = $_GET["id"];

// Ahora puedes eliminar el registro en la tabla `material`
$borrar = "DELETE FROM impresora WHERE id_impresora = $productoborrar";
mysqli_query($conexion, $borrar);
// Elimina los registros relacionados en la tabla `producto`
$queryEliminarProducto = "DELETE FROM producto WHERE id_producto = $productoborrar";
mysqli_query($conexion, $queryEliminarProducto);

header("Location: baja_ok.php");
?>