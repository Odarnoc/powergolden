<?php

require 'user_preferences/user-info.php';

$query = 'SELECT p.*,l.nombre as linea FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE l.id = p.categoria';
$productos=R::getAll($query);

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

            <!-- Admin Menu -->
            <?php include("menus/menu_general_admin.php"); ?>
            <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Reportes de productos</p>
                                    <p class="small-text-cuenta">Genera un reporte del stock de productos.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">

                                <div class="d-form-reporte">
                                    <form action="" class="form-reporte">
                                        <div class="form-row">
                                            <div class="form-group col-lg-4 col-md-4">
                                                <a type="button" href="pdf-productos.php?fecha=<?php echo date('Y-m-d') ?>" target="_blank" class="btn btn-blue mt-2"><i class="fas fa-arrow-circle-down mr-2"></i> Generar reporte</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row row-tabla-ventas">
                            <div class="col-lg-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="">
                                            <tr class="table-primary"> 
                                                <th scope="col">Nombre</th>
                                                <th scope="col" style="text-align: center;">Categoría</th>
                                                <th scope="col" style="text-align: center;">Estock</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($productos as $item) { ?>
                                            <tr>
                                                <td scope="col"><?php echo $item['nombre'] ?></td>
                                                <td scope="col" style="text-align: center;"><?php echo $item['linea'] ?></td>
                                                <td scope="col" style="text-align: center;"><?php echo $item['inventario'] ?></td>
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

    <!-- custom scripts -->
    <script src="js/main-perfil.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/datepicker.min.js"></script>
    <script src="js/datepicker.es.js"></script>
    <script src="js/promociones.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>
