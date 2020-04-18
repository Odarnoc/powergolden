<?php
    session_start();
    require '../bd/conexion.php';
    require '../utils/error.php';

    $information  = R::getAll( 'select puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1' ,
    array(':idusuario'=>$_SESSION["user_id"]));

    $labels = array();
    $cantidades = array();

    array_push($labels, "Rango 1");
    array_push($cantidades, $information[0]['puntos1']);
    array_push($labels, "Rango 2");
    array_push($cantidades, $information[0]['puntos2']);
    array_push($labels, "Rango 3");
    array_push($cantidades, $information[0]['puntos3']);
    array_push($labels, "Rango 4");
    array_push($cantidades, $information[0]['puntos4']);
    array_push($labels, "Rango 5");
    array_push($cantidades, $information[0]['puntos5']);

    $response['labels'] = $labels; 
    $response['cants'] = $cantidades;

    echo json_encode($response);
?>