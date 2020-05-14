<?php
require 'user_preferences/user-info.php';


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
    <!-- responseive menu -->
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



    <!-- Top Menu -->
    <?php include("menus/top_menu.php"); ?>
    <!-- End Top Menu -->


    <!-- End Navbar ====
            ======================================= -->


    <section class="sec-cuenta">
        <div class="container">
            <div class="row">

                <!-- Admin Menu -->
                <?php include("menus/menu_general_admin.php"); ?>
                <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray">
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
                                                <label>Archivo de contrato.</label>
                                                <input type="file" name="pdf_file" id="pdf_file" />
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
                                        <div class="form-group col-lg-6 col-md-6">
                                            <div class="floating-label-group">
                                                <label class="label">País de registro</label>
                                                <select autocomplete="false" style="height:60%;" class="form-control" id="pais" name="pais" required>
                                                    <option value="MX">Mexico</option>
                                                    <option value="US">Estados Unidos</option>
                                                </select>
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
                                                <select name="ref" id="sector" data-live-search="true" class=" selectpicker form-control input-pos select-cliente-pos mt-3">
                                                    <option value="0">Seleccionar cliente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Firmar contrato electronicamente. <a href="docs/politicas.pdf">Contrato.</a>
                                            </label>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: "pos/webserviceapp/get_clientes.php",
                type: "POST",
                data: {
                    tipo: 2
                },
                dataType: "json",
                beforeSend: function() {},
                success: function(data) {
                    clientes = data.arreglo;
                    console.log(clientes);

                    //console.log(data.arreglo[2]);
                    $("#sector")
                        .empty()
                        .append(data.list);
                    $(".selectpicker").selectpicker("refresh");
                }
            });
        });
    </script>
</body>

</html>