<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../conexion.php";
include "../header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de la reseña
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            Reseñas:
                        </div>
                        <?php
                              mysqli_select_db($conn, "productosbd");
                          $consultar= "SELECT * FROM diseño d INNER JOIN categoria c ON d.id_diseño = c.id_categoria";

                          $registros= mysqli_query($conn, $consultar);

                        ?>
                       <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Identificador Reseña</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col">Alto</th>
                                <th scope="col">Ancho</th>
                                <th scope="col">Identificacion Categoria</th>
                                <th scope="col">Imagen</th> 
                               
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                                while($registro=mysqli_fetch_assoc($registros)){

                              ?>

                              <tr class="align-middle">
                                <td scope="row"><?php echo $registro['id_diseño']; ?></td>
                                <td><?php echo $registro['Tamaño']; ?></td>
                                <td><?php echo $registro['alto']; ?></td>
                                <td><?php echo $registro['ancho']; ?></td>
                                <td><?php echo $registro['id_categoria']; ?></td>    
                                                           
                                <td>
                                                <?php 
                                                echo "<img width='100px' height='100px' src='../imagenes/{$registro['imagenes']}' "; 
                                                ?>
                                            </td> 
                                          <td> <a href="actualiza2.php?id=<?php echo $registro['id_diseño']; ?>"><i class="bi-pencil px-1" style="font-size: 2rem; color:green;"></i> </a></td>                           
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
