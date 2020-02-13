<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar la sucursal.";


    $id = $_POST['id_sucursal'];

        
            $registro = R::load('sucursales',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            


?>