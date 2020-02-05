<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar la direccion.";


    $id = $_POST['id_direccion'];

        
            $registro = R::load('direcciones',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            

?>