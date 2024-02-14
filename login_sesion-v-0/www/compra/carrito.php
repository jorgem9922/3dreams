<?php
include "../conexion.php";
mysqli_select_db($conn, "productosbd");
$usuario = $_SESSION['nombre'];
// Obtén el id del material a eliminar
$id = mysqli_real_escape_string($conn, $_GET["id"]);
// Ahora puedes eliminar el registro en la tabla `material`
$insertar = "INSERT INTO `carrito` (`id_producto`, id_usuario) VALUES ('$id','$usuario')";
mysqli_query($conn, $insertar);


echo $id;
echo $usuario;

// Redirige a donde desees después de la eliminación
header("Location: compra.php");
exit();
?>
