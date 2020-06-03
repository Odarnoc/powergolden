<?php
function checkStatus($numero_seguimiento)
{
    $fields = array(
        "api_key" => "6f98ae9ba4c44378ca23045a6aecdb3a",
        "carrier" => "FedEx",
        "shipment_number" => $numero_seguimiento,
        
    );

    $headers = array(
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://enviaya.com.mx/api/v1/trackings');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

