<?php

require '../bd/conexion.php';
require '../utils/error.php';

$query='SELECT * FROM paquetes WHERe id ='.$_POST['id'];

$prods=R::getAll($query);

echo json_encode($prods);