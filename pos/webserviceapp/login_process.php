<?php

require ('conexion.php');
session_start();
$url="application/storage/products/";

$user = $_POST['username'];
$pass = $_POST['password'];

$lista=R::find( 'usuarios', "(id= ".$user.")  and rol!=2 and pass= \"".$pass."\"" );
$usuario="false";
if($lista){
	foreach ($lista as $key ) {
		$_SESSION['valid'] = true;
		$_SESSION['timeout'] = time();
		//$_SESSION['username'] = $key['nombre'].' '.$key['ape_paterno'].' '.$key['ape_materno'];
		$_SESSION['username'] = $key['nombre'].' '.$key['apellidos'];
		$_SESSION['user_id']=$key['id'] ;
		$_SESSION['rol']=$key['rol'] ;
		$aux=R::find( 'sucursales', "id= ".$key['sucursal_id'] );
		
		if($aux){
			$_SESSION['sucursal']=$aux[$key['sucursal_id']]['nombre'];
		}else{
			$_SESSION['sucursal']="";
		}
	
		$_SESSION['sucursal_id']=$key['sucursal_id'] ;
		$usuario=$key;
		break;
	}
}
echo $usuario;
?>