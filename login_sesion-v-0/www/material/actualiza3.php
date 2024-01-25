<?php include "conexion.php";?>
<?php
    
    $idm = $_GET["idmodifica"];
    // $nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conexion, "dreams");
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $referencia =  $_POST["referencia"];
    $precio =$_POST["precio"];
    $color = $_POST["color"];
    $peso = $_POST["peso"];
    // $descripcion = mysqli_real_escape_string($conexion, $_POST["descripcion"]);
    // $modelo_de_impresion = mysqli_real_escape_string($conexion, $_POST["modelodeimpresora"]);
    $material =$_POST["tipomaterial"];
    
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
        $insertar = "UPDATE producto p JOIN material m ON p.id_producto = m.id_material 
                     SET p.nombre = '$nombre', p.marca = '$marca', p.referencia = '$referencia', 
                         p.precio = '$precio', p.fotografia = '$nombreArchivo', m.color= '$color', m.peso='$peso' ,
                          m.id_tipo_material='$material'
                     WHERE p.id_producto = $idm";
    } else {
        $insertar = "UPDATE producto p JOIN material m ON p.id_producto =m.id_material
                     SET p.nombre = '$nombre', p.marca = '$marca', p.referencia = '$referencia', 
                         p.precio = '$precio', p.fotografia = '$nombreantiguo', m.color= '$color', m.peso='$peso' , 
                         m.id_tipo_material='$material'
                     WHERE p.id_producto = $idm";
    }
    
    // $insertar = "UPDATE `usuario` SET `nombre` = '$nombre', `DNI` = '$dni', `correo_electronico` = '$correo_electronico', `ciudad` = '$ciudad', `apellido` = '$apellido' WHERE `usuario`.`id_usuario` = $idm";
    // echo $idm;
    // echo $nombre;
    mysqli_query($conexion, $insertar);
    header("Location:actualiza_ok.php");?>
