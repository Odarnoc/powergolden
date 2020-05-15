<?php
session_start();
require 'bd/conexion.php';
$user_id = -1;
if (isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];
}

if (isset($_GET['ui'])) {
  $_SESSION["ui_referencia_venta"] = $_GET['ui'];
}

$query = 'SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id ORDER BY RAND() LIMIT 6';
$query2 = 'SELECT p.*,COUNT(*) as conteo,l.imagenlinea FROM productosxventas as pxv LEFT JOIN productos as p ON pxv.producto_id = p.id LEFT JOIN lineas as l ON p.categoria = l.id GROUP BY producto_id ORDER BY conteo DESC LIMIT 1';
$query3 = 'SELECT * FROM promociones WHERE NOW()>=inicio && NOW()<=fin ORDER BY RAND() LIMIT 6';
$query4 = 'SELECT * FROM paquetes ORDER BY RAND() LIMIT 6';

$prods = R::getAll($query);
$promos = R::getAll($query3);
$packs = R::getAll($query4);
$prodRelevante = R::getAll($query2);
if (empty($prodRelevante)) {
  $query3 = 'SELECT p.*,l.imagenlinea FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id ORDER BY RAND() LIMIT 1';
  $prodRelevante = R::getAll($query3);
}

$datetime = new DateTime();
$visita = R::dispense('visitas');
$visita->fecha = $datetime->format('Y-m-d');
R::store($visita);

?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="gb18030">
  <!-- Required meta tags -->

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
  <style>
    #sec-busqueda {
      margin-top: 0px;
    }
  </style>

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

  <header class="header-home valign" data-overlay-dark="4" data-scroll-index="0">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">

          <div class="d-info-header">
            <img class="logo-header" src="images/logo-header.png" alt="">
            <h1 class="t1">El mundo</h1>
            <h1 class="t2">de la Herbolaria</h1>
            <a class="btn btn-header mt-30" href="#" data-scroll-nav="1" role="button">Ver productos</a>
          </div>

        </div>
      </div>
    </div>
  </header>


  <?php include("menus/search.php"); ?>


  <section class="sec-gray">
    <div class="container">
      <div class="row">

        <?php include 'menus/lineas_asistencia.php'; ?>

        <div class="col-lg-9 col-md-6">

          <div class="row row-destacado no-movil">
            <div class="col-lg-12 col-md-12">
              <p class="title-sec mb-20">Destacado</p>

            </div>
          </div>

          <div style="background-image: url(<?php echo $prodRelevante[0]['imagenlinea']; ?>);" class="d-banner-destacado no-movil" data-overlay-dark="4">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="d-img-destacado">
                  <img style="height: 300px;width: auto;" src="productos_img/<?php echo $prodRelevante[0]['imagen']; ?>" alt="">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 valign">
                <div class="d-info-destacado">
                  <p class="t1"><?php echo $prodRelevante[0]['nombre']; ?></p>
                  <p class="t2"><?php echo $prodRelevante[0]['ingredientes']; ?></p>
                  <a class="btn btn-blue-banner mt-3" href="producto-individual.php?key=<?php echo $prodRelevante[0]['id']; ?>" role="button">Ver producto</a>

                </div>
              </div>

            </div>
          </div>

          <div class="row row-items-pro lista-productos-movil">

            <div class="col-lg-12 col-md-12">
              <p class="title-sec mb-20">Populares</p>
            </div>


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

          <!--

          <div class="row row-items-pro lista-productos-movil">

            <div class="col-lg-12 col-md-12">
              <p class="title-sec mb-20">Promociones</p>
            </div>


            <?php foreach ($promos as $item) { ?>
              <div class="col-lg-6 d-all-item-pro">
                <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-5">
                      <div class="d-img-pro">
                        <img src="images/promocion/<?php echo $item['imagen'] ?>" alt="">

                      </div>
                    </div>

                    <div class="col-lg-7 col-md-7 col-7">
                      <div class="d-info-pro">
                        <p class="t1">Promoción</p>
                        <p class="t2"><?php echo $item['nombre'] ?></p>
                        <p class="t4 two-lines"><?php echo $item['descripcion'] ?></p>
                        <a class="btn btn-blue mt-3" href="promocion-individual.php?key=<?php echo $item['id'] ?>" role="button">Ver promoción</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>



          </div>

          <div class="row row-items-pro lista-productos-movil">

            <div class="col-lg-12 col-md-12">
              <p class="title-sec mb-20">Paquetes</p>
            </div>


            <?php foreach ($packs as $item) { ?>
              <div class="col-lg-6 d-all-item-pro">
                <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-5">
                      <div class="d-img-pro">
                        <img src="images/paquetes/<?php echo $item['imagen'] ?>" alt="">

                      </div>
                    </div>

                    <div class="col-lg-7 col-md-7 col-7">
                      <div class="d-info-pro">
                        <p class="t1">Paquete</p>
                        <p class="t2"><?php echo $item['nombre'] ?></p>
                        <p class="t4 two-lines"><?php echo $item['descripcion'] ?></p>
                        <a class="btn btn-blue mt-3" href="paquete-individual.php?key=<?php echo $item['id'] ?>" role="button">Ver paquete</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>



          </div>
            -->

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

  <!-- Modal -->
  <div class="modal fade" id="modalIndex" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hola!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-modal-cliente">
            <p class="t1">Bienvenido a Power Golden</p>
            <p class="t2">Por favor selecciona que tipo de cliente eres</p>

            <div class="row mt-30">
              <div class="col-lg-6 col-md-6">
                <a href="iniciar-sesion-cliente.php"><button type="button" class="btn btn-lg-modal btn-cliente-temporal">Cliente temporal</button></a>
              </div>
              <div class="col-lg-6 col-md-6">
                <a href="iniciar-sesion-oficina.php"><button type="button" class="btn btn-lg-modal btn-empresario">Empresario independiente</button></a>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


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

  <script>
    var id = <?php echo $user_id ?>;
    
  </script>

  <!-- custom scripts -->
  <script src="js/scripts.js"></script>

  <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>

  <script>
    $(document).ready(function() {
      $('#inicio-active').addClass("active");
    });
  </script>
  <script type="text/javascript" src="https://powergolden.com.mx/livechat/php/app.php?widget-init.js"></script>
</body>

</html>