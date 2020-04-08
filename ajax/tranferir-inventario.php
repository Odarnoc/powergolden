<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al transferir.";

if(!isset($_POST['origen'])&&!isset($_POST['destino'])&&!isset($_POST['folio'])&&!isset($_POST['movimiento'])&&!isset($_POST['productos'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['origen'])){
    error_mensaje('Llenar origen.');
    return;
}
if($_POST['destino']==-1){
    error_mensaje('selecciona destino.');
    return;
}
if($_POST['movimiento']==-1){
    error_mensaje('Llenar movimiento.');
    return;
}
if(empty($_POST['folio'])){
    error_mensaje('Llenar folio.');
    return;
}
if(empty($_POST['productos'])){
    error_mensaje('selecciona productos.');
    return;
}

    $origen = $_POST['origen'];
    $destino_id = $_POST['destino'];
    $movimiento = $_POST['movimiento'];
    $folio = $_POST['folio'];
    $producto = $_POST['productos'];
    $errores=array();

    $folioExiste = R::findOne( 'historialtraspasos', 'folio = "?"', [ $folio ]);

    if(!empty($folioExiste)){
        error_mensaje('El folio ingresado fue registrado anteriormente.');
        return;
    }


    foreach ($producto as $valor) {
        $almacen = R::findOne( 'inventarios', 'sucursal_id = ? && existencia >= ? && producto_id = ?', [ $origen, $valor['cant'],$valor['id'] ]);
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
            $almacen = R::findOne( 'inventarios', 'sucursal_id = ? && producto_id = ?', [ $origen,$valor['id'] ]);
            if(!empty($almacen)){
                $destino = R::findOne( 'inventarios', 'sucursal_id = ? && producto_id = ?', [ $destino_id,$valor['id'] ]);
                if(empty($destino)){
                    $registro = R::dispense('inventarios');
                    $registro->sucursal_id = $destino_id;
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
                $traspasoHistorial->origen = $origen;
                $traspasoHistorial->destino = $destino_id;
                $traspasoHistorial->tipomovimiento_id = $movimiento;
                $traspasoHistorial->folio = $folio;
                $id = R::store($traspasoHistorial);

                $productoTraspasoHistorial = R::dispense('productoxmovimientos');
                $productoTraspasoHistorial->producto_id = $valor['id'];
                $productoTraspasoHistorial->cantidad = $valor['cant'];
                if(!empty($valor['lote'])){
                    $productoTraspasoHistorial->lote = $valor['lote'];
                }
                if(!empty($valor['caducidad'])){
                    $productoTraspasoHistorial->caducidad = $valor['caducidad'];
                }
                $id = R::store($productoTraspasoHistorial);
            }
            
        }
        echo json_encode($response);
    include 'registros-administrador.php';

?>