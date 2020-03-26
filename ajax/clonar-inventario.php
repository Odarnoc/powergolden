<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito clonar inventario.";

if(!isset($_POST['sucursal'])&&!isset($_POST['sucursal_clonar'])){
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

    $sucursal = $_POST['sucursal'];
    $sucursal_clonar = $_POST['sucursal_clonar'];

    $inventario = R::find( 'inventarios', 'sucursal_id = ?', [ $sucursal_clonar ]);

    foreach ($inventario as $valor) {
        $producto = $valor->producto_id;
        $minimo= $valor->limite_inventario;
        $existencias= $valor->existencia;
        $existe = R::findOne( 'inventarios', ' producto_id = ? && sucursal_id = ?', [ $producto, $sucursal ]);

        if(empty($existe)){
            $registro = R::dispense('inventarios');
            $registro->sucursal_id = $sucursal;
            $registro->limite_inventario = $minimo;
            $registro->producto_id = $producto;
            $registro->existencia = 0;
            $id = R::store($registro);
        }else{
            $existe->sucursal_id = $sucursal;
            $existe->limite_inventario = $minimo;
            $existe->producto_id = $producto;
            $id = R::store($existe);
        }
    }

    echo json_encode($response);
    
?>