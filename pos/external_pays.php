<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: external.php');
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">


    <title>POS Power Golden | El Mundo de la Herbolaria</title>

</head>

<body class="bg-gray">

<section class="sec-nav-externos">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <p class="title-externos"><img src="../images/logo-ind-color.png" alt="">Pagos externos</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="d-btn-externos">
                        <button class="btn btn-externos" data-toggle="modal" data-target="#modalExternos">Generar Referencia de Pago Externo</button>
                    </div>
                    <!--
                    <div class="d-logo-externos">
                        <img class="logo-externos" src="../images/logo-navbar.png" alt="">
                    </div>
                    -->
                </div>
            </div>
        </div>
    </section>

    <section class="sec-table-externos">
        <div class="container">
        <div class="row">
                                <div class="col-lg-3 col-md-3 col-3 pr-0">
                                    <label for="">Desde</label>
                                    <input type="date" id="inicio" class="form-control input-pos mt-3">
                                </div>
                                <div class="col-lg-3 col-md-3 col-3 pr-0">
                                    <label for="">Hasta</label>
                                    <input type="date" id="fin" class="form-control input-pos mt-3">
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 pr-0">
                                    <label for=""> </label>
                                    <button type="button" onclick="get_externos();"
                                        class="btn btn-lg-pos btn-bg-blue mt-3">Filtrar</button>
                                </div>
                            </div>
                            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="d-tabla-externos">
                        <div class="table-responsive">
                            <table class="table table-borderless table-externos" id="externos">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Cantidad Pagada</th>
                                        <th>Fecha</th>
                                        <th>Tipo de Pago</th>
                                        <th>Referencia</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="modalExternos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pagos externos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="pago_externo" class="form-externos">
                        <div class="form-group mb-4">
                            <input type="number" class="form-control input-externos" name="cantidad" placeholder="Cantidad a pagar">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-externos" name="descripcion" placeholder="Nombre del cliente">
                        </div>

                        <button type="submit" class="btn btn-lg-blue mt-2">Generar pago externo</button>

                    </form>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery-3.0.0.min.js"></script>
    <script src="../js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="../js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.js"></script>

    <!-- scrollIt -->
    <script src="../js/scrollIt.min.js"></script>
    <script src="js/pago_externo.js"></script>


    <script>
        $(document).ready(function() {
            //$("#modalExternos").modal("show");
        });
    </script>

</body></html>
