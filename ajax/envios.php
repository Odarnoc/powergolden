<?php

function generarEnvio($venta_id, $usuario_id, $nombre, $telefono, $direccion, $cp, $ciudad, $estado, $largo, $alto, $ancho, $peso, $cantidad)
{
    $fields = array(
        "enviaya_account" => "J83OOX7Q",
        "carrier_account" => null,
        "api_key" => "6f98ae9ba4c44378ca23045a6aecdb3a",
        "carrier" => "FedEx",
        "carrier_service_code" => "FEDEX_EXPRESS_SAVER",
        "origin_direction" => array(
            "full_name" => "PowerGolden Service",
            "country_code" => "MX",
            "postal_code" => "44520",
            "direction_1" => "Firmamento 670, Jardines del Bosque",
            "city" => "Guadalajara",
            "phone" => "0000000000",
            "state_code" => "JAL",
            "neighborhood" => "Neighborhood"
        ),
        "destination_direction" => array(
            "company" => $nombre,
            "country_code" => "MX",
            "postal_code" => $cp,
            "direction_1" => $direccion,
            "city" => $ciudad,
            "phone" => $telefono,
            "state_code" => $estado,
            "neighborhood" => "Neighborhood"
        ),
        "shipment" =>  array(
            "shipment_type" => "Package",
            "insured_value" => 200,
            "insured_value_currency" => "mxn",
            "content" => "Productos PowerGolden",
            "parcels" => array(array(
                "quantity" => $cantidad,
                "weight" => $peso,
                "length" => $largo,
                "height" => $alto,
                "width" => $ancho,
                "weight_unit" => "kg"
            ))
        ),
        "label_format" => "Letter"
    );

    $headers = array(
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://enviaya.com.mx/api/v1/shipments');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
