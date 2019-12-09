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

if(empty($_POST['email'])){
    error_mensaje('Llenar el campo correo.');
    return;
}


    $user_id = 26;
    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $correo = $_POST['email'];
    $nacimiento = $_POST['date'];
    $direccion = $_POST['address'];
    $estado = $_POST['state'];
    $ciudad = $_POST['city'];
    $codigop = $_POST['cp'];
  
        
    $registro = R::load('usuarios',$user_id);

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->correo = $correo;
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