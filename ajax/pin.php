<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Successfull.";

if(!isset($_POST['pin'])){
    error_mensaje("Completa el campo PIN.");
    return;
}

$pin = $_POST['pin'];
$query = 'SELECT * FROM `usuarios` WHERE pin= "'.$pin.'"'; 

$registros_in=R::getAll($query);

    if(sizeof($registros_in) == 1){
        echo json_encode($response);
    }else{
        error_mensaje("PIN incorrecto");
    }  

?>