<?php
session_start();
require ('conexion.php');


 R::exec( "insert into pagosexternos (descripcion,total,fecha) values
 	(
 	'". $_POST['descripcion']."',
   ".$_POST['cantidad'].",
   '".date("Y-m-d H:i:s")."'
   )" );

   $products['id'] = R::getInsertID();
   echo json_encode($products['id']);


?>
