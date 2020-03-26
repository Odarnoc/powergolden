<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al transferir.";

if(!isset($_POST['sucursal'])&&!isset($_POST['productos'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['sucursal'])){
    error_mensaje('Llenar sucursal.');
    return;
}
if(empty($_POST['productos'])){
    error_mensaje('selecciona productos.');
    return;
}

    $sucursal = $_POST['sucursal'];
    $producto = $_POST['productos'];
    $errores=array();

    foreach ($producto as $valor) {
        $almacen = R::findOne( 'inventarios', 'sucursal_id = 1 && existencia >= ? && producto_id = ?', [ $valor['cant'],$valor['id'] ]);
        if(empty($almacen)){
            array_push($errores,$valor);
        }
        
    }

    if(!empty($errores)){
        $prodsErr='';
        foreach ($errores as $valor) {
            $prodsErr.=$valor['nombre'].', ';
        }
        $msjErr='Los productos ( '.$prodsErr.' ) no tienen suficientes existencias';
        error_mensaje($msjErr);
        return;
    }

    foreach ($producto as $valor) {
        $almacen = R::findOne( 'inventarios', 'sucursal_id = ? && existencia >= ? && producto_id = ?', [ 1,$valor['cant'],$valor['id'] ]);
        if(!empty($almacen)){
            $destino = R::findOne( 'inventarios', 'sucursal_id = ? && producto_id = ?', [ $sucursal,$valor['id'] ]);
            if(empty($destino)){
                $registro = R::dispense('inventarios');
                $registro->sucursal_id = $sucursal;
                $registro->limite_inventario = 28;
                $registro->producto_id = $valor['id'];
                $registro->existencia = $valor['cant'];
                $id = R::store($registro);
            }else{
                $destino->existencia += $valor['cant'];
                $id = R::store($destino);
            }
            $almacen->existencia -= $valor['cant'];
            $id = R::store($almacen);

            $traspasoHistorial = R::dispense('historialtraspasos');
            $traspasoHistorial->producto_id = $valor['id'];
            $traspasoHistorial->cantidad = $valor['cant'];
            $traspasoHistorial->destino = $sucursal;
            $id = R::store($traspasoHistorial);
        }
        
    }
    echo json_encode($response);
    include 'registros-administrador.php';

?>