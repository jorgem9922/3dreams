<?php
include "../conexion.php";
mysqli_select_db($conn, "productosbd");

// Obtén el id del material a eliminar
$productoborrar = mysqli_real_escape_string($conn, $_GET["id"]);
// Ahora puedes eliminar el registro en la tabla `material`
$borrar = "DELETE FROM material WHERE id_material = $productoborrar";
mysqli_query($conn, $borrar);
// Elimina los registros relacionados en la tabla `producto`
$queryEliminarProducto = "DELETE FROM producto WHERE id_producto = $productoborrar";
mysqli_query($conn, $queryEliminarProducto);



// Redirige a donde desees después de la eliminación
header("Location: baja_ok.php");
exit();
?>
