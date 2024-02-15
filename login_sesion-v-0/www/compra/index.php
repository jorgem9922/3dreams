<?php 
include "../login/conexion.php";
mysqli_select_db($conexion, "productosbd");
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['nombre'];
$registro = 10;
 $pagina=$_GET['pagina'];
$contador = 1;
if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $registro;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3Dreams</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css">
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
         
    </header>
   

    <section>
      <?php 
      $resultados = mysqli_query($conexion,"SELECT * FROM producto ");
 
      //Contamos la cantidad de filas entregadas por la consulta, de esta forma sabemos cuantos registros fueron retornados por la consulta.
      $total_registros = mysqli_num_rows($resultados);

      //Generamos otra consulta la cual creara en si la paginacion, ordenando y crendo un limite en las consultas.
      $resultados = mysqli_query($conexion,"SELECT * FROM producto  LIMIT $inicio, $registro");

      //Con ceil redondearemos el resultado total de las paginas 4.53213 = 5
      $total_paginas = ceil($total_registros / $registro);
      ?>
      <div class="dreams">
        
         <?php  if ($total_registros) {
                while ($productos = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
                ?>
         
            <div class="productos">
            <img src="../imagenes/<?php echo $productos['fotografia_producto']; ?>" alt="Imagen de usuario">
                <p><strong>Nombre:</strong> <?php echo $productos['nombre_producto']; ?></p>
                <p><strong>Marca:</strong> <?php echo $productos['marca']; ?></p>
                <p><strong>referencia:</strong> <?php echo $productos['referencia']; ?></p>
                <p><strong>Precio:</strong> <?php echo $productos['precio']; ?></p>
                 <a href="producto_especifico.php?id=<?php echo $productos['id_producto']; ?>" class="btn btn-primary">Detalles</a>
            </div>
            <?php
           $contador++;
                }
             } else {
              echo "<font color='darkgray'>(sin resultados)</font>";
            }
 
            mysqli_free_result($resultados);
            ?>
       </div>  
    </section>
    
                  
                  


<div>
        <?php
        if ($total_registros) {
            /**
             * Aca activamos o desactivamos la opción "< Anterior", si estamos en la pagina 1 nos dará como resultado 0 por ende NO
             * activaremos el primer if y pasaremos al else en donde se desactiva la opción anterior. Pero si el resultado es mayor
             * a 0 se activara el href del link para poder retroceder.
             */
            if (($pagina - 1) > 0) {
                echo "<a href='index.php?pagina=".($pagina-1)."'>< Anterior</a>";
            } else {
                echo "<a href='#'>< Anterior</a>";
            }
 
            // Generamos el ciclo para mostrar la cantidad de paginas que tenemos.
            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($pagina == $i) {
                    echo "<a href='#'>". $pagina ."</a>";
                } else {
                    echo "<a href='index.php?pagina=$i'>$i</a> ";
                }
            }
 
            /**
             * Igual que la opcion primera de "< Anterior", pero aca para la opcion "Siguiente >", si estamos en la ultima pagina no podremos
             * utilizar esta opcion.
             */
            if (($pagina + 1)<=$total_paginas) {
                echo "<a href='index.php?pagina=".($pagina+1)."'>Siguiente ></a>";
            } else {
                echo "<a href='#'>Siguiente ></a>";
            }
        }
        ?>
    </div>


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
