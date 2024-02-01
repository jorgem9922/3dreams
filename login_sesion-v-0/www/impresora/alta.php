<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
   exit; 
}
include "../header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Alta de un impresoras
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                         <div class="mb-3">
                        <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                      <!-- id producto -->
                        <label for="" class="form-label">id_producto</label>
                          <input type="number"
                            class="form-control" name="id_producto" id="id_producto" required aria-describedby="helpId" placeholder="Introduce el id">
                          <small id="helpId" class="form-text text-muted">id_producto</small>
                        </div>
                        <!-- nombre en forms -->
                        <div class="mb-3">
                        <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                      <!-- id producto -->
                        <label for="" class="form-label">nombre del producto</label>
                          <input type="number"
                            class="form-control" name="nombre_producto" id="nombre_producto" required aria-describedby="helpId" placeholder="Introduce el id">
                          <small id="helpId" class="form-text text-muted">id_producto</small>
                        </div>
                        <!--  nombre del producto  -->
                        <div class="mb-3">
                          <label for="" class="form-label">marca</label>
                          <input type="number"
                            class="form-control" name="marca" id="marca" required aria-describedby="helpId" placeholder="Introduce el telefono">
                          <small id="helpId" class="form-text text-muted">marca </small>
                        </div>
                        <!-- codigo postal en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">referencia</label>
                          <input type="number"
                            class="form-control" name="referencia" id="referencia" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">referencia</small>
                        </div>
                        
                        <!-- correo en forms -->
                        <div class="mb-3">
                          <label for="" class="form-label">precio</label>
                          <input type="numeric"
                            class="form-control" name="precio" id="precio"  required aria-describedby="helpId" placeholder="Introduce el correo">
                          <small id="helpId" class="form-text text-muted">Correo precio</small>
                        </div>
                        <div class="mb-3">
                        <label for="" >fabricante</label>
                        <select name="fabricante" class="form-control">
                          <option selected disabled>Seleccione el tipo de material</option>
                          <?php
                          include("../conexion.php");
                          mysqli_select_db($conn, "productosbd");
                        $consultar = "SELECT * FROM fabricantes";
                        
                        $sql = mysqli_query($conn, $consultar);
                          // $sql = $conexion->query("SELECT * FROM tipo_material");
                          // echo "hola";
                          while ($resultado = $sql->fetch_assoc()) {
                              echo "<option value='" . $resultado['id_fabricante'] . "'>" . $resultado['nombre_fabricante'] . "</option>";
                              
                            }
                          ?>
                      </select>
                          </div>
                        <div class="mb-3">
                          <label for="" class="form-label">modelo</label>
                          <input type="number"
                            class="form-control" name="modelo" id="modelo" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">modelo</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">color</label>
                          <input type="number"
                            class="form-control" name="color" id="color" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">color</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">tamaño de impresora</label>
                          <input type="number"
                            class="form-control" name="tamaño_impresora" id="tamaño_impresora" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">tamaño de impresora</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">tamaño cama x</label>
                          <input type="number"
                            class="form-control" name="tamañocamax" id="tamañocamax" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">tamañocamax</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">tamaño cama y</label>
                          <input type="number"
                            class="form-control" name="tamañocamay" id="tamañocamay" required aria-describedby="helpId" placeholder="Introduce el pcódigo postal">
                          <small id="helpId" class="form-text text-muted">tamañocamay</small>
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
include "../footer.php"
?>
