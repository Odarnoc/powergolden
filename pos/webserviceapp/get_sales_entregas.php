<?php
session_start();
require ('conexion.php');
$where="e.id_sucursal=".$_SESSION["sucursal_id"];
if(isset($_POST['tipo'])&&$_POST['tipo']!=""){
    if($where!=""){
        $where.=" AND ";
    }
    $where.=" e.status=".$_POST['tipo'];
}
if(isset($_POST['inicio'])&&$_POST['inicio']!=""){
    if($where!=""){
        $where.=" AND ";
    }
    $where.=" DATE(v.fecha)>='".$_POST['inicio']."'";
}
if(isset($_POST['fin'])&&$_POST['fin']!=""){
    if($where!=""){
        $where.=" AND ";
    }
    $where.=" DATE(v.fecha)<='".$_POST['fin']."'";
}
$auxiliar=R::getAll( "SELECT v.*,u.nombre as unombre,u.apellidos as uape,
m.nombre as mnombre,m.apellidos as mape, s.nombre as sucursal,
e.status, e.id as eid
from ventas as v 
left join usuarios as u on u.id=v.user_id
left join usuarios as m on m.id=v.salesman_id
left join sucursales as s on s.id=v.sucursal_id
INNER JOIN ventasentregas as e on e.id_venta=v.id
WHERE ".$where);
$ventas['tabla']="";
if ($auxiliar) {
	foreach ($auxiliar as $key) {
        if($key['status']==0){
            $key['status']='<button type="button" class="btn btn-entregas" onclick="entregar('.$key['eid'].','.$key['id'].')">Entregar</button>';
        }else{
            $key['status']=' <p class="p-entregado">Entregado</p>';
        }
        $ventas['tabla'].="<tr>".
        "<td>".$key['user_id']." - ".$key['unombre']." ".$key['uape']."</td>".
        "<td>".$key['fecha']."</td>".
        "<td>$".number_format($key['total'], 2)."</td>".
        "<td class='text-center'> ".$key['status']."</td>".
        "</tr>"
        ;
    }
}

echo json_encode($ventas);
?>