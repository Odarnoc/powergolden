<?php

    require '../bd/conexion.php';
    require '../utils/error.php';

    $id_prod = $_GET['producto_id'];

    $query1='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE p.id = '.$id_prod.' LIMIT 1';
    $res=R::getAll($query1);
    $prodIndividual = $res[0];

    $query2='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id where p.id!='.$prodIndividual['id'].' and p.categoria='.$prodIndividual['categoria'].' ORDER BY RAND() LIMIT 2';
    $prodsRelacionados=R::getAll($query2);

    $response['info_prod']=$prodIndividual;
    $response['relacionados']=$prodsRelacionados;

    echo json_encode($response);

?>