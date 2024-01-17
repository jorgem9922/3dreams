<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['usuario'];
include "header.php"
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Alta de un producto
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                        
                        <!-- <div class="mb-3">
                          <label for="" class="form-label">Identificador</label>
                          <input type="number"
                            class="form-control" name="identificador" id="identificador" autofocus required aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div> -->
                        <div class="mb-3">
                          <label for="" class="form-label">identificador</label>
                          <input type="text"
                            class="form-control" name="identificador" id="identificador"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">identificador</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">apellido</label>
                          <input type="text"
                            class="form-control" name="apellido" id="apellido"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">apellido</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">dni</label>
                          <input type="text"
                            class="form-control" name="dni" id="dni"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">dni</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">correo_electronico</label>
                          <input type="int"
                            class="form-control" name="correo_electronico" id="correo_electronico"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">correo_electronico</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">ciudad</label>
                          <input type="int"
                            class="form-control" name="ciudad" id="ciudad"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">ciudad</small>
                        </div>
                        <!-- <div class="mb-3">
                          <label for="" class="form-label">ciudad</label>
                          <input type="text"
                            class="form-control" name="ciudad" id="ciudad"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">ciudad</small>
                        </div>

                         -->

                        <!-- <div class="mb-3">
                          <label for="" class="form-label">DNI</label>
                          <textarea class="form-control" name="DNI" id="DNI" rows="3"></textarea>
                        </div> -->

                        <!-- <div class="mb-3">
                          <label for="" class="form-label">Precio</label>
                          <input type="number"
                            class="form-control" name="precio" id="precio" required aria-describedby="helpId" placeholder="Introduce el precio">
                          <small id="helpId" class="form-text text-muted">Precio</small>
                        </div> -->

                        <div class="mb-3">
                          <label for="" class="form-label">Imagen</label>
                          <input type="file"
                            class="form-control" name="imagen" id="imagen" required accept="image/*">
                          <small id="helpId" class="form-text text-muted">Imagen</small>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Dar de alta">
                        </div>

                        

                        </form>

                    </div>
                </div>

            <a href="index2.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "footer.php"
?>
