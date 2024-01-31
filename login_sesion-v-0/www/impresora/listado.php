<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "conexioncrud.php";
include "../header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Listado de impresoras
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            fabricantes:
                        </div>
                        <?php
                          mysqli_select_db($conexion,"productosbd");
                          $consultar = "SELECT *
                          FROM impresora i
                          INNER JOIN producto p ON i.id_impresora=p.id_producto 
                          INNER JOIN fabricantes f ON f.id_fabricante=p.id_fabricante
                          
                          ";
                          $registros= mysqli_query($conexion, $consultar);

                        ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Identificador </th>
                                <th scope="col">modelo</th>
                                <th scope="col">marca</th>
                                <th scope="col">color</th>
                                <th scope="col">tamaño_impresora</th>
                                <th scope="col">tamañocamax</th>
                                <th scope="col">tamañocamay</th>
                                <th scope="col">id_producto</th>
                                <th scope="col">id_pedido</th>
                                <th scope="col">nombre_producto</th>
                                <th scope="col">marca</th>
                                <th scope="col">referencha</th>
                                <th scope="col">fotografia</th>

                              </tr>
                            </thead>
                            
                              <?php

                                while($registro=mysqli_fetch_assoc($registros)){

                              ?>


                              <tr class="align-middle">

                              <td><?php echo $registro['id_impresora']; ?></td>
                                        <td><?php echo $registro['modelo']; ?></td>
                                        <td><?php echo $registro['marca']; ?></td>
                                        <td><?php echo $registro['color']; ?></td>
                                        <td><?php echo $registro['tamaño_impresora']; ?></td>
                                        <td><?php echo $registro['tamañocamax']; ?></td>
                                        <td><?php echo $registro['tamañocamay']; ?></td>
                                        <td><?php echo $registro['id_producto']; ?></td>
                                        <td><?php echo $registro['id_pedido']; ?></td>
                                        <td><?php echo $registro['nombre_producto']; ?></td>
                                        <td><?php echo $registro['marca']; ?></td>
                                        <td><?php echo $registro['referencia']; ?></td>
                                <td><?php echo '<img width="100px" height="100px" src="../imagenes/'. $registro['fotografia']. '">'; ?>  </td>
                              </tr>
                              
                            
                              <?php
                                }
                              ?>

                            
                            
                          </table>
                        </div>
                        

                    </div>
                </div>

            <a href="indexcrud.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
