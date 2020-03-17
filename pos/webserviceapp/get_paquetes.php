<?php
session_start();
require 'conexion.php';


	$lista = R::findAll("paquetes");

$products['list'] = "";
$products['arreglo'] = $lista;
foreach ($lista as $key) {
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
}
$auxiliar=R::getAll( "SELECT frase as frase from sucursales
WHERE id=".$_SESSION["sucursal_id"]);

$products['frase']=$auxiliar[0]['frase'];
if($products['frase']==null){
    $ventas['frase']="";
}

echo json_encode($products);
?>