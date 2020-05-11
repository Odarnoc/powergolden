<?php
require "../vendor/autoload.php";
require('../PDF/fpdf.php');
use \Firebase\JWT\JWT;
    
    function getMac() {
        $MAC = exec('getmac'); 
        return $MAC;
    }
    function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }
    function encriptarFirma($ip,$direccion,$nombre,$apellido_paterno,$apellido_materno,$telefono,$correo){
        $key = "powergolden.com.mx";
        $payload = array(
            "ip" => $ip,
            "direccion" => $direccion,
            "nombre" => $nombre,
            "apellido_paterno" => $apellido_paterno,
            "apellido_materno" => $apellido_materno,
            "telefono" => $telefono,
            "email" => $correo
        );

        $jwt = JWT::encode($payload, $key);

        return $jwt;
        
    }

    function desEncriptarFirma($data){
        $key = "powergolden.com.mx";
        return JWT::decode($data, $key, array('HS256'));
    }

    function generarPDFFirma($ip,$direccion,$nombre,$apellido_paterno,$apellido_materno,$telefono,$correo,$user_id){
        $filename="../firmas/firma-".$user_id.".pdf";

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10);
        $pdf->MultiCell(160,10,encriptarFirma($ip,$direccion,$nombre,$apellido_paterno,$apellido_materno,$telefono,$correo),0);
        $pdf->Output($filename,'F');
    }


    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(70,10,utf8_decode('Firma digital'),0,0,'C');
        $this->Image('../logo-navbar.png',110,10,80);
        $this->Ln(20);
        $this->SetFont('Arial','',10);
        $this->Cell(12);
        $this->Cell(33,10,utf8_decode('Fecha de creación: '),0,0,'c',0); 
        $this->SetFont('Arial','b',10);
        $this->Cell(28,10,date("d-M-Y"),0,0,'c',0); 
        $this->Ln(20);
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

?>