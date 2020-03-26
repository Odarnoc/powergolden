<?php
session_start();
require 'conexion.php';
$ventas['lista'] = "true";
$where =" v.salesman_id=".$_SESSION["user_id"]." AND  DATE(fecha)=DATE('".date('Y-m-d')."') and sucursal_id=".$_SESSION["sucursal_id"];
if(isset($_POST['desde'])){
	//$where.= " AND TIME(fecha)>= TIME('".$_POST['desde']."') AND TIME(fecha)<= TIME('".$_POST['hasta']."')";
}
$auxiliar=R::getAll( "SELECT SUM(total) as ventas from ventas as v 
WHERE ".$where);
$ventas['total']=$auxiliar[0]['ventas'];
if($ventas['total']==null){
    $ventas['total']=0;
}
echo json_encode($ventas);

?>