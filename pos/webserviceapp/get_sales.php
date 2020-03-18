<?php
session_start();
require ('conexion.php');
$where="v.sucursal_id=".$_SESSION["sucursal_id"];
if(isset($_POST['cliente'])&&$_POST['cliente']!="0"&&$_POST['cliente']!=""){
    if($where!=""){
        $where.=" AND ";
    }
    $where.=" user_id=".$_POST['cliente'];
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
$auxiliar=R::getAll( "SELECT SUM(total) as ventas from ventas as v 
WHERE ".$where);
$ventas['total']=$auxiliar[0]['ventas'];
$auxiliar=R::getAll( "SELECT v.*,u.nombre as unombre,u.apellidos as uape,m.nombre as mnombre,m.apellidos as mape, s.nombre as sucursal from ventas as v 
left join usuarios as u on u.id=v.user_id
left join usuarios as m on m.id=v.salesman_id
left join sucursales as s on s.id=v.sucursal_id
WHERE ".$where);
$ventas['tabla']="";
if ($auxiliar) {
	foreach ($auxiliar as $key) {
        $ventas['tabla'].="<tr>".
        "<td>".$key['unombre']." ".$key['uape']."</td>".
        "<td>".$key['fecha']."</td>".
        "<td>$".number_format($key['total'], 2)."</td>".
        "<td>".$key['mnombre']." ".$key['mape']."</td>".
        "<td>".$key['sucursal']."</td>".
        "</tr>"
        ;
    }
}
$auxiliar=R::getAll( "SELECT SUM(v.total) as ventas from ventas as v 
WHERE DATE(v.fecha)=DATE('".date('Y-m-d')."') and v.sucursal_id=".$_SESSION["sucursal_id"]);
$ventas['hoy']=$auxiliar[0]['ventas'];
if($ventas['hoy']==null){
    $ventas['hoy']=0;
}


echo json_encode($ventas);
?>