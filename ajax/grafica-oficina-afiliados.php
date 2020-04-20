<?php
    session_start();
    require '../bd/conexion.php';
    require '../utils/error.php';

    $monthsnames = ['NA', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $information  = R::getAll('SELECT YEAR(creado) as anio, MONTH(creado) as mes, COUNT(*) as usuarios FROM usuarios WHERE referido ='.$_SESSION["user_id"].' GROUP BY YEAR(creado), MONTH(creado) LIMIT 4');
    $ordered_info = array_reverse($information);

    $labels = array();
    $cantidades = array();

    foreach ($ordered_info as $item) {
        array_push($labels, $monthsnames[$item['mes']].' '.$item['anio']);
        array_push($cantidades, $item['usuarios']);
    }

    $response['labels'] = $labels; 
    $response['cants'] = $cantidades;

    echo json_encode($response);
?>