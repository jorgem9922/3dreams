<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "conexioncrud.php";
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Listado de fabricantes
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            fabricantes:
                        </div>
                        <?php
                          mysqli_select_db($conexion,"dreams3");
                          $consultar= "SELECT * FROM fabricantes";

                          $registros= mysqli_query($conexion, $consultar);

                        ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Identificador </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Código postal</th>
                                <th scope="col">Correo electrónico</th>
                              
                              </tr>
                            </thead>
                            
                              <?php

                                while($registro=mysqli_fetch_row($registros)){

                              ?>


                              <tr class="align-middle">
                                <td scope="row"><?php echo $registro[0]; ?></td>
                                <td><?php echo $registro[1]; ?></td>
                                <td><?php echo $registro[2]; ?></td>
                                <td><?php echo $registro[3]; ?></td>
                                <td><?php echo $registro[4]; ?></td>
                                <td><?php echo '<img width="100px" height="100px" src="imagenes/'. $registro[5]. '">'; ?>  </td>
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
include "footer.php"
?>
