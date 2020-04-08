<?php
    require_once '../pos/webserviceapp/vendor/autoload.php';
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
  $registro->total = 500;

  $id = R::store($registro);
    
    
?>