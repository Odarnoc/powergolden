<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';


$response['mensaje'] = "Exito al crear el paquete.";

if(!isset($_POST['nombre'])&&!isset($_POST['description'])&&!isset($_POST['price'])&&!isset($_POST['cantidad'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['nombre'])){
    error_mensaje('Agregar un nombre al paquete.');
    return;
}

if(empty($_POST['price'])){
    error_mensaje('Agregar un precio correspondiente.');
    return;
}
if(empty($_POST['price_usd'])){
    error_mensaje('Agregar un precio en dolares correspondiente.');
    return;
}

if(empty($_POST['cantidad'])){
    error_mensaje('Seleccionar la cantidad de productos.');
    return;
}


    $nombre = $_POST['nombre'];
    $precio = $_POST['price'];
    $precio_usd = $_POST['price_usd'];
    $cantidad = $_POST['cantidad'];

        
            $registro = R::dispense('paquetes');

            $dir_subida = '../images/paquetes/';
            $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

            if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

            $registro->nombre = $nombre;
            $registro->precio = $precio;
            $registro->precio_usd = $precio_usd;
            $registro->productos = $cantidad;
            $registro->imagen=basename($_FILES['img-producto']['name']);

            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear el paquete");
            }else{
                echo json_encode($response);
            }
            }

            include 'registros-administrador.php';

?>