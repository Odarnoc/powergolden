<?php
require '../utils/error.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$response['mensaje'] = "Hemos recibido tu mensaje.";

if(!isset($_POST['name'])&&!isset($_POST['mail'])&&!isset($_POST['phone'])&&!isset($_POST['mensaj'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['name'])){
    error_mensaje('Llenar el campo nombre.');
    return;
}

if(empty($_POST['mail'])){
    error_mensaje('Llenar el campo de correo.');
    return;
}

if(empty($_POST['phone'])){
    error_mensaje('Llenar el campo teléfono.');
    return;
}

if(empty($_POST['mensaj'])){
    error_mensaje('Completar el campo de mensaje');
    return;
}

    

            try {
            $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();
                $mail->SMTPAuth   = true;  

                $mail->SMTPSecure = 'ssl';                                             // Send using SMTP
                $mail->Host       = 'mail.powergolden.com.mx';
                $mail->Port       = 465; 
                $mail->Username   = 'golden1@powergolden.com.mx';                     // SMTP username
                $mail->Password   = '1f4IRMiugdr#';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted

                //Recipients
                $mail->setFrom('golden1@powergolden.com.mx', 'PowerGolden');
                $mail->addAddress( 'golden1@powergolden.com.mx', 'PowerGolden Contactos');     // Add a recipient

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
                                                <h2>'.$_POST['name'].' nos está contactando por el motivo de: </h2>
                                                <h3>'.$_POST['mensaj'].'</h3>
                                                <h2>Contacto:</h2>
                                                <h3>'.$_POST['mail'].'</h3>
                                                <h3>'.$_POST['phone'].'</h3>
                                            </div>
                                        </center>
                                    </body>
                                </html>';
                
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

            $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();
                $mail->SMTPAuth   = true;  

                $mail->SMTPSecure = 'ssl';                                             // Send using SMTP
                $mail->Host       = 'mail.powergolden.com.mx';
                $mail->Port       = 465; 
                $mail->Username   = 'golden1@powergolden.com.mx';                     // SMTP username
                $mail->Password   = '1f4IRMiugdr#';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted

                //Recipients
                $mail->setFrom('golden1@powergolden.com.mx', 'PowerGolden');
                $mail->addAddress( $_POST['mail'], $_POST['name']);     // Add a recipient

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
                                                <h2>Estima '.$_POST['name'].'. Agradecemos el ponerte en contacto con el servicio al cliente de PowerGolden.</h2>
                                                <h2>Hemos recibido la información necesaria.</h2>
                                                <h2>Muy pronto uno de nuestros administrados se pondra en contacto contigo.</h2>
                                            </div>
                                        </center>
                                    </body>
                                </html>';
                
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                echo json_encode($response); 
            } catch (Exception $e) {
                error_mensaje("No se pudo enviar el correo: {$mail->ErrorInfo}");
            }   
            
?>