<?php
session_start();
require 'bd/conexion.php';

$id_prod = $_GET['key'];

$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}
$item=R::findOne('promociones','id ='.$id_prod );


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


    <?php include("menus/search.php"); ?>


    <section class="sec-gray">
        <div class="container">
            <div class="row">
                
                <?php include 'menus/lineas_asistencia.php'; ?>

                <div class="col-lg-9 col-md-6">

                    <div class="row row-breadcrumb">
                        <div class="col-lg-12 col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $item['nombre'] ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row row-pro-ind ">
                        <div class="col-lg-12 col-md-12 ">
                            <div classitem
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="d-img-pro-ind ">
                                            <img src="images/paquetes/<?php echo $item['imagen'] ?>" alt="">
                                        </div>

                                    </div>

                                    <div class="col-lg-8 col-md-8">
                                        <div class="d-info-pro-ind">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <p class="title-pro-ind one-line"><?php echo $item['nombre'] ?></p>
                                                </div>

                                                <div class="col-lg-4 col-md-4">
                                                    <p class="price-pro-ind">$<?php echo $item['precio'] ?></p>
                                                </div>
                                            </div>

                                            <p class="sub-title-pro-ind"><?php echo $item['descripcion'] ?></p>
                                            <br>
                                            <br>
                                            <div class="row row-cant-pro-ind">
                                                <div class="col-lg-12 col-md-12">

                                                    <div class="form-cant-pro-ind">
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-12 col-md-12">
                                                                <button type="button" class="btn btn-add-car" onclick="agregar()">Comprar</button>
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
                    </div>


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
    $(document).ready(function(){
    $('#cantidad').prop('disabled', true);
    $('#plus-btn').click(function(){
        $('#cantidad').val(parseInt($('#cantidad').val()) + 1 );
            });
        $('#minus-btn').click(function(){
        $('#cantidad').val(parseInt($('#cantidad').val()) - 1 );
        if ($('#cantidad').val() == 0) {
            $('#cantidad').val(1);
        }
        });
    });
    </script>
    <script>
        var prod = '<?php echo $id_prod; ?>';
        console.log(prod);
        
    </script>
    <script src="js/prod-individual.js"></script>

</body></html>
