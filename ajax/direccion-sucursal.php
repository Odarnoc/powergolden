<?php
require '../bd/conexion.php';
require '../utils/error.php';

    $information = R::findOne('sucursales','id='.$_POST['id']);
    echo json_encode($information);

?>