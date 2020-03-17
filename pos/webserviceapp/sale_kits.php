<?php

require ('conexion.php');


 R::exec( "insert into ventaspaquetes (venta_id,paquete_id) values
 	(
 	". $_POST['venta'].",
 	".$_POST['paquete']."
   )" );


?>
