<?php
session_start();
require ('conexion.php');
date_default_timezone_set('America/Mexico_City');
if(isset($_POST['is_payed'])){
	R::exec( "insert into ventas (salesman_id,sucursal_id,total,user_id,is_payed) values
	(
	".$_SESSION["user_id"].",
	".$_SESSION["sucursal_id"].",
	".$_POST['total'].",
	".$_POST['cliente_id'].",
	".$_POST['is_payed']."
)" );
}else{
 R::exec( "insert into ventas (salesman_id,sucursal_id,total,user_id) values
 	(
 	".$_SESSION["user_id"].",
 	".$_SESSION["sucursal_id"].",
     ".$_POST['total'].",
 	".$_POST['cliente_id']."
)" );
	 }
  $products['id'] = R::getInsertID();
echo json_encode($products);
?>