<?php include "conexioncrud.php";


    
    $idm = $_GET["idmodifica"];
    //$nombreantiguo = $_GET["fotografia"];

    mysqli_select_db($conexion, "dreams3");
    $id_fabricante=$_POST["id_fabricante"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $codigo_postal = $_POST["codigo_postal"];
    $correo_electronico =$_POST ["correo_electronico"];
    //var_dump ($_FILES['imagen']);
    $directorioSubida = "imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    
    $directorioSubida = "imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    
    if($_FILES['fotografia']['name'] != ""){
        $errores=0;
        $nombreArchivo = $_FILES['fotografia']['name'];
        $filesize = $_FILES['fotografia']['size'];
        $directorioTemp = $_FILES['fotografia']['tmp_name'];
        $tipoArchivo = $_FILES['fotografia']['type'];
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

    if($_FILES['fotografia']['name'] != ""){
        $insertar = "UPDATE `fabricantes` SET `id_fabricante`=$id_fabricante,`nombre`='$nombre',`telefono`=$telefono, `codigo_postal`=$codigo_postal, `correo_electronico`='$correo_electronico',`fotografia`='$nombreArchivo' WHERE `fabricantes`.`id_fabricante`=$idm";
    }
    else{
        $insertar = "UPDATE `fabricantes` SET `id_fabricante`=$id_fabricante,`nombre`='$nombre',`telefono`=$telefono, `codigo_postal`=$codigo_postal, `correo_electronico`='$correo_electronico',`fotografia`='$nombreantiguo' WHERE `fabricantes`.`id_fabricante`=$idm";
    };  
    // echo $nombre;
    // echo $telefono;
    // echo $codigo_postal;
    // echo $correo_electronico;
    // echo $id_fabricante;
    // echo $idm;
    


    mysqli_query($conexion, $insertar);
    header("Location:actualiza_ok.php");
    ?>
