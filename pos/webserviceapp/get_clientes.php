<?php

require 'conexion.php';


$lista = R::find("usuarios", "rol=2");

$products['list'] = '<option value="0">Seleccionar cliente</option>';
$products['arreglo'] = $lista;
foreach ($lista as $key) {
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['nombre']." ".$key['apellidos'].'</option>';
}


echo json_encode($products);
?>