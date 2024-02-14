<?php
include_once("../conexion.php");
//$sql = "SELECT id, employee_name, employee_salary, employee_age FROM employee LIMIT 10";          
$sql= "SELECT * FROM `fabricante` ASC LIMIT 1";

mysqli_select_db($conn,"productosbd");


$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
while ($field_info = mysqli_fetch_field($resultset)) {
$pdf->Cell(17,20,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(17,20,$column,1);
}
}
$pdf->Output();
?>