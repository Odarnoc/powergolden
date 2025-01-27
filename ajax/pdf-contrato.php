<?php
require('PDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Contrato general de cliente.'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','',15);
    $this->Cell(40,10,'Fecha de reporte: ',0,0,'c',0); 
    $this->Ln(10);

    $this->SetFont('Arial','B',15);
    $this->Cell(83,10,'Nombre de producto',1,0,'c',0); 
    $this->Cell(52,10,'Categoria',1,0,'c',0); 
    $this->Cell(52,10,'Stock',1,1,'c',0); 
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
    $pdf->Cell(83,10,utf8_decode("Contrato"),1,0,'c',0); 
$pdf->Output(); 
?>