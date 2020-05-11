<?php
session_start();
require 'bd/conexion.php';

require('PDF/fpdf.php');

$usuario;

if (isset($_GET['inicio']) && isset($_GET['fin'])) {
    $query = 'SELECT * FROM ventascliente WHERE user_id ="' . $_SESSION["user_id"] . '" and fecha BETWEEN "' . $_GET['inicio'] . '" and "' . $_GET['fin'] . '"';
} else {
    $query = 'SELECT * FROM ventascliente WHERE user_id ="' . $_SESSION["user_id"] . '"';
}
$productos = R::getAll($query);



class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $usuario = R::findOne('usuarios','WHERE id = ?', [$_SESSION["user_id"]]);

        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(70, 10, utf8_decode('Reporte de Ventas'), 0, 0, 'C');
        $this->Image('logo-navbar.png', 110, 10, 80);
        // Salto de línea
        $this->Ln(20);

        $this->SetFont('Arial', '', 15);

        if (isset($_GET['inicio']) && isset($_GET['fin'])) {
            $this->SetFont('Arial', '', 10);
            $this->Cell(12);
            $this->Cell(30, 10, 'Fecha de reporte: ', 0, 0, 'c', 0);
            $this->SetFont('Arial', 'b', 11);
            $this->Cell(29, 10,"Del ".$_GET['inicio'] . ' al ' . $_GET['fin'], 0, 0, 'c', 0);
            $this->Ln(8);
            $this->Cell(12);
            $this->SetFont('Arial', '', 10);
            $this->Cell(15, 10, 'Usuario: ', 0, 0, 'c', 0);
            $this->SetFont('Arial', 'b', 11);
            $this->Cell(40, 10,utf8_decode($usuario['nombre']." ".$usuario['apellidos']), 0, 0, 'c', 0);
        } else {
            $this->SetFont('Arial', '', 10);
            $this->Cell(12);
            $this->Cell(40, 10, 'Reporte total del vendedor.', 0, 0, 'c', 0);
            $this->Ln(8);
            $this->Cell(12);
            $this->SetFont('Arial', '', 10);
            $this->Cell(30, 10, 'Fecha de reporte: ', 0, 0, 'c', 0);
            $this->SetFont('Arial', 'b', 11);
            $this->Cell(40, 10, date("d-M-Y"), 0, 0, 'c', 0);
            $this->Ln(8);
            $this->Cell(12);
            $this->SetFont('Arial', '', 10);
            $this->Cell(15, 10, 'Usuario: ', 0, 0, 'c', 0);
            $this->SetFont('Arial', 'b', 11);
            $this->Cell(40, 10,utf8_decode($usuario['nombre']." ".$usuario['apellidos']), 0, 0, 'c', 0);
            
        }

        $this->Ln(20);

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(25);
        $this->Cell(35, 10, 'Fecha', 0, 0, 'c', 0);
        $this->Cell(45, 10, 'Cliente', 0, 0, 'c', 0);
        $this->Cell(30, 10, 'Estatus', 0, 0, 'c', 0);
        $this->Cell(25, 10, 'Total', 0, 1, 'c', 0);
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

$suma = 0;
foreach ($productos as $item) {
    $pdf->Cell(25);
    $pdf->Cell(35, 10, substr($item['fecha'], 0, 10), 0, 0, 'c', 0);
    $pdf->Cell(45, 10, utf8_decode($item['nombre']), 0, 0, 'c', 0);
    if ($item['cobrado'] != 0) {
        $pdf->Cell(30, 10, utf8_decode('Pagado'), 0, 0, 'c', 0);
    } else {
        $pdf->Cell(30, 10, utf8_decode('No pagado'), 0, 0, 'c', 0);
    }
    $pdf->Cell(25, 10, utf8_decode('$' . $item['total']), 0, 1, 'c', 0);
    $suma += $item['total'];
}
$pdf->Cell(100, 10, utf8_decode(''), 0, 1, 'c', 0);
$pdf->Cell(65);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 10, utf8_decode('Total de ventas:'), 0, 0, 'c', 0);
$pdf->SetFont('Times', 'b', 18);
$pdf->Cell(40, 10, utf8_decode('$' . $suma . ".00"), 0, 0, 'c', 0);
$pdf->Ln(20);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(50);
$pdf->Cell(30, 10, utf8_decode('Gracias por tu preferencia en nuestros productos.'), 0, 0, 'c', 0);
$pdf->Ln(8);
$pdf->Cell(78);
$pdf->SetFont('Times', 'b', 13);
$pdf->Cell(30, 10, utf8_decode('PowerGolden.'), 0, 0, 'c', 0);

$pdf->Output();
