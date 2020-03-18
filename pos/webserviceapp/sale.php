<?php

require ('conexion.php');


 R::exec( "insert into productosxventas (venta_id,producto_id,cantidad) values
 	(
 	". $_POST['venta'].",
 	".$_POST['product'].",
 	". $_POST['cantidad']."
   )" );


?>
