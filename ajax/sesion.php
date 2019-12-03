<?php
require '../bd/conexion.php';
require '../utils/error.php';

$response['data'] = null;
$response['mensaje'] = "error en el servidor";

if(isset($_POST['email'])&&isset($_POST['pass'])){

    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];
  
    $query = 'SELECT * FROM `usuarios` WHERE correo= "'.$correo.'" &&  pass= "'.$contrasena.'"' ;

   $login_in=R::getAll($query);
    if(sizeof($login_in) == 0){
        error_mensaje('Usuario o contraseña invalido');
    }else{
        var_dump(json_encode($login_in[0]));
    }
}else{
    error_mensaje("Ingresar los campos");
}
?>