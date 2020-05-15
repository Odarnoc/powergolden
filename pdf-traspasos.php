<?php
require 'user_preferences/user-info.php';
require('PDF/fpdf.php');
$finicio;;
$ffin;
if (!isset($_GET['inicio']) && !isset($_GET['fin'])) {
    $query = 'SELECT ht.fecha,(SELECT nombre FROM tiposmovimientosalmacen as tma WHERE ht.tipomovimiento_id = tma.id) as tipo,(SELECT nombre FROM sucursales as s WHERE ht.origen = s.id) as origen, (SELECT nombre FROM sucursales as s WHERE ht.destino = s.id) as destino FROM historialtraspasos as ht';
    $finicio = date('Y-m-d');
    $ffin = date('Y-m-d');
} else {
    $query = 'SELECT ht.fecha,(SELECT nombre FROM tiposmovimientosalmacen as tma WHERE ht.tipomovimiento_id = tma.id) as tipo,(SELECT nombre FROM sucursales as s WHERE ht.origen = s.id) as origen, (SELECT nombre FROM sucursales as s WHERE ht.destino = s.id) as destino FROM historialtraspasos as ht
    WHERE ht.fecha BETWEEN"' . $_GET['inicio'] . '" and "' . $_GET['fin'] . '"';
    $finicio = $_GET['inicio'];
    $ffin = $_GET['fin'];
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
        $this->Cell(70, 10, utf8_decode('Reporte de movimientos.'), 0, 0, 'C');
        $this->Image('logo-navbar.png', 110, 10, 80);
        $this->Ln(20);
        $this->SetFont('Arial', '', 10);
        $this->Cell(12);
        $this->Cell(28, 10, 'Fecha de reporte:');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(5, 10, " Del " . $finicio . ' al ' . $ffin, 0, 0, 'c', 0);
        $this->Ln(13);

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(35, 10, '', 0, 0, 'c', 0);
        $this->Cell(28, 10, 'Fecha', 0, 0, 'c', 0);
        $this->Cell(28, 10, 'Tipo', 0, 0, 'c', 0);
        $this->Cell(48, 10, 'Origen', 0, 0, 'c', 0);
        $this->Cell(48, 10, 'Destino', 0, 1, 'c', 0);
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
    $pdf->Cell(35, 10, '', 0, 0, 'c', 0);
    $pdf->Cell(28, 10, substr($item['fecha'], 0, 10), 0, 0, 'c', 0);
    $pdf->Cell(28, 10, utf8_decode($item['tipo']), 0, 0, 'c', 0);
    $pdf->Cell(48, 10, utf8_decode($item['origen']), 0, 0, 'c', 0);
    $pdf->Cell(48, 10, utf8_decode($item['destino']), 0, 1, 'c', 0);
}
$pdf->Output();
