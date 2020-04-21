<?php
session_start();
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

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo=$_POST['tipo'];
    $paquete_id=$_POST['paquete_id'];
    $desde=$_POST['desde']==''?0:$_POST['desde'];
    $cantidad=$_POST['cantidad']==''?0:$_POST['cantidad'];
    if(isset($_POST['primera'])){
        $primera=1;
    }else{
        $primera=0;
    }

        
            $registro = R::dispense('promociones');


            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->tipo = $tipo;
            $registro->paquete_id = $paquete_id;
            $registro->desde=$desde;
            $registro->cantidad=$cantidad;
            $registro->primera=$primera;
            
            $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al crear la promocion");
            }else{
                echo json_encode($response);
            }
            

            include 'registros-administrador.php';

?>