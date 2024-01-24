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
                          mysqli_select_db($conexion,"productosbd");
                          $consultar= "SELECT * FROM fabricantes";
                          $registros= mysqli_query($conexion, $consultar);

                        ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                              <th scope="col">Identificador </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">telefono</th>
                                <th scope="col">CP</th>
                                <th scope="col">Correo</th>
                                <th scope="col">imagen</th>
                                <th scope="col">Borrar</th>
                              
                              
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                                while($registro=mysqli_fetch_row($registros)){

                              ?>


                              <tr class="align-middle">
                                <td scope="row"><?php echo $registro[0]; ?></td>
                                <td><?php echo $registro[1]; ?></td>
                                <td><?php echo $registro[2]; ?></td>
                                <td><?php echo $registro[3]; ?></td>
                                <td><?php echo $registro[4]; ?></td>
                                <td><?php echo '<img width="100px" height="100px" src="../imagenes/'. $registro[5]. '">'; ?>  </td>
                                <td> <a href="actualiza2.php?id=<?php echo $registro[0]; ?>"><i class="bi-pencil px-1" style="font-size: 2rem; color:green;"></i> </a></td>  
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
include "../footer.php"
?>
