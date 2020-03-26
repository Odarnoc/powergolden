<?php
session_start();
require ('conexion.php');
$where="";
if($_POST['buscar']!=''){
    $where=" WHERE (nombre like '%{$_POST['buscar']}%' OR descripcion like '%{$_POST['buscar']}%' )";
}
$join="v.sucursal_id=".$_SESSION["sucursal_id"];
$auxiliar=R::getAll( "SELECT *, CASE WHEN existencia is not null THEN existencia ELSE 0 END as existencia,
CASE WHEN limite_inventario is not null THEN limite_inventario ELSE 0 END as limite_inventario
from productos as p
LEFT JOIN inventarios as v on v.producto_id=p.id AND ".$join.$where
);
$ventas['tabla']="";
if ($auxiliar) {
	foreach ($auxiliar as $key) {
        $ventas['tabla'].="<tr>".
        '<td class="td-img"><img src="https://powergolden.com.mx/productos_img/'.$key['imagen'].'" alt=""></td>'.
        "<td>".$key['nombre']."</td>".
        "<td>".$key['existencia']."</td>".
        "<td>".$key['limite_inventario']."</td>".
        "</tr>"
        ;
    }
}


echo json_encode($ventas);
?>