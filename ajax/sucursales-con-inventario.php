<?php
require '../bd/conexion.php';
require '../utils/error.php';


$carrito = $_POST['carrito'];
$query = 'SELECT * FROM  sucursales';
$sucursal = R::getAll($query);
$sucursales = array();
foreach ($sucursal as $suc) {
    $mostrar = true;
    foreach ($carrito as $valor) {
        $almacen = R::findOne('inventarios', 'sucursal_id = ? && existencia >= ? && producto_id = ?', [$suc['id'],$valor['cant'], $valor['id']]);
        if (empty($almacen)) {
            $mostrar = false;
        }
    }
    if($mostrar){
        array_push($sucursales,$suc);
    }
}

echo json_encode($sucursales);

?>