<?PHP
    require '../bd/conexion.php';
    require '../utils/error.php';

$query='SELECT * FROM folletos WHERE id ='.$_POST['folleto_id'];

$folleto=R::getAll($query);

echo json_encode($folleto);

?>