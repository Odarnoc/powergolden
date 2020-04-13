<?php

require 'user_preferences/user-info.php';

$query = 'SELECT nombre FROM usuarios WHERE rol = 1';

$querydos = 'SELECT SUM(total) as sumita FROM ventas where fecha = CURRENT_DATE()';

$querytres = 'SELECT id FROM visitas where fecha = CURRENT_DATE()';

$querycuatro = 'SELECT MONTH(fecha), COUNT(*) FROM ventas WHERE YEAR(fecha) = YEAR(now()) GROUP BY YEAR(fecha), MONTH(fecha)';

$fecha=R::getAll($querydos);
$usuario=R::getAll($query);
$visita=R::getAll($querytres);




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

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

    <title>Power Golden | El Mundo de la Herbolaria</title>

    <style>
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

        .sec-matriz {
            padding-top: 100px;
            padding-bottom: 100px;
            background-color: #F4F4F4;
        }
    </style>

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
                                    <p class="title-cuenta">Matriz de clientes</p>
                                    <p class="small-text-cuenta"></p>
                                </div>
                            </div>

                        </div>

                        <?php include("matriz/demo/index.php"); ?>

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

    <!-- custom scripts -->
    <script src="js/main-perfil.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/scripts.js"></script>

</body></html>
