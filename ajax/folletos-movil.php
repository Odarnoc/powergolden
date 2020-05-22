<?PHP
    require '../bd/conexion.php';
    require '../utils/error.php';

$query='SELECT * FROM folletos';

$prods=R::getAll($query);

echo json_encode($prods);

?>