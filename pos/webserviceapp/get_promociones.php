<?php
session_start();
require 'conexion.php';

$lista = R::findAll("promociones");
$products['arreglo'] = $lista;

echo json_encode($products);
