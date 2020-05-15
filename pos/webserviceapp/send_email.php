<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');
$name=$_POST['folio'];
$data = base64_decode($_POST['data']);
file_put_contents( "../../nota_de_venta/".$name.".pdf", $data );

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
date_default_timezone_set("America/Mexico_City");
$message='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <img style="width: 50%;" src="https://powergoldendemos.000webhostapp.com/images/logo-navbar.png">
        <div> 
            <h1>Hola, '.$nombre.'</h1>
            <h2>Anexamos tu ticket de compra con fecha '.date("d-m-Y h:i a").'.</h2>
            <h3>Gracias por su preferencia en los mejores productos de herbolaria.</h3>
        </div>
    </center>
</body>
</html>';


$mail = new PHPMailer();
$mail->SMTPDebug = 0;                     
                    //$mail->isSMTP();
                                        $mail->SMTPAuth   = true;  
    
                    $mail->SMTPSecure = 'ssl';                                        
                    $mail->Host       = 'mail.powergolden.com.mx';
                    $mail->Port       = 465; 
                    $mail->Username   = 'golden1@powergolden.com.mx';                     
                    $mail->Password   = '1f4IRMiugdr#';        
    
                    //Recipients
                    $mail->setFrom('golden1@powergolden.com.mx', 'PowerGolden');
                    $mail->Subject = 'Recibo de Compra.';
                    $mail->isHTML(true); 

$mail->AddAttachment("../../nota_de_venta/".$name.".pdf","Recibo de venta.pdf");
$mail->Body = $message;
//$mail->AddAddress( $correo);
$mail->AddAddress("odvillagrana@gmail.com");
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    //unlink("../nota_de_venta/".$name.".pdf");
    echo "Message has been sent";
 }




?>
