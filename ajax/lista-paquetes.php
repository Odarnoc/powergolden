<?php
require '../bd/conexion.php';
require '../utils/error.php';


$query='SELECT * FROM paquetes';

$prods=R::getAll($query);

echo json_encode($prods);

?>