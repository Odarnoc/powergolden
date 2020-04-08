<?php
require ('../pos/webserviceapp/openpay/Openpay.php');
require '../pos/webserviceapp/conexion.php';

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

/* PHPMailer*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    Openpay::setProductionMode(false);
    $tipo="store";
    $server="https://sandbox-dashboard.openpay.mx/paynet-pdf/";

    $identificador="mnrmdppefgsbgkf9g7as";
    $openpay = Openpay::getInstance($identificador,'sk_9b1543ee9a9a4caab8baa83eb243fdf8');

    $customer = array(
        'name' => $_POST['nombre'],
        'last_name' => $_POST['apellido'],
        'phone_number' => $_POST['telefono'],
        'email' => $_POST['correo']);

        $chargeData = array(
            'method' => 'store',
            'amount' => 500.000,
            'description' => 'Restauracion de cuenta',
            'customer' => $customer);

    $charge = $openpay->charges->create($chargeData);
    $referencia="";

    $data['url_recibo']=$server."/".$identificador."/".$charge->payment_method->reference;
    $referencia=$charge->payment_method->reference;

    $registro = R::dispense('referencias');
    
    $registro->referencia = $referencia;
    $registro->tipo = 1;
    $registro->status = 0;
    $registro->cantidad = 500;
    $registro->direccionusuario_id = $_POST['usuariid'];

    R::store($registro);

    $ventas = R::dispense('ventas');

    $ventas->user_id = $_POST["usuariid"];
    $ventas->fecha = date('Y-m-d');
    $ventas->total = 500;

    $id = R::store($ventas);

   /* $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();
                    //$mail->SMTPAuth   = true;  
    
                    $mail->SMTPSecure = 'ssl';                                             // Send using SMTP
                    $mail->Host       = 'mail.powergolden.com.mx';
                    $mail->Port       = 465; 
                    $mail->Username   = 'golden1@powergolden.com.mx';                     // SMTP username
                    $mail->Password   = '1f4IRMiugdr#';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    
                    //Recipients
                    $mail->setFrom('golden1@powergolden.com.mx', 'PowerGolden');
                    $mail->addAddress( $_POST['correo'], $_POST['nombre'].' '.$_POST['apellido']);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Soporte PowerGolden';
                    $mail->Body    = '<!DOCTYPE html>
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
                                                    <h3>El soporte técnico de PowerGolden te envía el siguiente enlace para el pago de tu servicio.</h3>
                                                    <h2><b>'.$data['url_recibo'].'</b></h2>
                                                    <h1>Gracias por su preferencia en los mejores productos de herbolaria.</h1>
                                                </div>
                                            </center>
                                        </body>
                                    </html>';
                    
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                } catch (Exception $e) {
                    echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
            
                }*/
                echo json_encode($data);
?>