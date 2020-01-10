<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$query = 'SELECT * FROM productos';

$registros=R::getAll($query);

if(sizeof($registros) != 0){

    echo json_encode($registros);

}else{
    error_mensaje("No se pudo establecer la conexion");
    }

?>