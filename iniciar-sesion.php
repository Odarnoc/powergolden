<?php
session_start();
if(isset($_SESSION["user_id"])){
    header("Location: index.php");
}

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

  <header class="header-home valign" data-overlay-dark="4" data-scroll-index="0">
    <div class="container">
      <div class="row">
        <div class="col-lg- col-md-5 col-12">
          <div class="d-form-login">
            <div class="d-form">

              <p class="title-form"><img src="images/logo-ind-color.png" alt="">Iniciar sesión</p>

              <form id="form-login" class="form-login">

                <div class="form-group">
                  <div class="floating-label-group">
                    <input type="text" class="form-control input-form" required id="email"/>
                    <label class="floating-label">Correo de socio</label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="floating-label-group">
                    <input type="password" class="form-control input-form" required id="pass"/>
                    <label class="floating-label">Contraseña</label>
                  </div>
                </div>

                <button class="btn btn-lg-blue mt-10">Entrar</button>

              </form>

              <div class="d-footer-form">
                <div class="row row-links-form">
                  <div class="col-lg-6 col-md-6">
                    <p class="t3"><a href="recuperar-contrasena.php" class="btn-link">Olvidé mi contraseña</a></p>

                  </div>
                  <div class="col-lg-6 col-md-6">
                    <p class="t4"><a href="registro.php" class="btn-link">Registrarme como socio</a></p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>




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

  <!-- sesion scripts -->
  <script src="js/sesion.js"></script>

      <!-- sweetalert scripts -->
      <script src="js/sweetalert2.js"></script>

</body></html>
