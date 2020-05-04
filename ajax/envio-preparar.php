<?php
require '../bd/conexion.php';
require '../utils/error.php';

$envio = R::load('envios',$_POST['id']);
$envio->estado = 1;
R::store($envio);




