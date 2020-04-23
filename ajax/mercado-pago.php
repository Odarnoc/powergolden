<?php
require_once '../pos/webserviceapp/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$carrito = $_POST['carrito'];
$errores = array();

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
$payment->transaction_amount = floatval(20);
$payment->token = $_POST['token'];
$payment->description = "Power Golden, el poder de la herbolaria.";
$payment->installments = $_POST['installments'];
$payment->payment_method_id = $_POST['payment_method_id'];
$payment->payer = array(
    "email" => $_POST['email']
);

$payment->save();
echo $payment->status;

$registro = R::dispense('ventas');

$registro->user_id = $_POST["usuariid"];
$registro->fecha = date('Y-m-d');
$registro->total = $_POST['transaction_amount'];
$registro->is_payed = 1;
$id = R::store($registro);

$vpagos = R::dispense('ventaspagos');
$vpagos->venta_id = $id;
$vpagos->tipo_pago = 'Tarjeta';
$vpagos->cantidad = $_POST['transaction_amount'];
$id_venta = R::store($vpagos);

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

$randome = rand();
$ventasreferecnia  = R::find('ventasentregas', 'referencia=?', [$randome]);
$datousuario = R::find('usuarios','id=?',[$_POST["usuariid"]]);

if ($ventasreferecnia == null) {
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
            $mail->addAddress($_POST['email'], $datousuario['nombre'] . ' ' . $datousuario['apellido']);     // Add a recipient

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
            $mail->addAddress($_POST['email'], $datousuario['nombre'] . ' ' . $datousuario['apellido']);     // Add a recipient

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

function enviar(){

    
}