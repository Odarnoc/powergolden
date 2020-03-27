<?php
require '../bd/conexion.php';
require '../utils/error.php';
require ('../pos/webserviceapp/openpay/Openpay.php');
$openpay = Openpay::getInstance('m1ob7biidxpcjepkiqw1',
'sk_b145230a1bd44a5eaea1eac5d723c6b4');

$customer = array(
    'name' => $_POST["nombre"],
    'last_name' => $_POST["apellido"],
    'phone_number' => $_POST["telefono"],
    'email' => $_POST["correo"],);

$chargeData = array(
    'method' => 'card',
    'source_id' => $_POST["token_id"],
    'amount' => 1,
    'description' => 'Pago de restauracion de cuenta',
    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
    'customer' => $customer
    );

    $charge =false;
    $charge = $openpay->charges->create($chargeData);
    
    $registro = R::dispense('ventas');

    $registro->user_id = $_POST["usuariid"];
    $registro->fecha = date('Y-m-d');
    $registro->total = 500;

    $id = R::store($registro);

?>