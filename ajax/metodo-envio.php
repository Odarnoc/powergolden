<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);

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

    <section class="sec-gray" style="margin-top:55px">
        <div class="container">
            <div class="row">

            <?php include 'menus/lineas_asistencia.php'; ?>

                <div class="col-lg-9 col-md-6 bg-gray lista-productos-movil">
                
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Método de envío</p>
                                    <p class="small-text-cuenta">Seleccionar el método de envío </p>
                                </div>
                            </div>
                        </div>


                        <div class="row row-form-perfil footer-movil"> 
                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                                <form class="form-delivery-checkout">

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                FedEx Nacional Mismo Día
                                            </label>
                                        </div>
                                        <p class="small-text-cuenta ml-4">Entrega el mismo día hábil.</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                FedEx Nacional 8:30 AM
                                            </label>
                                        </div>
                                        <p class="small-text-cuenta ml-4">Entrega a las 8:30 am del siguiente día hábil.</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3">
                                            <label class="form-check-label" for="exampleRadios3">
                                                FedEx Nacional 10:30 AM
                                            </label>
                                        </div>
                                        <p class="small-text-cuenta ml-4">Entrega a las 10:30 am del siguiente día hábil.</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="4">
                                            <label class="form-check-label" for="exampleRadios4">
                                                FedEx Nacional día siguiente
                                            </label>
                                        </div>
                                        <p class="small-text-cuenta ml-4">Entrega antes del final del siguiente día hábil.</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="5">
                                            <label class="form-check-label" for="exampleRadios5">
                                                FedEx Nacional económico
                                            </label>
                                        </div>
                                        <p class="small-text-cuenta ml-4">Entrega disponible entre 2 a 5 días habiles.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="row row-btns-checkout mt-60">
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="nuevo-envio.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                            </div>
                            <div class=" col-lg-6 col-md-6 col-6">
                                <a href="resumen.php"><button type="button" class="btn btn-lg-blue">Continuar <i class="fas fa-chevron-right"></i></button></a>
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
    <script src="js/menu-movil.js"></script>

</body></html>
