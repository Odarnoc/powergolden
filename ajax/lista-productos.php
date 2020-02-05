<?php
require '../bd/conexion.php';
require '../utils/error.php';


$busqueda = $_GET['busqueda'];
$query='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE (p.nombre LIKE "%'.$busqueda.'%") or (p.ingredientes LIKE "%'.$busqueda.'%")';

$prods=R::getAll($query);

echo json_encode($prods);

?>