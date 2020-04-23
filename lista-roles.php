<?php

require 'user_preferences/user-info.php';

$query = 'SELECT * FROM  roles where id != 1 && id != 2';
$sucursal = R::getAll($query);

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/helper.css">
    <!-- responseive menu -->
    <link rel="stylesheet" href="css/menu-movil.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

    <style>
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
        text-align: center;
        padding: 19px;
    }

    .paginate_button.current {
        background: rgba(0, 0, 0, .08) !important;
        border: none !important;
        border-radius: 5px !important;
    }

    .paginate_button:hover {
        background: rgba(0, 0, 0, .5) !important;
        border: none !important;
        border-radius: 5px !important;
        color: #FFFFFF !important;
    }

    .paginate_button.current:hover {
        background: rgba(0, 0, 0, .08) !important;
        border: none !important;
        border-radius: 5px !important;
        color: #FFFFFF !important;
    }
    </style>



    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>


    <!-- Top Menu -->
    <?php include("menus/top_menu.php"); ?>
    <!-- End Top Menu -->

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
                                    <p class="title-cuenta">Lista de sucursales.</p>
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="d-lista-sucursales mt-3">
                            <table id="sucursales" class="table table-sucursales" style="text-align:center">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">ID</th>

                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sucursal as $item) { ?>
                                    <tr>
                                        <td style="vertical-align: middle"><?php echo $item['id'] ?></td>
                                        <td style="vertical-align: middle"><?php echo $item['nombre'] ?></td>
                                        <td style="vertical-align: middle"><?php echo $item['descripcion'] ?></td>
                                        <td style="vertical-align: middle">
                                            <div>
                                                <a href="editar-rol.php?id=<?php echo $item['id'] ?>"><i
                                                        class="far fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


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

    <script src="js/scripts.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script src="js/sucursal.js"></script>
    <script src="js/sucursal-actions.js"></script>


    <!-- datables paginadores -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>





    <script>
    $(document).ready(function() {
        $('#sucursales').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

    });

    $(document).ready(function() {
        $('#plus-btn').click(function() {
            $('#cantidad').val(parseInt($('#cantidad').val()) + 1);
        });
        $('#minus-btn').click(function() {
            $('#cantidad').val(parseInt($('#cantidad').val()) - 1);
            if ($('#cantidad').val() == 0) {
                $('#cantidad').val(1);
            }
        });
    });
    </script>

</body>

</html>