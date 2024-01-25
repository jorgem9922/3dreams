<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../header.php"
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Diseño
                </div>

                <div class="p-4">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Añadir diseño</th>
                                <th scope="col">Borrar diseño</th>
                                <th scope="col">Actualización</th>
                                <th scope="col">Reseñas de diseño</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row"><a href="alta.php"><i class="bi-database-add px-3" style="font-size: 4rem; color:yellow;"></i></a></td>
                                <td scope="row"><a href="baja.php"><i class="bi-database-dash px-3" style="font-size: 4rem; color:yellow;"></i></a></td>
                                <td scope="row"><a href="actualiza.php"><i class="bi-database-check px-3" style="font-size: 4rem; color:yellow;"></a></i></td>
                                <td scope="row"><a href="listado.php"><i class="bi-database-down px-3" style="font-size: 4rem; color:yellow;"></i></a></td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <a href="../index2.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
