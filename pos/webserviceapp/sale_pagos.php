<?php

require ('conexion.php');

R::exec( "insert into ventaspagos (venta_id,tipo_pago,cantidad) values
(
". $_POST['venta'].",
'".$_POST['tipo_pago']."',
".$_POST['cantidad']."
)");


?>
