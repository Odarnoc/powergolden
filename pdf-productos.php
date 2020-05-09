<?php
require('PDF/fpdf.php');
require 'bd/conexion.php';

$query = 'SELECT p.*,l.nombre as linea FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE l.id = p.categoria';
$productos=R::getAll($query);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $fecha=$_GET['fecha'];
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(1);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de Productos'),0,0,'C');
    $this->Image('logo-navbar.png',110,10,80);
    $this->Ln(20);
    $this->SetFont('Arial','',10);
    $this->Cell(12);
    $this->Cell(29,10,'Fecha de reporte: ',0,0,'c',0); 
    $this->SetFont('Arial','b',10);
    $this->Cell(28,10,''.$fecha,0,0,'c',0); 
    $this->Ln(20);

    $this->SetFont('Arial','B',11);
    $this->Cell(30); 
    $this->Cell(62,10,'Nombre de producto',0,0,'c',0); 
    $this->Cell(45,10,'Categoria',0,0,'c',0); 
    $this->Cell(52,10,'Stock',0,1,'c',0); 
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
$pdf->SetFont('Times','',10); 
foreach ($productos as $item) {
    $pdf->Cell(30); 
    $pdf->Cell(62,10,utf8_decode($item['nombre']),0,0,'c',0); 
    $pdf->Cell(50,10,utf8_decode($item['linea']),0,0,'c',0); 
    $pdf->Cell(60,10, $item['inventario'],0,1,'c',0);  
}  
$pdf->Output(); 
?>