<?php 
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($usuario)){
    header("Location: indexcrud.php");
    exit;
}
include "../header.php";
include "../conexion.php";

mysqli_select_db($conn, "productosbd");
$productoactualizar = $_GET["id"];
$seleccionar = "SELECT * FROM reseña r INNER JOIN usuario u ON r.id_usuario = u.id_usuario INNER JOIN producto d ON r.id_producto = d.id_producto WHERE id_reseña='$productoactualizar'";
$registros = mysqli_Query($conn, $seleccionar);
$registro = mysqli_fetch_row($registros);
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
                        <form class="p-4" method="POST" action="actualiza3.php?id_reseña=<?php echo $productoactualizar;?>" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="" class="form-label"><b>Identificador</b></label>
                          <input type="number"
                            class="form-control" name="id_reseña" id="id_reseña" autofocus required value="<?php echo $registro['id_reseña'];?>" aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Usuario</b></label>
                          <input type="text"
                            class="form-control" name="usuario" id="usuario"  required value="<?php echo $registro['nombre'];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label"><b>Usuario</b></label>
                          <input type="text"
                            class="form-control" name="usuario" id="usuario"  required value="<?php echo $registro['nombre'];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>



                        <div class="mb-3">
                          <label for="" class="form-label"><b>Producto</b></label>
                          <input type="text"
                            class="form-control" name="producto" id="producto"  required value="<?php echo $registro['nombre_producto'];?>" aria-describedby="helpId" placeholder="Introduce el Autor">
                          <small id="helpId" class="form-text text-muted">Autor</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Título</b></label>
                          <input type="text"
                            class="form-control" name="titulo" id="titulo"  required value="<?php echo $registro['titulo'];?>" aria-describedby="helpId" placeholder="Introduce el Título">
                          <small id="helpId" class="form-text text-muted">Título</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Descripcion</b></label>
                          <input type="text"
                            class="form-control" name="descripcion" id="descripcion"  required value="<?php echo $registro['descripcion'];?>" aria-describedby="helpId" placeholder="Introduce el Título">
                          <small id="helpId" class="form-text text-muted">Descripcion</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>fecha Creacion</b></label>
                          <input type="text"
                            class="form-control" name="fecha_creacion" id="fecha_creacion"  required value="<?php echo $registro['fecha_creacion'];?>" aria-describedby="helpId" placeholder="Introduce el Título">
                          <small id="helpId" class="form-text text-muted">Descripcion</small>
                        </div>



                        <div class="mb-3">
                          <label for="" class="form-label"><b>Imagen Antigua</b></label>
                          <?php  echo '<img width="100px" height="100px" src="../imagenes/'.$registro['imagenes'].'">';?>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label"><b>Imagen Nueva</b></label>
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
