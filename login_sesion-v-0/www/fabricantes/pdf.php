<?php
include_once("../conexion.php");
mysqli_select_db($conn,"dreams3");
        $consultar= "SELECT * FROM fabricante";

        $resultset = mysqli_query($conn, $consultar);
require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);
while ($field_info = mysqli_fetch_field($resultset)) {
$pdf->Cell(30,12,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
$pdf->SetFont('Arial','',7);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(30,7,$column,1);
}
}
$pdf->Output();
?>