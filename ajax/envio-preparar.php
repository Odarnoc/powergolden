<?php
require '../bd/conexion.php';
require '../utils/error.php';

$envio = R::load('referenciaenvios',$_POST['id']);
$envio->estado = 1;
R::store($envio);




