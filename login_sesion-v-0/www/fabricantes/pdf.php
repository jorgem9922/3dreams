<?php
include_once("../conexion.php");
mysqli_select_db($conn,"productosbd");
        $consultar= "SELECT id_fabricante,nombre_fabricante,telefono,codigo_postal,correo_electronico FROM fabricantes";

        $resultset = mysqli_query($conn, $consultar);
require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);
while ($field_info = mysqli_fetch_field($resultset)) {
$pdf->Cell(38,12,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
$pdf->SetFont('Arial','',7);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(38,7,$column,1);
}
}
$pdf->Output();
?>