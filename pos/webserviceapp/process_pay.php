<?php
require ('openpay/Openpay.php');
Openpay::setProductionMode(false);
$openpay = Openpay::getInstance('mcy7r4mints0e7y1nbko',
  'sk_0ac5e8764bdf455781de365d13ceccac');
  
//var_dump($openpay);

     $customer = array(
        'name' => $_POST['nombre'],
       
        'phone_number' => "",
        'email' => "odvillagrana@gmail.com");
$chargeData = array(
    'method' => 'card',
    'source_id' => $_POST["token_id"],
    'amount' => (float)$_POST["amount"],
    'description' => $_POST["description"],
    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
    'customer' => $customer
    );
$charge =false;
$charge = $openpay->charges->create($chargeData);

echo json_encode($charge);
?>