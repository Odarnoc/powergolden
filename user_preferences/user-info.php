<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}
if($_SESSION["rol"]== 1 || $_SESSION["rol"]==2){
    header("Location: index.php");
}
require 'bd/conexion.php';

$information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);

?>