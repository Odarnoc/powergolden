<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar el folleto.";


    $id = $_POST['id_producto'];

        
            $registro = R::load('folletos',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            

?>