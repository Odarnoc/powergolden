<?php
session_start();
require ('conexion.php');
$where="sucursal_id=".$_SESSION["sucursal_id"];
if(isset($_POST['inicio'])&&$_POST['inicio']!=""){
    if($where!=""){
        $where.=" AND ";
    }
    $where.=" DATE(fecha)>='".$_POST['inicio']."'";
}
if(isset($_POST['fin'])&&$_POST['fin']!=""){
    if($where!=""){
        $where.=" AND ";
    }
    $where.=" DATE(fecha)<='".$_POST['fin']."'";
}
if($where!=""){
    $where=" WHERE ".$where;
}
$auxiliar=R::getAll("SELECT * from pagosexternos ".$where);
$ventas['tabla']="";
if ($auxiliar) {
	foreach ($auxiliar as $key) {
        if($key['is_payed']==1){
            $key['status']='<span class="badge badge-success">Pagado</span>';
        }else{
            $key['status']='<span class="badge badge-danger">Pago Pendiente</span>';
        }
        if($key['oxxo']==1){
            $key['oxxo']='<span class="badge badge-info">Pago en oxxo</span>';
        }else{
            $key['oxxo']='';
        }
        $ventas['tabla'].="<tr>".
        "<td>".$key['descripcion']."</td>".
        
        "<td>$".number_format($key['total'], 2)."</td>".
        "<td>".$key['fecha']."</td>".
        "<td>".$key['oxxo']."</td>".
        "<td>".$key['referencia']."</td>".
        "<td>".$key['status']."</td>".
        "</tr>"
        ;
    }
}

echo json_encode($ventas['tabla']);
?>