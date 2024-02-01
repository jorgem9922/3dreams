<?php
include_once("../conexion.php");
mysqli_select_db($conn, "productosbd")
$sql = "SELECT * FROM usuario ";
$registros = mysqli_query($conn, $sql);
require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
while ($field_info = mysqli_fetch_field($resultset)) {
$pdf->Cell(27,12,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
$pdf->SetFont('Arial','',12);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(27,12,$column,1);
}
}
$pdf->Output();
?>