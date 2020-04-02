<?php
session_start();
require ('conexion.php');
$where="";
if($_POST['buscar']!=''){
    $where=" WHERE rol in (2,1) AND (nombre like '%{$_POST['buscar']}%' OR apellidos like '%{$_POST['buscar']}%' OR  concat(id,'') like '%{$_POST['buscar']}%' )";
}
$join="v.sucursal_id=".$_SESSION["sucursal_id"];
$auxiliar=R::getAll( "SELECT * from usuarios ".$where
);
$ventas['tabla']="";
if ($auxiliar) {
	foreach ($auxiliar as $key) {
		if($key['rol']==1){
			$key['rol']="Cliente Temporal";
		}else{
			$key['rol']="Empresario Independiente";
		}
        $ventas['tabla'].="<tr>".
     
		"<td>".$key['id']." - ".$key['nombre'].' '.$key['apellidos']."</td>".
		"<td>".$key['rol']."</td>".
		"<td>".$key['correo']."</td>".
		"<td>".$key['direccion']."</td>".
		"<td>".$key['telefono']."</td>".
        
        "</tr>"
        ;
    }
}


echo json_encode($ventas);
?>