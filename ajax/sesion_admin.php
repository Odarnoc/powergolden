<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['data'] = null;
$response['mensaje'] = "error en el servidor";

if(!isset($_POST['email'])&&!isset($_POST['pass'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['email'])){
    error_mensaje('Llenar el campo correo.');
    return;
}

if(empty($_POST['pass'])){
    error_mensaje('Llenar el campo contraseña.');
    return;
}

    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];
  
    $query = 'SELECT * FROM `usuarios` WHERE correo= "'.$correo.'" &&  pass= "'.$contrasena.'" && rol=2' ;

   $login_in=R::getAll($query);
    if(sizeof($login_in) == 0){
        error_mensaje('Usuario o contraseña invalido');
    }else{
        $_SESSION["user_id"] = $login_in[0]['id'];
        $_SESSION["rol"] = $login_in[0]['rol'];
        echo json_encode($login_in[0]);
    }

?>