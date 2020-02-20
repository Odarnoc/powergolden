<?php
    session_start();
    require 'bd/conexion.php';

    $user_id=-1;
    if(isset($_SESSION["user_id"])){
    $user_id=$_SESSION["user_id"];
    }

    $productos=R::find( 'ventascliente', 'user_id = '.$user_id);


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


    <section class="sec-gray">
        <div class="container">
            <div class="row">
                
                <?php include 'menus/lineas_asistencia.php'; ?>
                <div class="col-lg-9 col-md-6 lista-productos-movil">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <p class="title-sec mb-20">Mis ventas</p>
                        </div>
                    </div>

                    <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">

                                <div class="d-form-reporte">
                                    <a type="button" style="margin-top: 0rem!important; height: 37px;margin-bottom:2rem;" href="nueva-venta-oficina.php" class="btn btn-blue mt-2"><i class="fas fa-arrow-circle-down mr-2"></i>Nueva venta</a>
                                </div>
                            </div>
                        </div>

                        <div class="row row-tabla-ventas">
                            <div class="col-lg-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>Fecha</th>
                                                <th>Cliente</th>
                                                <th>Venta</th>
                                                <th>Total</th>
                                                <th>Cobrado</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($productos as $item) { ?>
                                            <tr>
                                                <td><?php echo $item->fecha ?></td>
                                                <td><?php echo $item->nombre ?></td>
                                                <td><?php echo $item->venta ?></td>
                                                <td>$<?php echo $item->total ?></td>
                                                <td><?php 
                                                    if ($item->cobrado === 1 || $item->cobrado === "1" ) {
                                                       echo "Si";
                                                    }else{
                                                        echo "No";
                                                    }
                                                ?></td>
                                            </tr>
                                        <?php } ?>  
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">

        <div class="d-asistencia-movil">

            <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <div class="d-img-asistencia">
                <img src="images/icon-asistencia.svg" alt="">

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-6 valign">
                <div class="d-info-asistencia">

                <p class="t1">Asistencia</p>
                <p class="t2"><a href="tel:3331227000">33 3122 7000</a></p>

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
    <script src="js/scripts.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <!-- registro scripts -->
    <script src="js/registro-oficina.js"></script>

    </body></html>