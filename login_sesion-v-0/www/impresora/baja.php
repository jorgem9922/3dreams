<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
    header("Location: login.php");
}
include "conexioncrud.php";
include "../conexion.php";
include "../header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Baja de fabricante
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            Fabricantes:
                        </div>
                        <?php
                          mysqli_select_db($conexion,"productosbd");
                          $consultar= "SELECT *
                          FROM producto p
                          INNER JOIN impresora i ON i.id_impresora = p.id_producto
                          INNER JOIN fabricantes fa ON fa.id_fabricante = p.id_fabricante
                          ORDER BY p.id_producto;";

                          $registros= mysqli_query($conexion, $consultar);

                        ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                              <tr>
                                <th scope="col">Identificador </th>
                                <th scope="col">nombre</th>
                                <th scope="col">marca</th>
                                <th scope="col">referencia</th>
                                <th scope="col">precio</th>
                                <th scope="col">color</th>
                                <th scope="col">modelo</th>
                                <th scope="col">tamaño de impresora</th>
                                <th scope="col"> tamaño cama x</th>
                                <th scope="col"> tamaño cama y</th>
                                <th scope="col"> fabricante</th>
                                <th scope="col"> iamgen</th>
                              </tr>
                            </thead>
                            
                              <?php

                                while($registro=mysqli_fetch_assoc($registros)){

                              ?>


                              <tr class="align-middle">
                              <td><?php echo $registro['id_producto']; ?></td>
                                        <td><?php echo $registro['nombre_producto']; ?></td>
                                        <td><?php echo $registro['marca']; ?></td>
                                        <td><?php echo $registro['referencia']; ?></td>
                                        <td><?php echo $registro['precio']; ?></td>
                                        <td><?php echo $registro['color']; ?></td>
                                        <td><?php echo $registro['modelo']; ?></td>
                                        <td><?php echo $registro['tamaño_impresora']; ?></td>
                                        <td><?php echo $registro['tamañocamax']; ?></td>
                                        <td><?php echo $registro['tamañocamay']; ?></td>
                                        <td><?php echo $registro['nombre_fabricante']; ?></td>
                                
                                <td><?php echo '<img width="100px" height="100px" src="../imagenes/'. $registro['fotografia_producto']. '">'; ?>  </td>
                                <td> <a href="baja2.php?id=<?php echo $registro['id_producto']; ?>"><i class="bi-trash px-1" style="font-size: 2rem; color:red;"></i> </a></td>  
                              </tr>
                              
                            
                              <?php
                                }
                              ?>

                            </tbody>
                            
                          </table>
                        </div>
                        

                    </div>
                </div>

            <a href="indexcrud.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php";
?>
