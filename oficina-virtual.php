<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

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

      <section class="sec-gray separar-menu">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="d-cont-right perfil-movil">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Oficina virtual</p>
                                </div>
                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-perfil">
                                    <form class="form-perfil">

                                        <div class="form-row">
                                            <div class="col-lg-5 col-md-5">

                                                <p class="t1">Gráfica de compras</p>
                                                <canvas height="400" id="myChart"></canvas>

                                                

                                            </div>

                                            <div class="col-lg-5 col-md-5 offset-lg-2 offset-md-2">
                                                <div class="card d-item-mision">
                                                    <center>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="registro-oficina.php" role="button">Registro</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="matriz-cliente.php" role="button">Matriz de clientes</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="mis-ventas-oficina.php" role="button">Mis ventas</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="reporte-venta-oficina.php" role="button">Reporte de venta</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="promociones-ecomerce.php" role="button">Ver promociones</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="paquetes-ecomerce.php" role="button">Ver paquetes</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="historial-ecomerce.php" role="button">Historial</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="facturacion.php" role="button">Facturación</a>
                                                        <a class="btn btn-blue mt-3" style="width: 80%; padding: 1rem;font-size: 14px;" href="contacto.php" role="button">Contacto</a>
                                                    </center>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
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
  <script src="js/main-perfil.js"></script>

  <!-- custom scripts -->
  <script src="js/scripts.js"></script>
  <script src="js/bootstrap-input-spinner.js"></script>
  <!-- sweetalert scripts -->
  <script src="js/sweetalert2.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/chart-oficina.js"></script>

</body></html>
