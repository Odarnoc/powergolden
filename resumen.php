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

    <style>
        .margen {
            margin-left: 3rem !important;
        }

        .margend {
            margin-left: 3rem !important;
        }
    </style>

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
                                    <p class="title-cuenta">Resumen</p>
                                    <p class="small-text-cuenta">Revisa tu orden antes de confirmar el pago. </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="d-tabla-review">
                                    <div class="table-responsive">
                                        <div class="d-title-cuenta">
                                            <h6>Datos de envio</h6>
                                            <p class="margen" style="margin-bottom: 1px"></p>
                                            <p id="nombreuser"></p>
                                            <a class="small-text-cuenta" id="direccion"></a>
                                            <div><a class="small-text-cuenta" id="col"></a>, <a class="small-text-cuenta" id="ciudad"></a></div>
                                            <div><a class="small-text-cuenta" id="psotal"></a>,<a class="small-text-cuenta" id="estados"></a> </div>
                                            <p class="small-text-cuenta ml-4 margend"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-tabla-review">
                                    <div class="table-responsive">
                                        <div class="d-title-cuenta">
                                            <h6>Datos de tarjeta</h6>
                                            <div class="">
                                                <div class="form-group" style="margin-bottom: 1px">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <p style="margin-bottom: 0;" class="t2">XXXX - XXXX - XXXX - <a id="tarnumero"></a> </p>
                                                        </label>
                                                    </div>
                                                    <p style="padding-left: 3px " class="small-text-cuenta ml-3">Expiracion: <a class="small-text-cuenta" id="mestar"></a>/<a class="small-text-cuenta" id="anotar"></a></p>
                                                    <br>
                                                    <h6 style="padding-left: 3px " class="ml-3">Monto total: $<a id="totalgeneral"></a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="d-tabla-review">
                            <div class="table-responsive">
                                <table class="table table-borderless table-review">
                                    <h6>Articulos.</h6>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="th-producto-review">Producto</th>
                                            <th class="th-precio-review">Precio</th>
                                            <th class="th-cantidad-review">Cantidad</th>
                                            <th class="th-total-review">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista-productos">
                                    </tbody>
                                </table>
                            </div>

                            <form method="POST" id="payment-form">
                                <div class="row row-btns-checkout mt-40">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <a href="tarjetas-ecomerce.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                                    </div>
                                    <input type="hidden" name="token_id" id="token_id">

                                    <input type="hidden" name="use_card_points" id="use_card_points" value="false">

                                    <input type="hidden" id="nomtarenv" class="form-control input-form" required type="text" autocomplete="off" data-openpay-card="holder_name" />

                                    <input type="hidden" id="numtarenv" class="form-control input-form" required type="text" autocomplete="off" data-openpay-card="card_number" />

                                    <input type="hidden" id="mestarenv" class="form-control input-form" required type="text" data-openpay-card="expiration_month" />

                                    <input type="hidden" id="anotarenv" class="form-control input-form" required type="text" data-openpay-card="expiration_year"></input>

                                    <input type="hidden" id="ccvtar" class="form-control input-form" required type="text" autocomplete="off" data-openpay-card="cvv2"></input>

                                    <div class="col-lg-6 col-md-6 col-6">
                                        <button type="submit" id="pay-button" class="btn btn-lg-blue">Comprar <i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </form>

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
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/menu-movil.js"></script>
    <script src="js/resumen.js"></script>
    <script src="js/finalizar-compra.js"></script>
    <script src="js/metodo-pago-ecomerce.js"></script>



    <script>
        var radioValue = $("input[name='id']:checked").val();
    </script>

</body>

</html>