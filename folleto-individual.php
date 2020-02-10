<?php

require 'user_preferences/user-info.php';

$id = $_GET['key'];

$query = 'SELECT * FROM folletos where  id = "'.$_GET['id'].'"' ;

$res=R::getAll($query); 

$folletod = $res[0];

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
                                    <p class="title-cuenta">Folleto</p>
                                    <p class="small-text-cuenta"></p>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-folleto-ind">
                                <div class="d-img-pro-ind" style="background-image: url('images/folletos/<?php echo $folletod['imagen'] ?>'); height: 350px;
                                            background-size: cover;
                                            background-repeat: no-repeat; 
                                            ">
                                        </div>
                                    <div class="d-2">
                                        <p class="t1"><?php echo $folletod['nombre'] ?></p>
                                        <p class="t2"><?php echo $folletod['descripcion'] ?></p>
                                        <a class="btn btn-blue" download="<?php echo $folletod['imagen'] ?>" href="/images/folletos/" role="button"><i class="fas fa-arrow-circle-down"></i> Descargar folleto</a>
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

    <script src="js/bootstrap-input-spinner.js"></script>

    <script>
        $("input[type='number']").inputSpinner()
    </script>

</body></html>
