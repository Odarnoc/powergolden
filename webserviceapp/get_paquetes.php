<?php

require 'conexion.php';


	$lista = R::findAll("paquetes");

$products['list'] = "";
$products['arreglo'] = $lista;
foreach ($lista as $key) {
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
}


echo json_encode($products);
?>