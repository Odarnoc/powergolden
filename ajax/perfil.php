<?php

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al guardar.";

if(!isset($_POST['name'])&&!isset($_POST['last_name'])&&!isset($_POST['phone'])&&!isset($_POST['email'])){
    error_mensaje("Completar todos los campos personales.");
    return;
}

if(empty($_POST['name'])){
    error_mensaje('Llenar el campo nombre.');
    return;
}

if(empty($_POST['last_name'])){
    error_mensaje('Llenar el campo apellido.');
    return;
}

if(empty($_POST['phone'])){
    error_mensaje('Llenar el campo teléfono.');
    return;
}

if(!is_numeric($_POST['phone'])){
    error_mensaje('Llenar el campo "Telefono", de forma correcta.');
    return;
}
 

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];

        
    $registro = R::load('usuarios',$_POST['user_id']);

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->apellidos = $apellido;

            $id = R::store($registro);

    if(empty($id)){
        error_mensaje("Error al guardar usuario.");
    }else{
        echo json_encode($response);
        }
    
?>