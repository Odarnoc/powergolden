<?php
require 'user_preferences/user-info.php';

/*require 'bd/conexion.php';*/ //No se si es necesario //La imagen no se borra al subir el producto

$querytabla = 'SELECT * FROM notificaciones';

$sucursal = R::getAll($querytabla);

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

    <link rel="stylesheet" href="css/emojionearea.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/emojionearea.min.js"></script>


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
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Notificación</p>
                                    <p class="small-text-cuenta">Aqui puedes enviar nuevas notificaciones.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                                <div class="d-form-registro-productos">
                                    <form class="form-registro-productos">
                                        <div class="form-group">
                                            <div>
                                                <label>Titulo</label>
                                                <input id="titulo" required type="text" data-toggle="modal" data-target="#modalTitulo" class="form-control input-form-underline" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label>Mensaje</label>
                                                <textarea id="mensaje" required type="text" data-toggle="modal" data-target="#modalMensaje" class="form-control input-form-underline"> </textarea>
                                            </div>
                                        </div>
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" onclick="enviar()" class="btn btn-lg-blue mt-3">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div style="padding-top: 1rem" class="row mt-2">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-grafica-ventas">
                                    <table id="ventas" class="table" style="text-align:center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Mensaje</th>
                                                <th scope="col">Fecha</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sucursal as $item) { ?>
                                                <tr>
                                                    <td style="text-align:left"><?php echo $item['titulo'] ?></td>
                                                    <td><?php echo ($item['mensaje']) ?></td>
                                                    <td><?php echo ($item['fecha']) ?></td>
                                                    <td><a href="" data-toggle="modal" data-target="#modaltabla" onclick="enviartabla(<?php echo ($item['id']) ?>)"><i class="far fa-share-square"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
                    <p class="sub-title-mb">¿Desea enviar la notificacion?</p>
                    <p class="sub-title-mb"><b>Titulo: </b><span id="rtitulo"></span></p>
                    <p class="sub-title-mb"><b>Mensaje: </b><span id="rmensaje"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-aceptar-modal" onclick="final()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="modaltabla" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <p class="sub-title-mb">¿Desea enviar la notificacion?</p>
                    <p class="sub-title-mb"><b>Titulo: </b><span id="artitulo"></span></p>
                    <p class="sub-title-mb"><b>Mensaje: </b><span id="armensaje"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-aceptar-modal" onclick="finaltabla()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

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

    <script src="js/push.js"></script>

    <script>
        $(document).ready(function() {
            $("#titulo").emojioneArea({
                pickerPosition: "bottom"
            });
        });
        $(document).ready(function() {
            $("#mensaje").emojioneArea({
                pickerPosition: "bottom"
            });
        });
    </script>

    <!-- datables paginadores -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>




    <script>
        $(document).ready(function() {
            $('#ventas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });
        });



        $("input[type='number']").inputSpinner()
    </script>


</body>


</html>