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
        $pdf->MultiCell(190,10,encriptarFirma($ip,$direccion,$nombre,$apellido_paterno,$apellido_materno,$telefono,$correo),1);
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
        $this->Cell(60);
        // Título
        $this->Cell(70,10,utf8_decode('Firma digital'),0,0,'C');
        // Salto de línea
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