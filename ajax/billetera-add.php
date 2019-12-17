<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al agregar la tarjeta.";

if(!isset($_POST['propietar'])&&!isset($_POST['ntarj'])&&!isset($_POST['fecha'])&&!isset($_POST['codigo'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['propietar'])){
    error_mensaje('Ingresar el nombre en la tarjeta.');
    return;
}

if(empty($_POST['ntarj'])){
    error_mensaje('Llenar el campo numero de tarjeta.');
    return;
}

if(empty($_POST['fecha'])){
    error_mensaje('Llenar el campo fecha.');
    return;
}

if(empty($_POST['codigo'])){
    error_mensaje('Llenar el campo CCV.');
    return;
}

    $propitario = $_POST['propietar'];
    $numerotarjeta = $_POST['ntarj'];
    $fecha = $_POST['fecha'];
    $codigo = $_POST['codigo'];


        if(strlen($numerotarjeta) == 16){
            if(strlen($codigo) >= 3 ){ 
        
            $registro = R::dispense('tarjetas');

            $registro->propietario = $propitario;
            $registro->numerotar = $numerotarjeta;
            $registro->fecha = $fecha;
            $registro->ccv = $codigo;
            $registro->idusuario = $_SESSION["user_id"];


            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al agregar la tarjeta.");
            }else{
                echo json_encode($response);
            }

        }else{
            error_mensaje("CCV incorrecto (Debe contener de 3 a 4 carácteres).");
        }

        }else{
            error_mensaje("Número de tarjeta incorrecto (Debe contener 16 carácteres).");
        }

?>