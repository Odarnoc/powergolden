<?php
require '../bd/conexion.php';
require '../utils/error.php';

$query='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id';

$prods=R::getAll($query);

echo json_encode($prods);
