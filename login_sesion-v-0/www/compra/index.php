<?php 
include "../login/conexion.php";
mysqli_select_db($conn, "productosbd");
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['nombre'];
//$registros nos entrega la cantidad de registros a mostrar.
$registros = 10;
 
//$contador como su nombre lo indica el contador.
$contador = 1;
 
/**
 * Se inicia la paginación, si el valor de $pagina es 0 le asigna el valor 1 e $inicio entra con valor 0.
 * si no es la pagina 1 entonces $inicio sera igual al numero de pagina menos 1 multiplicado por la cantidad de registro
 */
if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $registros;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3Dreams</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
<?php 
if ($total_registros) {
                while ($personas = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
                ?>
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
            <ul class="nav navbar-nav pull-right hidden-xs">                       
            <li class="notification-dropdown hidden-xs hidden-sm">
                <a href="#" class="trigger">
                    <i class="icon-user"></i>
                </a>
                <div class="pop-dialog">                    
                </div>
            </li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    Bienvenido<?php echo ": ".$_SESSION['nombre'] ?>
                </a>                
            </li>  
            <li class="settings hidden-xs hidden-sm">
                <a href="compra.php" role="button">
                    <i class="icon-share-alt"></i>
                    <li><i class="bi-cart-dash px-3" ></i></li>           

                </a>
            </li>
        </ul>
          </nav>
          <?php 

          $contador++;
                }
             } else {
              echo "<font color='darkgray'>(sin resultados)</font>";
            }
 
            mysqli_free_result($resultados);
            ?>
    </header>
   

    <section>
      <?php 
        mysqli_select_db($conexion,"productosbd");
        $consultar= "SELECT * FROM producto";

        $registros= mysqli_query($conexion, $consultar);

      ?>
      <div class="dreams">
         <?php while ($registro = mysqli_fetch_assoc($registros)) { ?>
            <div class="productos">
            <img src="../imagenes/<?php echo $registro['fotografia_producto']; ?>" alt="Imagen de usuario">
                <p><strong>Nombre:</strong> <?php echo $registro['nombre_producto']; ?></p>
                <p><strong>Marca:</strong> <?php echo $registro['marca']; ?></p>
                <p><strong>referencia:</strong> <?php echo $registro['referencia']; ?></p>
                <p><strong>Precio:</strong> <?php echo $registro['precio']; ?></p>
                 <a href="producto_especifico.php?id=<?php echo $registro['id_producto']; ?>" class="btn btn-primary">Detalles</a>
            </div>
          <?php } ?>
       </div>  
    </section>

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
