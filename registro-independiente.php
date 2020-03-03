<?php
require 'bd/conexion.php';
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

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload').attr("style", "background-image: url(" + e.target.result + ");");
                    $('.image-upload').addClass("overlay-image-upload");

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</head>

<body>


    <!-- Menu -->
    <?php include("menus/menu_general.php"); ?>
    <!-- End Menu -->


    <!-- End Navbar ====
            ======================================= -->


    <section class="sec-cuenta">
        <div class="container">
            <div class="row">


                <div class="col-lg-9 col-md-9 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                                <div class="d-form">
                                    <p class="title-cuenta">Registro independiente.</p>
                                    <form id="form-folleto" class="form-registro" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="image-upload" style="background-image: url(images/bg-image-upload.jpg);">
                                                <label for="file-input" style="margin-bottom: 20px;">
                                                    <i class="fas fa-plus"></i> Subir foto
                                                </label>
                                                <input name="img-producto" id="file-input" type="file" onchange="readURL(this);" required />
                                            </div>
                                            <p>Favor de anexar una fotografía de su INE.</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="name" required />
                                                <label class="floating-label">Nombre</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="paterno" required />
                                                <label class="floating-label">Apellido paterno</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" name="materno" required />
                                                <label class="floating-label">Apellido materno</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="tel" class="form-control input-form-underline" name="phone" required />
                                                <label class="floating-label">Teléfono</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="email" class="form-control input-form-underline" name="email" required />
                                                <label class="floating-label">Correo electrónico</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-lg-blue mt-30" id="registrar_us_ofice">Aceptar</button>
                                    </form>
                                </div>
                            </div>
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

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <!-- registro scripts -->
    <script src="js/registro-independiente.js"></script>

</body>

</html>