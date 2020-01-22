<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Exito al eliminar el producto.";


    $id = $_POST['id_producto'];

        
            $registro = R::load('productos',$id);

            $id = R::trash($registro);

                echo json_encode($response);
            


?>