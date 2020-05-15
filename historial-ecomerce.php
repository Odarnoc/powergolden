<?php

session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$user_id = $_SESSION["user_id"];

$query="SELECT p.*,pxv.cantidad,v.fecha FROM productosxventas as pxv LEFT JOIN ventas as v ON pxv.venta_id = v.id LEFT JOIN productos as p ON pxv.producto_id = p.id WHERE v.user_id=".$_SESSION["user_id"]." order by v.fecha desc";

$historial=R::getAll($query);

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


                <!-- Menu -->
                <?php include("menus/menu_general.php"); ?>
                <!-- End Menu -->


    <!-- End Navbar ====
            ======================================= -->

        <section class="sec-gray separar-menu">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="d-cont-right perfil-movil">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="d-title-cuenta">
                                        <p class="title-cuenta">Mis compras</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-form-perfil">
                                <div class="col-lg-12 col-md-12">
                                    <div class="d-form-perfil">
                                        <form class="form-perfil">

                                            <div class="form-row">
                                                <center>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div id="lista-productos">
                                                            
                                                            
                                                            <?php foreach ($historial as $item) { ?>
                                                                <div class="d-item-carrito">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 col-4">
                                                                            <div class="d-img-carrito">
                                                                                <img src="productos_img/<?php echo $item['imagen'] ?>" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8 col-8">
                                                                            <div class="d-info-carrito" style="text-align: left;">
                                                                                <p class="t1 one-line"><?php echo $item['nombre'] ?></p>
                                                                                <p class="t2 one-line"><?php echo $item['descripcion'] ?></p>
                                                                                <p class="t2 one-line">Cantidad: <?php echo $item['cantidad'] ?></p>
                                                                                <p class="t2 one-line">Fecha: <?php echo substr($item['fecha'], 0, 11); ?></p>
                                                                                <p class="t3">$<?php echo $item['precio'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            
                                                        </div>
                                                    </div>
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>

                <!-- Admin Menu -->
                <?php include("menus/footer_general.php"); ?>
                <!-- End Admin Menu -->


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

    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

        <!-- responseive menu -->
        <script src="js/menu-movil.js"></script>
        <script src="js/Chart.js"></script>
        <script src="js/chart-oficina.js"></script>

    </body></html>
