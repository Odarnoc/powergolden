<?php
require '../bd/conexion.php';
require '../utils/error.php';

    $information = R::findOne('usuarios','id='.$_POST['id']);
    echo json_encode($information);

?>