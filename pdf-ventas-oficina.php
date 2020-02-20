<?php
require('PDF/fpdf.php');

require 'user_preferences/user-info.php';

if(isset($_POST['fechauno'])&&isset($_POST['fechados'])){
    $query = 'SELECT DISTINCT pxv.venta_id as idv, pxv.cantidad as cantidad, pxv.producto_id as idp, p.nombre as nombre, v.fecha as fecha,v.total as total 
    FROM ventas as v LEFT JOIN productosxventas as pxv ON v.id = pxv.venta_id LEFT JOIN productos as p on p.id = pxv.producto_id WHERE v.user_id ="'.$_SESSION["user_id"].'" and v.fecha BETWEEN "'.$_POST['fechauno'].'" and "'.$_POST['fechados'].'"';
        $finicio=$_GET['inicio'];
        $ffin=$_GET['fin'];
}else{
    $query = 'SELECT DISTINCT pxv.venta_id as idv, pxv.cantidad as cantidad, pxv.producto_id as idp, p.nombre as nombre, v.fecha as fecha,v.total as total 
    FROM ventas as v LEFT JOIN productosxventas as pxv ON v.id = pxv.venta_id LEFT JOIN productos as p on p.id = pxv.producto_id WHERE v.user_id ="'.$_SESSION["user_id"].'"' ;
}
    $productos=R::getAll($query);

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
    $this->Cell(70,10,utf8_decode('Reporte de Ventas'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','',15);
    
    if(isset($_POST['fechauno'])&&isset($_POST['fechados'])){
        $this->Cell(40,10,'Fecha de reporte: Del '.$finicio.' al '.$ffin,0,0,'c',0); 
    }else{
        $this->Cell(40,10,'Reporte total del vendedor ',0,0,'c',0); 
    }
    
    $this->Ln(10);

    $this->SetFont('Arial','B',15);
    $this->Cell(40,10,'Fecha',1,0,'c',0); 
    $this->Cell(60,10,'Producto',1,0,'c',0); 
    $this->Cell(30,10,'Cantidad',1,0,'c',0); 
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
    $pdf->Cell(60,10,utf8_decode($item['nombre']),1,0,'c',0); 
    $pdf->Cell(30,10,utf8_decode($item['cantidad']),1,0,'c',0); 
    $pdf->Cell(25,10,utf8_decode('$'.$item['total']),1,1,'c',0);
}  
$pdf->Output();
?>