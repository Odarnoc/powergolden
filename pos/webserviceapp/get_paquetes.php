<?php
session_start();
require 'conexion.php';


$lista=R::getAll( "SELECT paquetes.*, 
CASE WHEN s.pais='eua' 
	THEN paquetes.precio_usd 
	ELSE paquetes.precio END as precio
from paquetes 
LEFT JOIN sucursales as s
on s.id=".$_SESSION["sucursal_id"] 
);


$products['list'] = "";

foreach ($lista as $key) {
	$products['arreglo'][$key['id']]=$key;
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
}
$auxiliar=R::getAll( "SELECT frase as frase,pais from sucursales
WHERE id=".$_SESSION["sucursal_id"]);

$products['frase']=$auxiliar[0]['frase'];
$products['pais']=$auxiliar[0]['pais'];
if($products['frase']==null){
    $ventas['frase']="";
}

echo json_encode($products);
?>