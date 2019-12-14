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


            <!-- Menu -->
            <?php include("menus/menu_general.php"); ?>
            <!-- End Menu -->


  <!-- End Navbar ====
    	======================================= -->

  <section class="sec-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
          <div class="d-form d-form-recuperar">

            <p class="title-form"><img src="images/logo-ind-color.png" alt="">Recuperar contraseña</p>


            <form class="form-white">

              <p class="t1">Ingresa el correo electrónico de tu cuenta</p>

              <div style="margin-bottom: 1rem;" class="form-group">
                <div class="floating-label-group">
                  <input type="text" id="email" class="form-control input-form" required />
                  <label class="floating-label">Correo electrónico</label>
                </div>
              </div>

              <p class="t2">Enviaremos un código a tu correo electrónico para restablecer tu contraseña</p>


              <button type="submit" id="cambiar-pass" class="btn btn-lg-blue mt-50">Continuar</button>

            </form>

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

  <!-- custom scripts -->
  <script src="js/recuperar-contrasena.js"></script>

  <!-- sweetalert scripts -->
  <script src="js/sweetalert2.js"></script>

</body></html>
