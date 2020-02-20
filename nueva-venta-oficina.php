<?php
    session_start();
    require 'bd/conexion.php';

    $user_id=-1;
    if(isset($_SESSION["user_id"])){
        $user_id=$_SESSION["user_id"];
    }


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
                <div class="col-lg-6 col-md-6 lista-productos-movil mt-4" style="margin-right: auto;margin-left: auto;">
                    <form class="form-perfil">
                                        <div class="col-lg-12 col-md-12" style="padding-left: 0">
                                            <p class="title-sec mb-60">Nueva venta</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-12 col-md-12">

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="nombre" class="form-control input-form-underline"/>
                                                        <label class="floating-label-underline">Nombre del cliente</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="desc" class="form-control input-form-underline"/>
                                                        <label class="floating-label-underline">Descripción venta</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="total" class="form-control input-form-underline"/>
                                                        <label class="floating-label-underline">Total</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                        <label class="mb-10" style="font-size: 12px;color: rgba(0, 0, 0, .5);">Cobrado?</label>
                                                        <br>
                                                        <input type="checkbox" id="cobrado" value="second_checkbox">
                                                </div>

                                                <div class="form-group" style="text-align: center;">
                                                    <button type="button" onclick="guardar()" style="width: 100%" class="btn btn-lg-blue">Guardar</button>
                                                </div>


                                            </div>
                                        </div>
                                    </form>

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

    <script src="js/nueva-venta-oficina.js"></script>

    </body></html>
