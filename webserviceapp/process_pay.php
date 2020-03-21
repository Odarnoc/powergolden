<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');
require ('openpay/Openpay.php');
require 'conexion.php';
Openpay::setProductionMode(false);
if($_POST['type']==1){
  $tipo="store";
  $server="https://sandbox-dashboard.openpay.mx/paynet-pdf/";
}else{
  $tipo="bank_account";
  $server="https://sandbox-dashboard.openpay.mx/spei-pdf/";
}
$identificador="mnrmdppefgsbgkf9g7as";
$openpay = Openpay::getInstance($identificador,
  'sk_9b1543ee9a9a4caab8baa83eb243fdf8');
  
//var_dump($openpay);
$customer = array(
  'name' => $_POST['nombre'],
  'phone_number' => "",
  'email' => $_POST['email']);
  $chargeData = array(
    'method' => $tipo,
    'amount' => floatval($_POST['cantidad']),
    'description' => 'Referencia de Pago',
  "customer"=>$customer);
$charge = $openpay->charges->create($chargeData);
$referencia="";
if($_POST['type']==1){
  $data['url_recibo']=$server."/".$identificador."/".$charge->payment_method->reference;
  $referencia=$charge->payment_method->reference;
}else{
  $data['url_recibo']=$server."/".$identificador."/".$charge->id;
  $referencia=$charge->id;
}
R::exec( "insert into referencias (referencia,tipo,usuario_id,cantidad,status) values
(
'". $referencia."',
". $_POST['type'].",
". $_POST['usuario_id'].",
". $_POST['cantidad'].",
0
)" );

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
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
            <h2>Anexamos tu comporbante de referencia con fecha '.date("d-m-Y h:i a").'.</h2>
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

$mail->AddAttachment($data['url_recibo']);
$mail->Body = $message;
$mail->AddAddress( $correo);
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } 

 echo json_encode($data);


?>
