<?php
    require_once 'vendor/autoload.php';
    var_dump("Aqui estoy");
    MercadoPago\SDK::setAccessToken("APP_USR-7698839841259331-040216-e7625eb9efb1f2caa9380fbfe186afe6-286156172");
    
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 1;
    $payment->token = $_POST['token'];
    $payment->description = "Power Golden, el poder de la herbolaria.";
    $payment->installments = $_POST['installments'];
    $payment->payment_method_id = $_POST['payment_method_id'];
    $payment->payer = array(
    "email" => "odvillagrana@gmail.com"
    );

    var_dump($payment->save());
    

    echo $payment->status;
    
?>