<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['promocion']=false;
$user_id = $_GET['user_id'];
$pack_id = $_GET['pack_id'];
$tipo = 2;
$promocion = R::findOne('promociones','tipo='.$tipo.' && paquete_id ='.$pack_id);

$query = 'SELECT vp.* FROM ventaspaquetes as vp LEFT JOIN ventas as v ON vp.venta_id = v.id where v.fecha >= ( CURDATE() - INTERVAL 30 DAY ) && v.user_id = '.$user_id;

$ventas=R::getAll($query);

if(empty($promocion)){
    echo json_encode($response);
    return;
}else{
    if ($promocion->primera = 0) {
        if(count($ventas)>1){
            $response['promocion']=true;
            $response['gratis']=$promocion->cantidad;
            echo json_encode($response);
            return;
        }
    }else{
        if(count($ventas)>0){
            $response['promocion']=true;
            $response['gratis']=$promocion->cantidad;
            echo json_encode($response);
            return;
        }
    }
    echo json_encode($response);
}

?>