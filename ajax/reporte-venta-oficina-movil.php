<?php
    require '../bd/conexion.php';
    require '../utils/error.php';



    if(!isset($_POST['fechauno'])||!isset($_POST['fechados'])){
    $query = 'SELECT * FROM ventascliente WHERE user_id ="'.$_POST["user_id"].'"' ;
    }else{
    $query = 'SELECT * FROM ventascliente WHERE user_id ="'.$_POST["user_id"].'" and fecha BETWEEN "'.$_POST['fechauno'].'" and "'.$_POST['fechados'].'"';
    $filtro = $_POST['fechauno'];
    $filtrodos = $_POST['fechados'];
    }

    $datos=R::getAll($query);

    echo json_encode($datos);

?>