<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar la promocion.";


    $id = $_POST['id_promocion'];

            $registro = R::load('promociones',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            


?>