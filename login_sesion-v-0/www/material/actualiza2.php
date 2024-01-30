<?php 
include "../header.php";
include "../conexion.php";

mysqli_select_db($conn, "productosbd");
$productoactualizar = $_GET["id"];
$seleccionar = "SELECT *
FROM producto p
INNER JOIN material m ON m.id_material = p.id_producto
INNER JOIN tipo_material tm ON tm.id_tipo_material = m.id_tipo_material
INNER JOIN fabricantes fa ON fa.id_fabricante = p.id_fabricante
WHERE p.id_producto = $productoactualizar
ORDER BY p.id_producto;";
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
                        <form class="p-4" method="POST" action="actualiza3.php?idmodifica=<?php echo $productoactualizar;?>" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required value="<?php echo $registro['nombre_producto'];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                                <small id="helpId" class="form-text text-muted">Nombre</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">marca</label>
                                <input type="text" class="form-control" name="marca" id="marca" required value="<?php echo $registro['marca'];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                                <small id="helpId" class="form-text text-muted">marca</small>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">referencia</label>
                                <input type="text" class="form-control" name="referencia" id="referencia" required value="<?php echo $registro['referencia'];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                                <small id="helpId" class="form-text text-muted">referencia</small>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">precio</label>
                                <input type="number" class="form-control" name="precio" id="precio" required value="<?php echo $registro['precio'];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                                <small id="helpId" class="form-text text-muted">precio</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Color</label>
                                <input type="text" class="form-control" name="color" id="color" required value="<?php echo $registro['color'];?>" placeholder="Introduce el Color">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Peso</label>
                                <input type="text" class="form-control" name="peso" id="peso" required value="<?php echo $registro['peso'];?>" placeholder="Introduce el Peso">
                            </div>
                            <div class="mb-3">
                                <label for="">Tipo de Material</label>
                                <select name="tipomaterial" class="form-control">
                                    <option selected>Seleccione el tipo de material</option>
                                    <?php
                                    include("../conexion.php");
                                    mysqli_select_db($conn, "productosbd");
                                    $consultar = "SELECT * FROM tipo_material";
                                    $sql = mysqli_query($conn, $consultar);

                                    echo "<option selected value='" . $registro['id_tipo_material'] . "'>" . $registro['Nombrematerial'] . "</option>";

                                    while ($resultado = $sql->fetch_assoc()) {
                                        echo "<option value='" . $resultado['id_tipo_material'] . "'>" . $resultado['Nombrematerial'] . "</option>";
                                    }
                                    ?>
                                </select>
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
                          
                          echo "<option selected value='" . $registro['id_fabricante'] . "'>" . $registro['nombre_fabricante'] . "</option>";
                          while ($resultado = $sql->fetch_assoc()) {
                              echo "<option value='" . $resultado['id_fabricante'] . "'>" . $resultado['nombre_fabricante'] . "</option>";
                              
                            }
                          ?>
                      </select>
                          </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Imagen Antigua</label>
                                <?php  echo '<img width="100px" height="100px" src="../imagenes/'.$registro['fotografia'].'">';?>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" required accept="image/*">
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
