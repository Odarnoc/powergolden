<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$response['mensaje'] = "Exito al confirmar status.";

$nombre = $_POST['name'];
$correo = $_POST['correo'];

            echo json_encode($response);

            $mail = new PHPMailer(true);

            try {
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
                $mail->addAddress($correo, $nombre);     // Add a recipient

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
                                                <img style="width: 50%;" src="http://www.powergolden.com.mx/">
                                                <div> 
                                                    <h1>Agradece su interés en nuestra marca y nuestros productos de herbolaria.</h1>
                                                    <h3>Estimado cliente. Su solicitud ha sido revisada por uno de nuestros administradores.</h3>
                                                    <h3>Desafortunadamente, no cumple con los requisitos necesarios para pertenecer a nuestro equipo de ventas.</h3>
                                                    <h1>Agradecemos su interés y le pedimos una disculpa. Gracias.   </h1>
                                                    <h1>Gracias.</h1>
                                                </div>
                                            </center>
                                        </body>
                                    </html>';

                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo "No se pudo enviar el correo. {$mail->ErrorInfo}";
            }
            include 'registros-administrador.php';
    ?>

