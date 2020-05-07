<?php
require '../bd/conexion.php';
require '../utils/error.php';
require '../ajax/envios.php';

$datos = R::getAll('SELECT rf.`user_id` AS usuario, rf.`enviodatos_id` AS envio, v.is_payed AS pagado, rf.paquete AS paquete, rf.`venta_id`AS venta FROM `referenciaenvios` AS rf INNER JOIN ventas AS v ON rf.`venta_id` = v.id WHERE rf.estado = 0 AND v.is_payed = 1');

foreach ($datos as $item) {
    $comparar = R::findOne('envios', 'venta_id=?', [$item['venta']]);
    $dato_cantidad = R::getAll('SELECT SUM(`cantidad`) AS cantidad FROM productosxventas WHERE venta_id ='.$item['venta']);
    
    if (empty($comparar)) {
        $user_data = R::findOne('usuarios', 'id=?', [$item['usuario']]);
        $envio_data = R::findOne('datosenvio', 'id=?', [$item['envio']]);

        $envio_respuesta = generarEnvio($item['venta'], $item['usuario'], $user_data->nombre . ' ' . $user_data->apellidos, $user_data->telefono, $envio_data->direccion, $envio_data->cp, $envio_data->ciudad, $envio_data->estado, $largo, $alto, $ancho, $peso, $cantidad);
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
}
