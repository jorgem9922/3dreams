<?php 
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
    header("Location: ../index.php");
    exit;
    
}
include "../header.php"
?>

<div class="container mt-5">
    <div class="row justify-content-center">
    
        <div class="col text-center">

            <div class="card">

                <div class="card-header display-6">

                Alta de usuario realizada con éxito



                </div>
            </div>
            <a href="index2.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>
    </div>
</div>



<?php 
include "../footer.php"
?>