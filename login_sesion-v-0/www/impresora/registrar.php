<?php include "conexioncrud.php";
session_start();

if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
$usuario = $_SESSION['usuario'];


    mysqli_select_db($conexion, "productosbd");
    $id_impresora=$_POST["id_impresora"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $tamaño_impresora = $_POST["tamaño_impresora"];
    $tamañocamax =$_POST ["yamañocamax"];
    $tamañocamay =$_POST ["yamañocamay"];
    //var_dump ($_FILES['imagen']);
    $directorioSubida = "../imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    if(isset($_FILES['fotografia'])){
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
            
            move_uploaded_file($directorioTemp, $nombreCompleto);
        }
    }
    $insertar="INSERT INTO `impresora` (`id_impresora`, `modelo`, `color`, `tamaño_impresora`, `tamañocamax`, `tamañocamay`, `fotografia`) VALUES ($id_impresora,'$modelo', $color, $tamaño_impresora, '$tamañocamax' ,'$tamañocamax'',$nombreArchivo')";
    mysqli_query($conexion, $insertar);
   
     header("Location:alta_ok.php");?>
