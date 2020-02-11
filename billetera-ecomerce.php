<?php

require 'user_preferences/user-info.php';

$query = 'SELECT * FROM tarjetas WHERE idusuario = '.$_SESSION["user_id"];

$tarjeta=R::getAll($query); 

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

    <section class="sec-gray ">
        <div class="container">
            <div class="row">

            <?php include 'menus/lineas_asistencia.php'; ?>

            <div class="col-lg-9 col-md-6 bg-gray lista-productos-movil">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Billetera</p>
                                    <p class="small-text-cuenta">Deberás ingresar al menos un método de pago.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">

                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-tarjetas">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6" style="margin-left:auto; margin-right:auto;">

                                            <p class="sub-title-cuenta">Nueva tarjeta</p>

                                            <form action="" class="form-tarjetas">
                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="propietario" class="form-control input-form-underline" required />
                                                        <label class="floating-label-underline">Nombre en la tarjeta</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="numtarjeta" class="form-control input-form-underline" required />
                                                        <label class="floating-label-underline">Número en la tarjeta</label>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <div class="floating-label-group">
                                                            <input type="text" id="fecha" class="form-control input-form-underline" required />
                                                            <label class="floating-label-underline">MM/AA</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <div class="floating-label-group">
                                                            <input type="text" id="codigo" class="form-control input-form-underline" required />
                                                            <label class="floating-label-underline">CVV</label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <button type="button" id="registrar_tar" class="btn btn-lg-blue">Guardar</button>
                                                </div>

                                            </form>

                                        </div>

                                    </div>

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
    <!-- perfil scripts -->
    <script src="js/perfil.js"></script>
    <!-- billetera js -->
    <script src="js/billetera-add.js"></script>

</body></html>
