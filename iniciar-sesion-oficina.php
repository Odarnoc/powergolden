<?php
session_start();
if (isset($_SESSION["user_id"]) && $_SESSION["rol"] = 0) {
  header("Location: oficina-virtual.php");
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

              <form id="form-login-oficina" class="form-login">

                <div class="form-group">
                  <div class="floating-label-group">
                    <input type="text" class="form-control input-form" required id="email" />
                    <label class="floating-label">Codigo socio</label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="floating-label-group">
                    <input type="password" class="form-control input-form" required id="pass" />
                    <label class="floating-label">Contraseña</label>
                  </div>
                </div>

                <button class="btn btn-lg-blue mt-10">Entrar</button>

              </form>

              <div class="d-footer-form">
                <div class="row row-links-form">
                  <div class="col-lg-6 col-md-6">
                    <p class="t4" style="text-align: left"><a href="registro-oficina.php" class="btn-link">Registrarme como socio</a></p>
                    <p class="t4" style="text-align: left"><a href data-toggle="modal" data-target="#modalRecuperar" class="btn-link">Recuperar cuenta</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Modal Recuperar-->
  <div class="modal fade" id="modalRecuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">¿Deseas recuperar su cuenta? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-modal-cliente">
            <p class="t1">Para la recuperacion de su cuenta se cobrara un monto de $500.00 MX</p>
            <div class="form-group">
              <p>Codigo de socio.</p>
              <input type="text" id="codigore" class="form-control input-form" required />
              <p>Correo electronico.</p>
              <input type="text" id="correore" class="form-control input-form" required />
            </div>
            <div class="row mt-30">
              <div class="col-lg-6 col-md-6" style="margin: auto;">
                <button style="background-color: #49B7F3; color:white;" type="button" data-toggle="modal" data-target="#modalPagar" class="btn btn-lg-modal btn-cliente-temporal">Recuperar cuenta</button>
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

  <!-- Modal Metodo de pago -->
  <div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Metodos de pago.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
              <button type="button" class="btn btn-lg-modal btn-pago-tarjeta" data-toggle="modal" data-target="#modalGenerarReferencia"><i class="fas fa-credit-card mr-2"></i> Pago con Referencia</button>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
              <button type="button" class="btn btn-lg-modal" onclick="infocliente()"><i class="fas fa-credit-card mr-2"></i> Pago con Tarjeta</button>
            </div>

          </div>
          <br>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <div id="paypal-button-container"></div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12" id="container"></div>

          </div>


          <br>
          <div class="row mt-1" id="div_pago" style="display:none;">
            <div class="col-lg-12 col-md-12 col-12">
              <button type="button" onclick="sale();" class="btn btn-lg-blue btn-bg-blue">Completar pago</button>

            </div>
          </div>
          <div class="row mt-1">
            <div class="col-lg-12 col-md-12 col-12">
              <button type="button" onclick="sale_externo();" class="btn btn-lg-blue btn-bg-blue">Pago Externo</button>

            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- jQuery -->
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

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

  <script src="js/recuperar-cuenta.js"></script>

  <script src="https://www.paypal.com/sdk/js?client-id=Afj8W6DoGpUac1ZsvxkGMqt5yoeN3jEEA4DZ-n2Fr-qicsBHWUTcwVlssu1lEDDh3hBnBosC82L4uhXM&currency=MXN&locale=es_MX" data-sdk-integration-source="button-factory"></script>
  <script async   src="https://pay.google.com/gp/p/js/pay.js"   onload="onGooglePayLoaded()"></script>


</body>

</html>