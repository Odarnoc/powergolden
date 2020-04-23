<?php
session_start();
require 'conexion.php';
$lista = R::getAll("SELECT * from ventasentregas WHERE referencia='" . $_POST['ref'] . "' AND id=" . $_POST['id']);
$data['resultado'] = false;
$data['mensaje'] = "Esta referencia no es correcta, favor de revisar nuevamente.";
if ($lista) {
    $elemento = $lista[0];

    $lista = R::exec("UPDATE ventasentregas as v set status=1,fecha_entrega='" . date("Y-m-d H:i:s") . "' where id=" . $_POST['id']);
    $data['resultado'] = true;
    $data['mensaje'] = "Se ha completado el proceso de entrega con exito.";

    $where = "v.venta_id=" . $elemento['id_venta'];

    $auxiliar = R::getAll("SELECT v.*,p.nombre,
   CASE WHEN i.existencia is not null THEN i.existencia ELSE 0 END as existencia
   from productosxventas as v
   LEFT JOIN productos as p on p.id=v.producto_id
   LEFT JOIN inventarios as i on i.producto_id=v.producto_id and i.sucursal_id=" . $_SESSION["sucursal_id"] .
        " WHERE " . $where);
    foreach ($auxiliar as $key) {
        R::exec("UPDATE inventarios set existencia=existencia-" . $key['cantidad'] . " WHERE  producto_id=" . $key['producto_id'] . " AND
            sucursal_id=" . $_SESSION["sucursal_id"]);
    }

}

echo json_encode($data);
