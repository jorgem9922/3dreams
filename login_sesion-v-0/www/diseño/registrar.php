<?php 
include "../conexion.php";

mysqli_select_db($conn, "productosbd");

$id_diseño = $_POST["id_producto"];

$nombre_producto = $_POST["nombre_producto"];
$marca = $_POST["marca"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$nombre_fabricante = $_POST["nombre_fabricante"];
$id_diseño = $_POST["id_producto"];
$tamaño = $_POST["Tamaño"];
$alto = $_POST["alto"];
$ancho = $_POST["ancho"];
$nombre_categoria = $_POST["nombre_categoria"];



$directorioSubida = "../imagenes/";
$max_file_size = 5120000;
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
$insertardos = "INSERT INTO producto (id_producto ,nombre_producto ,marca , referencia,precio ,id_fabricante, fotografia_producto)  VALUES ('$id_diseño', '$nombre_producto', '$marca', '$referencia', '$precio', '$nombre_fabricante','$nombreCompleto')";
mysqli_query($conn, $insertardos);

$insertar = "INSERT INTO diseño (id_diseño, Tamaño, alto, ancho, id_categoria)  VALUES ('$id_diseño', '$tamaño', '$alto', '$ancho', '$nombre_categoria')";
mysqli_query($conn, $insertar);
// echo $insertardos;
// echo $insertar;

header("Location: alta_ok.php");
?>
