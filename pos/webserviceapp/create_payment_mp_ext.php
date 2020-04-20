<?php
require 'conexion.php';

require_once 'vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-7698839841259331-040703-babc7d9c09e98697a4429f7079a92f22-286156172");
$payment = new MercadoPago\Payment();
$payment->transaction_amount = floatval($_POST['transaction_amount']);
//$payment->transaction_amount = floatval(20);
$payment->token = $_POST['token'];
$payment->description = "Power Golden, el poder de la herbolaria.";
$payment->installments = $_POST['installments'];
$payment->payment_method_id = $_POST['payment_method_id'];
$payment->payer = array(
    "email" => $_POST['email'],
);

$payment->save();
if ($payment->status == "approved") {
    R::exec("update pagosexternos  set referencia='" . $payment->id . "', is_payed=1 where id=" . $_POST["venta_id"]);
}
$data['status']=$payment->status;
$data['id']=$payment->id;
echo json_encode($data);
?>