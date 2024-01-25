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
                    Reseñas
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="" class="form-label"><b>Identificador</b></label>
                          <input type="number"
                            class="form-control" name="id_reseña" id="id_reseña" autofocus required aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Calificacion</b></label>
                          <input type="text"
                            class="form-control" name="calificacion" id="calificacion"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Calificacion</small>
                        </div>

                       <div> <label for="">Usuario</label>
                      <select name="usuario" class="form-control">
                          <option selected disabled>Seleccione el usuario</option>
                          <?php
                          include("../conexion.php");
                          mysqli_select_db($conn, "productosbd");
                          $consultar = "SELECT * FROM usuario";

                          $sql = mysqli_query($conn, $consultar);

                          // Verifica si hay resultados antes de recorrerlos
                          if ($sql) {
                              while ($resultado = mysqli_fetch_assoc($sql)) {
                                  echo "<option value='" . $resultado['id_usuario'] . "'>" . $resultado['nombre'] . "</option>";
                              }
                          } else {
                              echo "Error en la consulta: " . mysqli_error($conn);
                          }
                          ?>
                      </select>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Titulo</b></label>
                          <textarea class="form-control" name="titulo" id="titulo" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Descripción</b></label>
                          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Fecha de creacion</b></label>
                          <input type="date"
                            class="form-control" name="fecha_creacion" id="fecha_creacion"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                        </div>


                        <div> <label for="">Producto</label>
                      <select name="id_producto" class="form-control">
                          <option selected disabled>Seleccione el producto</option>
                          <?php
                          include("../conexion.php");
                          mysqli_select_db($conn, "productosbd");
                          $consultar = "SELECT * FROM producto";

                          $sql = mysqli_query($conn, $consultar);

                          // Verifica si hay resultados antes de recorrerlos
                          if ($sql) {
                              while ($resultado = mysqli_fetch_assoc($sql)) {
                                  echo "<option value='" . $resultado['id_producto'] . "'>" . $resultado['nombre_producto'] . "</option>";
                              }
                          } else {
                              echo "Error en la consulta: " . mysqli_error($conn);
                          }
                          ?>
                      </select>
                        </div>


                        <div class="mb-3">
                          <label for="" class="form-label"><b>Imagen</b></label>
                          <input type="file"
                            class="form-control" name="imagen" id="imagen" required accept="image/*">
                          <small id="helpId" class="form-text text-muted">Imagen</small>
                        </div>


                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Enviar reseña">
                        </div>

                        </form>

                    </div>
                </div>

            <a href="index.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
