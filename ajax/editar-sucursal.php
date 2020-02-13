<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al editar la sucursal.";

if(empty($_POST['nombre'])){
    error_mensaje('Ingresar un nombre de sucursal.');
    return;
}

if(empty($_POST['direccion'])){
    error_mensaje('Ingresar una direccion.');
    return;
}

if(empty($_POST['cp'])){
    error_mensaje('Llenar el campo codigo postal.');
    return;
}

if(empty($_POST['colonia'])){
    error_mensaje('Llenar el campo colonia.');
    return;
}

if(empty($_POST['munici'])){
    error_mensaje('Llenar el campo ciudad.');
    return;
}

if(empty($_POST['estado'])){
    error_mensaje('Llenar el campo estado.');
    return;
}

    $nom = $_POST['nombre'];
    $dir = $_POST['direccion'];
    $cp = $_POST['cp'];
    $col = $_POST['colonia'];
    $mun = $_POST['munici'];
    $est = $_POST['estado'];

            if(strlen($cp) == 5 ){ 
        
            $registro = R::load('sucursales',$_POST['id']);
            
            $registro->nombre = $nom;
            $registro->direccion = $dir;
            $registro->codigo = $cp;
            $registro->colonia = $col;
            $registro->ciudad = $mun;
            $registro->estado = $est;


            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al agregar la sucursal.");
            }else{
                echo json_encode($response);
            }

        }else{
            error_mensaje("El codigo postal es incorrecto");
        }


?>