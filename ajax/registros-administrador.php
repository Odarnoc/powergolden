<?PHP
$MAC = exec('getmac'); 
$MAC = strtok($MAC, ' '); 

$url= $_SERVER["REQUEST_URI"];

    $registro = R::dispense('modificaciones');
    
    $registro->ip = $_SERVER['REMOTE_ADDR'];
    $registro->mac = $MAC;
    $registro->fecha = date('d-m-y H:i');;
    $registro->iduser = $_SESSION["user_id"];
    $registro->pagina = $url;

    R::store($registro);


?>
