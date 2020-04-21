<?php
require '../bd/conexion.php';

    $information = R::findOne('notificaciones','id='.$_POST['id']);
    echo json_encode($information);

?>