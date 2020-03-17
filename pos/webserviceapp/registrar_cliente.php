<?php
session_start();

require 'conexion.php';
$response['mensaje'] = "Se ha guardado al cliente con exito.";
$response['result']=true;
$pass = rand(1000, 9999);
$nombre = $_POST['name'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$telefono = $_POST['phone'];
$correo = $_POST['email'];
$direccion = $_POST['direccion'];


$query = 'SELECT correo FROM `usuarios` WHERE correo= "' . $correo . '"';

$registros_in = R::getAll($query);

if (sizeof($registros_in) == 0) {

    $registro = R::dispense('usuarios');

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->pass = $pass;
            $registro->correo = $correo;
            $registro->rol = 2;
            $registro->apellidos = $paterno.' '.$materno;
            $registro->referido = null;
            $id = R::store($registro);
                       
} else {
    $response['mensaje']="El correo ya esta registrado.";
    $response['result']=false;
}
echo json_encode($response);
?>
