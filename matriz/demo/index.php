<?php

use Nepster\Matrix\Coord;
use Nepster\Matrix\Matrix;
use Nepster\Matrix\MatrixRender;
use Nepster\Matrix\MatrixManager;
use Nepster\Matrix\MatrixPositionManager;

include $_SERVER['DOCUMENT_ROOT'].'/matriz/vendor/autoload.php';

$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$testTree = R::getAll("select  id,
        nombre,
        referido 
from    (select * from usuarios
         order by referido, id) clientes_sorted,
        (select @pv := '$id') initialisation
where   find_in_set(referido, @pv)
and     length(@pv := concat(@pv, ',', id))");
//var_dump($testTree);



$matrix = new Matrix(7, 2);
$matrixPositionManager = new MatrixPositionManager($matrix);
//$aMemberships = array('name' => 'Standard', 'avatar' => 'images/avatar-superman.jpg');
//var_dump($aMemberships);
$n = "prrr";
foreach ($testTree as $arbol) {
    //echo $arbol['id']."....................".$arbol['nombre']; 
    $n = $arbol['nombre'];
    $matrix->addTenant(null, function (Coord $coord) use (&$n): array {

        return [
            'name' => $n,
            'avatar' => 'images/cliente2.png',
        ];
    });
}
//$matrix->addTenant(null, function (Coord $coord): $aMemberships);

/*
$matrix->addTenant(null, function (Coord $coord): array {
    return [
        'name' => 'Superman',
        'avatar' => 'images/avatar-superman.jpg',
    ];
});

$matrix->addTenant(null, function (Coord $coord): array {
    return [
        'name' => 'Diana',
        'avatar' => 'images/avatar-wonder-woman.jpg',
    ];
});

$matrix->addTenant(null, function (Coord $coord): array {
    return [
        'name' => 'The Flash',
        'avatar' => 'images/avatar-flash.jpg',
    ];
});

$matrix->addTenant($matrixPositionManager->positionToCoord(6), function (Coord $coord): array {
    return [
        'name' => 'Batman',
        'avatar' => 'images/avatar-batman.jpg',
    ];
});

*/
// Matrix Render
$render = new MatrixRender($matrix);
$render->setOptions(['class' => 'matrix']);
$render->setDepthOptions(['class' => 'depth']);
$render->setGroupSeparatorOptions(['class' => 'matrix-group-separator']);
$render->setClearOptions(['style' => 'clear:both']);
$render->setGroupJoinOptions(['class' => 'matrix-join-group']);
$render->registerDepthCallback(function (Matrix $matrix, int $d, array $tenants): string {
    return '<div class="depth-counter">Depth ' . (++$d) . '</div>';
});
$render->registerCellCallback(function (Matrix $matrix, Coord $coord, $tenant) use ($matrixPositionManager): string {
    if ($tenant === null) {
        return '<div class="cell">
            ' . $matrixPositionManager->coordToPosition($coord) . '
            <div class="user">
                  <div class="avatar" style="background-image: url(images/cliente.png)"></div>
            </div>
            <div style="color: silver">free</div>
        </div>';
    }

    return '<div class="cell">
        ' . $matrixPositionManager->coordToPosition($coord) . '
        <div class="user">
              <div class="avatar" style="background-image: url(images/cliente-active.png)"></div>
              <!--<div class="matrix-user-info">
                Extra info
              </div> -->
        </div>
        <div class="user-name">' . $tenant['name'] . '</div>
    </div>';
});

?>




<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#FFFFFF">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#FFFFFF">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#FFFFFF">

    <link rel="icon" type="image/png" sizes="32x32" href="../../images/favicon.png">


    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .matrix {
            margin: auto;
            font-size: 12px;
        }

        .matrix .depth {
            min-height: 20px;
            margin: 20px auto;
            text-align: center;
            clear: both;
            background-color: white;
            border-radius: 10px;
            padding-bottom: 20px;
            -webkit-box-shadow: 0px 10px 44px -5px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 10px 44px -5px rgba(0, 0, 0, 0.05);

        }

        .matrix .depth-counter {
            margin-bottom: 10px;
            display: block;
            text-align: left;
            font-weight: bold;
            padding-left: 20px;
            padding-top: 15px;
            font-family: "Open Sans";
        }

        .matrix .user {
            width: 70px;
            height: 70px;
            overflow: hidden;
            margin: 5px auto;
        }

        .matrix .user .avatar {
            width: 70px;
            height: 70px;
            background-size: cover;
            overflow: hidden;
        }

        .matrix .user-name {
            white-space: nowrap;
        }

        .matrix .cell {
            display: inline-block;
            margin: 10px 0;
            padding: 5px 1px 5px 1px;
            overflow: hidden;
            text-align: center;
            font-family: "Open Sans";
            font-weight: 600;
        }

        .matrix .matrix-join-group {
            display: inline-block;
        }

        .matrix .matrix-group-separator {
            width: 10px;
            display: inline-block;
        }

        .matrix .matrix-user-info {
            display: none
        }

        .matrix .user:hover .matrix-user-info {
            display: block;
            position: absolute;
            width: 200px;
            min-height: 30px;
            border: double 3px silver;
            background: #8BAA79;
            padding: 10px;
            margin-left: -3px;
            margin-top: -3px;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>

    <title>Power Golden | El Mundo de la Herbolaria</title>
</head>

<body id="bodylogin">


    <section id="secformlogin">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <?= $render->show() ?>

                </div>
            </div>

        </div>

    </section>


    <div style="padding-bottom: 80px;"></div>


</body>

</html>