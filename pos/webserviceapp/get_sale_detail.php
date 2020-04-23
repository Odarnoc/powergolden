<?php
session_start();
require ('conexion.php');
$where="v.venta_id=".$_POST['id'];

$auxiliar=R::getAll( "SELECT v.*,p.nombre,
CASE WHEN i.existencia is not null THEN i.existencia ELSE 0 END as existencia
from productosxventas as v
LEFT JOIN productos as p on p.id=v.producto_id
LEFT JOIN inventarios as i on i.producto_id=v.producto_id and i.sucursal_id=".$_SESSION["sucursal_id"].
" WHERE ".$where);
$ventas['tabla']="";
$flag=false;
if ($auxiliar) {
    $flag=true;
	foreach ($auxiliar as $key) {
        if($key['cantidad']>$key['existencia']){
            $key['status']='<span class="badge badge-danger">No disponible</span>';
            $flag=false;
        }else{
            $key['status']='<span class="badge badge-success">En existencia</span>';
        }
        $ventas['tabla'].="<tr>".
        "<td>".$key['nombre']."</td>".
        "<td>".$key['cantidad']."</td>".
        "<td class='text-center'> ".$key['status']."</td>".
        "</tr>"
        ;
    }
    $ventas['inv']=$flag;

}

echo json_encode($ventas);
?>