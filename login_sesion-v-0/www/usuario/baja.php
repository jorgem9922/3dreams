<?php 
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['usuario'];

include "conexion.php";
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Baja de producto
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            usuario:
                        </div>
                        <?php
                       mysqli_select_db($conn,"dreams3");
                       $consultar= "SELECT * FROM usuario ";

                       $registros= mysqli_query($conn, $consultar);

                        ?>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">ciudad</th>
                                <th scope="col">correo</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Fotografia</th>
                                <th scope="col">borrar</th>

                                    <!-- Agrega más columnas según tus necesidades -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($registro = mysqli_fetch_assoc($registros)) {
                                    ?>
                                    <tr class="align-middle">
                                    <td scope="row"><?php echo $registro['id_usuario']; ?></td>
                                    <td><?php echo $registro['nombre']; ?></td>
                                    <td><?php echo $registro['apellido']; ?></td>
                                    <td><?php echo $registro['ciudad']; ?></td>
                                    <td><?php echo $registro['correo_electronico']; ?></td>
                                    <td><?php echo $registro['DNI']; ?></td>
                                        <td>
                                        <?php 
                                         echo "<img width='100px' height='100px' src='../imagenes/{$registro['fotografia']}' alt='Imagen de producto'>"; 
                                      
                                        ?></td>
                                        <td> <a href="baja2.php?id=<?php echo $registro['id_usuario']; ?>"><i class="bi-trash px-1" style="font-size: 2rem; color:red;"></i> </a></td> 
                                        <!-- Agrega más celdas según tus necesidades -->
                                    </tr>
                                    <?php
                                }
                                ?>
                        

                            </tbody>
                            
                          </table>
                        </div>
                        

                    </div>
                </div>

            <a href="index2.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "footer.php"
?>
