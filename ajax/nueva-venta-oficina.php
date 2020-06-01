<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al agregar la venta.";

if(empty($_POST['nombre'])){
    error_mensaje('Ingresar una nombre.');
    return;
}

if(empty($_POST['descripcion'])){
    error_mensaje('Llenar el campo descripción.');
    return;
}

if(empty($_POST['total'])){
    error_mensaje('Llenar el campo total.');
    return;
}

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $total = $_POST['total'];
    $cobrado = $_POST['cobrado'];
        
    $registro = R::dispense('ventascliente');
    $registro->nombre = $nombre;
    $registro->fecha = date('Y-m-d');
    $registro->venta = $descripcion;
    $registro->total = $total;
    $registro->cobrado = $cobrado;
    if(isset($_SESSION["user_id"])){
        $registro->user_id = $_SESSION["user_id"];
    }else{
        $registro->user_id = $_POST['user_id'];
    }
    
    

    $id = R::store($registro);
    if(empty($id)){
        error_mensaje("Error al agregar venta.");
    }else{
        echo json_encode($response);
    }


?>