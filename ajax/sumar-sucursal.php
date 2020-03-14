<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al agregar existencias.";


    $idd = $_POST['idd'];
    $cantidad = $_POST['cantidad'];

        
            $registro = R::load('inventarios',$idd);

            $registro->existencia += $cantidad;

            $idd = R::store($registro);

            if(empty($idd)){
                error_mensaje("Error al actualizar existencias.");
            }else{
                echo json_encode($response);
            }
            

?>