<?php 
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
    header("Location: index.php");
    exit;
    
}
$usuario = $_SESSION['usuario'];

include "../header.php";
include "../conexion.php";

mysqli_select_db($conn, "productosbd");
$usuarioactualizar = $_GET["id"];
$seleccionar = "SELECT *FROM usuario

WHERE id_usuario = $usuarioactualizar";
$registros = mysqli_query($conn, $seleccionar);

if ($registro = mysqli_fetch_assoc($registros)) {
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de un producto
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                        Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?idmodifica=<?php echo $usuarioactualizar;?>" enctype="multipart/form-data">
                        
                        <!-- <div class="mb-3">
                          <label for="" class="form-label">Identificador</label>
                          <input type="number"
                            class="form-control" name="identificador" id="identificador" autofocus required aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div> -->

                        
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required aria-describedby="helpId" value="<?php echo $registro['nombre'];?>" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">apellido</label>
                          <input type="text"
                            class="form-control" name="apellido" id="apellido"  required aria-describedby="helpId" value="<?php echo $registro['apellido'];?>" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">apellido</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">dni</label>
                          <input type="text"
                            class="form-control" name="dni" id="dni"  required aria-describedby="helpId" value="<?php echo $registro['DNI'];?>" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">dni</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">correo_electronico</label>
                          <input type="int"
                            class="form-control" name="correo_electronico" id="correo_electronico"  required aria-describedby="helpId" value="<?php echo $registro['correo_electronico'];?>" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">correo_electronico</small>
                        </div>
                        /div>
                        <label for="">Ciudad</label>
                      <select name="ciudad" class="form-control">
                          <option selected disabled>Seleccione la ciudad</option>
                          <?php
                          include("../conexion.php");
                          mysqli_select_db($conn, "productosbd");
                          $consultar = "SELECT * FROM ciudad";

                          $sql = mysqli_query($conn, $consultar);

                          // Verifica si hay resultados antes de recorrerlos
                          if ($sql) {
                              while ($resultado = mysqli_fetch_assoc($sql)) {
                                  echo "<option value='" . $resultado['id_ciudad'] . "'>" . $resultado['nombre_ciudad'] . "</option>";
                              }
                          } else {
                              echo "Error en la consulta: " . mysqli_error($conn);
                          }
                          ?>
                      </select>
                        </div>
                        

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
                          <label for="" class="form-label">Imagen Antigua</label>
                          <?php  echo '<img width="100px" height="100px" src="../imagenes/'.$registro['fotografia'].'">';?>
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
} else {
    echo "No se encontró el producto para actualizar.";
}

include "../footer.php"
?>



