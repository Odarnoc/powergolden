<?php
require '../bd/conexion.php';
require '../utils/error.php';
require '../ajax/envios.php';

$response['mensaje'] = "Exito al crear usuario.";

if (empty($_POST['largo'])) {
    error_mensaje('Favor de agregar el largo del paquete.');
    return;
}

if (empty($_POST['alto'])) {
    error_mensaje('Favor de agregar el alto del paquete.');
    return;
}

if (empty($_POST['ancho'])) {
    error_mensaje('Favor de agregar el ancho del paquete..');
    return;
}
if (empty($_POST['peso'])) {
    error_mensaje('Favor de agregar el peso del paquete.');
    return;
}

$datos = R::getAll('SELECT user_id As usuario, enviodatos_id AS envio, venta_id AS venta FROM `referenciaenvios` WHERE venta_id =' . $_POST['id']);

foreach ($datos as $item) {

    $user_data = R::findOne('usuarios', 'id=?', [$item['usuario']]);
    $envio_data = R::findOne('datosenvio', 'id=?', [$item['envio']]);
    $envio_cant = R::getAll('SELECT Sum(cantidad) AS cantidad FROM productosxventas WHERE venta_id = ' . $item['venta']);

    $envio_respuesta = generarEnvio($item['venta'], $item['usuario'], $user_data->nombre . ' ' . $user_data->apellidos, $user_data->telefono, $envio_data->direccion, $envio_data->cp, $envio_data->ciudad, $envio_data->estado, $_POST['largo'], $_POST['alto'], $_POST['ancho'], $_POST['peso'], $envio_cant[0]['cantidad']);
    $respuesta = json_decode($envio_respuesta);

    $envio = R::dispense('envios');
    $envio->venta_id = $item['venta'];
    $envio->numero_seguimiento = $respuesta->carrier_shipment_number;
    $envio->usuario_id = $item['usuario'];
    $envio->datos_envio_id = $item['envio'];
    $envio->status = $respuesta->shipment_status;
    $envio->estado = 0;
    $envio->etiqueta = $respuesta->label_share_link;
    R::store($envio);
}

echo json_encode($response);
