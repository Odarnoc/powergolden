<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}
$key=$_SESSION["token"];
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

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">



  <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">
      <a class="logo" href="#" data-scroll-nav="0">
        <img src="images/logo-navbar-white.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" data-scroll-nav="0">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sobre Power Golden</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-scroll-nav="1">Tienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sucursales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-socios" href="#">Socios</a>
          </li>

        </ul>
      </div>
    </div>

  </nav>


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


  <section id="sec-tienda" class="sec-search" data-scroll-index="1">
    <div class="container">
      <div class="row">

        <div class="col-lg-5 col-md-5 col-10 ">
          <form action="" class="f-search-home">
            <div class="form-row">
              <div class="form-group col-md-10 col-10">
                <input type="text" class="form-control input-search" placeholder="Buscar productos">

              </div>

              <div class="form-group col-md-2 col-2 text-center">
                <a class="btn btn-search" href="#" role="button"><img src="images/icon-search-white.svg" alt=""></a>
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-2 col-md-2 offset-md-5  col-2">
          <div class="d-icon-bag">
            <a class="btn btn-bag" href="#" role="button"><i class="fas fa-shopping-bag"></i></a>

          </div>
        </div>

      </div>
    </div>

  </section>


  <section class="sec-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="d-lineas">
            <p class="title-sec">LÍneas</p>

            <ul>
              <li><a href="linea-cafe.html"><i class="fas fa-circle cafe"></i>Café</a></li>
              <li><a href="linea-amarilla.html"><i class="fas fa-circle amarilla"></i>Amarilla</a></li>
              <li><a href="linea-rosa.html"><i class="fas fa-circle rosa"></i>Rosa</a></li>
              <li><a href="linea-tinta.html"><i class="fas fa-circle tinta"></i>Tinta</a></li>
              <li><a href="linea-verde.html"><i class="fas fa-circle verde"></i>Verde</a></li>
              <li><a href="linea-yin-yang.html"><i class="fas fa-circle ying-yang"></i>Yin Yang</a></li>
              <li><a href="linea-estrella.html"><i class="fas fa-circle estrella"></i>Estrella</a></li>
            </ul>

          </div>

          <div class="d-asistencia mt-30">
            <img src="images/icon-asistencia.svg" alt="">
            <p class="t1">Asistencia</p>
            <p class="t2"><a href="tel:3331227000">33 3122 7000</a></p>
          </div>



        </div>


        <div class="col-lg-9 col-md-6">

          <div class="row row-destacado">
            <div class="col-lg-12 col-md-12">
              <p class="title-sec mb-20">Destacado</p>

            </div>
          </div>

          <div style="background-image: url(images/bg-coffee.jpg);" class="d-banner-destacado" data-overlay-dark="4">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="d-img-destacado">
                  <img src="images/obs-coffee.png" alt="">
                </div>
              </div>

              <div class="col-lg-6 col-md-6 valign">
                <div class="d-info-destacado">
                  <p class="t1">Herbo-Coffee</p>
                  <p class="t2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet earum in quos nihil porro, perferendis. Nulla error vitae, inventore eaque possimus facilis voluptas quae. </p>
                  <a class="btn btn-blue-banner mt-3" href="#" role="button">Ver producto</a>

                </div>
              </div>

            </div>
          </div>

          <div class="row row-items-pro">

            <div class="col-lg-12 col-md-12">
              <p class="title-sec mb-20">Populares</p>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-verde/foreverY.png" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 verde">Línea Verde</p>
                      <p class="t2">Forever Y</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-verde/collagen.png" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 verde">Línea Verde</p>
                      <p class="t2">Collagen</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-yin-yang/vgr.jpg" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 ying-yang">Línea Yin Yang</p>
                      <p class="t2">VGR</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-yin-yang/zuleyka.jpg" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 ying-yang">Línea Yin Yang</p>
                      <p class="t2">Zuleyka</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-estrella/night-grass.jpg" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 estrella">Línea Estrella</p>
                      <p class="t2">Night Grass</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-estrella/obslim.jpg" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 estrella">Línea Estrella</p>
                      <p class="t2">Obslim</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-amarilla/agn.jpg" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 amarilla">Línea Amarilla</p>
                      <p class="t2">AGN</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-6 d-all-item-pro">
              <div class="d-item-pro h-100">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4">
                    <div class="d-img-pro">
                      <img src="images/productos/linea-amarilla/pmo.jpg" alt="">

                    </div>
                  </div>

                  <div class="col-lg-8 col-md-8 col-8">
                    <div class="d-info-pro">
                      <p class="t1 amarilla">Línea Amarilla</p>
                      <p class="t2">PMO</p>
                      <p class="t3">Frasco con 30 cápsulas</p>
                      <p class="t4 two-lines">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint itaque eaque, ex quia quisquam</p>
                      <a class="btn btn-blue mt-3" href="#" role="button">Ver producto</a>
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


  <footer class="valign">
    <div class="container">
      <div class="row valign">
        <div class="col-lg-6 col-md-6">
          <div class="d-footer-left ">
            <img src="images/logo-footer.png" alt="">
            <p class="t1">© PG 2019, Todos los derechos son reservados.</p>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="d-footer-right">
            <p class="t1">
              <a target="_blank" href=""><i class="fab fa-facebook-f"></i></a>
              <a target="_blank" href=""><i class="fab fa-instagram"></i></a>
              <a target="_blank" href=""><i class="fab fa-twitter"></i></a>
              <a target="_blank" href=""><i class="fab fa-youtube"></i></a>
            </p>
          </div>
        </div>

      </div>
    </div>

  </footer>


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

</body></html>
