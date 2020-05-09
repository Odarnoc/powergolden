<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al guardar el folleto.";

if(empty($_POST['name'])){
    error_mensaje('Agregar nombre del folleto');
    return;
}

if(empty($_POST['description'])){
    error_mensaje('Agregar descripcion del folleto.');
    return;
}

if(empty($_FILES["pdf_file"]["name"])){
    error_mensaje('Agregar un archivo PDF');
    return;
}

if(empty($_FILES['img-producto']['name'])){
    error_mensaje('Agregar una imagen');
    return;
}

    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];

    $registro = R::dispense('folletos');

    $dir_subida = '../images/folletos/';
    $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

    $dir_subida_pdf = '../images/folletos/documentos/';
    $fichero_subido_pdf = $dir_subida_pdf . basename($_FILES["pdf_file"]["name"]);

if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {
    if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $fichero_subido_pdf)) {

        $registro->nombre = $nombre;
        $registro->descripcion = $descripcion;
        $registro->pdf = basename($_FILES["pdf_file"]["name"]);
        $registro->imagen = basename($_FILES['img-producto']['name']);

        $id = R::store($registro);

        if(empty($id)){
            error_mensaje("Error al crear el paquete");
        }else{
            echo json_encode($response);
        }
    }
}

include 'registros-administrador.php';

?>