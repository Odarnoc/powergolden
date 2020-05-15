<?php

require 'conexion.php';

if($_POST['tipo']==0){
	$lista=R::getAll( "SELECT u.* from usuarios as u 
	
	WHERE rol=1 ");
}else{
	$lista=R::getAll( "SELECT u.id,u.nombre,u.apellidos,u.telefono,u.correo,CASE WHEN SUM(p.id) is not null 
	THEN SUM(p.id) ELSE 0 END as compras,facturacion, rfc, nombrecomercial, numeroexterior, municipio, i.estado, i.pais from usuarios as u 
	left join independientes as i on i.usuario_id=u.id
	left join ventas as v on v.user_id=u.id
	left join ventaspaquetes as p on p.venta_id=v.id
	WHERE rol=2 and i.id is not null
	GROUP BY u.id,u.nombre,u.apellidos,u.telefono,u.correo,facturacion, rfc, nombrecomercial, numeroexterior, municipio, i.estado, i.pais");
}

$products['list'] = '<option value="0">Seleccionar cliente</option>';
//$products['arreglo'] = $lista;
foreach ($lista as $key) {
	$products['arreglo'][$key['id']]=$key;
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['id'].' - '.$key['nombre']." ".$key['apellidos'].'</option>';
}


echo json_encode($products);
?>