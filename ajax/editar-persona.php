<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al crear usuario.";

if(!isset($_POST['name'])&&!isset($_POST['last_name'])&&!isset($_POST['phone'])&&!isset($_POST['email'])){
    error_mensaje("Completar todos los campos.");
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

if(empty($_POST['email'])){
    error_mensaje('Llenar el campo correo.');
    return;
}
if($_POST['rol']==2){
    error_mensaje('Seleccionar un tipo de usuario.');
    return;
}


    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];
    $rol = $_POST['rol'];

    $query = 'SELECT correo FROM `usuarios` WHERE correo= "'.$correo.'"';

    $registros_in=R::getAll($query);

    if(sizeof($registros_in) == 0 || sizeof($registros_in) == 1){
        if(strlen($contrasena) >= 8){
        
            $registro = R::load('usuarios',$_POST['id']);

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->pass = $contrasena;
            $registro->correo = $correo;
            $registro->apellidos = $apellido;
            $registro->rol =$rol;

            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear el usuario.");
            }else{
                echo json_encode($response);
            }
        }else{
            error_mensaje("La contraseña es muy pequeña (Debe contener mas de 8 carácteres).");
        }
    }else{
        error_mensaje("El correo ya esta registrado.");
    } 
    include 'registros-administrador.php'; 
?>