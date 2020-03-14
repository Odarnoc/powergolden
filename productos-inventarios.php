<?php

require 'user_preferences/user-info.php';

$tipo = R::find('roles', ' id != 1 && id !=2 ');
$suc = R::find('sucursales');
$prod = R::find('productos');

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


    <!-- Top Menu -->
    <?php include("menus/top_menu.php"); ?>
    <!-- End Top Menu -->


    <!-- End Navbar ====
    	======================================= -->

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">

                <!-- Admin Menu -->
                <?php include("menus/menu_general_admin.php"); ?>
                <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Producto inventario.</p>
                                    <p class="small-text-cuenta">Agrega inventario de productos a sucursales.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">

                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-tarjetas">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                                            <div class="d-form">
                                                <form class="form-registro">

                                                    <div class="form-group">
                                                        <div class="floating-label-group">
                                                            <label class="label-select">Producto</label>
                                                            <select id="prod" class="form-control input-form-underline">
                                                                <option value="-1" hidden>Seleccionar producto</option>
                                                                <?php
                                                                foreach ($prod as $valor) {
                                                                ?>
                                                                    <option value="<?php echo $valor->id; ?>"><?php echo $valor->nombre; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="floating-label-group">
                                                            <label class="label-select">Sucursal</label>
                                                            <select id="sucursal" class="form-control input-form-underline">
                                                                <option value="-1" hidden>Seleccionar sucursal</option>
                                                                <option value="-2">Todas las sucursales</option>
                                                                <?php
                                                                foreach ($suc as $valor) {
                                                                ?>
                                                                    <option value="<?php echo $valor->id; ?>"><?php echo $valor->nombre; ?>, <?php echo $valor->estado; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="floating-label-group">
                                                            <input type="number" class="form-control input-form-underline" id="minimo" value="28" required />
                                                            <label class="floating-label">Mínimo</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="floating-label-group">
                                                            <input type="number" class="form-control input-form-underline" id="existencias" value="28" required />
                                                            <label class="floating-label">Existencias</label>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-lg-blue mt-30" id="registrar_but">Aceptar</button>

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
                    <button type="button" class="btn btn-aceptar-modal" onclick="confirmar()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

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

    <script src="js/scripts.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>


</body>

</html>