<?php include "conexion.php";?>
<?php
    mysqli_select_db($conn, "dreams");
    // $identificador = $_POST["identificador"];
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $referencia = $_POST["referencia"];
    $precio = $_POST["precio"];
  
    // $descripcion = $_POST["descripcion"];
    // $precio = $_POST["precio"];
    // var_dump ($_FILES['imagen']);
    $directorioSubida = "../actualizar/imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    if(isset($_FILES['imagen'])){
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
//    echo $nombre = $_POST["nombre"];
//    echo $dni = $_POST["dni"];
//    echo $ciudad = $_POST["ciudad"];
//    echo $apellido = $_POST["apellido"];
//    echo $correo_electronico = $_POST["correo_electrico"];

   $insertar="INSERT INTO `producto` ( `nombre`, `marca`, `referencia`, `precio`, `fotografia`) VALUES ( '$nombre', '$marca', '$referencia', '$precio', '$nombreArchivo');";
    mysqli_query($conn, $insertar);
    header("Location:alta_ok.php");
    ?>