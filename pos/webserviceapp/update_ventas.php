<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'conexion.php';

$lista = R::exec("UPDATE ventas as v set is_payed=1 where id=" . $_POST['venta']);
$nombre = "Oswaldo Villagrana";
$correo = "odvillagrana@gmail.com";
date_default_timezone_set("America/Mexico_City");
$message = '<!DOCTYPE html>
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
            <h1>Hola, ' . $nombre . '</h1>
            <h2>La venta con folio '.$_POST['venta'].' ha sido pagada con fecha del ' . date("d-m-Y h:i a") . '.</h2>
            <h3>Gracias por todo tu esfuerzo.</h3>
        </div>
    </center>
</body>
</html>';

$mail = new PHPMailer();
$mail->SMTPDebug = 0;
//$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->SMTPSecure = 'ssl';
$mail->Host = 'mail.powergolden.com.mx';
$mail->Port = 465;
$mail->Username = 'golden1@powergolden.com.mx';
$mail->Password = '1f4IRMiugdr#';

//Recipients
$mail->setFrom('golden1@powergolden.com.mx', 'PowerGolden');
$mail->Subject = 'Venta pagada.';
$mail->isHTML(true);
$mail->Body = $message;
$mail->AddAddress($correo);
if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    unlink("uploads/p" . $name . ".pdf");
    echo "Message has been sent";
}

?>
