<?php
session_start();
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

    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];

        
            $registro = R::dispense('folletos');

            $dir_subida = '../images/folletos/';
            $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

        if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
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