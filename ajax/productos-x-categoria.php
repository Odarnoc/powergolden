<?php
require '../bd/conexion.php';
require '../utils/error.php';


$categoria = $_GET['categoria'];
$lineaInfo=R::findOne('lineas','id='.$categoria);
$query='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE l.id ='.$categoria;

$prods=R::getAll($query);

$response['linea'] = $lineaInfo;
$response['productos'] = $prods;

echo json_encode($response);

?>