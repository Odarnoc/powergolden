<?php
session_start();
require ('conexion.php');


 R::exec( "insert into productosxventas (venta_id,producto_id,cantidad) values
 	(
 	". $_POST['venta'].",
 	".$_POST['product'].",
 	". $_POST['cantidad']."
   )" );

   R::exec("update inventarios set existencia=existencia-". $_POST['cantidad']." WHERE  producto_id=".$_POST['product']." AND 
   sucursal_id=".$_SESSION["sucursal_id"] );


?>
