<?php 
include "../login/conexion.php";
mysqli_select_db($conn, "productosbd");
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['nombre'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3Dreams</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>

    <header class="container-fluid">
        <div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light container-fluid">
            <img src="../Free_Sample_By_Wix (1).jpg" alt="Logo de 3Dreams">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">productos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">piezas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">diseños</a>
                </li>
              </ul>
              <form class="form-inline" action="busqueda.php" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
            
          </nav>
    </header>
    <?php
include "conexion.php";

if (isset($_GET['id'])) {
    $productoId = $_GET['id'];

    // Asegurarse de que la base de datos esté seleccionada
    mysqli_select_db($conexion, "productosbd");

    // Consulta para obtener la información del producto específico
    $consultaProducto = "SELECT * FROM producto WHERE id_producto = $productoId";
    $resultadoProducto = mysqli_query($conexion, $consultaProducto);

    if ($registroProducto = mysqli_fetch_assoc($resultadoProducto)) {
        // Mostrar información general del producto
        echo "<div class='producto'>";
        echo "<h1>{$registroProducto['nombre_producto']}</h1>";
        echo "<p><strong>Marca:</strong> {$registroProducto['marca']}</p>";
        echo "<p><strong>Referencia:</strong> {$registroProducto['referencia']}</p>";
        echo "<p><strong>Precio:</strong> {$registroProducto['precio']}</p>";

        // Mostrar la imagen del producto
        echo "<img src='../imagenes/{$registroProducto['fotografia_producto']}' alt='Imagen de producto'>";

        // Realizar consultas adicionales según el tipo de producto
        $consultaImpresora = "SELECT * FROM impresora WHERE id_impresora = $productoId";
        $resultadoImpresora = mysqli_query($conexion, $consultaImpresora);

        $consultaPieza = "SELECT * FROM pieza WHERE id_pieza = $productoId";
        $resultadoPieza = mysqli_query($conexion, $consultaPieza);

        $consultaDiseño = "SELECT * FROM diseño WHERE id_diseño = $productoId";
        $resultadoDiseño = mysqli_query($conexion, $consultaDiseño);

        // Mostrar información específica del tipo de producto
        if ($registroImpresora = mysqli_fetch_assoc($resultadoImpresora)) {
            echo "<div class='impresora'>";
            echo "<p><strong>Modelo:</strong> {$registroImpresora['modelo']}</p>";
            echo "<p><strong>Color:</strong> {$registroImpresora['color']}</p>";
            echo "<p><strong>Tamaño:</strong> {$registroImpresora['tamaño_impresora']}</p>";
            echo "<p><strong>Tamaño Máximo (X):</strong> {$registroImpresora['tamañocamax']}</p>";
            echo "<p><strong>Tamaño Máximo (Y):</strong> {$registroImpresora['tamañocamay']}</p>";
        } elseif ($registroPieza = mysqli_fetch_assoc($resultadoPieza)) {
            echo "<div class='pieza'>";
            echo "<p><strong>Tamaño:</strong> {$registroPieza['tamaño']}</p>";
            echo "<p><strong>Material:</strong> {$registroPieza['material']}</p>";
            echo "<p><strong>Modelo de Impresora:</strong> {$registroPieza['modelodeimpresora']}</p>";
        } elseif ($registroDiseño = mysqli_fetch_assoc($resultadoDiseño)) {
            echo "<div class='diseño'>";
            echo "<p><strong>Tamaño:</strong> {$registroDiseño['Tamaño']}</p>";
            echo "<p><strong>Alto:</strong> {$registroDiseño['alto']} cm</p>";
            echo "<p><strong>Ancho:</strong> {$registroDiseño['ancho']} cm</p>";
        } else {
            echo "<p>Tipo de producto no reconocido.</p>";
        }
        echo "</div>";
        ?>
        <a href="carrito.php?id=<?php echo $registroProducto['id_producto']; ?>" role="button">
                    <i class="bi-cart-dash px-3" ></i>          
                </a>
        <?php

        // Mostrar reseñas del producto
        $consultaReseñas = "SELECT * FROM reseña WHERE id_producto = $productoId";
        $resultadoReseñas = mysqli_query($conexion, $consultaReseñas);

        echo "<div class='reseñas'>";
        while ($registroReseña = mysqli_fetch_assoc($resultadoReseñas)) {
            echo "<div class='reseña'>";
            echo "<p><strong>Calificación:</strong> {$registroReseña['calificacion']}</p>";
            echo "<p><strong>Título:</strong> {$registroReseña['titulo']}</p>";
            echo "<p><strong>Descripción:</strong> {$registroReseña['descripcion']}</p>";
            echo "<p><strong>Usuario:</strong> {$registroReseña['id_usuario']}</p>";
            echo "<p><strong>Fecha de Creación:</strong> {$registroReseña['fecha_creacion']}</p>";
            echo "</div>";
        }
        echo "</div>";

        echo "</div>";
    } else {
        echo "<p>Producto no encontrado.</p>";
    }
} else {
    echo "<p>ID del producto no proporcionado.</p>";
}
?>
                                        <!-- Agrega más celdas según tus necesidades -->
    <!-- ... (resto del código) ... -->

    <footer class="container-fluid">
        <p>3Dreams - Impresión 3D y más</p>
        <p>Vendemos materiales, piezas y diseños</p>
        <p>Tu dirección | Tu número de teléfono | Tu correo electrónico</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>