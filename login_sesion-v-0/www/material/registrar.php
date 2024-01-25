<?php
include "conexion.php";

mysqli_select_db($conexion, "dreams");
$identificador = mysqli_real_escape_string($conexion, $_POST["identificador"]);
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$marca = mysqli_real_escape_string($conexion, $_POST["marca"]);
$referencia = mysqli_real_escape_string($conexion, $_POST["referencia"]);
$precio = mysqli_real_escape_string($conexion, $_POST["precio"]);
$color = mysqli_real_escape_string($conexion, $_POST["color"]);
$peso = mysqli_real_escape_string($conexion, $_POST["peso"]);
// $descripcion = mysqli_real_escape_string($conexion, $_POST["descripcion"]);
// $modelo_de_impresion = mysqli_real_escape_string($conexion, $_POST["modelodeimpresora"]);
$material = mysqli_real_escape_string($conexion, $_POST["tipomaterial"]);
// // $tamaño = mysqli_real_escape_string($conexion, $_POST["tamaño"]);

$directorioSubida = "../imagenes/";
$max_file_size = "5120000";
$extensionesValidas = array("jpg", "png", "gif");

if (isset($_FILES['imagen'])) {
    $errores = 0;
    $nombreArchivo = $_FILES['imagen']['name'];
    $filesize = $_FILES['imagen']['size'];
    $directorioTemp = $_FILES['imagen']['tmp_name'];
    $tipoArchivo = $_FILES['imagen']['type'];
    $arrayArchivo = pathinfo($nombreArchivo);
    $extension = $arrayArchivo['extension'];

    if (!in_array($extension, $extensionesValidas)) {
        echo "Extensión no válida";
        $errores = 1;
    }
    if ($filesize > $max_file_size) {
        echo "La imagen debe tener un tamaño inferior";
        $errores = 1;
    }

    if ($errores == 0) {
        $nombreCompleto = $directorioSubida . $nombreArchivo;
        move_uploaded_file($directorioTemp, $nombreCompleto);
    }
}

$almacenar = "INSERT INTO `producto` (`id_producto`,`nombre`, `marca`, `referencia`, `precio`, `fotografia`) VALUES ('$identificador','$nombre', '$marca', '$referencia', '$precio', '$nombreArchivo')";
mysqli_query($conexion, $almacenar);



$insertar = "INSERT INTO `material`  (id_material, `color`, `id_tipo_material`, `peso`) VALUES ($identificador,'$color', '$material', '$peso')";
mysqli_query($conexion, $insertar);

header("Location: alta_ok.php");
?>
