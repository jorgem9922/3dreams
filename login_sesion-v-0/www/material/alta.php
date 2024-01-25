<?php 
include "../header.php"
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
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Identificador</label>
                          <input type="number"
                            class="form-control" name="identificador" id="identificador" autofocus required aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">marca</label>
                          <input type="text"
                            class="form-control" name="marca" id="marca"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">marca</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">referencia</label>
                          <input type="text"
                            class="form-control" name="referencia" id="referencia"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">referencia</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">precio</label>
                          <input type="int"
                            class="form-control" name="precio" id="precio"  required aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">precio</small>
                        </div>
                        <div class="mb-3">
                        <div class="mb-3">
                          <label for="" class="form-label">Color</label>
                          <input type="text" class="form-control" name="color" id="color" required placeholder="Introduce el Color">
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Peso</label>
                          <input type="text" class="form-control" name="peso" id="peso" required placeholder="Introduce el Peso">
                        </div>
                        <div class="mb-3">
                        <label for="" >Tipo de Material</label>
                        <select name="tipomaterial" class="form-control">
                          <option selected disabled>Seleccione el tipo de material</option>
                          <?php
                          include("../conexion.php");
                          mysqli_select_db($conn, "productosbd");
                        $consultar = "SELECT * FROM tipo_material";
                        
                        $sql = mysqli_query($conn, $consultar);
                          // $sql = $conexion->query("SELECT * FROM tipo_material");
                          // echo "hola";
                          while ($resultado = $sql->fetch_assoc()) {
                              echo "<option value='" . $resultado['id_tipo_material'] . "'>" . $resultado['Nombrematerial'] . "</option>";
                              echo "hola";
                            }
                          ?>
                      </select>

                        </div >

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

            <a href="index.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
