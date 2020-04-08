<?php
session_start();
require 'conexion.php';

$lista = R::exec("UPDATE ventas as v set is_payed=1 where id=".$_POST['venta'] );


?>