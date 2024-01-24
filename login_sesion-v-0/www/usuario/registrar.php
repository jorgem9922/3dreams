<?php include "../conexion.php";?>
<?php
    mysqli_select_db($conn, "productosbd");
    // $identificador = $_POST["identificador"];
    $nombre = $_POST["nombre"];
    $identificador = $_POST["identificador"];
    $dni = $_POST["dni"];
    $ciudad = $_POST["ciudad"];
    $apellido = $_POST["apellido"];
    $correo_electronico = $_POST["correo_electronico"];
    // $correo_electronico = $_POST["correo_electrico"];
    // $descripcion = $_POST["descripcion"];
    // $precio = $_POST["precio"];
    // var_dump ($_FILES['imagen']);
    $directorioSubida = "../imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    if ($dni < 60000 || $dni > 80000) {
        echo "El DNI debe estar en el rango de 60000 a 800000";
    }
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

   $insertar="INSERT INTO `usuario` (`id_usuario`, `nombre`, `DNI`, `correo_electronico`, `id_ciudad`, `apellido`,`fotografia`) VALUES ($identificador, '$nombre', '$dni', '$correo_electronico', '$ciudad', '$apellido','$nombreArchivo');";
    mysqli_query($conn, $insertar);
    header("Location:alta_ok.php");
    ?>