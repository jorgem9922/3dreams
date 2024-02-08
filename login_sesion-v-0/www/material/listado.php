<?php
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../conexion.php";
include "../header.php";

$pagina=$_GET['pagina'];
$registro = 10;
 
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
    $inicio = ($pagina - 1) * $registro;
}
?>


<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Listado de Piezas con Información de Producto
                </div>
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Piezas:
                        </div>

                        <?php
                        mysqli_select_db($conn, "productosbd");
                        $consultar = "SELECT *
                        FROM producto p
                        INNER JOIN material m ON m.id_material = p.id_producto
                        INNER JOIN tipo_material tm ON tm.id_tipo_material = m.id_tipo_material
                        INNER JOIN fabricantes fa ON fa.id_fabricante = p.id_fabricante
                        ORDER BY p.id_producto;
                        ";
                        
                        $registros = mysqli_query($conn, $consultar);
                        $total_registros = mysqli_num_rows($registros);

                        $consultar = "SELECT *
                        FROM producto p
                        INNER JOIN material m ON m.id_material = p.id_producto
                        INNER JOIN tipo_material tm ON tm.id_tipo_material = m.id_tipo_material
                        INNER JOIN fabricantes fa ON fa.id_fabricante = p.id_fabricante
                        ORDER BY p.id_producto  ASC LIMIT $inicio, $registro;
                        ";
                        
                        $registros = mysqli_query($conn, $consultar);
                        $total_paginas = ceil($total_registros / $registro);

                       
                        ?>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">id del Producto</th>
                                    <th scope="col">Nombre del Producto</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Peso</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Modelo de Impresión</th>
                                    <th scope="col">Nombre del Material</th>
                                    <th scope="col">Tamaño</th>
                                    <th scope="col">fabricante</th>
                                    <th scope="col">Fotografía</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                               if ($total_registros) {
                                while ($personas = mysqli_fetch_array($registros, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr class="align-middle">
                                        <td><?php echo $personas['id_producto']; ?></td>
                                        <td><?php echo $personas['nombre_producto']; ?></td>
                                        <td><?php echo $personas['marca']; ?></td>
                                        <td><?php echo $personas['referencia']; ?></td>
                                        <td><?php echo $personas['precio']; ?></td>
                                        <td><?php echo $personas['color']; ?></td>
                                        <td><?php echo $personas['peso']; ?></td>
                                        <td><?php echo $personas['Descripcion']; ?></td>
                                        <td><?php echo $personas['modelodeimpresion']; ?></td>
                                        <td><?php echo $personas['Nombrematerial']; ?></td>
                                        <td><?php echo $personas['tamaño']; ?></td>
                                        <td><?php echo $personas['nombre_fabricante']; ?></td>
                                        <td>
                                            <?php 
                                            echo "<img width='100px' height='100px' src='../imagenes/{$registro['fotografia_producto']}' alt='Imagen de producto'>"; 
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                $contador++;
                            }
                         } else {
                          echo "<font color='darkgray'>(sin resultados)</font>";
                        }
             
             
                        mysqli_free_result($registros);
                                ?>
                                </tbody>
                            </table>
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
    </div>            </div>
                    </div>
                </div>
            </div>
            <a href="index.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>
    </div>
</div>

<?php
include "../footer.php"
?>
