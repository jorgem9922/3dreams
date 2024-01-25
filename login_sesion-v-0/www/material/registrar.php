<?php
include "../conexion.php";

mysqli_select_db($conn, "productosbd");

$identificador = $_POST["identificador"];
$nombre = $_POST["nombre"];
$marca = $_POST["marca"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$color = $_POST["color"];
$peso = $_POST["peso"];
$material = $_POST["tipomaterial"];

$nombreArchivo = ""; // Valor predeterminado

$directorioSubida = "../imagenes/";
$max_file_size = "5120000";
$extensionesValidas = array("jpg", "png", "gif");

if (isset($_FILES['imagen']) && isset($_FILES['imagen']['name'])) {
    $errores = 0;
    $nombreArchivo = $_FILES['imagen']['name'];
    $filesize = $_FILES['imagen']['size'];
    $directorioTemp = $_FILES['imagen']['tmp_name'];
    $tipoArchivo = $_FILES['imagen']['type'];
    $arrayArchivo = pathinfo($nombreArchivo);
    $extension = $arrayArchivo['extension'];

    if (!in_array($extension, $extensionesValidas)) {
        $errores++;
        echo "Extensión no válida";
    }
    if ($filesize > $max_file_size) {
        $errores++;
        echo "La imagen debe tener un tamaño inferior";
    }

    if ($errores == 0) {
        $nombreCompleto = $directorioSubida . $nombreArchivo;
        move_uploaded_file($directorioTemp, $nombreCompleto);
    }
}

$almacenar = "INSERT INTO `producto` (`id_producto`, `nombre_producto`, `marca`, `referencia`, `precio`, `fotografia`) VALUES ('$identificador','$nombre', '$marca', '$referencia', '$precio', '$nombreArchivo')";
mysqli_query($conn, $almacenar);

$insertar = "INSERT INTO `material`  (id_material, `color`, `id_tipo_material`, `peso`) VALUES ($identificador,'$color', '$material', '$peso')";
mysqli_query($conn, $insertar);

// Redirige después de todas las operaciones.
header("Location: alta_ok.php");
?>
