<?php include "../conexion.php";?>
<?php
    
    // $idm = $_GET["idmodifica"];
    $nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conexion, "productosbd");
    $id_reseña = $_POST["id_reseña"];
    $nombre = $_POST["nombre"];
    $autor = $_POST["autor"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

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
            move_uploaded_file($directorioTemp, $nombreCompleto);
        }
    }


   


    if($_FILES['imagen']['name'] != ""){
        $insertar = "UPDATE reseña SET id_reseña=$id_reseña, nombre='$nombre', autor = '$autor', titulo = '$titulo', descripcion = '$descripcion', imagen = '$nombreArchivo' WHERE id_reseña=$id_reseña";
    }
    else{
        $insertar = "UPDATE reseña SET id_reseña=$id_reseña, nombre='$nombre', autor = '$autor', titulo = '$titulo', descripcion = '$descripcionNueva', imagen = '$nombreimagen' WHERE id_reseña=$id_reseña";   
    }

    // echo $insertar;
    
    mysqli_query($conexion, $insertar);
    header("Location:actualiza_ok.php");?>
