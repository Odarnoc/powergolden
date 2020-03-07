<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$response['mensaje'] = "Exito al crear usuario.";

if (empty($_POST['name'])) {
    error_mensaje('Llenar el campo nombre.');
    return;
}

if (empty($_POST['paterno'])) {
    error_mensaje('Llenar el campo apellido paterno.');
    return;
}

if (empty($_POST['materno'])) {
    error_mensaje('Llenar el campo apellido materno.');
    return;
}

if (empty($_POST['phone'])) {
    error_mensaje('Llenar el campo teléfono.');
    return;
}
if (empty($_POST['direccion'])) {
    error_mensaje('Llenar el campo direccion.');
    return;
}

if (empty($_POST['email'])) {
    error_mensaje('Llenar el campo correo.');
    return;
}


$pass = rand(1000, 9999);

$nombre = $_POST['name'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$telefono = $_POST['phone'];
$correo = $_POST['email'];
$direccion = $_POST['direccion'];


$query = 'SELECT correo FROM `usuarios` WHERE correo= "' . $correo . '"';

$registros_in = R::getAll($query);

if (sizeof($registros_in) == 0) {

    $registro = R::dispense('usuarios');

    $dir_subida = '../images/ine/';
    $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);
    $fichero_subido2 = $dir_subida . basename($_FILES['img-producto2']['name']);

    if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {
        if (move_uploaded_file($_FILES['img-producto2']['tmp_name'], $fichero_subido2)) {

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->pass = $pass;
            $registro->correo = $correo;
            $registro->rol = 2;
            $registro->apellidos = $paterno.' '.$materno;
            $registro->referido = null;
            $id = R::store($registro);
            
            $registro2 = R::dispense('independientes');
            $registro2->usuario_id = $id;
            $registro2->direccion = $direccion;
            $registro2->imagen = basename($_FILES['img-producto']['name']);
            $registro2->imagen2 = basename($_FILES['img-producto2']['name']);
            $registro2->status = 0;

            $id2 = R::store($registro2);


            if (empty($id2)) {
                error_mensaje("Error al crear el usuario.");
            } else {
                echo json_encode($response);

                /* $mail = new PHPMailer(true);

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
                                                        <h1>PowerGolden le da la bienvenida a nuestro apartado electrónico de compras.</h1>
                                                        <h3>Uno de nuestros administradores revisara su petición.</h3>
                                                        <h3>En la menor brevedad posible le enviaremos una respuesta. </h3>
                                                        <h1>Gracias por su preferencia en los mejores productos de herbolaria.</h1>
                                                    </div>
                                                </center>
                                            </body>
                                        </html>';

                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send(); 
                } catch (Exception $e) {
                    echo "No se pudo enviar el correo. {$mail->ErrorInfo}";
                }*/
            }
        }
    }
} else {
    error_mensaje("El correo ya esta registrado.");
}
