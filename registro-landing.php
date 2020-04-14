<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$id = $_SESSION["user_id"];

$sobremi = R::findOne('landing','usuario_id ='.$id);

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

  <section class="sec-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
          <div class="d-form">

            <p class="title-form"><img src="images/logo-ind-color.png" alt="">Página personal</p>


            <form class="form-registro" id="form-landing">

              <div class="form-group">
                <div class="floating-label-group">
                  <textarea name="descripcion" class="form-control input-form pt-2" rows="7" required><?php if(!empty($sobremi)){echo $sobremi->descripcion;} ?></textarea>
                  <label class="floating-label">Sobre mí</label>
                </div>
              </div>

              <button type="submit" class="btn btn-lg-blue mt-30">Guardar</button>

            </form>



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
  <!-- sweetalert scripts -->
  <script src="js/sweetalert2.js"></script>

  <!-- custom scripts -->
  <script src="js/scripts.js"></script>
  <script src="js/pagina-personal.js"></script>
  <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>

</body></html>
