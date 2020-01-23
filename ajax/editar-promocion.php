<?php
require '../bd/conexion.php';
require '../utils/error.php';


$response['mensaje'] = "Exito al crear la promocion.";

if(empty($_POST['nombre'])){
    error_mensaje('Agregar un nombre a la promocion.');
    return;
}

if(empty($_POST['descripcion'])){
    error_mensaje('Agregar una descripcion de la promocion.');
    return;
}

if(empty($_POST['inicio'])){
    error_mensaje('Agregar un fecha de inicio a la promocion.');
    return;
}

if(empty($_POST['fin'])){
    error_mensaje('Agregar un fecha de finalizacion a la promocion.');
    return;
}


    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];

        
            $registro = R::load('promociones',$_POST['id']);

            $dir_subida = '../images/promocion/';
            $fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

            if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->inicio = $inicio;
            $registro->fin = $fin;
            $registro->imagen=basename($_FILES['img-producto']['name']);
            
            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear la promocion");
            }else{
                echo json_encode($response);
            }
            }



?>