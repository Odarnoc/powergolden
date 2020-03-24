<?php
session_start();
require 'conexion.php';

$url = "application/storage/products/";
$where="";
if ($_POST['product'] != '' OR $_POST['category']!=0) {
	if($_POST['product']!=''){
		$where.=" (nombre like '%{$_POST['product']}%' OR descripcion like '%{$_POST['product']}%' )";
	}
	if($_POST['category']!=0){
		if($where!=""){
			$where.=' AND ';
		}
		$where.=" categoria=".$_POST['category'];
	}
	
} 
if($where!=""){
	$where=" WHERE ".$where;
} 
$lista=R::getAll( "SELECT productos.*, 
CASE WHEN s.pais='eua' 
	THEN CASE WHEN v.precio_usd is not null 
			THEN v.precio_usd ELSE productos.precio_usd END
	ELSE CASE WHEN v.precio_mxn is not null 
			THEN v.precio_mxn ELSE productos.precio_mxn END END as precio,
CASE WHEN v.id is not null THEN 1 else 0 END as has_inventary,
existencia
from productos 
LEFT JOIN inventarios as v 
on v.sucursal_id=".$_SESSION["sucursal_id"] ." AND v.producto_id=productos.id AND existencia>0 
LEFT JOIN sucursales as s
on s.id=".$_SESSION["sucursal_id"] 
. $where);


$products['list'] = "";
$products['status'] = true;
$products['arreglo']=$lista;
$server = "http://heladoschaps.com/application/storage/products/";
foreach ($lista as $key) {
	if(strlen($key['descripcion'])<40){
		$key['descripcion'].='<br><br>';
	}
	$clase="";
	$posible="1";
	if($key['has_inventary']==0){
		$clase="disable";
		$posible=0;
	}
	$products['list'] .= '<div class="col-lg-3 col-md-3 d-items-product-list '.$clase.'" onclick="agregarProducto(\'' . $key['nombre'] . '\',\'' . $key['precio'] . '\',\'' . $key['id'] . '\','.$posible.')">
	<div class="item-product-list">
		<img src="https://powergolden.com.mx/productos_img/'.$key['imagen'].'" alt="">
		<p class="t1">'.$key['nombre'].'</p>
		<p class="t2 two-lines">'.$key['descripcion'].'</p>
	</div>
</div>';

}

echo json_encode($products);
?>