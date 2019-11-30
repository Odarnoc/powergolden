<?php
require '../bd/conexion.php';

if(isset($_POST['name'])&&isset($_POST['last_name'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['pass'])){

    

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $telefono = $_POST['phone'];
    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];
  
    $query = 'SELECT correo FROM `usuarios` WHERE correo= "'.$correo.'"';
    var_dump($query);
   

    $registros_in=R::getAll($query);

    if(sizeof($registros_in) == 0){
        var_dump("te puedo agregar");
    
        $registro = R::dispense('usuarios');
        $registro->nombre = $nombre;
        $registro->telefono = $telefono;
        $registro->pass = $contrasena;
        $registro->correo = $correo;
        $registro->apellidos = $apellido;

          $id = R::store($registro);

    }else{
        var_dump("ta mal chavo");

    }



    /*if($id != null){
        var_dump("Usuario almacenado con exito");
    }*/

    
}else{
    var_dump("Ingresar los campos");
}



?>