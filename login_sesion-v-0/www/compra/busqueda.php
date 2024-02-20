<?php
include "../login/conexion.php";
mysqli_select_db($conn, "productosbd");
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['nombre'];
include "conexion.php";

if (isset($_GET['q'])) {
    $busqueda = $_GET['q'];

    mysqli_select_db($conexion, "dreams");
    $consultar = "SELECT * FROM producto WHERE nombre LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR referencia LIKE '%$busqueda%'";
    $registros = mysqli_query($conexion, $consultar);
} else {
    // Si no hay término de búsqueda, redirige a la página principal u otra página
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3Dreams - Resultados de búsqueda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
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
                  <a class="nav-link" href="index.php?pagina=1">productos </a>
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
   
    <section>
      <?php if (isset($registros) && mysqli_num_rows($registros) > 0) { ?>
          <div class="dreams">
             <?php while ($registro = mysqli_fetch_row($registros)) { ?>
                <div class="productos">
                <img src="../actualizar/imagenes/<?php echo $registro[7]; ?>" alt="Imagen de usuario">
                    <p><strong>Nombre:</strong> <?php echo $registro[2]; ?></p>
                    <p><strong>Marca:</strong> <?php echo $registro[3]; ?></p>
                    <p><strong>Referencia:</strong> <?php echo $registro[4]; ?></p>
                    <p><strong>Precio:</strong> <?php echo $registro[5]; ?></p>
                    <a href="producto_especifico.php?id=<?php echo $registro[0]; ?>" class="btn btn-primary">Detalles</a>
                </div>
              <?php } ?>
           </div>  
      <?php } else { ?>
          <div class="container">
              <p>No se encontraron resultados para la búsqueda "<?php echo $busqueda; ?>"</p>
          </div>
      <?php } ?>
    </section>

    <!-- ... (resto del código) ... -->

    <footer class="container-fluid">
        <!-- ... (contenido similar al de index.php) ... -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>