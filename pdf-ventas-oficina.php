<?php
require('PDF/fpdf.php');

require 'user_preferences/user-info.php';

if(isset($_GET['inicio'])&&isset($_GET['fin'])){
    $query = 'SELECT * FROM ventascliente WHERE user_id ="'.$_SESSION["user_id"].'" and fecha BETWEEN "'.$_GET['inicio'].'" and "'.$_GET['fin'].'"';
}else{
    $query = 'SELECT * FROM ventascliente WHERE user_id ="'.$_SESSION["user_id"].'"' ;
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
    
    if(isset($_GET['inicio'])&&isset($_GET['fin'])){
        $this->Cell(40,10,'Fecha de reporte: Del '.$_GET['inicio'].' al '.$_GET['fin'],0,0,'c',0); 
    }else{
        $this->Cell(40,10,'Reporte total del vendedor ',0,0,'c',0); 
    }
    
    $this->Ln(10);

    $this->SetFont('Arial','B',15);
    $this->Cell(35,10,'Fecha',1,0,'c',0); 
    $this->Cell(90,10,'Cliente',1,0,'c',0); 
    $this->Cell(30,10,'Estatus',1,0,'c',0); 
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

$suma=0;
foreach ($productos as $item) {
    $pdf->Cell(35,10, substr($item['fecha'],0,10),1,0,'c',0);  
    $pdf->Cell(90,10,utf8_decode($item['nombre']),1,0,'c',0);
    if($item['cobrado']!=0){
        $pdf->Cell(30,10,utf8_decode('Pagado'),1,0,'c',0); 
    }else{
        $pdf->Cell(30,10,utf8_decode('No pagado'),1,0,'c',0); 
    } 
    $pdf->Cell(25,10,utf8_decode('$'.$item['total']),1,1,'c',0);
    $suma += $item['total'];
} 
$pdf->Cell(100,10,utf8_decode(''),0,1,'c',0);
$pdf->Cell(45,10,utf8_decode('Total de ventas:'),1,0,'c',0); 
$pdf->Cell(40,10,utf8_decode('$'.$suma),1,0,'c',0);

$pdf->Output();
?>