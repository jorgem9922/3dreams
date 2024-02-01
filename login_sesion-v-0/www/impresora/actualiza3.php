<?php include "conexioncrud.php";


    
    $idm = $_GET["idmodifica"];
    mysqli_select_db($conexion, "productosbd");
    //$nombreantiguo = $_GET["fotografia"];

  
    $nombre = $_POST["nombre_producto"];
    $marca = $_POST["marca"];
    $referencia = $_POST["referencia"];
    $precio = $_POST["precio"];
    // $id_impresora=$_POST["id_impresora"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $tamaño_impresora = $_POST["tamaño_impresora"];
    $tamañocamax =$_POST ["tamañocamax"];
    $tamañocamay =$_POST ["tamañocamay"]; 
    $fabricante =$_POST ["fabricante"];
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
       $actualizar = "UPDATE `producto`  p
    INNER JOIN `impresora` i ON p.`id_producto` = i.`id_impresora`
    SET
        p.`nombre_producto` = '$nombre',
        p.`marca` = '$marca',
        p.`referencia` = '$referencia',
        p.`precio` = '$precio',
        p.`fotografia_producto` = '$nombreArchivo',
        p.`id_fabricante` = $fabricante,
        i.`modelo` = '$modelo',
        i.`color` = $color,
        i.`tamaño_impresora` = $tamaño_impresora,
        i.`tamañocamax` = '$tamañocamax',
        i.`tamañocamay` = '$tamañocamay'
    WHERE p.`id_producto` = '$idm'";

    } else {
       $actualizar = "UPDATE `producto` p
    INNER JOIN `impresora`  i ON p.`id_producto` = i.`id_impresora`
    SET
        p.`nombre_producto` = '$nombre',
        p.`marca` = '$marca',
        p.`referencia` = '$referencia',
        p.`precio` = '$precio',
        p.`fotografia_producto` = '$nombreantiguo',
        p.`id_fabricante` = $fabricante,
        i.`modelo` = '$modelo',
        i.`color` = $color,
        i.`tamaño_impresora` = $tamaño_impresora,
        i.`tamañocamax` = '$tamañocamax',
        i.`tamañocamay` = '$tamañocamay'
    WHERE p.`id_producto` = '$idm'";
    }
  
    mysqli_query($conexion, $actualizar);

    header("Location:actualiza_ok.php");
    ?>
    

