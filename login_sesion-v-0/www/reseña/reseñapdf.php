<?php
include_once("../conexion.php");
//$sql = "SELECT id, employee_name, employee_salary, employee_age FROM employee LIMIT 10";          
$sql= "SELECT * FROM `reseña` r INNER JOIN usuario u ON r.id_usuario = u.id_usuario INNER JOIN producto d ON r.id_producto = d.id_producto ORDER BY id_reseña ASC LIMIT 10";

mysqli_select_db($conn,"productosbd");


$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
while ($field_info = mysqli_fetch_field($resultset)) {
$pdf->Cell(17,20,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
$pdf->SetFont('Arial','',8);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(17,20,$column,1);
}
}
$pdf->Output();
?>