<?php
session_start();
require ('conexion.php');


 R::exec( "insert into pagosexternos (descripcion,total,fecha,sucursal_id) values
 	(
 	'". $_POST['descripcion']."',
   ".$_POST['cantidad'].",
   '".date("Y-m-d H:i:s")."',
   ".$_SESSION["sucursal_id"].")" );

   $products['id'] = R::getInsertID();
   echo json_encode($products['id']);


?>
