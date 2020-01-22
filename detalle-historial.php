<?php

require 'user_preferences/user-info.php';

$id_venta = $_GET['id'];

$query = 'SELECT * FROM ventas where id = '.$id_venta;
$ventas=R::getAll($query);

$queryprodventa = 'SELECT p.nombre,p.precio,p.imagen,px.cantidad FROM productosxventas as px LEFT JOIN productos as p on px.producto_id = p.id where venta_id = '.$id_venta;
$productos=R::getAll($queryprodventa);

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

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload').attr("style", "background-image: url(" + e.target.result + ");");
                    $('.image-upload').addClass("overlay-image-upload");

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

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

                <div class="col-lg-8 col-md-8 bg-gray" >
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Detalle de pedido</p>
                                    <div class="row small-text-cuenta">
                                        <div class="col">
                                            <p class="small-text-cuenta" style="margin-bottom: 0px; padding-top: 10px">Numero de productos <b>(<?php echo sizeof($productos)?>)</b></p> 
                                        </div>
                                        <div style="text-align: right; padding-top: 10px" class="col">
                                            <p>Fecha de pedido: <?php echo $ventas[0]['fecha'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table" style="text-align:center">
                            <thead class="table-primary">
                                <tr>
                                <th style="width: 20%" scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio unitario</th>
                                <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php foreach ($productos as $item) { ?>
                                <tr>
                                <td style="vertical-align: middle"><img style="width: 50%" src="productos_img/<?php echo $item['imagen']?>"> </td>
                                <td style="vertical-align: middle"><?php echo $item['nombre'] ?></td>
                                <td style="vertical-align: middle"><?php echo $item['cantidad'] ?></td>
                                <td style="vertical-align: middle">$<?php echo $item['precio'] ?><sup>.00</sup></td>
                                <td style="vertical-align: middle">$<?php echo $item['cantidad']*$item['precio'] ?><sup>.00</sup></td>
                                </tr> 
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                    <div style="text-align: right; font-family: Poppins; font-size: 22px; margin-bottom: 50px ">
                    <span>Total del pedido: $<?php echo $ventas[0]['total'] ?><sup>.00</sup></span>
                    </div>
                    <div style="margin-left: 100px; margin-right: 100px; margin-bottom: 50px">
                        <a class="btn btn-lg-blue mt-30" href="historial.php" style="padding-top: 18px">Atras</a>
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
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>

    <script>
        $("input[type='number']").inputSpinner()
    </script>

</body></html>
