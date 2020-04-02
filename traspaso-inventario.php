<?php
require 'user_preferences/user-info.php';
$id = $_GET['id'];
$query = 'SELECT p.nombre,p.imagen,i.id,i.limite_inventario,i.existencia, IF(i.precio_mxn=0,p.precio_mxn,i.precio_mxn) as mxn, IF(i.precio_usd=0,p.precio_usd,i.precio_usd) as usd FROM inventarios as i LEFT JOIN productos as p ON i.producto_id = p.id where i.sucursal_id = ' . $id;
$prods = R::getAll($query);

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
                                    <p class="title-cuenta">Traspaso inventario.</p>
                                    <p class="small-text-cuenta">Traspasa productos del almacen a una sucursal.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">

                            </div>
                        </div>

                        <div class="row row-items-pro">

                    <div class="col-lg-12 d-all-item-pro" style="padding: 0;">
                        <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-9 d-info-pro" style="padding:2rem;">
                                <br>
                                    <p class="t1">Productos seleccionados( <span id="seleccion"> 0 </span> )</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-3 d-info-pro" style="padding:2rem;">
                                    <a class="btn btn-blue mt-3" style="background-color:49B7F3; color:white; width:100%;padding:1rem;" onclick="comprar()" role="button">Continuar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                                <div class="row" id="lista-productos">
                                        <?php foreach ($prods as $item) { ?>
                                            <div class="col-lg-6 d-all-item-pro">
                                                <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-5">
                                                    <div class="d-img-pro">
                                                        <img src="productos_img/<?php echo $item['imagen'] ?>" alt="">

                                                    </div>
                                                    </div>

                                                    <div class="col-lg-7 col-md-7 col-7">
                                                    <div class="d-info-pro">
                                                        <p class="t2"><?php echo $item['nombre'] ?></p>
                                                        <p class="t1">Existencias: <?php echo $item['existencia'] ?></p>
                                                        <a class="btn btn-blue mt-3" style="background-color:49B7F3;" onclick="" role="button"><i style="color:white;" class="fas fa-check"></i></a>
                                                        <a class="btn btn-blue mt-3" style="background-color:red;" onclick="" role="button"><i style="color:white;" class="fas fa-times"></i></a>
                                                    </div>
                                                    </div>

                                                </div>
                                                </div>
                                            </div>
                                        <?php } ?>
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
    <script>
        var sucursal = '<?php echo $id ?>';
    </script>
    <script src="js/traspasos.js"></script>


</body>

</html>