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
                         $consultar = "SELECT * FROM diseño d 
                         INNER JOIN producto p ON d.id_diseño = p.id_producto 
                         INNER JOIN categoria c ON d.id_categoria = c.id_categoria 
                         INNER JOIN fabricantes f ON p.id_fabricante = f.id_fabricante"; 
                         $registros = mysqli_query($conn, $consultar);
                         
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de un diseño
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?id_diseño=<?php echo $productoactualizar;?>" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="" class="form-label"><b>Id producto</b></label>
                          <input type="text"
                            class="form-control" name="id_producto" id="id_producto"  required aria-describedby="helpId" placeholder="Altura">
                          <small id="helpId" class="form-text text-muted">Id producto</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Nombre Producto</b></label>
                          <input type="text"
                            class="form-control" name="nombre_producto" id="nombre_producto"  required aria-describedby="helpId" placeholder="Nombre del producto">
                          <small id="helpId" class="form-text text-muted">Nombre Producto</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Marca</b></label>
                          <input type="text"
                            class="form-control" name="marca" id="marca"  required aria-describedby="helpId" placeholder="Altura">
                          <small id="helpId" class="form-text text-muted">Marca</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Referencia</b></label>
                          <input type="text"
                            class="form-control" name="referencia" id="referencia"  required aria-describedby="helpId" placeholder="Anchura">
                          <small id="helpId" class="form-text text-muted">Referencia</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Precio</b></label>
                          <input type="text"
                            class="form-control" name="precio" id="precio"  required aria-describedby="helpId" placeholder="Anchura">
                          <small id="helpId" class="form-text text-muted">Precio</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Tamaño</b></label>
                          <input type="text"
                            class="form-control" name="Tamaño" id="Tamaño"  required aria-describedby="helpId" placeholder="Anchura">
                          <small id="helpId" class="form-text text-muted">Tamaño</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Alto</b></label>
                          <input type="text"
                            class="form-control" name="alto" id="alto"  required aria-describedby="helpId" placeholder="Anchura">
                          <small id="helpId" class="form-text text-muted">Alto</small>
                        </div>

                        
                        <div class="mb-3">
                          <label for="" class="form-label"><b>Ancho</b></label>
                          <input type="text"
                            class="form-control" name="ancho" id="ancho"  required aria-describedby="helpId" placeholder="Anchura">
                          <small id="helpId" class="form-text text-muted">Ancho</small>
                        </div>

                        <div class="mb-3">
                          <label for="">Nombre de la categoria</label>
                          <select name="nombre_categoria" class="form-control">
                              <option selected disabled>Seleccione la categoria</option>
                              <?php
                              include("../conexion.php");
                              mysqli_select_db($conn, "productosbd");
                              $consultarUsuario = "SELECT * FROM categoria";

                              $sqlUsuario = mysqli_query($conn, $consultarUsuario);

                              // Verifica si hay resultados antes de recorrerlos
                              if ($sqlUsuario) {
                                  while ($resultadoUsuario = mysqli_fetch_assoc($sqlUsuario)) {
                                      echo "<option value='" . $resultadoUsuario['id_categoria'] . "'>" . $resultadoUsuario['nombre_categoria'] . "</option>";
                                  }
                              } else {
                                  echo "Error en la consulta: " . mysqli_error($conn);
                              }
                              ?>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="">Nombre del fabricante</label>
                          <select name="nombre_fabricante" class="form-control">
                              <option selected disabled>Seleccione el fabricante</option>
                              <?php
                              include("../conexion.php");
                              mysqli_select_db($conn, "productosbd");
                              $consultarUsuario = "SELECT * FROM fabricantes";

                              $sqlUsuario = mysqli_query($conn, $consultarUsuario);

                              // Verifica si hay resultados antes de recorrerlos
                              if ($sqlUsuario) {
                                  while ($resultadoUsuario = mysqli_fetch_assoc($sqlUsuario)) {
                                      echo "<option value='" . $resultadoUsuario['id_fabricante'] . "'>" . $resultadoUsuario['nombre_fabricante'] . "</option>";
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

          <a href="actualiza.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
      </div>  
  </div>
</div>

<?php 
include "../footer.php"
?>
