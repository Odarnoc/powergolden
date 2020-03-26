<?php
require '../bd/conexion.php';
require '../utils/error.php';


$busqueda = $_GET['busqueda'];
$query = 'SELECT p.nombre,p.imagen,p.id,i.limite_inventario,i.existencia, IF(i.precio_mxn=0,p.precio_mxn,i.precio_mxn) as mxn, IF(i.precio_usd=0,p.precio_usd,i.precio_usd) as usd FROM inventarios as i LEFT JOIN productos as p ON i.producto_id = p.id where i.sucursal_id = 1';

$prods=R::getAll($query);

echo json_encode($prods);

?>