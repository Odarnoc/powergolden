<?php
session_start();
require 'bd/conexion.php';
$user_id = $_SESSION["user_id"];

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
    <link rel="stylesheet" href="css/secundary-style.css">

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
                                    <p name="mensajeini" class="small-text-cuenta">Debido a que su cuenta estuvo inactiva por más de 59 días se le cobrara una reactivacion. </p>
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
                                            <h6>Desglose de total</h6>
                                            <div class="">
                                                <div class="form-group" style="margin-bottom: 1px">
                                                    <p id="nombreuser"></p>
                                                    <h6 style="padding-left: 3px " class="small-text-cuenta">Monto total: $<a id="ton"></a></h6>
                                                    <h6 style="padding-left: 3px " class="small-text-cuenta">IVA incluido: $<a id="iva"></a></h6>
                                                    <h6 id="rectiva" name="recar" style="padding-left: 3px " class="small-text-cuenta">Cargo de reactivacion: $500</h6>
                                                    <h6 id="txenv" name="recar" style="padding-left: 3px " class="small-text-cuenta">Envio: $<span id="env"></span></h6>
                                                    <h6 style="padding-left: 3px " class="small-text-cuenta">Monto total general: $<a id="totalgeneral"></a></h6>
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

                            <div class="row row-btns-checkout mt-40">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <a href="nuevo-envio-oficina.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <button type="submit" data-toggle="modal" data-target="#modalPagar" class="btn btn-lg-blue">Comprar <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Metodo de pago -->
        <div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Metodo de pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="button" class="btn btn-lg-modal" onclick='$("#modalTarjeta").modal("toggle");'><i class="fas fa-credit-card mr-2"></i> Pago con tarjeta</button>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="button" class="btn btn-lg-modal btn-pago-tarjeta" onclick="referencia()"><i class="fas fa-credit-card mr-2"></i> Pago en tienda con referencia</button>
                            </div>
                            <!--<div class="col-lg-6 col-md-6 col-4">
                                <button type="button" class="btn btn-lg-modal" data-toggle="modal" data-target="#modalTarjetaP"><i class="fas fa-credit-card mr-2"></i> Pago con Tarjeta</button>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4">
                                <button type="button" class="btn btn-lg-modal" onclick="referenciaBanco()"><i class="fas fa-credit-card mr-2"></i>Referencia Bancaria</button>
                            </div>-->
                        </div>
                        <br>

                        <!-- <div class="row" hidden>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="button" onclick='$("#modalTarjeta").modal("toggle");' class="btn btn-mercado-pago"><img src="images/mercadopago.png" alt="">Mercado Pago</button>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="button" onclick='enviar_pago_oxxo()' class="btn btn-oxxo"><img src="images/oxxo-logo.png" alt="">Pago en OXXO</button>
                            </div>
                        </div>

                        <br>
                        <div class="row" hidden>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalTarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Pago con tarjeta</h5>
                            <button type="button" class="close btn-close-tarjeta" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p class="p-metodo-pago">Datos bancarios</p>

                            <form method="post" id="pay" name="pay">
                                <fieldset>
                                    <input type="hidden" name="transaction_amount" id="transaction_amount" value="100">
                                    <input type="hidden" name="token" id="token" value="100">
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                                            <label class="floating-label">Número de la tarjeta</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" id="cardholderName" data-checkout="cardholderName" />
                                            <label class="floating-label">Nombre y apellido</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" id="cardExpirationMonth" data-checkout="cardExpirationMonth" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                                            <label class="floating-label">Mes de vencimiento</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" id="cardExpirationYear" data-checkout="cardExpirationYear" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                                            <label class="floating-label">Año de vencimiento</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" id="securityCode" data-checkout="securityCode" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                                            <label class="floating-label">Código de seguridad</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="floating-label-group">
                                            <select class="form-control input-form-border" id="installments" class="form-control" name="installments"></select>
                                            <label class="floating-label">Cuotas</label>
                                        </div>
                                    </div>


                                    <input type="hidden" name="payment_method_id" id="payment_method_id" />

                                    <button type="submit" class="btn btn-lg-blue mt-4">Pagar</button>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modalTarjetaP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="POST" id="payment-formfinal">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Pago con tarjeta</h5>
                                <button type="button" class="close btn-close-tarjeta" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="p-metodo-pago">Datos bancarios</p>
                                <input type="hidden" name="token_id" id="token_id">

                                <div class="form-group">
                                    <div class="floating-label-group">
                                        <input required type="text" autocomplete="off" data-openpay-card="holder_name" class="form-control input-form-border" />
                                        <label class="floating-label">Nombre en la tarjeta</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="floating-label-group">
                                        <input required type="text" autocomplete="off" data-openpay-card="card_number" class="form-control input-form-border" />
                                        <label class="floating-label">Número de tarjeta</label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-4 col-4">
                                        <div class="floating-label-group">
                                            <input required type="text" autocomplete="off" data-openpay-card="expiration_month" class="form-control input-form-border" />
                                            <label class="floating-label">Mes Vencimiento</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4 col-md-4 col-4">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" data-openpay-card="expiration_year" required />
                                            <label class="floating-label">Año Vencimiento</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4 col-md-4 col-4">
                                        <div class="floating-label-group">
                                            <input type="text" class="form-control input-form-border" data-openpay-card="cvv2" required />
                                            <label class="floating-label">CVV</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancelar-modal btn-cancelar-tarjeta" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-aceptar-modal">Aceptar</button>
                        </form>
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
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <!-- popper.min -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>

    <!-- PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=Afj8W6DoGpUac1ZsvxkGMqt5yoeN3jEEA4DZ-n2Fr-qicsBHWUTcwVlssu1lEDDh3hBnBosC82L4uhXM&currency=MXN&locale=es_MX" data-sdk-integration-source="button-factory"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script>
        var iduser = <?php echo $user_id ?>;
    </script>

    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/menu-movil.js"></script>
    <script src="js/resumen-oficina.js"></script>
    <script src="js/metodo-pago-oficina.js"></script>

    <script>
        var radioValue = $("input[name='id']:checked").val();
    </script>
    <!-- MercadoPago -->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script src="js/mercadopago-oficina.js"></script>

</body>

</html>