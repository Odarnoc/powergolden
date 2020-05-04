<?php
require 'user_preferences/user-info.php';

$querytabla = 'SELECT * FROM envios WHERE `status` = "Recolección pendiente"';

$envios = R::getAll($querytabla);

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

    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6"></div>
            </div>
        </div>
    </section>


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
                                    <p class="title-cuenta">Panel de envios.</p>
                                    <p class="small-text-cuenta">En esta pantalla puedes gestionar el estado de preparación de los envíos. Cuando el pedido esté listo para ser enviado presiona el icono: <i style="color:green" class="fas fa-check-circle"></i></p>
                                </div>
                            </div>
                        </div>

                        <div style="padding-top: 1rem" class="row mt-2">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-grafica-ventas">
                                    <table id="ventas" class="table" style="text-align:center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Fecha de compra</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Etiqueta</th>
                                                <th scope="col">Detalles de pedido</th>
                                                <th scope="col">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($envios as $item) { ?>
                                                <tr>
                                                    <td style="text-align:left"><?php echo $item['numero_seguimiento'] ?></td>
                                                    <td><?php echo substr($item['fecha'], 0, 10) ?></td>
                                                    <td style="text-align: center"><?php if ($item['estado'] == 0) { ?>Pendiente<?php } else { ?>Preparado<?php } ?></td>
                                                    <td><a href="<?php echo $item['etiqueta'] ?>"><i class="fas fa-tag"></i></a></td>
                                                    <td><a href="detalle-pedido.php?id=<?php echo $item['venta_id'] ?>"><i class="fas fa-list-ul"></i></a><a href=""></a></td>
                                                    <td><a href="" onclick="confirmar(<?php echo $item['id'] ?>)"><i style="color:green" class="fas fa-check-circle"></i></a></td>
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


    <!-- jQuery -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/Chart.js"></script>

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

    <script>
        function confirmar(id) {
            $.ajax({
                url: "ajax/envio-preparar.php",
                type: "post",
                data: {
                    id:id
                },
                success(data) {
                    location.reload();
                }
            });
        }
    </script>

</body>

</html>