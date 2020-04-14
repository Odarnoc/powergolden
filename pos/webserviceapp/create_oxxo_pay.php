<?php
require 'conexion.php';
require_once 'vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-7698839841259331-040703-babc7d9c09e98697a4429f7079a92f22-286156172");

  $payment = new MercadoPago\Payment();
  $payment->transaction_amount = floatval($_POST['transaction_amount']);
  //$payment->transaction_amount = floatval(20);
  $payment->description = "Power Golden, el poder de la herbolaria.";
  $payment->payment_method_id = "oxxo";
  $payment->payer = array(
    "email" => $_POST['email']
  );

  $payment->save();
  R::exec( "insert into referencias_oxxo (valor,venta_id,referencia) values
 	(
 	".$_POST['transaction_amount'].",
 	".$_POST["venta_id"].",
  '".$payment->id."')" );
  echo $payment->transaction_details->external_resource_url;

?>