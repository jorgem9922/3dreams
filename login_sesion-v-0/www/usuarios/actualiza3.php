<?php include "conexion.php";?>
<?php
    
    $idm = $_GET["idmodifica"];
    // $nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conn, "dreams3");
    $nombre = $_POST["nombre"];
   
    $dni = $_POST["dni"];
    $ciudad = $_POST["ciudad"];
    $apellido = $_POST["apellido"];
    $correo_electronico = $_POST["correo_electronico"];
    // $correo_electronico = $_POST["correo_electrico"];
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

    if ($_FILES['imagen']['name'] != "") {
        $insertar = "UPDATE usuario  
                     SET nombre = '$nombre',apellido = '$apellido',  DNI = '$dni', ciudad = '$ciudad', 
                     correo_electronico = '$correo_electronico', fotografia = '$nombreArchivo'
                     WHERE id_usuario = $idm";
    } else {
        $insertar = "UPDATE usuario 
                     SET nombre = '$nombre' ,apellido = '$apellido', DNI = '$dni', ciudad = '$ciudad', 
                     correo_electronico = '$correo_electronico', fotografia = '$nombreantiguo'
                     WHERE id_usuario = $idm";
    }
    
    // $insertar = "UPDATE `usuario` SET `nombre` = '$nombre', `DNI` = '$dni', `correo_electronico` = '$correo_electronico', `ciudad` = '$ciudad', `apellido` = '$apellido' WHERE `usuario`.`id_usuario` = $idm";
    // echo $idm;
    // echo $nombre;
    mysqli_query($conn, $insertar);
    header("Location:actualiza_ok.php");?>
