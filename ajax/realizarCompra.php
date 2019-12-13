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
        foreach ($carrito as $item) {
            $registro = R::dispense('ventas');
            $registro->producto_id = $item['id'];
            $registro->usuario_id = $user_id;
            $registro->fecha = new DateTime();
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