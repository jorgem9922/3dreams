<?php 

/* *********************************************************************** */
/* *********************  Programa principal  **************************** */
/* **************** Menu de selección de opciones ************************ */
/* *********************************************************************** */
session_start();
    
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
        header("Location: index.php");
        exit;
        
    }
    $usuario = $_SESSION['usuario'];
    include "header.php";

?>

<body>

  <main>
<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Acciones sobre la base de datos
                </div>

                <div class="p-4">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">usuario</th>
                                <th scope="col">reseñas</th>
                                <th scope="col">fabricantes</th>
                                <th scope="col">Listado </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row"><a href="usuario/index2.php"><i class="bi-database-add px-3" style="font-size: 4rem; color:yellow;"></i></a></td>
                                <td scope="row"><a href="reseña/index.php"><i class="bi-database-dash px-3" style="font-size: 4rem; color:yellow;"></i></a></td>
                                <td scope="row"><a href="fabricantes/indexcrud.php"><i class="bi-database-check px-3" style="font-size: 4rem; color:yellow;"></a></i></td>
                                <td scope="row"><a href="listado.php"><i class="bi-database-down px-3" style="font-size: 4rem; color:yellow;"></i></a></td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>

        </div>  
    </div>
</div>




<?php 
include "footer.php"
?>
