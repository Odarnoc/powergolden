<?php

require '../bd/conexion.php';
require '../utils/error.php';
$response['mensaje'] = "El correo se envio correctamente.";

/* PHPMailer*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$contador = true;

if(!isset($_POST['email'])){
    error_mensaje("Completa el campo correo.");
    return;
}

$correo = $_POST['email'];

$query = 'SELECT * FROM `usuarios` WHERE correo= "'.$correo.'"'; 

$registros_in=R::getAll($query);

$bandera = true;

$pinIn;

while ($bandera) {
    $pinIn =  rand(1000,9999);
    $queryPin = R::findOne('usuarios','pin = '.$pinIn.''); 
    if(empty($queryPin)){ 
        $bandera = false;
    }  
}

    $user_id = $registros_in[0]['id'];

    if(sizeof($registros_in) == 1){

        $registro = R::load('usuarios',$user_id);
        $registro->pin = $pinIn;    

        $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587;   
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
                    $mail->Username   = 'powergolden01@gmail.com';                     // SMTP username
                    $mail->Password   = 'pg12345678';                               // SMTP password
                                 // TCP port to connect to

                    //Recipients
                    $mail->setFrom('powergolden01@gmail.com', 'PowerGolden');
                    $mail->addAddress( $correo, $registros_in[0]['nombre'].' '.$registros_in[0]['apellidos']);     // Add a recipient

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
                                                    <h3>El soporte técnico de PowerGolden te envía el siguiente PIN de verificación para recuperar tu contraseña.</h3>
                                                    <h2>Pin de verificación: <b>'.$pinIn.'</b></h2>
                                                    <h3>Si no recuerdas haber solicitado recuperación de contraseña. Ponerse en contacto con algún administrador de PowerGolden para mayor información y aclaraciones. </h3>
                                                    <h1>Gracias por su preferencia en los mejores productos de herbolaria.</h1>
                                                </div>
                                            </center>
                                        </body>
                                    </html>';
                    
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                } catch (Exception $e) {
                    echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
                
                }

            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al enviar el correo.");
            }else{
                echo json_encode($response);
                }
    }else{
        error_mensaje("El correo no esta registrado.");
    }  


?>