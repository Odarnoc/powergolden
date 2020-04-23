<?php
require '../bd/conexion.php';
require '../utils/error.php';

require('../pos/webserviceapp/openpay/Openpay.php');


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

Openpay::setProductionMode(false);
$tipo = "store";
$server = "https://sandbox-dashboard.openpay.mx/paynet-pdf/";

$identificador = "mnrmdppefgsbgkf9g7as";
$openpay = Openpay::getInstance($identificador, 'sk_9b1543ee9a9a4caab8baa83eb243fdf8');

$customer = array(
    'name' => $_POST['nombre'],
    'last_name' => $_POST['apellido'],
    'phone_number' => $_POST['telefono'],
    'email' => $_POST['correo']
);

$chargeData = array(
    'method' => 'store',
    'amount' => $_POST['total'],
    'description' => 'Compra online PowerGolden',
    'customer' => $customer
);

$charge = $openpay->charges->create($chargeData);
$referencia = "";

$data['url_recibo'] = $server . "/" . $identificador . "/" . $charge->payment_method->reference;
$referencia = $charge->payment_method->reference;

$venta = R::dispense('ventas');
$venta->user_id = $_POST['usuariid'];
$venta->fecha = new DateTime();
$venta->total = $_POST['total'];
$venta->is_payed = 0;
$id_venta = R::store($venta);

$refer = R::dispense('referencias');
$refer->usuario_id = $_POST['usuariid'];
$refer->fecha = new DateTime();
$refer->referencia = $referencia;
$refer->tipo = 1;
$refer->cantidad = $_POST['total'];
$refer->status = 0;
R::store($refer);

$vpagos = R::dispense('ventaspagos');
$vpagos->venta_id = $id_venta;
$vpagos->tipo_pago = 'Efectivo';
$vpagos->cantidad = $_POST['total'];
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

$randome = rand();
$ventasreferecnia  = R::find('ventasentregas', 'referencia=?', [$randome]);

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
            $mail->addAddress($_POST['correo'], $_POST['nombre'] . ' ' . $_POST['apellido']);     // Add a recipient

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
            $mail->addAddress($_POST['correo'], $_POST['nombre'] . ' ' . $_POST['apellido']);     // Add a recipient

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

echo json_encode($data);
