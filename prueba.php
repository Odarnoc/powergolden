<?php

require 'bd/conexion.php';
$productos=R::getAll("SELECT * FROM prueba");
var_dump($productos);

?>