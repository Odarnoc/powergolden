<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Éxito registrar la información.";

if(empty($_POST['descripcion'])){
    error_mensaje('Ingresar una una descripción para tu pagina personal.');
    return;
}

    $des = $_POST['descripcion'];
    $uid = $_SESSION["user_id"];

    $sobremi = R::findOne('landing','usuario_id ='.$uid);

    if(empty($sobremi)){
        $sobremi = R::dispense('landing');
        $sobremi->descripcion = $des;
        $sobremi->usuario_id = $uid;
        $id = R::store($sobremi);
        if(empty($id)){
            error_mensaje("Error al registrar la información.");
        }else{
            echo json_encode($response);
        }
    }else{
        $sobremi->descripcion = $des;
        $id = R::store($sobremi);
        if(empty($id)){
            error_mensaje("Error al registrar la información.");
        }else{
            echo json_encode($response);
        }
    }


?>