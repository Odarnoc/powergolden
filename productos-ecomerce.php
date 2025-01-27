<?php
session_start();
require 'bd/conexion.php';

$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}
$busqueda="";
if(isset($_GET['busqueda'])){
  $busqueda = $_GET['busqueda'];
}

$query='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE (p.nombre LIKE "%'.$busqueda.'%") or (p.ingredientes LIKE "%'.$busqueda.'%")';

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

        <div class="col-lg-9 col-md-6 lista-productos-movil">

        <div class="row">
          <div class="col-lg-12 col-md-12">
            <p class="title-busqueda">Búsqueda: <b>"<?php echo $busqueda ?>"</b></p>
          </div>
        </div>
        
        <?php
          if(empty($prods)){
        ?>
          <div class="row">
                  <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                      <div class="d-listo">
                          <img src="images/icon-search-blue.svg" alt="">
                          <p class="t1">¡Sin resultados!</p>
                          <p class="t2">No se han encontrado productos con la búsqueda: <b>"<?php echo $busqueda ?>"</b></p>
                          <a class="btn btn-lg-link mt-40" href="#0" role="button">Nueva búsqueda</a>
                      </div>
                  </div>
          </div>
          <?php
          }else{
          ?>

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

  <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>

</body></html>
