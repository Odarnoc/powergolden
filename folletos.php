<?php

require 'user_preferences/user-info.php';

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

</head>

<body>

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
                                    <p class="title-cuenta">Folletos electrónicos</p>
                                    <p class="small-text-cuenta"></p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-buscar-productos">

                            <div class="col-lg-8 col-md-8">
                                <div class="d-buscar-l-p">
                                    <form action="" class="f-search-home">
                                        <div class="form-row">
                                            <div class="form-group col-lg-10 col-md-10 col-10">
                                                <input type="text" class="form-control input-search" placeholder="Buscar folleto">
                                            </div>

                                            <div class="form-group col-md-2 col-2 text-center">
                                                <a class="btn btn-search" href="#" role="button"><img src="images/icon-search-white.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="row row-listado-productos">

                            <div class="col-lg-6 col-md-6 d-all-item-pro">
                                <div class="d-item-folleto h-100">
                                    <div class="d-1" style="background-image: url(images/image-example.png)">
                                    </div>
                                    <div class="d-2">
                                        <p class="t1">Nombre del folleto</p>
                                        <p class="t2 two-lines mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum molestiae mollitia rem. Tempora reprehenderit, necessitatibus unde temporibus architecto sequi harum sapiente, delectus dolores consectetur itaque repellendus aliquid nisi, adipisci accusantium?</p>
                                        <a class="btn btn-ver-mas mt-3" href="folleto-individual.php" role="button"><i class="fas fa-eye"></i> Ver más</a>
                                    </div> 
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

    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/dashboard.js"></script>

</body></html>
