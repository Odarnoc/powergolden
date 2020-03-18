<?php
require 'user_preferences/user-info.php';

$query = 'SELECT nombre FROM usuarios WHERE rol = 1';

$querydos = 'SELECT SUM(total) as sumita FROM ventas where fecha = CURRENT_DATE()';

$querytres = 'SELECT id FROM visitas where fecha = CURRENT_DATE()';

$querys = 'SELECT * FROM  sucursales Where (id) != 1';
$sucursal = R::getAll($querys);

$querydoss= 'SELECT SUM(existencia) as existencias FROM inventarios  where sucursal_id != 1';

$producto = R::getAll($querydoss);

$fecha = R::getAll($querydos);
$usuario = R::getAll($query);
$visita = R::getAll($querytres);

?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/helper.css">
    <!-- responseive menu -->
    <link rel="stylesheet" href="css/menu-movil.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6"></div>
            </div>
        </div>
    </section>


    <!-- Top Menu -->
    <?php include("menus/top_menu.php"); ?>
    <!-- End Top Menu -->

    <!-- End Navbar ====
    	======================================= -->

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">
                <!-- Admin Menu -->
                <?php include("menus/menu_general_admin.php"); ?>
                <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Dashboard</p>
                                    <p class="small-text-cuenta"></p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                            <div class="col-lg-6 col-md-6">
                                <div class="clearfix d-item-num">
                                    <img src="images/icon-user.svg" alt="">
                                    <p class="t1"><?php echo count($usuario) ?></p>
                                    <p class="t2">Clientes</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="clearfix d-item-num">
                                    <img src="images/icon-bag.svg" alt="">
                                    <p class="t1">$<?php if ($fecha[0]['sumita'] == null) echo '0';
                                                    else echo ($fecha[0]['sumita']) ?></p>
                                    <p class="t2">Ventas de hoy</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="clearfix d-item-num">
                                    <img src="images/icon-eye.svg" alt="">
                                    <p class="t1"><?php echo count($visita) ?></p>
                                    <p class="t2">Visitas de hoy</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="clearfix d-item-num">
                                    <img src="images/icon-chart.svg" alt="">
                                    <p class="t1"><?php echo round($producto[0]['existencias']/count($sucursal))?></p>
                                    <p class="t2">Media</p>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-grafica-ventas">
                                    <p class="t1">Gráfica de ventas</p>
                                    <canvas height="400" id="myChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-40">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-grafica-ventas">
                                    <p class="t1">Gráfica de media</p>
                                    <canvas style="max-height: 400px;" id="myChartMedia"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Footer-->
    <?php include("menus/footer_general.php"); ?>
    <!-- End Footer -->


    <!-- jQuery -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/chart-ventas.js"></script>

</body>

</html>