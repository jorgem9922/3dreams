<?php include "../conexion.php"; 

mysqli_select_db($conn, "productosbd");
$idm = $_GET["idmodifica"];
$id_reseña = $_POST["id_reseña"];
$calificacion = $_POST["calificacion"];
$usuario = $_POST["usuario"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha_creacion = $_POST["fecha_creacion"];
$id_producto = $_POST["id_producto"];

$directorioSubida = "../imagenes/";
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
        move_uploaded_file($directorioTemp, $nombreCompleto);
    }
}

    if ($_FILES['imagen']['name'] != "") {
        $insertar = "UPDATE reseña SET id_reseña=$id_reseña, calificacion=$calificacion, id_usuario='$usuario', id_producto = '$id_producto', titulo = '$titulo', descripcion = '$descripcion',fecha_creacion = '$fecha_creacion', fotografia_reseña = '$nombreArchivo' WHERE id_reseña=$idm";

    } else {
        $insertar = "UPDATE reseña SET id_reseña=$id_reseña, calificacion=$calificacion, id_usuario='$usuario', id_producto = '$id_producto', titulo = '$titulo', descripcion = '$descripcion',fecha_creacion = '$fecha_creacion',fotografia_reseña = '$nombreantiguo' WHERE id_reseña=$idm";
      
    }

    mysqli_query($conn, $insertar);

    header("Location: actualiza_ok.php");
    ?>
