<?php 
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$id = $_SESSION['user_id'];
$response['requiere_reactivacion'] = true;

    $inicio = R::findOne('ventas','user_id ="'.$id.'" ORDER BY fecha DESC LIMIT 1');
    $hoy = date('Y-m-d');
    $ultima_venta;


    if(empty($inicio)){
        $registro = R::findOne('usuarios','id ='.$id.'');
        $ultima_venta = date("Y-m-d", strtotime($registro['creado']));
    }else{
        $ultima_venta = $inicio['fecha'];
    }

    if(diferenciaDias($ultima_venta, $hoy) >= 1){
        echo json_encode($response);
    }else{
        $response['requiere_reactivacion'] = false;
        echo json_encode($response);
    }


    function diferenciaDias($inicio, $hoy)
    {
        $inicio = strtotime($inicio);
        $hoy = strtotime($hoy);
        $dif = $hoy - $inicio;
        $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
        return ceil($diasFalt);
    } 
?>