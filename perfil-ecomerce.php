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

      <section class="sec-gray separar-menu">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="d-cont-right perfil-movil">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Perfil</p>
                                    <p class="small-text-cuenta">Deberás ingresar algunos datos para completar tu registro en la plataforma.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <div class="d-btn-editar-perfil">
                                    <a class="btn btn-editar-perfil" id="edit_button" href="#0" role="button">Editar</a>
                                </div>
                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-perfil">
                                    <form class="form-perfil">

                                        <div class="form-row">
                                            <div class="col-lg-5 col-md-5">

                                                <p class="sub-title-cuenta">Datos personales</p>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->nombre; ?>" type="text" id="nombre" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Nombre </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->apellidos; ?>" type="text" id="apellido" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Apellidos</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->correo; ?>" type="text" id="correo" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Correo electrónico</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->telefono; ?>" type="text" id="telefono"  pattern="[0-9]" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Teléfono</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->nacimiento; ?>" type="date" id="nacimiento" class="form-control input-form-underline" required disabled/>
                                                        <label class="floating-label-underline">Fecha de nacimiento</label>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-lg-5 col-md-5 offset-lg-2 offset-md-2">

                                                <p class="sub-title-cuenta">Dirección</p>


                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->direccion; ?>" type="text" id="direccion" class="form-control input-form-underline" required disabled/>
                                                        <label class="floating-label-underline">Dirección</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->estado; ?>" type="text" id="estado" class="form-control input-form-underline" required disabled/>
                                                        <label class="floating-label-underline">Estado</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->ciudad; ?>" type="text" id="ciudad" class="form-control input-form-underline" required disabled/>
                                                        <label class="floating-label-underline">Ciudad</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->codigop; ?>" type="text" id="cp" class="form-control input-form-underline" required disabled/>
                                                        <label class="floating-label-underline">Código postal</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="button" id="btn-guardar-perfil" class="btn btn-lg-blue inactive" disabled>Guardar</button>
                                                </div>

                                            </div>
                                        </div>
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
  <script src="js/main-perfil.js"></script>

  <!-- custom scripts -->
  <script src="js/scripts.js"></script>
  <script src="js/bootstrap-input-spinner.js"></script>
  <!-- sweetalert scripts -->
  <script src="js/sweetalert2.js"></script>

  <!-- responseive menu -->
  <script src="js/menu-movil.js"></script>
  <!-- perfil scripts -->
  <script src="js/perfil.js"></script>

  <script>
    $(document).ready(function() {
      $('#perfil-active').addClass("active");
    });
  </script>

</body></html>
