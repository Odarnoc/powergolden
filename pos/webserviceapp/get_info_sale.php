<?php
session_start();
require 'conexion.php';

$url = "application/storage/products/";
$where="";
if ($_POST['venta_id'] != '') {
		$where.=" id= {$_POST['venta_id']}";
} 
if($where!=""){
	$where=" WHERE ".$where;
} 
$lista=R::getAll( "SELECT * from ventas"
. $where);


$products=$lista[0];
if($lista){
	$lista=R::getAll( "SELECT * from usuarios WHERE id=".$lista[0]['user_id']);
	$products['cliente']=$lista[0];
}
echo json_encode($products);
?>