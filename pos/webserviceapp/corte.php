<?php
session_start();
require 'conexion.php';
$ventas['lista'] = "true";
$where ="v.salesman_id=".$_SESSION["user_id"]." AND  DATE(fecha)=DATE('".date('Y-m-d')."') and v.sucursal_id=".$_SESSION["sucursal_id"];
if(isset($_POST['desde'])){
	$where.= " AND TIME(fecha)>= TIME('".$_POST['desde']."') AND TIME(fecha)<= TIME('".$_POST['hasta']."')";
}
$lista = R::exec("UPDATE ventas as v set corte=1 where ".$where );
$auxiliar=R::getAll( "SELECT SUM(v.total) as ventas 
from ventas as v 
WHERE ".$where);
$ventas['total']=$auxiliar[0]['ventas'];
$auxiliar=R::getAll( "SELECT SUM(CASE WHEN s.tipo_pago='Efectivo' THEN s.cantidad ELSE 0 END) as efectivo ,SUM(CASE WHEN s.tipo_pago='Tarjeta' THEN s.cantidad ELSE 0 END) as tarjeta
from ventas as v 
LEFT JOIN ventaspagos as s on s.venta_id=v.id
WHERE ".$where);

$ventas['efectivo']=$auxiliar[0]['efectivo'];
$ventas['tarjeta']=$auxiliar[0]['tarjeta'];
$diferencia=($ventas['efectivo']+$ventas['tarjeta'])-$ventas['total'];
$ventas['efectivo']-=$diferencia;
$auxiliar=R::getAll( "SELECT nombre as nombre from sucursales as v 
WHERE id=".$_SESSION["sucursal_id"]);
$ventas['nombre']=$auxiliar[0]['nombre'];
$auxiliar=R::getAll( "SELECT v.fecha,u.nombre as unombre,u.apellidos as uape,v.total, sum(p.cantidad) as cantidad
from ventas as v 
left join usuarios as u on u.id=v.user_id
left join productosxventas as p on p.venta_id=v.id
WHERE ".$where." group by v.fecha,u.nombre,u.apellidos,v.total");
$ventas['tabla']="";
if ($auxiliar) {
	foreach ($auxiliar as $key) {
        $ventas['tabla'].="<tr>".
        "<td>".$key['unombre']." ".$key['uape']."</td>".
		"<td>".$key['fecha']."</td>".
		"<td>".$key['cantidad']."</td>".
        "<td>$".number_format($key['total'], 2)."</td>".
        
        "</tr>"
        ;
    }
}
$ventas['tabla'].=$ventas['tabla'];

echo json_encode($ventas);

?>