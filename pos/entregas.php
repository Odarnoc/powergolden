<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: index.php');
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
                    <p class="title-externos">Entregas</p>
                </div>
                <div class="col-lg-6 col-md-6">

                    <div class="d-logo-externos">
                        <img class="logo-externos" src="../images/logo-navbar.png" alt="">
                    </div>

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
                                <div class="col-lg-3 col-md-3 col-3 pr-0">
                                    <label for="">Estatus</label>
                                    <select  id="tipo" class="form-control input-pos mt-3">
                                        <option value=""> -- Todos --</option>
                                        <option value="1"> Entregado</option>
                                        <option value="0"> Pendiente de Entrega</option>
</select>
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 pr-0">
                                    <label for=""> </label>
                                    <button type="button" onclick="get_sales();"
                                        class="btn btn-lg-pos btn-bg-blue mt-3">Filtrar</button>
                                </div>
                            </div>
                            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="d-tabla-externos">
                        <div class="table-responsive">
                            <table class="table table-borderless table-lg" id="tabla_ventas">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th class="text-center"></th>
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

    <!-- Modal Detalle -->

    <div class="modal fade" id="modalEntregas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Entregas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" class="form-externos">


                        <div class="form-group">
                            <label class="label-referencia" for="">Ingresar referencia</label>
                            <input type="text" class="form-control input-externos" id="referencia" placeholder="Referencia">
                        </div>

                        <button type="button" class="btn btn-lg-blue mt-2" onclick="gestionar_entrega()">Entregar</button>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detalles -->

    <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detalle de venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="d-table-modal-detalles">
                        <div class="table-responsive">
                            <table class="table table-borderless table-detalles" id="detalle_venta">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th class="text-center">Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    

                                </tbody>
                            </table>
                        </div>

                    </div>
                    
                    
                   <button type="button" id="boton_entrega" onclick="abrir_referencia()" style="display:none;" class="btn btn-lg-blue">Entregar</button>


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
    <script src="js/entregas.js"></script>

</body></html>
