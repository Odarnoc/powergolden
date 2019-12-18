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

        <div class="col-lg-9 col-md-6 bg-gray">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Carrito</p>
                                    <p class="small-text-cuenta">Productos en tu carrito de compras <b id="cantProds" ></b></p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div id="lista-productos">
                                </div>


                                <div class="d-btn-carrito">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-6">
                                            <p class="t1">TOTAL:</p>
                                            <p class="t2" id="total"></p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <button class="btn btn-lg-link" onclick="confirmarCompra()" role="button">Continuar</button>
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


            <!-- Admin Menu -->
            <?php include("menus/footer_general.php"); ?>
            <!-- End Admin Menu -->


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
  <script src="js/bootstrap-input-spinner.js"></script>

  <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>
  <script src="js/carrito.js"></script>

</body></html>
