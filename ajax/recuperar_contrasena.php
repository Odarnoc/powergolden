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

$pinIn =  $randomNumber = rand(1000,9999);

//$queryPin = R::findOne('usuarios','pin = '.$pinIn.''); 



$user_id = 26;

    if(sizeof($registros_in) == 1){

        $registro = R::load('usuarios',$user_id);
        $registro->pin = $pinIn;    

        $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'ejemploberras@gmail.com';                     // SMTP username
                    $mail->Password   = 'berras12345';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('ejemploberras@gmail.com', 'Carlos Berra');
                    $mail->addAddress( $correo, $registros_in[0]['nombre'].' '.$registros_in[0]['apellidos']);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Soporte PowerGolden';
                    $mail->Body    = 'PIN de recuperacion: '.$pinIn;
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