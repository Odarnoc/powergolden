<?php
    require '../bd/conexion.php';
    require '../utils/error.php';

    $user_id = $_GET['user_id'];
    $information  = R::findOne( 'usuarios', ' id = '.$user_id);

    echo json_encode($information);
?>