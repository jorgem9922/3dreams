<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
   exit; 
}
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Alta de un fabriante
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                      <!-- id en forms -->
                        <label for="" class="form-label">id_fabricante</label>
                          <input type="number"
                            class="form-control" name="id_fabricante" id="id_fabricante" required aria-describedby="helpId" placeholder="Introduce el id">
                          <small id="helpId" class="form-text text-muted">id del fabricante</small>
                        </div>
                        <!-- nombre en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>
                        <!-- telefono en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">telefono</label>
                          <input type="number"
                            class="form-control" name="telefono" id="telefono" required aria-describedby="helpId" placeholder="Introduce el telefono">
                          <small id="helpId" class="form-text text-muted">Teléfono</small>
                        </div>
                        <!-- codigo postal en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">Código postal</label>
                          <input type="number"
                            class="form-control" name="codigo_postal" id="codigo_postal" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">Código postal</small>
                        </div>
                        <!-- correo en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">correo</label>
                          <input type="text"
                            class="form-control" name="correo_electronico" id="correo_electronico"  required aria-describedby="helpId" placeholder="Introduce el correo">
                          <small id="helpId" class="form-text text-muted">Correo electrónico</small>
                        </div>
                          <!-- imagen en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">Imagen</label>
                          <input type="file"
                            class="form-control" name="fotografia" id="fotografia" required accept="image/*">
                          <small id="helpId" class="form-text text-muted">fotografia</small>
                        </div>
                        <!-- boton de submit -->
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Dar de alta">
                        </div>

                        

                        </form>

                    </div>
                </div>

            <a href="indexcrud.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "footer.php"
?>
