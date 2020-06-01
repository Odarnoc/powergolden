<?PHP

require '../bd/conexion.php';
require '../utils/error.php';

$id = $_POST["user_id"];
//file_get_contents('https://powergolden.fxsoftware.mx/matriz_api.php?id='.$id);

$res = R::getAll(
    'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1',
    array(':idusuario' => $id)
);

$colorescss1 = json_decode($res[0]['colorescss']);
if (empty($colorescss)) {
    $rango = "Sin liderazgo";
} else {
    foreach ($colorescss1 as $co) {
        foreach ($co as $key => $value) {
            //echo "$('#".$key."').addClass('".$value."');";
            if ($key == $id && !empty($value)) {
                $rango = $value;
                break;
            }
        }
    }
}

echo json_encode($res[0]);

