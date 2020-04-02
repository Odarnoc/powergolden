<?php

require 'conexion.php';

if($_POST['tipo']==0){
	$lista=R::getAll( "SELECT u.* from usuarios as u 
	
	WHERE rol=1 ");
}else{
	$lista=R::getAll( "SELECT u.* from usuarios as u 
	left join independientes as i on i.usuario_id=u.id
	WHERE rol=2 and i.id is not null");
}

$products['list'] = '<option value="0">Seleccionar cliente</option>';
$products['arreglo'] = $lista;
foreach ($lista as $key) {
	$products['list'] .= '<option value="'.$key['id'].'">'.$key['id'].' - '.$key['nombre']." ".$key['apellidos'].'</option>';
}


echo json_encode($products);
?>