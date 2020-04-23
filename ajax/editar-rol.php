<?php
session_start();

require '../bd/conexion.php';
require '../utils/error.php';

$response['mensaje'] = "Éxito al editar el rol.";

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
        $rol_id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $menus = $_POST['menus'];

        $rol = R::load('roles',$rol_id);
        $rol->nombre = $nombre;
        $rol->descripcion = $descripcion;

        R::store($rol);

        $privilegios = R::find('privilegios','rol_id = '.$rol_id);
        R::trashAll($privilegios);

        foreach ($menus as $item) { 
            $privilegio = R::dispense('privilegios');
    
            $privilegio->rol_id = $rol_id;
            $privilegio->menu_id = $item;
            R::store($privilegio);
        }
        
        echo json_encode($response);
        include 'registros-administrador.php';
?>