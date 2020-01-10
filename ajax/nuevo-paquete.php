<?php
require '../bd/conexion.php';
require '../utils/error.php';


$response['mensaje'] = "Exito al crear el paquete.";

if(!isset($_POST['name'])&&!isset($_POST['description'])&&!isset($_POST['price'])&&!isset($_POST['prod'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['name'])){
    error_mensaje('Agregar un nombre al paquete.');
    return;
}

if(empty($_POST['description'])){
    error_mensaje('Agregar una descripcion del paquete.');
    return;
}

if(empty($_POST['price'])){
    error_mensaje('Agregar un precio correspondiente.');
    return;
}

if(empty($_POST['prod'])){
    error_mensaje('Seleccionar la cantidad de productos.');
    return;
}


    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];
    $precio = $_POST['price'];
    $cantidad = $_POST['prod'];

        
            $registro = R::dispense('paquetes');

            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->precio = $precio;
            $registro->productos = $cantidad;

            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear el paquete");
            }else{
                echo json_encode($response);
            }

?>