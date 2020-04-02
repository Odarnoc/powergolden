<?php
require 'user_preferences/user-info.php';
require('PDF/fpdf.php');
$finicio;;
$ffin;
if(!isset($_GET['inicio'])&&!isset($_GET['fin'])){
    $query = 'SELECT ht.fecha,ht.cantidad,(SELECT nombre FROM productos as p WHERE ht.producto_id = p.id) as producto,(SELECT nombre FROM sucursales as s WHERE ht.origen = s.id) as origen, (SELECT nombre FROM sucursales as s WHERE ht.destino = s.id) as destino FROM historialtraspasos as ht';
    $finicio=date('Y-m-d');
    $ffin=date('Y-m-d');
}else{
    $query = 'SELECT ht.fecha,ht.cantidad,(SELECT nombre FROM productos as p WHERE ht.producto_id = p.id) as producto,(SELECT nombre FROM sucursales as s WHERE ht.origen = s.id) as origen, (SELECT nombre FROM sucursales as s WHERE ht.destino = s.id) as destino FROM historialtraspasos as ht
    WHERE ht.fecha BETWEEN"'.$_GET['inicio'].'" and "'.$_GET['fin'].'"';
    $finicio = $_GET['inicio'];
    $ffin = $_GET['fin'];
}



$productos=R::getAll($query);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    if(isset($_GET['inicio'])&&isset($_GET['inicio'])){
        $finicio=$_GET['inicio'];
        $ffin=$_GET['fin'];
    }else{
        $finicio=date('Y-m-d');
        $ffin=date('Y-m-d');
    }
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de Ventas'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','',14);
    $this->Cell(40,10,'Fecha de reporte: Del '.$finicio.' al '.$ffin,0,0,'c',0); 
    $this->Ln(10);

    $this->SetFont('Arial','B',15);
    $this->Cell(25,10,'Fecha',1,0,'c',0); 
    $this->Cell(25,10,'Cantidad',1,0,'c',0); 
    $this->Cell(50,10,'Producto',1,0,'c',0);
    $this->Cell(45,10,'Origen',1,0,'c',0);
    $this->Cell(45,10,'Destino',1,1,'c',0);
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
$pdf->SetFont('Times','',12); 
foreach ($productos as $item) {
    $pdf->Cell(25,10, substr($item['fecha'], 0, 10),1,0,'c',0);  
    $pdf->Cell(25,10,utf8_decode($item['cantidad']),1,0,'c',0); 
    $pdf->Cell(50,10,utf8_decode($item['producto']),1,0,'c',0); 
    $pdf->Cell(45,10,utf8_decode($item['origen']),1,0,'c',0); 
    $pdf->Cell(45,10,utf8_decode($item['destino']),1,1,'c',0);
}  
$pdf->Output();
?>