<?php
session_start();
require 'conexion.php';

$url = "application/storage/products/";
$where="";
if ($_POST['venta_id'] != '') {
		$where.=" id= {$_POST['venta_id']}";
} 
if($where!=""){
	$where=" WHERE ".$where;
} 
$lista=R::getAll( "SELECT * from pagosexternos"
. $where);


$products=$lista[0];
$auxiliar=R::getAll( "SELECT frase as frase,pais from sucursales
WHERE id=".$_SESSION["sucursal_id"]);

$products['frase']=$auxiliar[0]['frase'];
$products['pais']=$auxiliar[0]['pais'];
if($products['frase']==null){
    $ventas['frase']="";
}
echo json_encode($products);
?>