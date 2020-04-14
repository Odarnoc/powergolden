<?php

require 'conexion.php';


$lista = R::find("independientes", "status=0");

$products['list'] = "";
$products['arreglo'] = $lista;
foreach ($lista as $key) {
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
}


echo json_encode($products);
?>