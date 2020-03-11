<?php

require ('conexion.php');
session_start();
$url="application/storage/products/";

$user = $_POST['username'];
$pass = $_POST['password'];

$lista=R::find( 'usuarios', "(correo= \"".$user."\") and pass= \"".$pass."\"" );
$usuario="false";
if($lista){
	foreach ($lista as $key ) {
		$_SESSION['valid'] = true;
		$_SESSION['timeout'] = time();
		//$_SESSION['username'] = $key['nombre'].' '.$key['ape_paterno'].' '.$key['ape_materno'];
		$_SESSION['username'] = $key['nombre'].' '.$key['apellidos'];
		$_SESSION['user_id']=$key['id'] ;
		$usuario=$key;
		break;
	}
}
echo $usuario;
?>