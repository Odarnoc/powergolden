<?php
require('PDF/fpdf.php');
require 'user_preferences/user-info.php';
$finicio;
$ffin;
$ftotal = 0;

if (isset($_GET['inicio']) && isset($_GET['inicio'])) {
    $query = 'SELECT DISTINCT pxv.venta_id AS venta, v.fecha AS fecha,  v.total AS tottal, u.nombre AS nombre, u.apellidos AS apellido FROM productosxventas AS pxv 
LEFT JOIN ventas AS v ON v.id = pxv.venta_id LEFT JOIN usuarios AS u ON u.id = v.user_id WHERE v.fecha BETWEEN "' . $_GET['inicio'] . '" and "' . $_GET['fin'] . '"';
    $finicio = $_GET['inicio'];
    $ffin = $_GET['fin'];
} else {
    $query = 'SELECT DISTINCT pxv.venta_id AS venta, v.fecha AS fecha, v.total AS tottal, u.nombre AS nombre FROM productosxventas AS pxv 
    LEFT JOIN ventas AS v ON v.id = pxv.venta_id LEFT JOIN usuarios AS u ON u.id = v.user_id WHERE v.fecha ="' . date('Y-m-d') . '"';
    $finicio = date('Y-m-d');
    $ffin = date('Y-m-d');
}

$productos = R::getAll($query);

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        if (isset($_GET['inicio']) && isset($_GET['inicio'])) {
            $finicio = $_GET['inicio'];
            $ffin = $_GET['fin'];
        } else {
            $finicio = date('Y-m-d');
            $ffin = date('Y-m-d');
        }
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(70, 10, utf8_decode('Reporte de Ventas'), 0, 0, 'C');
        $this->Image('logo-navbar.png', 110, 10, 80);
        $this->Ln(20);
        $this->SetFont('Arial', '', 10);
        $this->Cell(12);
        $this->Cell(28, 10, 'Fecha de reporte:');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(5, 10, " Del " . $finicio . ' al ' . $ffin, 0, 0, 'c', 0);
        $this->Ln(10);

        // Salto de línea
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(100, 200, 15);
        $this->Cell(25);
        $this->Cell(40, 10, 'Fecha', 4, 0, 'c', 0);
        $this->Cell(15, 10, 'ID', 0, 0, 'c', 0);
        $this->Cell(70, 10, 'Cliente', 0, 0, 'c', 0);
        $this->Cell(25, 10, 'Total', 0, 0, 'c', 0);
        $this->Line(100, 10, 100, 10);
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Pagina ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 10);
foreach ($productos as $item) {
    $pdf->Cell(25);
    $pdf->Cell(40, 10, substr($item['fecha'], 0, 10), 0, 0, 'b', 0);
    $pdf->Cell(15, 10, utf8_decode($item['venta']), 0, 0, 'c', 0);
    $pdf->Cell(70, 10, utf8_decode($item['nombre'] . ' ' . $item['apellido']), 0, 0, 'c', 0);
    $pdf->Cell(25, 10, utf8_decode('$' . $item['tottal']), 0, 1, 'c', 0);
    
    $ftotal+=$item['tottal'];
}
$pdf->LN(10);
$pdf->Cell(70);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(29, 10, "Total general: ", 0, 0, 'c', 0);
$pdf->SetFont('Times', 'b', 18);
$pdf->Cell(20, 10, utf8_decode('$'.$ftotal.".00"), 0, 1, 'c', 0);
$pdf->Output();
