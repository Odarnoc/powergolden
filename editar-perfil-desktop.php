<?php

    session_start();
    if(!isset($_SESSION["user_id"])){
        header("Location: iniciar-sesion.php");
    }

    require 'bd/conexion.php';

    $query = 'SELECT * FROM `usuarios` WHERE id= "26"';

    $information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);


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

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">



    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>


    <nav class="navbar navbar-solid navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
            <a class="logo" href="index.html">
                <img src="images/logo-navbar-white.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn-cuenta-nav" href="editar-perfil-desktop.html"><i class="fas fa-user-circle"></i>Brayam Morando</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>


    <!-- End Navbar ====
    	======================================= -->

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 bg-white">
                    <div class="d-menu-left">
                        <div class="clearfix d-img-name">
                            <img src="images/profile-brayam-morando.png" alt="">
                            <p class="t1 one-line"><?php echo $information->nombre." ".$information->apellidos; ?></p>
                            <p class="t2 one-line"><?php echo $information->correo; ?></p>
                        </div>

                        <div class="d-list-menu">
                            <ul>
                                <li><a href="">Usuarios</a></li>
                                <li><a href="">Timeline de productos</a></li>
                                <li>
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Productos
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Listado de productos</a>
                                            <a class="dropdown-item" href="#">Carrito de compras</a>
                                            <a class="dropdown-item" href="#">Lista de carrito</a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="">Tarjetas</a></li>
                                <li><a href="">Paquetes de productos</a></li>
                                <li><a href="">Folletos electrónicos</a></li>
                                <li><a href="">Promociones</a></li>
                                <li><a href="">Videos</a></li>
                                <li><a href="">New letters</a></li>
                                <li><a class="logout" href="iniciar-sesion.html">Cerrar sesión<i class="fas fa-sign-out-alt"></i></a></li>
                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
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
                                                        <input value="<?php echo $information->telefono; ?>" type="text" id="telefono" class="form-control input-form-underline" disabled/>
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


    <footer class="valign">
        <div class="container">
            <div class="row valign">
                <div class="col-lg-6 col-md-6">
                    <div class="d-footer-left ">
                        <img src="images/logo-footer.png" alt="">
                        <p class="t1">© PG 2019, Todos los derechos son reservados.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="d-footer-right">
                        <p class="t1">
                            <a target="_blank" href=""><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href=""><i class="fab fa-instagram"></i></a>
                            <a target="_blank" href=""><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href=""><i class="fab fa-youtube"></i></a>
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </footer>


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

    <script src="js/scripts.js"></script>

    <!-- perfil scripts -->
    <script src="js/perfil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

</body></html>
