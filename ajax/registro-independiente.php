<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';
require 'firma-digital.php';

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

if (empty($_POST['email'])) {
    error_mensaje('Llenar el campo correo.');
    return;
}

if (empty($_POST['banco'])) {
    error_mensaje('Llenar el campo banco.');
    return;
}

if (empty($_POST['c_interbancaria'])) {
    error_mensaje('Llenar el campo clabe interbancaria.');
    return;
}

if (empty($_FILES["pdf_file"]["name"])) {
    error_mensaje('Agregar archivo de contrato.');
    return;
}


if (isset($_POST['factura']) && $_POST['factura'] == 1) {

    if (empty($_POST['rfc'])) {
        error_mensaje('Llenar el campo RFC.');
        return;
    }

    if (empty($_POST['n_comercial'])) {
        error_mensaje('Llenar el campo nombre comercial.');
        return;
    }

    if (empty($_POST['n_exterior'])) {
        error_mensaje('Llenar el campo numero exterior.');
        return;
    }

    if (empty($_POST['municipio'])) {
        error_mensaje('Llenar el campo numero municipio.');
        return;
    }

    if (empty($_POST['colonia'])) {
        error_mensaje('Llenar el campo numero colonia.');
        return;
    }

    if (empty($_POST['estado'])) {
        error_mensaje('Llenar el campo numero estado.');
        return;
    }

    if (empty($_POST['pais'])) {
        error_mensaje('Llenar el campo numero pais.');
        return;
    }

    if (empty($_POST['direccion'])) {
        error_mensaje('Llenar el campo numero direccion.');
        return;
    }

}

$pass = rand(1000, 9999);

$nombre = $_POST['name'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$telefono = $_POST['phone'];
$correo = $_POST['email'];
$direccion = $_POST['direccion'];
$ref = $_POST['ref'];


$query = 'SELECT correo FROM `usuarios` WHERE correo= "' . $correo . '"';

$registros_in = R::getAll($query);

if (sizeof($registros_in) == 0) {

    $registro = R::dispense('usuarios');

    $dir_subida_pdf = '../firmas/Documentos/';
    $fichero_subido_pdf = $dir_subida_pdf . basename($_FILES["pdf_file"]["name"]);

    $dir_subida = '../images/ine/';
    $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);
    $fichero_subido2 = $dir_subida . basename($_FILES['img-producto2']['name']);

    if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {
        if (move_uploaded_file($_FILES['img-producto2']['tmp_name'], $fichero_subido2)) {
            if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $fichero_subido_pdf)) {


                $registro->nombre = $nombre;
                $registro->telefono = $telefono;
                $registro->pass = $pass;
                $registro->correo = $correo;
                $registro->rol = 2;
                $registro->apellidos = $paterno . ' ' . $materno;
                $registro->referido = $ref;
                $registro->pais = $_POST['pais'];
                $id = R::store($registro);

                if (isset($_POST['factura']) && $_POST['factura'] == 1) {
                    $registro2 = R::dispense('independientes');
                    $registro2->usuario_id = $id;
                    $registro2->direccion = $direccion;
                    $registro2->interbancaria = $_POST['c_interbancaria'];
                    $registro2->banco = $_POST['banco'];
                    $registro2->facturacion = $_POST['factura'];
                    $registro2->rfc = $_POST['rfc'];
                    $registro2->nombrecomercial = $_POST['n_comercial'];
                    $registro2->numeroexterior = $_POST['n_exterior'];
                    $registro2->municipio = $_POST['municipio'];
                    $registro2->colonia = $_POST['colonia'];
                    $registro2->estado = $_POST['estado'];
                    $registro2->pais = $_POST['pais'];
                    $registro2->imagen = basename($_FILES['img-producto']['name']);
                    $registro2->imagen2 = basename($_FILES['img-producto2']['name']);
                    $registro2->archivo = basename($_FILES["pdf_file"]["name"]);
                    $registro2->status = 0;
                } else {
                    $registro2 = R::dispense('independientes');
                    $registro2->usuario_id = $id;
                    $registro2->direccion = $direccion;
                    $registro2->interbancaria = $_POST['c_interbancaria'];
                    $registro2->banco = $_POST['banco'];
                    $registro2->imagen = basename($_FILES['img-producto']['name']);
                    $registro2->imagen2 = basename($_FILES['img-producto2']['name']);
                    $registro2->archivo = basename($_FILES["pdf_file"]["name"]);
                    $registro2->status = 0;
                }


                $id2 = R::store($registro2);


                if (empty($id2)) {
                    error_mensaje("Error al crear el usuario.");
                } else {
                    echo json_encode($response);
                    generarPDFFirma(getRealIP(), $direccion, $nombre, $paterno, $materno, $telefono, $correo, $id);

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
                    }
                }
            }
        }
    }
} else {
    error_mensaje("El correo ya esta registrado.");
}
