<?php
require '../bd/conexion.php';
require '../utils/error.php';


$response['mensaje'] = "Exito al guardar el folleto.";

if(!isset($_POST['name'])&&!isset($_POST['description'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['name'])){
    error_mensaje('Agregar nombre del folleto');
    return;
}

if(empty($_POST['description'])){
    error_mensaje('Agregar descripcion del folleto.');
    return;
}

turn;
}


    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];

        
            $registro = R::dispense('paquetes');

            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;

            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear el paquete");
            }else{
                echo json_encode($response);
            }

?>