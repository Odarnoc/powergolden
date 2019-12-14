<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Compra exitosa.";

if(empty($_POST['carrito'])){
    error_mensaje('El carrito no puede estar vacio.');
    return;
}

    $user_id=$_SESSION["user_id"];
    $carrito = $_POST['carrito'];

    if(sizeof($carrito) > 0){
        $venta = R::dispense('ventas');
        $venta->user_id = $user_id;
        $venta->fecha = new DateTime();
        $venta->total = $_POST['total'];
        $id_venta = R::store($venta);
        foreach ($carrito as $item) {
            $registro = R::dispense('productosxventas');
            $registro->venta_id = $id_venta;
            $registro->producto_id = $item['id'];
            $registro->cantidad = $item['cant'];
            $id = R::store($registro);
            if(empty($id)){
                error_mensaje("Error al crear el usuario.");
            }
        }
        echo json_encode($response);
    }else{
        error_mensaje('El carrito no puede estar vacio.');
    }  
?>