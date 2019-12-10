<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Contraseña cambiada exitosamente.";

if(!isset($_POST['pass'])){
    error_mensaje("Favor de completar los campos.");
    return;
}

$contra = $_POST['pass'];
$pin = $_POST['pin'];

$query = 'SELECT id FROM `usuarios` WHERE pin= "'.$pin.'"'; 

    $registros_in=R::getAll($query);

            $user_id = 26;

            $registro = R::load('usuarios',$user_id);


    if(strlen($contra) >= 8){
        $registro->pass = $contra;
        $id = R::store($registro);

            if(empty($id)){
                error_mensaje("Error al cambiar la contraseña.");
            }else{
                echo json_encode($response);
                }
    }else{
       error_mensaje("La contraseña es muy pequeña (Debe contener mas de 8 carácteres).");
    }

?>