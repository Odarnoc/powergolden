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

                        <p class="title-form"><img src="images/logo-ind-color.png" alt="">Afiliate</p>


                        <form class="form-registro">

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="text" class="form-control input-form" id="name" required />
                                    <label class="floating-label">Nombre</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="text" class="form-control input-form" id="last_name" required />
                                    <label class="floating-label">Apellido</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="tel" class="form-control input-form" id="phone" required />
                                    <label class="floating-label">Teléfono</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="text" class="form-control input-form" id="email" required />
                                    <label class="floating-label">Correo electrónico</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="password" class="form-control input-form" id="pass" required />
                                    <label class="floating-label">Contraseña</label>
                                </div>
                            </div>

                            <button class="btn btn-lg-blue mt-30" id="registrar_but">Aceptar</button>

                        </form>

                        <div class="d-footer-form">
                            <p class="t1">¿Ya tienes una cuenta?</p>
                            <p class="t2"><a href="iniciar-sesion.php" class="btn-link-active">Iniciar sesión ahora</a></p>

                            <div class="row row-links-form">
                                <div class="col-lg-6 col-md-6">
                                    <p class="t3"><a href="" class="btn-link">Términos y condiciones</a></p>

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <p class="t4"><a href="" class="btn-link">Política de privacidad</a></p>

                                </div>
                            </div>

                        </div>

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
    <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>
  <script src="js/no-menu-movil.js"></script>

    <!-- register scripts -->
    <script src="js/registro.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

</body>

</html>