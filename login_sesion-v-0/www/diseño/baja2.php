<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../conexion.php";

mysqli_select_db($conn, "productosbd");


$diseñoborrar = $_GET["id"];
$borrar="DELETE FROM diseño WHERE id_diseño = '$diseñoborrar'";
mysqli_Query($conn, $borrar);
header("Location: baja_ok.php");
?>