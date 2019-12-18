<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar la tarjeta.";


    $id = $_POST['id_tarjeta'];

        
            $registro = R::load('tarjetas',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            


?>