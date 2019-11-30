<?php
require 'bd/conexion.php';
$productos=R::getAll("SELECT * FROM registro");
var_dump($productos);

?>