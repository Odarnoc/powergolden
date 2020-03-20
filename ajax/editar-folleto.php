<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';


$response['mensaje'] = "Exito al editar el folleto.";

if(!isset($_POST['nombre'])&&!isset($_POST['description'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['description'])){
    error_mensaje('Agregar una descripcion del paquete.');
    return;
}


    $nombre = $_POST['nombre'];
    $descripcion = $_POST['description'];
    
if(!file_exists($_FILES['img-producto']['tmp_name']) || !is_uploaded_file($_FILES['img-producto']['tmp_name'])){
    $registro = R::load('folletos',$_POST['id']);

    $registro->nombre = $nombre;
    $registro->descripcion = $descripcion;

    $id = R::store($registro);

    if(empty($id)){
        error_mensaje("Error al editar el folleto");
    }else{
        echo json_encode($response);
    }

}else{
    $registro = R::load('folletos',$_POST['id']);

            $dir_subida = '../images/folletos/';
            $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

            if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->imagen=basename($_FILES['img-producto']['name']);


            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al editar el folleto");
            }else{
                echo json_encode($response);
            }
            }
}
include 'registros-administrador.php';
?>