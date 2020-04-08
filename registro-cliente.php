<?php

session_start();

require 'bd/conexion.php';

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
    <link rel="stylesheet" href="css/secundary-style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/helper.css">
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

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3 bg-white">
                    <div style="margin-top: 100px">

                    </div>
                </div>

                <div class="col-lg-9 col-md-9 bg-gray">
                    <div class="d-cont-right">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                                <div class="d-form">
                                    <p class="title-cuenta">Registro clientes.</p>
                                    <form id="form-folleto" class="form-registro" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="name" required />
                                                <label class="floating-label">Nombre</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="paterno" required />
                                                <label class="floating-label">Apellido paterno</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="materno" required />
                                                <label class="floating-label">Apellido materno</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="tel" class="form-control input-form-underline" name="phone" required />
                                                <label class="floating-label">Teléfono</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="email" class="form-control input-form-underline" name="email" required />
                                                <label class="floating-label">Correo electrónico</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="contrasena" required />
                                                <label class="floating-label">Contraseña</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="contrasenados" required />
                                                <label class="floating-label">Repetir contraseña</label>
                                            </div>
                                        </div>

                                        <button class="btn btn-lg-blue mt-30" id="registrar_us_ofice">Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

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
    <script src="js/Chart.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>
    <!-- registro scripts -->
    <script src="js/registro-cliente.js"></script>


</body>

</html>