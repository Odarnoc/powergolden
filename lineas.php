<?php
session_start();
require 'bd/conexion.php';

$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}
$linea="1";
if(isset($_GET['linea'])){
  $linea = $_GET['linea'];
}

$lineaInfo=R::findOne('lineas','id='.$linea);
$query='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE l.id ='.$linea;

$prods=R::getAll($query);
?>
<!doctype html>
<html lang="en">

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

        <div class="col-lg-9 col-md-6">
          <div style="background-image: url(<?php echo $lineaInfo->imagenlinea; ?>); " class="d-banner-linea valign" data-overlay-dark="3">
            <span class="t1">LÍNEA</span>
            <span class="t2"><?php echo $lineaInfo->nombre; ?></span>
          </div>

          <div class="row row-items-pro">

            <?php foreach ($prods as $item) { ?>
              <div class="col-lg-6 d-all-item-pro">
                <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-5">
                      <div class="d-img-pro">
                        <img src="productos_img/<?php echo $item['imagen'] ?>" alt="">

                      </div>
                    </div>

                    <div class="col-lg-7 col-md-7 col-7">
                      <div class="d-info-pro">
                        <p class="t1" style="color:<?php echo $item['color'] ?>">Línea <?php echo $item['linea'] ?></p>
                        <p class="t2"><?php echo $item['nombre'] ?></p>
                        <p class="t4 two-lines"><?php echo $item['ingredientes'] ?></p>
                        <a class="btn btn-blue mt-3" href="producto-individual.php?key=<?php echo $item['id'] ?>" role="button">Ver producto</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>



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

  <!-- jquery.waypoints.min -->
  <script src="js/jquery.waypoints.min.js"></script>

  <!-- stellar js -->
  <script src="js/jquery.stellar.min.js"></script>

  <!-- isotope.pkgd.min js -->
  <script src="js/isotope.pkgd.min.js"></script>

  <!-- custom scripts -->
  <script src="js/scripts.js"></script>
  <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>

</body>

</html>