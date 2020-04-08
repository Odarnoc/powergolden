<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['data'] = null;
$response['mensaje'] = "error en el servidor";

if(empty($_POST['correo'])){
    error_mensaje('Llenar el campo correo.');
    return;
}

if(empty($_POST['contra'])){
    error_mensaje('Llenar el campo contraseña.');
    return;
}

    $correo = $_POST['correo'];
    $contrasena = $_POST['contra'];

    $query = 'SELECT id,rol FROM usuarios WHERE correo="'.$correo.'"  &&  pass= "'.$contrasena.'" && rol = 1' ;

    $login_in=R::getAll($query);

    if(sizeof($login_in) == 0){
        error_mensaje('Usuario o contraseña invalido');
    }else{
        $_SESSION["user_id"] = $login_in[0]['id'];
        $_SESSION["rol"] = $login_in[0]['rol'];
        echo json_encode($login_in[0]);
        
    }

?>