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

  <!-- OpenPay -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>


  <!-- Menu -->
  <!-- End Menu -->

  <!-- End Navbar ====
    	======================================= -->

  <header class="header-int valign header-contacto" data-overlay-dark="4" data-scroll-index="0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <p class="title-header-int">
            Recuperar Cuenta.
          </p>

        </div>
      </div>
    </div>

  </header>


  <section class="bg-white sec-contacto">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
          <div class="d-form-contacto">

            <p class="t1">¿Deseas recuperar tu cuenta?</p>
            <p class="t2">¡Ingresa los pdatos para hacer el pago de recuperacion!</p>


            <form class="form-contacto" method="POST" id="payment-form">

              <input type="hidden" name="token_id" id="token_id">
              <input type="hidden" name="use_card_points" id="use_card_points" value="false">

              <div class="form-group">
                <div class="floating-label-group">
                  <input class="form-control input-form" required type="text" autocomplete="off" data-openpay-card="holder_name" />
                  <label class="floating-label">Nombre del titular</label>
                </div>
              </div>

              <div class="form-group">
                <div class="floating-label-group">
                  <input class="form-control input-form" required type="text" autocomplete="off" data-openpay-card="card_number" />
                  <label class="floating-label">Número de tarjeta</label>
                </div>
              </div>

              <div class="form-group">
                <div class="floating-label-group">
                  <input class="form-control input-form" required type="text" data-openpay-card="expiration_month" />
                  <label class="floating-label">Mes de expiración</label>
                </div>
              </div>

              <div class="form-group">
                <div class="floating-label-group">
                  <input class="form-control input-form" required type="text" data-openpay-card="expiration_year"></input>
                  <label class="floating-label">Año de expiración</label>
                </div>
              </div>

              <div class="form-group">
                <div class="floating-label-group">
                  <input class="form-control input-form" required type="text" autocomplete="off" data-openpay-card="cvv2"></input>
                  <label class="floating-label">Código de seguridad (3 dígitos)</label>
                </div>
              </div>

              <button type="submit" id="pay-button" class="btn btn-lg-blue mt-20">Pagar</button>
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
  <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
  <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
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
  <!-- Contacto js -->
  <script src="js/contacto.js"></script>
  <!-- sweetalert scripts -->
  <script src="js/sweetalert2.js"></script>

  <script src="js/recuperar-cuenta.js"></script>


</body>

</html>