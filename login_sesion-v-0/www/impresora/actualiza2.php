<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../header.php";
include "conexioncrud.php";

mysqli_Select_db($conexion, "productosbd");
$productoactualizar = $_GET["id"];
$seleccionar = "SELECT * FROM fabricantes WHERE id_fabricante='$productoactualizar'";
$registros = mysqli_Query($conexion, $seleccionar);
$registro = mysqli_fetch_row($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de un fabricante
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?idmodifica=<?php echo $productoactualizar;?>&nombreimagen==<?php echo $registro[0];?>" enctype="multipart/form-data">
                        <!-- id -->
                        <div class="mb-3">
                          <label for="" class="form-label">Id</label>
                          <input type="number"
                            class="form-control" name="id_impresora" id="id_impresora" autofocus required value="<?php echo $registro[0];?>" aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Id</small>
                        </div>
                        <!-- modelo -->
                        <div class="mb-3">
                          <label for="" class="form-label">Modelo</label>
                          <input type="text"
                            class="form-control" name="Modelo" id="Modelo"  required value="<?php echo $registro[1];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Modelo</small>
                        </div>
                        <!-- color -->
                        <div class="mb-3">
                          <label for="" class="form-label">color</label>
                          <input type="number"
                            class="form-control" name="color" id="color" autofocus required value="<?php echo $registro[2];?>" aria-describedby="helpId" placeholder="Introduce el color">
                          <small id="helpId" class="form-text text-muted">color</small>
                        </div>
                        <!-- cp -->
                        <div class="mb-3">
                          <label for="" class="form-label">CP</label>
                          <input type="number" class="form-control" name="codigo_postal" id="codgo_postal" required value="<?php echo $registro[3];?>" aria-describedby="helpId" placeholder="Introduce el codigo postal">
                          <small id="helpId" class="form-text text-muted">CP</small>
                        </div>
                        <!-- correo -->
                        <div class="mb-3">
                          <label for="" class="form-label">Tamaño impresora </label>
                          <input type="twxt" class="form-control" name="Tamaño_impresora" id="Tamaño_impresora" required value="<?php echo $registro[4];?>" aria-describedby="helpId" placeholder="Introduce el correo electrónico">
                          <small id="helpId" class="form-text text-muted">Correo</small>
                        </div>

                      <!-- imagen antigua -->
                        <div class="mb-3">
                          <label for="" class="form-label">Imagen Antigua</label>
                          <?php  echo '<img width="100px" height="100px" src="../imagenes/'.$registro[5].'">';
                          ?>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Imagen Nueva</label>
                          <input type="file"
                            class="form-control" name="fotografia" id="fotografia" required accept="image/*">
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
