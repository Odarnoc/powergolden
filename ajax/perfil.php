<?php

session_start();

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

if(!is_numeric($_POST['cp']) || strlen($_POST['cp']) != 5){
    error_mensaje('Codigo postal incorrecto');
    return;
} 


if (isset($_POST['user_id'])) {
    $user_id=$_POST['user_id'];
}else{
    $user_id=$_SESSION["user_id"];
}

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $nacimiento = $_POST['date'];
    $direccion = $_POST['address'];
    $estado = $_POST['state'];
    $ciudad = $_POST['city'];
    $codigop = $_POST['cp'];

        
    $registro = R::load('usuarios',$user_id);

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->apellidos = $apellido;
            $registro->nacimiento = $nacimiento;
            $registro->direccion = $direccion;
            $registro->estado = $estado;
            $registro->ciudad = $ciudad;
            $registro->codigop = $codigop;

            $id = R::store($registro);

    if(empty($id)){
        error_mensaje("Error al guardar usuario.");
    }else{
        echo json_encode($response);
        }
    
?>