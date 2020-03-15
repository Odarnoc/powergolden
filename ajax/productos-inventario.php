<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al crear inventario.";

if(!isset($_POST['producto'])&&!isset($_POST['sucursal'])&&!isset($_POST['minimo'])&&!isset($_POST['existencias'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['producto'])){
    error_mensaje('Llenar el producto.');
    return;
}

if(empty($_POST['sucursal'])){
    error_mensaje('Llenar el campo sucursal.');
    return;
}

if(empty($_POST['minimo'])){
    error_mensaje('Llenar el campo mínimo.');
    return;
}

if(empty($_POST['existencias'])){
    error_mensaje('Llenar el campo existencias.');
    return;
}

    $producto = $_POST['producto'];
    $sucursal = $_POST['sucursal'];
    $minimo = $_POST['minimo'];
    $existencias = $_POST['existencias'];

    if($sucursal == -2){
        $suc = R::find('sucursales');
        foreach ($suc as $valor) {
            $sucursal = $valor->id;
            $existe = R::findOne( 'inventarios', ' producto_id = ? && sucursal_id = ?', [ $producto, $sucursal ]);

            if(empty($existe)){
                $registro = R::dispense('inventarios');
                $registro->sucursal_id = $sucursal;
                $registro->limite_inventario = $minimo;
                $registro->producto_id = $producto;
                $registro->existencia = $existencias;
                $id = R::store($registro);
            }else{
                $existe->sucursal_id = $sucursal;
                $existe->limite_inventario = $minimo;
                $existe->producto_id = $producto;
                $existe->existencia += $existencias;
                $id = R::store($existe);
            }
        }
        echo json_encode($response);
    }else{
        $existe = R::findOne( 'inventarios', ' producto_id = ? && sucursal_id = ?', [ $producto, $sucursal ]);

        if(empty($existe)){
            $registro = R::dispense('inventarios');
            $registro->sucursal_id = $sucursal;
            $registro->limite_inventario = $minimo;
            $registro->producto_id = $producto;
            $registro->existencia = $existencias;
            $id = R::store($registro);
            if(empty($id)){
                error_mensaje("Error al crear el usuario.");
            }else{
                echo json_encode($response);
            }
        }else{
            $existe->sucursal_id = $sucursal;
            $existe->limite_inventario = $minimo;
            $existe->producto_id = $producto;
            $existe->existencia += $existencias;
            $id = R::store($existe);
            if(empty($id)){
                error_mensaje("Error al crear el usuario.");
            }else{
                echo json_encode($response);
            }
        }
    }
    


    
?>