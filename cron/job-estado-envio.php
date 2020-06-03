<?php
require '../bd/conexion.php';
require '../utils/error.php';
require '../ajax/envios.php';
require '../ajax/check_status_envio.php';

$datos = R::getAll('SELECT rf.`user_id` AS usuario, rf.`enviodatos_id` AS envio, v.is_payed AS pagado, rf.`venta_id`AS venta FROM `referenciaenvios` AS rf INNER JOIN ventas AS v ON rf.`venta_id` = v.id WHERE  v.is_payed = 1');

foreach ($datos as $item) {
    $comparar = R::findOne('envios', 'venta_id=?', [$item['venta']]);
    //echo $comparar;
    if(!empty($comparar)){
        $status = checkStatus($comparar->numero_seguimiento);
        $status = json_decode($status);
        $historico = R::findAll( 'envioshistorico' , 'venta_id=?', [$item['venta']],' ORDER BY id DESC LIMIT 12 ' );
        if(!$historico){
                $registro = R::dispense('envioshistorico');
                $registro->venta_id = $item['venta'];
                $registro->status = $status->shipment_status;
                $id = R::store($registro);
        }
        echo $status2;
    }
}
