<?php

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al agregar existencias.";


    $idd = $_POST['idd'];
    $cantidadusd = $_POST['usd'];
    $cantidadmxn = $_POST['mxn'];

        
            $registro = R::load('inventarios',$idd);

            $registro->precio_mxn = $cantidadmxn;
            $registro->precio_usd = $cantidadusd;

            $idd = R::store($registro);

            if(empty($idd)){
                error_mensaje("Error al actualizar existencias.");
            }else{
                echo json_encode($response);
            }
            

?>