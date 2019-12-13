<?php
require '../bd/conexion.php';
require '../utils/error.php';


    $query = 'SELECT correo FROM `usuarios` WHERE correo= "'.$correo.'"';

    $registros_in=R::getAll($query);

?>