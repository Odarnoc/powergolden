<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar usuario.";


    $id = $_POST['id'];

        
            $registro = R::load('usuarios',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            


?>