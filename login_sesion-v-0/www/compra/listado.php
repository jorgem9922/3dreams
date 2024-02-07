<?php 
/* *********************************************************************** */
/* *********************  ******************  **************************** */
/* **************** Listado de productos en la BD ************************ */
/* *********************************************************************** */
include "../login/conexion.php";
mysqli_select_db($conn, "productosbd");
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['nombre'];
include "conexion.php";
include "header.php";
?>



            
    <?php
        mysqli_select_db($conn,"dreams3");
        $consultar= "SELECT * FROM usuario";

        $registros= mysqli_query($conn, $consultar);

    ?>
    <div class="user-container-wrapper">
    <?php while ($registro = mysqli_fetch_assoc($registros)) { ?>
        <div class="user-container">
            <div class="user-info">
                <p><strong>Nombre:</strong> <?php echo $registro['nombre_producto']; ?></p>
                <p><strong>Marca:</strong> <?php echo $registro['marca']; ?></p>
                <p><strong>referencia:</strong> <?php echo $registro['referencia']; ?></p>
                <p><strong>Precio:</strong> <?php echo $registro['precio']; ?></p>
                <p><strong>Ciudad:</strong> <?php echo $registro['ciudad']; ?></p>
            </div>
            <div class="user-image">
                <img src="../imagenes/<?php echo $registro['fotografia_producto']; ?>" alt="Imagen de usuario">
            </div>
        </div>
    <?php } ?>
</div>

                    

<?php 
include "footer.php"
?>
