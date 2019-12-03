<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['data'] = null;
$response['mensaje'] = "Error en el servidor";

if(isset($_POST['name'])&&isset($_POST['last_name'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['pass'])){

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];
  
    $query = 'SELECT correo FROM `usuarios` WHERE correo= "'.$correo.'"';

    $registros_in=R::getAll($query);

    if(sizeof($registros_in) == 0){
            var_dump("Se agrego correctamente");
        
            $registro = R::dispense('usuarios');

            $registro->nombre = $nombre;
            $registro->telefono = $telefono;
            $registro->pass = $contrasena;
            $registro->correo = $correo;
            $registro->apellidos = $apellido;

            $id = R::store($registro);
    }else{
        error_mensaje("El correo ya esta registrado");
    }  
}else{
    error_mensaje("");
}



?>