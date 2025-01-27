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

    <!-- OpenPay -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



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
                                    <p class="title-cuenta">Método de pago</p>
                                    <p class="small-text-cuenta">Introducir los datos de pago</p>
                                </div>
                            </div>
                        </div>


                        <div class="row row-form-perfil footer-movil">
                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <form method="POST" id="payment-forms">
                                    <input type="hidden" name="token_id" id="token_id">
                                    <input type="hidden" name="use_card_points" id="use_card_points" value="false">

                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input required type="text" autocomplete="off" data-openpay-card="holder_name" id="nombre_tarjeta" class="form-control input-form-underline" required />
                                            <label class="floating-label-underline">Nombre en la tarjeta</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input required type="text" autocomplete="off" data-openpay-card="card_number" id="numero_tarjeta" class="form-control input-form-underline" required />
                                            <label class="floating-label-underline">Número de tarjeta</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6 col-md-6">
                                            <div class="floating-label-group">
                                                <input required type="text" data-openpay-card="expiration_month" id="mes_vencimiento_tarjeta" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Mes Vencimiento</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6">
                                            <div class="floating-label-group">
                                                <input required type="text" data-openpay-card="expiration_year" id="ano_vencimiento_tarjeta" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Año Vencimiento</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6">
                                            <div class="floating-label-group">
                                                <input required type="text" autocomplete="off" data-openpay-card="cvv2" id="cvv_tarjeta" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">CVV</label>
                                                <input type="number" class="form-control input-form-border" id="cantidad_tarjeta" value="10" required hidden />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-btns-checkout mt-60">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <a href="nuevo-envio-ecomerce.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-6">
                                            <button type="submit" id="pay-button" class="btn btn-lg-blue">Continuar <i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </form>
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

    <script src="js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
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
    <!-- responseive menu -->
    <script src="js/confirmar-tarjeta-ecomerce.js"></script>


</body>

</html>