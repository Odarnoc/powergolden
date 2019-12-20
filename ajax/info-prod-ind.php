<?php
    require '../bd/conexion.php';
    $id_prod = $_GET['id'];
    $query1='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE p.id = '.$id_prod.' LIMIT 1';
    $res=R::getAll($query1);
    $res[0]['cant']=1;
    echo json_encode($res[0]);
?>