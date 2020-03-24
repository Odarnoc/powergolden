<?php

require ('conexion.php');
if($_POST['referencia']!=null && isset($_POST['referencia'])){
    R::exec( "update  referencias set status=1 where id=".$_POST['referencia']."");
    $_POST['tipo_pago']="Referencia";
    R::exec( "insert into ventaspagos (venta_id,tipo_pago,cantidad,referencia_id) values
(
". $_POST['venta'].",
'".$_POST['tipo_pago']."',
".$_POST['cantidad'].",
".$_POST['referencia']."
)");
}else{
    $_POST['referencia']=null;
    R::exec( "insert into ventaspagos (venta_id,tipo_pago,cantidad) values
(
". $_POST['venta'].",
'".$_POST['tipo_pago']."',
".$_POST['cantidad']."
)");
}



?>
