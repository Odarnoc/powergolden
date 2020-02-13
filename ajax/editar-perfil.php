<?php

session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al editar el usuario.";

if(empty($_POST['name'])){
    error_mensaje('Llenar el campo nombre.');
    return;
}

if(empty($_POST['last_name'])){
    error_mensaje('Llenar el campo apellido.');
    return;
}
if(empty($_POST['date'])){
    error_mensaje('Llenar el campo fecha de nacimiento.');
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


if (isset($_POST['user_id'])) {
    $user_id=$_POST['user_id'];
}else{
    $user_id=$_SESSION["user_id"];
}

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $nacimiento = $_POST['date'];


        
    $registro = R::load('usuarios',$user_id);

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->apellidos = $apellido;
            $registro->nacimiento = $nacimiento;


            $id = R::store($registro);

    if(empty($id)){
        error_mensaje("Error al editar el usuario.");
    }else{
        echo json_encode($response);
        }
    
?>