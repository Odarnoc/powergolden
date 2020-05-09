<?php
session_start();
require ('conexion.php');

date_default_timezone_set('America/Mexico_City');
$auxiliar=R::getAll( "SELECT * from sucursales
WHERE id=".$_SESSION["sucursal_id"]);
$moneda="MXN";
if($auxiliar[0]['pais']=='eua'){
	$moneda="USD";
}
if(isset($_POST['is_payed'])){
	R::exec( "insert into ventas (salesman_id,sucursal_id,total,user_id,is_payed,external_pay,moneda) values
	(
	".$_SESSION["user_id"].",
	".$_SESSION["sucursal_id"].",
	".$_POST['total'].",
	".$_POST['cliente_id'].",
	".$_POST['is_payed'].",
	".$_POST['external_pay'].",
	'".$moneda."'
)" );
}else{
 R::exec( "insert into ventas (salesman_id,sucursal_id,total,user_id,moneda) values
 	(
 	".$_SESSION["user_id"].",
 	".$_SESSION["sucursal_id"].",
     ".$_POST['total'].",
	 ".$_POST['cliente_id'].",
	 '".$moneda."'
)" );
	 }
  $products['id'] = R::getInsertID();
echo json_encode($products);
?>