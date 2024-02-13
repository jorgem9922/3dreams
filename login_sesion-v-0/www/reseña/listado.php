<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../conexion.php";
include "../header.php";

//$registros nos entrega la cantidad de registros a mostrar.
$registros = 3;
 
//$contador como su nombre lo indica el contador.
$contador = 1;
 
$pagina = $_GET['pagina'];
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

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Listado de reseñas
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            Reseñas:
                        </div>
                        <?php
                        
                          mysqli_select_db($conn,"productosbd");
                          #$consultar= "SELECT * FROM reseña r INNER JOIN usuario u ON r.id_usuario = u.id_usuario INNER JOIN producto d ON r.id_producto = d.id_producto";

                          
                          
                          
                         # $registros= mysqli_query($conn, $consultar);

                        ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Identificador Reseña</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Calificacion</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Producto</th> 
                                <th scope="col">Fecha de creacion</th>                           
                                <th scope="col">Imagen</th>
                              
                              </tr>
                            </thead>
                            <tbody>
                              <?php



                              $resultados = mysqli_query($conn,"SELECT * FROM reseña");
                              
                              //Contamos la cantidad de filas entregadas por la consulta, de esta forma sabemos cuantos registros fueron retornados por la consulta.
                              $total_registros = mysqli_num_rows($resultados);
                              echo $total_registros;

                              
                              mysqli_select_db($conn,"productosbd");
                              $consultar= "SELECT * FROM `reseña` r INNER JOIN usuario u ON r.id_usuario = u.id_usuario INNER JOIN producto d ON r.id_producto = d.id_producto ORDER BY id_reseña ASC LIMIT $inicio, $registros";

                              #echo $consultar;
                             $resultados = mysqli_query($conn, $consultar);

                            

                              $total_paginas = ceil($total_registros / $registros);


                                while($registro=mysqli_fetch_assoc($resultados)){

                              ?>

                              <tr class="align-middle">
                                <td scope="row"><?php echo $registro['id_reseña']; ?></td>
                                <td><?php echo $registro['nombre']; ?></td>
                                <td><?php echo $registro['calificacion']; ?></td>
                                <td><?php echo $registro['titulo']; ?></td>
                                <td><?php echo $registro['descripcion']; ?></td> 
                                <td><?php echo $registro['nombre_producto']; ?></td>  
                                <td><?php echo $registro['fecha_creacion']; ?></td>     
                                                           
                                <td>
                                                <?php 
                                                echo "<img width='100px' height='100px' src='../imagenes/{$registro['fotografia_reseña']}' "; 
                                                ?>
                                            </td>                           
                              </tr>
                              
                            
                              <?php
                                }
                              ?>

                            </tbody>
                            
                          </table>
                        </div>

                    </div>
                </div>



                <div>
        <?php
        if ($total_registros) {
            /**
             * Aca activamos o desactivamos la opción "< Anterior", si estamos en la pagina 1 nos dará como resultado 0 por ende NO
             * activaremos el primer if y pasaremos al else en donde se desactiva la opción anterior. Pero si el resultado es mayor
             * a 0 se activara el href del link para poder retroceder.
             */
            if (($pagina - 1) > 0) {
                echo "<a href='listado.php?pagina=".($pagina-1)."'>< Anterior</a>";
            } else {
                echo "<a href='#'>< Anterior</a>";
            }
 
            // Generamos el ciclo para mostrar la cantidad de paginas que tenemos.
            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($pagina == $i) {
                    echo "<a href='#'>". $pagina ."</a>";
                } else {
                    echo "<a href='listado.php?pagina=$i'>$i</a> ";
                }
            }
 
            /**
             * Igual que la opcion primera de "< Anterior", pero aca para la opcion "Siguiente >", si estamos en la ultima pagina no podremos
             * utilizar esta opcion.
             */
            if (($pagina + 1)<=$total_paginas) {
                echo "<a href='listado.php?pagina=".($pagina+1)."'>Siguiente ></a>";
            } else {
                echo "<a href='#'>Siguiente ></a>";
            }
        }
        ?>
    </div>
 




            <a href="index.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>

