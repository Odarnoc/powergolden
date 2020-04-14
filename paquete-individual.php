<?php
session_start();
require 'bd/conexion.php';

$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}
$query1='SELECT * FROM paquetes';
$res=R::getAll($query1);
$prodIndividual = $res[0];

$query='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id';

$prods=R::getAll($query);

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
    <style>
        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
            text-align: center; 
            padding: 19px;
        }
    </style>

    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>


            <!-- Menu -->
            <?php include("menus/menu_general.php"); ?>
            <!-- End Menu -->


    <!-- End Navbar ====
    	======================================= -->



    <section class="sec-gray">
        <div class="container">
                <div class="row row-items-pro">

                    <div class="col-lg-12 d-all-item-pro" style="padding: 0;">
                        <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-3 d-info-pro" style="padding:2rem;">
                                    <p class="t1">Total de productos: <b id="prodxpacks"></b></p>
                                    <p class="t1">Productos seleccionados( <span id="seleccion"> 0 </span> )</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6 d-info-pro" style="padding:2rem;">
                                    <div class="row" id="lista-packs">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-3 d-info-pro" style="padding:2rem;">
                                    <a class="btn btn-blue mt-3" style="background-color:49B7F3; color:white; width:100%;padding:1rem;" onclick="comprar()" role="button">Continuar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="lista-productos">
                        <?php foreach ($prods as $item) { ?>
                            <div class="col-lg-4 d-all-item-pro">
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
                                        <p class="t1" style="color:<?php echo $item['color'] ?>">Línea <?php echo $item['linea'] ?></p>
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

    </section>


    <section>
        <div class="container">

            <div class="d-asistencia-movil">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="d-img-asistencia">
                            <img src="images/icon-asistencia.svg" alt="">

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-6 valign">
                        <div class="d-info-asistencia">

                            <p class="t1">Asistencia</p>
                            <p class="t2"><a href="tel:3331227000">33 3122 7000</a></p>

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
    <script src="js/scripts.js"></script>
    
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script>
        var cant="<?php echo $prodIndividual['productos']; ?>";
    </script>

    <script src="js/paquete-ind.js"></script>

</body></html>
