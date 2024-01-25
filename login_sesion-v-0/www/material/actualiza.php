<?php 
include "../conexion.php";
include "../header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de producto
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            Productos:
                        </div>
                        <?php
                        mysqli_select_db($conn, "productosbd");
                        $consultar = "SELECT p.*, m.*, tm.*
                        FROM producto p
                        INNER JOIN material m ON m.id_material = p.id_producto
                        INNER JOIN tipo_material tm ON tm.id_tipo_material = m.id_tipo_material
                        ORDER BY p.id_producto;";

                        $registros = mysqli_query($conn, $consultar);
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
                                    <th scope="col">Fotografía</th>
                                    <th scope="col">actualizar</th>
                                    <!-- Agrega más columnas según tus necesidades -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($registro = mysqli_fetch_assoc($registros)) {
                                    ?>
                                    <tr class="align-middle">
                                        <td><?php echo $registro['id_producto']; ?></td>
                                        <td><?php echo $registro['nombre']; ?></td>
                                        <td><?php echo $registro['marca']; ?></td>
                                        <td><?php echo $registro['referencia']; ?></td>
                                        <td><?php echo $registro['precio']; ?></td>
                                        <td><?php echo $registro['color']; ?></td>
                                        <td><?php echo $registro['peso']; ?></td>
                                        <td><?php echo $registro['Descripcion']; ?></td>
                                        <td><?php echo $registro['modelodeimpresion']; ?></td>
                                        <td><?php echo $registro['Nombrematerial']; ?></td>
                                        <td><?php echo $registro['tamaño']; ?></td>
                                        <td>
                                        <?php 
                                         echo "<img width='100px' height='100px' src='../imagenes/{$registro['fotografia']}' alt='Imagen de producto'>"; 
                                      
                                        ?></td>
                                <td> <a href="actualiza2.php?id=<?php echo $registro['id_producto']; ?>"><i class="bi-pencil px-1" style="font-size: 2rem; color:green;"></i> </a></td>                                
                              
                              </tr>
                              <?php
                                }
                              ?>

                            </tbody>
                            
                          </table>
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
