<?php
require '../bd/conexion.php';
require '../utils/error.php';
require ('../pos/webserviceapp/openpay/Openpay.php');

$carrito = $_POST['carrito'];
$errores=array();


if($_POST['id'] == 9){
    error_mensaje('Seleccionar una sucursal para la entrega.');
    return;
}

foreach ($carrito as $valor) {
    $almacen = R::findOne( 'inventarios', 'sucursal_id = ? && existencia >= ? && producto_id = ?', [ $_POST['id'],$valor['cant'],$valor['id'] ]);
    if(empty($almacen)){
        array_push($errores,$valor);
    }
}

if(!empty($errores)){
    $prodsErr='';
    foreach ($errores as $valor) {
        $prodsErr.=$valor['nombre'].', ';
    }
    $msjErr='Los productos ( '.$prodsErr.' ) no tienen suficientes existencias dentro de la sucursal seleccionada.';
    error_mensaje($msjErr);
    return;
}

    $information = R::findOne('sucursales','id='.$_POST['id']);
    echo json_encode($information);

?>