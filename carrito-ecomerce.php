<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);

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
  

      <div class="navbar-bottom" style="bottom: 55px;">
        <div class="d-btn-carrito" style="margin-top: 0px;">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <p class="t1">TOTAL:</p>
                <p class="t2" id="total2"></p>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <button class="btn btn-lg-link" onclick="confirmarCompra()" role="button">Continuar</button>
            </div>
          </div>
        </div>
      </div>


  <section class="sec-gray" style="margin-top:55px">
    <div class="container">
      <div class="row">
        
        <?php include 'menus/lineas_asistencia.php'; ?>

        <div class="col-lg-9 col-md-6 bg-gray lista-productos-movil">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Carrito</p>
                                    <p class="small-text-cuenta">Productos en tu carrito de compras <b id="cantProds" ></b></p>
                                </div>
                            </div>
                        </div>

                        <div class="row row-form-perfil footer-movil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div id="lista-productos">
                                </div>


                                <div class="d-btn-carrito no-movil">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-6">
                                            <p class="t1">TOTAL:</p>
                                            <p class="t2" id="total"></p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-6">
                                          <a href="nuevo-envio.php"><button class="btn btn-lg-link" type="button" role="button">Continuar</button></a>
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
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/carrito-movil.js"></script>

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

</body></html>
