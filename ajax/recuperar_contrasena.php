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



if(!isset($_POST['email'])){
    error_mensaje("Completa el campo correo.");
    return;
}

$correo = $_POST['email'];
$query = 'SELECT correo FROM `usuarios` WHERE correo= "'.$correo.'"'; 

$registros_in=R::getAll($query);

$pinIn =  $randomNumber = rand(1000,9999);

$user_id = 26;

    if(sizeof($registros_in) == 1){

        $registro = R::load('usuarios',$user_id);
        $registro->pin = $pinIn;    

     /*   $mail = new PHPMailer(true);

                try {
                    //Server settings
                $mail->SMTPDebug = 2;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp1.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'ejemploberras@gmail.com';                     // SMTP username
                    $mail->Password   = 'berras12345';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('ejemploberras@gmail.com', 'Carlos Berra');
                    $mail->addAddress('jcberra@outlook.com', 'Berra');     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Prueba';
                    $mail->Body    = 'Correo de Prueba';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'El correo se envio con exito';
                } catch (Exception $e) {
                    echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
                }*/

          /*  if(empty($id)){
                error_mensaje("Error al enviar correo de recuperación");
            }else{
                echo json_encode($response);
            }*/
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