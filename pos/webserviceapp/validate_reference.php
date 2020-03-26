<?php

require 'conexion.php';


$lista = R::find("referencias", "referencia='".$_POST['referencia']."'");
$data=null;
if($lista){
    foreach ($lista as $key) {
        $data=$key;
    break;
    }
    
    if($data['status']!=0){
        $data['resultado']=false;
        $data['mensaje']="Esta referencia ya ha sido cobrada con anterioridad. Intente de nuevo, por favor.";
    }else{
        $data['resultado']=true;
    }
}else{
    $data['resultado']=false;
    $data['mensaje']="La referencia de pago no ha sido encontrada. Intente de nuevo, por favor.";
}

echo json_encode($data);
?>