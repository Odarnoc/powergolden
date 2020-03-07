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
                                    <p class="small-text-cuenta">Seleccionar método de pago</p>
                                </div>
                            </div>
                        </div>


                        <div class="row row-form-perfil footer-movil"> 
                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                            <form id="card_payment">

                                <div class="form-group">
                                    <div class="floating-label-group">
                                        <input type="text" id="nombre_tarjeta" data-openpay-card="holder_name" value="" class="form-control input-form-underline" required />
                                        <label class="floating-label-underline">Nombre en la tarjeta</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="floating-label-group">
                                        <input type="text" data-openpay-card="card_number" id="numero_tarjeta" value="" class="form-control input-form-underline" required />
                                        <label class="floating-label-underline">Número de tarjeta</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6 col-md-6">
                                        <div class="floating-label-group">
                                            <input type="text" id="vencimiento_tarjeta" data-openpay-card="expiration_month" value="" class="form-control input-form-underline" required />
                                            <label class="floating-label-underline">Mes Vencimiento</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <div class="floating-label-group">
                                            <input type="text" id="ano_vencimiento_tarjeta" data-openpay-card="expiration_year" value=""class="form-control input-form-underline" required />
                                            <label class="floating-label-underline">Año Vencimiento</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <div class="floating-label-group">
                                            <input type="text" id="cvv_tarjeta" data-openpay-card="cvv2" value="" class="form-control input-form-underline" required />
                                            <label class="floating-label-underline">CVV</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-btns-checkout mt-60">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <a href="carrito-ecomerce.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                                    </div>
                                    <div class=" col-lg-6 col-md-6 col-6">
                                        <a><button type="submit" id="boton" class="btn btn-lg-blue">Continuar <i class="fas fa-chevron-right"></i></button></a>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center mb">
                    <img class="img-mb" src="images/icon-atencion.png" alt="">
                    <p class="title-mb mt-20">Atención</p>
                    <p class="sub-title-mb">¿Desea eliminar el metodo de pago?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-aceptar-modal" onclick="confirmar()" >Aceptar</button>
                </div>
            </div>
        </div>
    </div>

            <!-- Admin Menu -->
            <?php include("menus/footer_general.php"); ?>
            <!-- End Admin Menu -->

    <!-- jQuery -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" 
        src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript' 
  src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
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
    <script src="js/metodo-pago-ecomerce.js"></script>


</body></html>