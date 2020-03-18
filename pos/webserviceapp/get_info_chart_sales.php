<?php
session_start();
require ('conexion.php');

$auxiliar=R::getAll( "SELECT SUM(p.cantidad) as ventas from ventas as v 
LEFT JOIN productosxventas as p on p.venta_id=v.id
WHERE DATE(v.fecha)=DATE('".date('Y-m-d')."') and v.sucursal_id=".$_SESSION["sucursal_id"]);
$ventas['hoy']=$auxiliar[0]['ventas'];
if($ventas['hoy']==null){
    $ventas['hoy']=0;
}

$auxiliar=R::getAll( "SELECT SUM(p.cantidad) as ventas from ventas as v 
LEFT JOIN productosxventas as p on p.venta_id=v.id
WHERE DATE(v.fecha)<DATE('".date('Y-m-d')."') and DATE(v.fecha)>=DATE('".date('Y-m-d',strtotime("-1 month"))."') and v.sucursal_id=".$_SESSION["sucursal_id"]);

$ventas['mes']=$auxiliar[0]['ventas'];
if($ventas['mes']==null){
    $ventas['mes']=50;
}else{
    $ventas['mes']=intval(($ventas['mes']/50)+2);
}
$auxiliar=R::getAll( "SELECT SUM(v.existencia) as inventario, SUM(v.limite_inventario) as limite from inventarios as v
WHERE v.sucursal_id=".$_SESSION["sucursal_id"]);

$ventas['inventario']=$auxiliar[0]['inventario'];
if($ventas['inventario']==null){
    $ventas['inventario']=0;
}
$ventas['limite']=$auxiliar[0]['limite'];
if($ventas['limite']==null){
    $ventas['limite']=0;
}


echo json_encode($ventas);
?>