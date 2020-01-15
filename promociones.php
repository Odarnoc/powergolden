<?php

require 'user_preferences/user-info.php';

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
    <link rel="stylesheet" href="css/datepicker.min.css">

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
                <div class="col-lg-4 col-md-4 bg-white">

            <!-- Admin Menu -->
            <?php include("menus/menu_general_admin.php"); ?>
            <!-- End Admin Menu -->

                </div>

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Promociones</p>
                                    <p class="small-text-cuenta">Para agregar una nueva promoción deberás completar el siguiente formulario.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div class="d-form-promociones">
                                    <form class="form-promociones" action="">
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Nombre de la promoción *</label>
                                            </div>
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group mb-0 col-lg-12 col-md-12">
                                                <label class="label-select">Vigencia *</label>
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 col-6">
                                                <input type="text" class="datepicker-here form-control" id="vig-inicio" data-date-format="dd/mm/yyyy" data-language='es' placeholder="Inicio">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-6">
                                                <input type="text" class="datepicker-here form-control" id="vig-fin" data-date-format="dd/mm/yyyy" data-language='es' placeholder="Fin">
                                            </div>

                                            <div class="form-group mb-0 col-lg-12 col-md-12">
                                                <label class="label-select">Almacen *</label>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6 col-md-6 col-6">
                                                <div class="form-check radio-form">
                                                    <input class="form-check-input radio-form" type="radio" name="exampleRadios" id="almacen-mx" value="almacen-mx" checked>
                                                    <label class="form-check-label" for="almacen-mx">
                                                        Almacén MX
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6 col-md-6 col-6">
                                                <div class="form-check radio-form">
                                                    <input class="form-check-input " type="radio" name="exampleRadios" id="almacen-us" value="almacen-us">
                                                    <label class="form-check-label" for="almacen-us">
                                                        Almacén US
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 col-lg-12 col-md-12">
                                                <div class="floating-label-group">

                                                    <select class="form-control input-form-underline">
                                                        <option hidden>Seleccionar almacenes - sucursales</option>
                                                        <option>100</option>
                                                        <option>200</option>
                                                        <option>300</option>
                                                        <option>400</option>
                                                        <option>500</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <div class="d-items-almacen">

                                                    <div class="d-item-almacen">
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            100
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="d-item-almacen">
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            200
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="d-item-almacen">
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            500
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <div class="floating-label-group">

                                                    <select class="form-control input-form-underline">
                                                        <option hidden>Seleccionar tipo de promoción *</option>
                                                        <option>Descuento total</option>
                                                        <option>Descuento particular</option>
                                                        <option>Regalo fijo</option>
                                                        <option>Regalos a seleccionar</option>
                                                        <option>Activa oferta</option>
                                                        <option>Descuento al excedente</option>
                                                        <option>Cambio lista precios</option>
                                                        <option>No continuar</option>
                                                        <option>Decuento general sobre público</option>
                                                        <option>Compra X - Paga Y</option>
                                                        <option>Mostrar mensaje</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <div class="floating-label-group">

                                                    <select class="form-control input-form-underline">
                                                        <option hidden>Bloque de ejecución *</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <div class="floating-label-group">

                                                    <select class="form-control input-form-underline">
                                                        <option hidden>Promoción activa *</option>
                                                        <option>Si</option>
                                                        <option>No</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <div class="floating-label-group">
                                                    <textarea class="form-control input-form-underline" rows="3" required></textarea>
                                                    <label class="floating-label-underline">Condiciones *</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 col-lg-12 col-md-12">
                                                <div class="form-check radio-form">
                                                    <input class="form-check-input radio-form" type="checkbox" name="exampleRadios" id="desactivar-promo" value="desactivar-promo">
                                                    <label class="form-check-label" for="desactivar-promo">
                                                        Desactivar promoción
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <button type="button" class="btn btn-lg-blue mt-3">Guardar</button>

                                    </form>
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
    <script src="js/main-perfil.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/datepicker.min.js"></script>
    <script src="js/datepicker.es.js"></script>
    <script src="js/promociones.js"></script>
    <script src="js/scripts.js"></script>

</body></html>
