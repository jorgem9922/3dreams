<?php 
include "../conexion.php";

mysqli_select_db($conn, "productosbd");

$usuarioborrar = $_GET["id"];

$borrar = "DELETE  FROM usuario
          WHERE id_usuario = $usuarioborrar";

mysqli_query($conn, $borrar);
header("Location: baja_ok.php");
?>
