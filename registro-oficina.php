<?php
$user_id = 0;
if (isset($_GET['ui'])) {
  $user_id = $_GET['ui'];
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
    <link rel="stylesheet" href="css/secundary-style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/menu-movil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

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

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload2').attr("style", "background-image: url(" + e.target.result + ");");
                    $('.image-upload2').addClass("overlay-image-upload");

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
            
                <div class="col-lg-3 col-md-3 bg-white">
                    <div style="margin-top: 100px" >
                        
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 bg-gray">
                    <div class="d-cont-right">

                    <div class="row">
                            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                                <div class="d-form">
                                    <p class="title-cuenta">Registro independiente.</p>
                                    <form id="form-folleto" class="form-registro" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <div class="image-upload2" style="background-image: url(images/bg-image-upload.jpg?>);">
                                            </div>
                                            <p>Favor de anexar una fotografía de la parte frontal de su identificacion.</p>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group" style="text-align: right">
                                                <label for="file-input" style="cursor: pointer;">
                                                    <i class="fas fa-plus"></i> Subir foto
                                                </label>
                                                <input name="img-producto" id="file-input" type="file" onchange="readURL2(this);" hidden />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="image-upload " style="background-image: url(images/bg-image-upload.jpg?>);">
                                            </div>
                                            <p>Favor de anexar una fotografía de la parte reversa de su identificacion.</p>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group" style="text-align: right">
                                                <label for="file-input2" style="cursor: pointer;">
                                                    <i class="fas fa-plus"></i> Subir foto
                                                </label>
                                                <input name="img-producto2" id="file-input2" type="file" onchange="readURL(this);" hidden />
                                            </div>
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
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="tel" class="form-control input-form-underline" name="direccion" required />
                                                <label class="floating-label">Direccion</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <?php if($user_id != 0){ ?>
                                                    <input value="<?php echo $user_id ?>" type="tel" class="form-control input-form-underline" name="ref" hidden/>
                                                <?php }else{ ?>
                                                    <select name="ref" id="sector" data-live-search="true"class=" selectpicker form-control input-pos select-cliente-pos mt-3">
                                                        <option value="0">Seleccionar cliente</option>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Firmar contrato electronicamente. <a href="docs/politicas.pdf">Contrato.</a>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <label class="floating-label">La verificación y validación de la cuenta puede llegar a tardar hasta 24 horas. </label>
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





    <!-- jQuery -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>
    <!-- registro scripts -->
    <script src="js/registro-independiente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    

</body></html>
