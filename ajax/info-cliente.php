<?php
require '../bd/conexion.php';
require '../utils/error.php';

$usuario = R::findOne('usuarios','WHERE id = "'.$_POST['id'].'" AND correo = "'.$_POST['correo'].'"');

$response['mensaje'] = "Exito al guardar el folleto.";

if(empty($usuario['nombre'])){
    error_mensaje('Datos incorrectos'.$usuario);
    return;
}

if(empty($_POST['correo'])){
    error_mensaje('Agregar correo electronico');
    return;
}

if(empty($_POST['id'])){
    error_mensaje('Agregar codigo de cliente.');
    return;
}

$datos = R::findOne('usuarios','WHERE id = "'.$_POST['id'].'" AND correo = "'.$_POST['correo'].'"');

echo json_encode($datos);


?>