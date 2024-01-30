<?php 
include "../conexion.php"; 

mysqli_select_db($conn, "productosbd");

$id_producto = $_POST["id_producto"];
$nombre_producto = $_POST["nombre_producto"];
$marca = $_POST["marca"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$nombre_fabricante = $_POST["nombre_fabricante"];
$Tamaño = $_POST["Tamaño"];
$alto = $_POST["alto"]; // Cambiado de "ancho" a "alto"
$ancho = $_POST["ancho"];
$nombre_categoria = $_POST["nombre_categoria"];

$directorioSubida = "../imagenes/";
$max_file_size = "5120000";
$extensionesValidas = array("jpg", "png", "gif");


if($_FILES['imagen']['name'] != ""){
    $errores=0;
    $nombreArchivo = $_FILES['imagen']['name'];
    $filesize = $_FILES['imagen']['size'];
    $directorioTemp = $_FILES['imagen']['tmp_name'];
    $tipoArchivo = $_FILES['imagen']['type'];
    $arrayArchivo = pathinfo ($nombreArchivo);
    $extension = $arrayArchivo['extension'];

   
    if(!in_array($extension, $extensionesValidas)) {
        echo "Extensión no válida";
        $errores=1;
    }
    if($filesize > $max_file_size){
        echo "La imagen debe de tener un tamaño inferior";
        $errores= 1;
    }

    if ($errores == 0 ){

        $nombreCompleto = $directorioSubida.$nombreArchivo;
        //echo "Miguel: " . $nombreCompleto;
        move_uploaded_file($directorioTemp, $nombreCompleto);
    }
}
if ($_FILES['imagen']['name'] != "") {
    $insertar = "UPDATE producto p JOIN diseño d ON p.id_producto = d.id_diseño
                 SET p.nombre_producto = '$nombre', p.marca = '$marca', p.referencia = '$referencia', 
                     p.precio = '$precio', p.fotografia = '$nombreArchivo', d.Tamaño= '$Tamaño', d.alto='$alto' ,
                      id_fabricante = $fabricante, d.ancho='$ancho', d.nombre_categoria $nombre_categoria
                 WHERE p.id_producto = $idm";
} else {
    $insertar = "UPDATE producto p JOIN diseño d ON p.id_producto =d.id_diseño
     SET p.nombre_producto = '$nombre', p.marca = '$marca', p.referencia = '$referencia', 
                     p.precio = '$precio', p.fotografia = '$nombreantiguo', d.Tamaño= '$Tamaño', d.alto='$alto' ,
                      id_fabricante = $fabricante, d.ancho='$ancho', d.nombre_categoria $nombre_categoria
                 WHERE p.id_producto = $idm";


}

mysqli_query($conn, $insertar);


header("Location: actualiza_ok.php");
?>
