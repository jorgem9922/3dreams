<<<<<<< HEAD
<?php include "../conexion.php"; 

mysqli_select_db($conn, "productosbd");
=======
<?php
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("Location: indexcrud.php");
    exit;
}
include "../conexion.php";

>>>>>>> eed75417743417784c5a103d3048b8d25f89e21b
$id_reseña = $_POST["id_reseña"];
$calificacion = $_POST["calificacion"];
$usuario = $_POST["usuario"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha_creacion = $_POST["fecha_creacion"];
$id_producto = $_POST["producto"];

<<<<<<< HEAD
    //var_dump ($_FILES['imagen']);
    $directorioSubida = "imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    
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
            //move_uploaded_file($directorioTemp, $nombreCompleto);
        }
    }

    if ($_FILES['imagen']['name'] != "") {
        $insertar = "UPDATE reseña SET id_reseña=$id_reseña, id_usuario='$usuario', id_producto = '$id_producto', titulo = '$titulo', descripcion = '$descripcion',fecha_creacion = '$fecha_creacion', imagenes = '$nombreArchivo' WHERE id_reseña=$id_reseña";
    } else {
        $insertar = "UPDATE reseña SET id_reseña=$id_reseña, id_usuario='$usuario', id_producto = '$id_producto', titulo = '$titulo', descripcion = '$descripcion',fecha_creacion = '$fecha_creacion' WHERE id_reseña=$id_reseña";
=======
$directorioSubida = "../imagenes/";
$max_file_size = "5120000";
$extensionesValidas = array("jpg", "png", "gif");

$nombreArchivo = ''; // Variable para almacenar el nombre de la imagen

if ($_FILES['imagen']['name'] != "") {
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
        echo "La imagen debe de tener un tamaño inferior";
        $errores = 1;
    }

    if ($errores == 0) {
        $nombreCompleto = $directorioSubida . $nombreArchivo;
        move_uploaded_file($directorioTemp, $nombreCompleto);
>>>>>>> eed75417743417784c5a103d3048b8d25f89e21b
    }

<<<<<<< HEAD
    mysqli_query($conn, $insertar);
    echo $insertar;
    //header("Location: actualiza_ok.php");
    ?>
=======
if ($_FILES['imagen']['name'] != "") {
    $insertar = "UPDATE reseña SET id_reseña=$id_reseña, id_usuario='$usuario', id_producto = '$id_producto', titulo = '$titulo', descripcion = '$descripcion', fecha_creacion = '$fecha_creacion', imagen = '$nombreArchivo' WHERE id_reseña=$id_reseña";
} else {
    $insertar = "UPDATE reseña SET id_reseña=$id_reseña, id_usuario='$usuario', calificacion='$calificacion', id_producto = '$id_producto', titulo = '$titulo', descripcion = '$descripcion', fecha_creacion = '$fecha_creacion', imagen = '$nombreimagen' WHERE id_reseña=$id_reseña";
}

mysqli_query($conn, $insertar);
header("Location:actualiza_ok.php");
?>
>>>>>>> eed75417743417784c5a103d3048b8d25f89e21b
