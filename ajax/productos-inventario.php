<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al crear usuario.";

if(!isset($_POST['producto'])&&!isset($_POST['sucursal'])&&!isset($_POST['minimo'])&&!isset($_POST['existencias'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['producto'])){
    error_mensaje('Llenar el campo nombre.');
    return;
}

if(empty($_POST['sucursal'])){
    error_mensaje('Llenar el campo apellido.');
    return;
}

if(empty($_POST['minimo'])){
    error_mensaje('Llenar el campo teléfono.');
    return;
}

if(empty($_POST['existencias'])){
    error_mensaje('Llenar el campo correo.');
    return;
}

    $producto = $_POST['producto'];
    $sucursal = $_POST['sucursal'];
    $minimo = $_POST['minimo'];
    $existencias = $_POST['existencias'];


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
?>