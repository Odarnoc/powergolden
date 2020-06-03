<?php
session_start();
require_once '../pos/webserviceapp/vendor/autoload.php';
require '../bd/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$carrito = $_POST['carrito'];
$errores = array();
$sucursalnum = intval($_POST['sucursal']);

$datousuario = R::findOne('usuarios', 'id=?', [$_POST["usuariid"]]);

if (sizeof($carrito) < 0) {
    error_mensaje('El carrito no puede estar vacio.');
    return;
}

foreach ($carrito as $valor) {
    $almacen = R::findOne('inventarios', 'sucursal_id = 1 && existencia >= ? && producto_id = ?', [$valor['cant'], $valor['id']]);
    if (empty($almacen)) {
        array_push($errores, $valor);
    }
}

if (!empty($errores)) {
    $prodsErr = '';
    foreach ($errores as $valor) {
        $prodsErr .= $valor['nombre'] . ', ';
    }
    $msjErr = 'Los productos ( ' . $prodsErr . ' ) no tienen suficientes existencias';
    error_mensaje($msjErr);
    return;
}

MercadoPago\SDK::setAccessToken("APP_USR-7698839841259331-040703-babc7d9c09e98697a4429f7079a92f22-286156172");
$payment = new MercadoPago\Payment();

//$payment->transaction_amount = floatval($_POST['transaction_amount']);
$payment->transaction_amount = floatval(5);
$payment->token = $_POST['token'];
$payment->description = "Power Golden, el poder de la herbolaria.";
$payment->installments = $_POST['installments'];
$payment->payment_method_id = $_POST['payment_method_id'];
$payment->payer = array(
    "email" => $datousuario->correo
);

$payment->save();
$response['status'] = $payment->status;

$registro = R::dispense('ventas');
if (isset($_SESSION["ui_referencia_venta"])) {
  $registro->referencia = $_SESSION["ui_referencia_venta"];
}
$registro->user_id = $_POST["usuariid"];
$registro->fecha = date('Y-m-d');
$registro->total = $_POST['transaction_amount'];
$registro->is_payed = 1;
$id_venta = R::store($registro);

$vpagos = R::dispense('ventaspagos');
$vpagos->venta_id = $id_venta;
$vpagos->tipo_pago = 'Tarjeta';
$vpagos->cantidad = $_POST['transaction_amount'];
R::store($vpagos);

foreach ($carrito as $item) {
    $prod = R::dispense('productosxventas');
    $prod->venta_id = $id_venta;
    $prod->producto_id = $item['id'];
    $prod->cantidad = $item['cant'];
    $id = R::store($prod);


    $producto = R::findOne('inventarios', 'sucursal_id = 1 && producto_id = ?', [$item['id']]);
    $producto->existencia -= $item['cant'];
    R::store($producto);
}

if (isset($_POST['pack_id'])) {
    $sucur = R::dispense('ventaspaquetes');
    $sucur->venta_id = $id_venta;
    $sucur->paquete_id = $_POST['pack_id'];
    R::store($sucur);
}

$randome = rand();
$ventasreferecnia  = R::find('ventasentregas', 'referencia=?', [$randome]);


if ($ventasreferecnia == null) {
    if ($sucursalnum != 0) {
        $sucur = R::dispense('ventasentregas');
        $sucur->id_venta = $id_venta;
        $sucur->id_sucursal = $_POST['sucursal'];
        $sucur->id_usuario = $_POST['usuariid'];
        $sucur->status = 0;
        $sucur->referencia = $randome;
        R::store($sucur);

        $mail = new PHPMailer(true);

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
            $mail->addAddress($datousuario->correo, $datousuario->nombre . ' ' . $datousuario->apellidos);     // Add a recipient

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
                                                    <h2><b>' . $data['url_recibo'] . '</b></h2>
                                                    <h2><b>Para recoger su pedido en alguna de nuestras sucursales utilice el siguiente código:' . $randome . '</b></h2>
                                                    <h1>Gracias por su preferencia en los mejores productos de herbolaria.</h1>
                                                </div>
                                            </center>
                                        </body>
                                    </html>';

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "No se pudo enviar el correo.";
        }
    }
} else {
    $randome = rand();
    if ($_POST['sucursal'] != 0) {
        $sucur = R::dispense('ventasentregas');
        $sucur->id_venta = $id_venta;
        $sucur->id_sucursal = $_POST['sucursal'];
        $sucur->id_usuario = $_POST['usuariid'];
        $sucur->status = 0;
        $sucur->referencia = $randome;
        R::store($sucur);

        $mail = new PHPMailer(true);

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
            $mail->addAddress($datousuario->correo, $datousuario->nombre . ' ' . $datousuario->apellidos);     // Add a recipient

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
                                                    <h2><b>' . $data['url_recibo'] . '</b></h2>
                                                    <h2><b>Para recoger su pedido en alguna de nuestras sucursales utilice el siguiente código:' . $randome . '</b></h2>
                                                    <h1>Gracias por su preferencia en los mejores productos de herbolaria.</h1>
                                                </div>
                                            </center>
                                        </body>
                                    </html>';

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "No se pudo enviar el correo.";
        }
    }
}

if ($sucursalnum == 0) {
    $enviodatos  = R::findOne('datosenvio', 'direccion=?  AND user_id=? AND cp=?', [$_POST['direccion'], $_POST['usuariid'], $_POST['cp']]);

    if (empty($enviodatos)) {
        $datos = R::dispense('datosenvio');
        $datos->user_id = $_POST['usuariid'];
        $datos->ciudad = $_POST['ciudad'];
        $datos->cp = $_POST['cp'];
        $datos->direccion = $_POST['direccion'];
        $datos->estado = $_POST['estado'];
        $envio_id = R::store($datos);

        $datosReferencia = R::dispense('referenciaenvios');
        $datosReferencia->user_id = $_POST['usuariid'];
        $datosReferencia->enviodatos_id = $envio_id;
        $datosReferencia->venta_id = $id_venta;
        R::store($datosReferencia);
    } else {
        $var_id = $enviodatos->id;

        $datosReferencia = R::dispense('referenciaenvios');
        $datosReferencia->user_id = $_POST['usuariid'];
        $datosReferencia->enviodatos_id = $var_id;
        $datosReferencia->venta_id = $id_venta;
        R::store($datosReferencia);
    }
    $registro = R::dispense('envioshistorico');
    $registro->venta_id = $id_venta;
    $registro->status = "Preparando envio";
    $id = R::store($registro);
}

echo json_encode($response);
