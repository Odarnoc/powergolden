<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al transferir.";

if(!isset($_POST['sucursal'])&&!isset($_POST['sucursal_clonar'])&&!isset($_POST['producto'])&&!isset($_POST['cantidad'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['sucursal'])){
    error_mensaje('Llenar sucursal.');
    return;
}
if(empty($_POST['sucursal_clonar'])){
    error_mensaje('Llenar sucursal a clonar.');
    return;
}
if(empty($_POST['producto'])){
    error_mensaje('selecciona producto.');
    return;
}
if(empty($_POST['cantidad'])){
    error_mensaje('Llenar la cantidad.');
    return;
}

    $sucursal = $_POST['sucursal'];
    $sucursal_clonar = $_POST['sucursal_clonar'];
    $producto = $_POST['producto'];
    $existencias = $_POST['cantidad'];

    $transfer = R::findOne( 'inventarios', 'sucursal_id = ? && existencia >= ? && producto_id = ?', [ $sucursal_clonar,$existencias,$producto ]);

    if(empty($transfer)){
        error_mensaje("No hay suficientes existencias para la transferencia.");
    }else{
        $existe = R::findOne( 'inventarios', ' producto_id = ? && sucursal_id = ?', [ $producto, $sucursal ]);
        if(empty($existe)){
            $registro = R::dispense('inventarios');
            $registro->sucursal_id = $sucursal;
            $registro->limite_inventario = 28;
            $registro->producto_id = $producto;
            $registro->existencia = $existencias;
            $id = R::store($registro);
        }else{
            $existe->existencia += $existencias;
            $id = R::store($existe);
            $transfer->existencia -= $existencias;
            $id = R::store($transfer);
        }
        echo json_encode($response);
    }
    include 'registros-administrador.php';
?>