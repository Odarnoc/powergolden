<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';


$response['mensaje'] = "Exito al editar el paquete.";

if(!isset($_POST['nombre'])&&!isset($_POST['description'])&&!isset($_POST['price'])&&!isset($_POST['cantidad'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['nombre'])){
    error_mensaje('Agregar un nombre al paquete.');
    return;
}
if(empty($_POST['price_usd'])){
    error_mensaje('Agregar un precio en dolares correspondiente.');
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

if(empty($_POST['cantidad'])){
    error_mensaje('Seleccionar la cantidad de productos.');
    return;
}

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['description'];
    $precio = $_POST['price'];
    $precio_usd = $_POST['price_usd'];
    $cantidad = $_POST['cantidad'];
if(!file_exists($_FILES['img-producto']['tmp_name']) || !is_uploaded_file($_FILES['img-producto']['tmp_name'])){
    $registro = R::load('paquetes',$_POST['id']);

    $registro->nombre = $nombre;
    $registro->descripcion = $descripcion;
    $registro->precio = $precio;
    $registro->precio_usd = $precio_usd;
    $registro->productos = $cantidad;

    $id = R::store($registro);

    if(empty($id)){
        error_mensaje("Error al editar el paquete");
    }else{
        echo json_encode($response);
    }

}else{
    $registro = R::load('paquetes',$_POST['id']);

            $dir_subida = '../images/paquetes/';
            $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

            if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->precio = $precio;
            $registro->productos = $cantidad;
            $registro->imagen=basename($_FILES['img-producto']['name']);


            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al editar el paquete");
            }else{
                echo json_encode($response);
            }
            }
}
include 'registros-administrador.php';
?>