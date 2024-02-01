<?php 
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("Location: indexcrud.php");
    exit;
}
include "../header.php";
include "../conexion.php";

mysqli_select_db($conn, "productosbd");
$productoactualizar = $_GET["id"];
$seleccionar = "SELECT r.id_reseña, r.calificacion, u.nombre, d.nombre_producto, r.titulo, r.descripcion, r.fecha_creacion, r.imagenes FROM reseña r INNER JOIN usuario u ON r.id_usuario = u.id_usuario INNER JOIN producto d ON r.id_producto = d.id_producto WHERE r.id_reseña='$productoactualizar'";
$registros = mysqli_query($conn, $seleccionar);
$registro = mysqli_fetch_assoc($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de una reseña
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?id=<?php echo $productoactualizar;?>" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="id_reseña" class="form-label"><b>Identificador</b></label>
                          <input type="number"
                            class="form-control" name="id_reseña" id="id_reseña" autofocus required value="<?php echo $registro['id_reseña'] ?? '';?>" aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
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
                          <label for="calificacion" class="form-label"><b>Calificación</b></label>
                          <input type="text"
                              class="form-control" name="calificacion" id="calificacion"  required value="<?php echo $registro['calificacion'] ?? '';?>" aria-describedby="helpId" placeholder="Introduce la Calificación">
                          <small id="helpId" class="form-text text-muted">Calificación</small>
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
                          <label for="titulo" class="form-label"><b>Título</b></label>
                          <input type="text"
                              class="form-control" name="titulo" id="titulo"  required value="<?php echo $registro['titulo'] ?? '';?>" aria-describedby="helpId" placeholder="Introduce el Título">
                          <small id="helpId" class="form-text text-muted">Título</small>
                      </div>

                      <div class="mb-3">
                          <label for="descripcion" class="form-label"><b>Descripción</b></label>
                          <textarea class="form-control" name="descripcion" id="descripcion" required placeholder="Introduce la Descripción"><?php echo $registro['descripcion'] ?? '';?></textarea>
                          <small id="helpId" class="form-text text-muted">Descripción</small>
                      </div>

                      <div class="mb-3">
                          <label for="fecha_creacion" class="form-label"><b>Fecha de Creación</b></label>
                          <input type="text"
                              class="form-control" name="fecha_creacion" id="fecha_creacion"  required value="<?php echo $registro['fecha_creacion'] ?? '';?>" aria-describedby="helpId" placeholder="Introduce la Fecha de Creación">
                          <small id="helpId" class="form-text text-muted">Fecha de Creación</small>
                      </div>
                      <div class="mb-3">
                          <label for="" class="form-label">Imagen Antigua</label>
                          <?php  echo '<img width="100px" height="100px" src="../imagenes/'.$registro['imagenes'].'">';?>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Imagen</label>
                          <input type="file"
                            class="form-control" name="imagen" id="imagen" required accept="image/*">
                          <small id="helpId" class="form-text text-muted">Imagen</small>
                        </div>

                      <div class="d-grid">
                          <input type="submit" class="btn btn-primary" value="Actualizar">
                      </div>

                      </form>

                  </div>
              </div>

          <a href="actualiza.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
      </div>  
  </div>
</div>

<?php 
include "../footer.php"
?>
