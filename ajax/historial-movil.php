<?php
    require '../bd/conexion.php';
    require '../utils/error.php';

$user_id = $_POST["user_id"];

$query="SELECT p.*,pxv.cantidad,v.fecha FROM productosxventas as pxv LEFT JOIN ventas as v ON pxv.venta_id = v.id LEFT JOIN productos as p ON pxv.producto_id = p.id WHERE v.user_id=".$user_id;

$historial=R::getAll($query);

echo json_encode($historial);


?>