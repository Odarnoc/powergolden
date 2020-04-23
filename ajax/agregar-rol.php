<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Éxito al agregar el rol.";

if(empty($_POST['nombre'])){
    error_mensaje('Ingresar un nombre par el rol.');
    return;
}

if(empty($_POST['descripcion'])){
    error_mensaje('Ingresar una descripción.');
    return;
}

if(empty($_POST['menus'])){
    error_mensaje('Seleccione al menos un privilegio.');
    return;
}

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $menus = $_POST['menus'];

        $rol = R::dispense('roles');
        $rol->nombre = $nombre;
        $rol->descripcion = $descripcion;

        $rol_id = R::store($rol);

        foreach ($menus as $item) { 
            $privilegios = R::dispense('privilegios');
    
            $privilegios->rol_id = $rol_id;
            $privilegios->menu_id = $item;
            R::store($privilegios);
        }
        
        echo json_encode($response);
        include 'registros-administrador.php';
?>