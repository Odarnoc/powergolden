<?php
    require '../bd/conexion.php';
    require '../utils/error.php';

    $promociones = R::findOne('promociones','tipo=2');
    echo json_encode($promociones);

?>
