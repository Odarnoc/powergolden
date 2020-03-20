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

if(!isset($_POST['name'])&&!isset($_POST['last_name'])&&!isset($_POST['phone'])&&!isset($_POST['email'])&&!isset($_POST['pass'])&&!isset($_POST['rol'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['name'])){
    error_mensaje('Llenar el campo nombre.');
    return;
}

if(empty($_POST['last_name'])){
    error_mensaje('Llenar el campo apellido.');
    return;
}

if(empty($_POST['phone'])){
    error_mensaje('Llenar el campo teléfono.');
    return;
}

if(empty($_POST['email'])){
    error_mensaje('Llenar el campo correo.');
    return;
}

if(empty($_POST['pass'])){
    error_mensaje('Llenar el campo contraseña.');
    return;
}

if($_POST['rol'] == 9 ){
    error_mensaje('Elegir un tipo de usuario.');
    return;
}

if($_POST['sucursal'] == 9 ){
    error_mensaje('Elegir una sucursal.');
    return;
}

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];
    $rol = $_POST['rol'];
    $suc = $_POST['sucursal'];

    $query = 'SELECT correo FROM `usuarios` WHERE correo= "'.$correo.'"';

    $registros_in=R::getAll($query);

    if(sizeof($registros_in) == 0){
        if(strlen($contrasena) >= 8){
        
            $registro = R::dispense('usuarios');

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->pass = $contrasena;
            $registro->correo = $correo;
            $registro->apellidos = $apellido;
            $registro->rol =$rol;
            $registro->sucursal_id =$suc;

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
                                                    <h1>PowerGolden le da la bienvenida a nuestro apartado electrónico de compras.</h1>
                                                    <h3>Su correo se ha registrado exitosamente.</h3>
                                                    <h3>Puede ingresar a nuestro sitio acorde a las especificaciones del tipo de usuario solicitado.</h3>
                                                </div>
                                            </center>
                                        </body>
                                    </html>';

                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send(); 
            } catch (Exception $e) {
                echo "No se pudo enviar el correo. {$mail->ErrorInfo}";
            }

            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear el usuario.");
            }else{
                echo json_encode($response);
            }
        }else{
            error_mensaje("La contraseña es muy pequeña (Debe contener mas de 8 carácteres).");
        }
    }else{
        error_mensaje("El correo ya esta registrado.");
    }  
    include 'registros-administrador.php';
?>