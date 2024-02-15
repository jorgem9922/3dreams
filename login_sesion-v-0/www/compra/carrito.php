<?php
include "../conexion.php";
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] === null) {
    header("Location: index.php");
    exit;
    
}
mysqli_select_db($conn, "productosbd");
$usuario = $_SESSION['nombre'];
$cantidad= $_POST["cantidad"];
$sql = "SELECT id_usuario FROM usuario where nombre='$usuario' ";
$res = mysqli_query($conn,$sql);
$fila = mysqli_fetch_assoc($res);
echo $cantidad;
    // Obtiene el id del usuario de la fila obtenida
    $id_usuario = $fila['id_usuario'];
   
// Obtén el id del material a eliminar
$id = mysqli_real_escape_string($conn, $_GET["id"]);
// Ahora puedes eliminar el registro en la tabla `material`
$insertar = "INSERT INTO `carrito` (`id_producto`, id_usuario) VALUES ($id,$id_usuario)";
mysqli_query($conn, $insertar);






// Redirige a donde desees después de la eliminación
header("Location: compra.php");
exit();
?>
