<?php
include "../conexion.php";

mysqli_select_db($conn, "productosbd");

$id_reseña = $_POST["id_diseño"];
$calificacion = $_POST["calificacion"];
$usuario = $_POST["usuario"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha_creacion = $_POST["fecha_creacion"];
$id_producto = $_POST["id_producto"];
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

$insertar = "INSERT INTO diseño (id_diseño, Tamaño, alto, ancho, id_categoria, imagenes) VALUES ($id_diseño, '$Tamaño', '$alto', '$ancho', '$id_categoria', '$nombreCompleto')";

mysqli_query($conn, $insertar);
header("Location:alta_ok.php");
?>
