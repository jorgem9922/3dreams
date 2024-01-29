<?php
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("Location: indexcrud.php");
    exit;
}
include "../conexion.php";
include "../header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Listado de Diseño
                </div>
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Diseño:
                        </div>
                        <?php
                        mysqli_select_db($conn, "productosbd");
                        $consultar = "SELECT * FROM diseño d 
                        INNER JOIN producto p ON d.id_diseño = p.id_producto 
                        INNER JOIN categoria c ON d.id_categoria = c.id_categoria 
                        INNER JOIN fabricantes f ON p.id_fabricante = f.id_fabricante"; 
                        $registros = mysqli_query($conn, $consultar);

                        if (!$registros) {
                            die("Query failed: " . mysqli_error($conn));
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID producto</th>
                                        <th scope="col">Nombre Producto</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Referencia</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Tamaño</th>
                                        <th scope="col">Alto</th>
                                        <th scope="col">Ancho</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Nombre de categoria</th>
                                        <th scope="col">Nombre Fabricante</th>
                                        <th scope="col">Imagenes</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($registro = mysqli_fetch_assoc($registros)) {
                                    ?>
                                        <tr class="align-middle">

                                        <td scope="row"><?php echo $registro['id_producto']; ?></td>
                                            <td><?php echo $registro['nombre_producto']; ?></td>
                                            <td><?php echo $registro['marca']; ?></td>
                                            <td><?php echo $registro['referencia']; ?></td>
                                            <td><?php echo $registro['precio']; ?></td>
                                            <td scope="row"><?php echo $registro['Tamaño']; ?></td>
                                            <td><?php echo $registro['alto']; ?></td>
                                            <td><?php echo $registro['ancho']; ?></td>
                                            <td><?php echo $registro['descripcion']; ?></td>
                                            <td><?php echo $registro['nombre_categoria']; ?></td>
                                            <td><?php echo $registro['nombre_fabricante']; ?></td>
                                                                       
                                <td>
                                                <?php 
                                                echo "<img width='100px' height='100px' src='../imagenes/{$registro['imagenes']}' "; 
                                                ?>
                                            </td>   
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <a href="index.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
            </div>
        </div>
    </div>
</div>

<?php
include "../footer.php"
?>
