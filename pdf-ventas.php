<?php
require('PDF/fpdf.php');

require 'user_preferences/user-info.php';

$query = 'SELECT DISTINCT pxv.venta_id AS venta, V.fecha AS fecha, v.total AS tottal, u.nombre AS nombre, u.apellidos AS apellido FROM productosxventas AS pxv 
LEFT JOIN ventas AS v ON v.id = pxv.venta_id LEFT JOIN usuarios AS u ON u.id = v.user_id WHERE v.fecha BETWEEN "'.$_GET['inicio'].'" and "'.$_GET['fin'].'"';

$productos=R::getAll($query);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    $finicio=$_GET['inicio'];
    $ffin=$_GET['fin'];
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de Productos'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','',15);
    $this->Cell(40,10,'Fecha de reporte: Del '.$finicio.' al '.$ffin,0,0,'c',0); 
    $this->Ln(10);

    $this->SetFont('Arial','B',15);
    $this->Cell(40,10,'Fecha',1,0,'c',0); 
    $this->Cell(15,10,'ID',1,0,'c',0); 
    $this->Cell(100,10,'Cliente',1,0,'c',0); 
    $this->Cell(25,10,'Total',1,1,'c',0); 
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',18); 
foreach ($productos as $item) {
    $pdf->Cell(40,10, $item['fecha'],1,0,'c',0);  
    $pdf->Cell(15,10,utf8_decode($item['venta']),1,0,'c',0); 
    $pdf->Cell(100,10,utf8_decode($item['nombre'].' '.$item['apellido']),1,0,'c',0); 
    $pdf->Cell(25,10,utf8_decode('$'.$item['tottal']),1,1,'c',0);
}  
$pdf->Output();
?>