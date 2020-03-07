<?php

require 'conexion.php';

$url = "application/storage/products/";
$where="";
if ($_POST['product'] != '' OR $_POST['category']!=0) {
	if($_POST['product']!=''){
		$where.="(nombre like '%{$_POST['product']}%' OR descripcion like '%{$_POST['product']}%' )";
	}
	if($_POST['category']!=0){
		if($where!=""){
			$where.=' AND ';
		}
		$where.=" categoria=".$_POST['category'];
	}
	$lista = R::find("productos", $where);
} else {
	$lista = R::findAll("productos");
}

$products['list'] = "";
$products['status'] = true;
$server = "http://heladoschaps.com/application/storage/products/";
foreach ($lista as $key) {
	if(strlen($key['descripcion'])<40){
		$key['descripcion'].='<br><br>';
	}
	$products['list'] .= '<div class="col-lg-3 col-md-3 d-items-product-list" onclick="agregarProducto(\'' . $key['nombre'] . '\',\'' . $key['precio'] . '\',\'' . $key['id'] . '\')">
	<div class="item-product-list">
		<img src="https://powergolden.com.mx/productos_img/'.$key['imagen'].'" alt="">
		<p class="t1">'.$key['nombre'].'</p>
		<p class="t2 two-lines">'.$key['descripcion'].'</p>
	</div>
</div>';

}

echo json_encode($products);
?>