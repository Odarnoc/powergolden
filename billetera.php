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
                            <p class="t1 one-line">Brayam Morando</p>
                            <p class="t2 one-line">brayamdesign@gmail.com</p>
                        </div>

                        <div class="d-list-menu">
                            <ul>
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li><a href="clientes.html">Clientes</a></li>
                                <li><a href="ventas.html">Ventas</a></li>
                                <li>
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Productos
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="registro-productos.html">Agregar producto</a>
                                            <a class="dropdown-item" href="listado-productos.html">Listado de productos</a>
                                            <a class="dropdown-item" href="carrito.html">Carrito de compras</a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="billetera.html">Billetera</a></li>
                                <li><a href="bonos.html">Bonos</a></li>
                                <li><a href="reportes.html">Reportes</a></li>
                                <li><a href="matriz.html">Matriz de clientes</a></li>
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
                                    <p class="title-cuenta">Billetera</p>
                                    <p class="small-text-cuenta">Deberás ingresar al menos un método de pago.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">

                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-tarjetas">

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">

                                            <p class="sub-title-cuenta">Nueva tarjeta</p>

                                            <form action="" class="form-tarjetas">
                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" class="form-control input-form-underline" required />
                                                        <label class="floating-label-underline">Nombre en la tarjeta</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input type="text" class="form-control input-form-underline" required />
                                                        <label class="floating-label-underline">Número en la tarjeta</label>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <div class="floating-label-group">
                                                            <input type="text" class="form-control input-form-underline" required />
                                                            <label class="floating-label-underline">MM/AA</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <div class="floating-label-group">
                                                            <input type="text" class="form-control input-form-underline" required />
                                                            <label class="floating-label-underline">CVV</label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <button type="button" id="btn-guardar-perfil" class="btn btn-lg-blue">Guardar</button>
                                                </div>

                                            </form>

                                        </div>

                                        <div class="col-lg-5 col-md-5 offset-lg-2 offset-md-2">



                                            <p class="sub-title-cuenta">Mis tarjetas</p>

                                            <div class="d-item-tarjeta master">
                                                <div class="row mb-10">
                                                    <div class="col-lg-6 col-md-6 col-6">
                                                        <p class="t1"><img src="images/icon-master-card.svg" alt=""></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6">
                                                        <p class="t2">**** 4543</p>
                                                    </div>
                                                </div>

                                                <p class="t3">Nombre</p>
                                                <p class="t4 one-line">Brayam Omar Morando Pérez</p>

                                                <div class="row mt-10">
                                                    <div class="col-lg-6 col-md-6 col-6">
                                                        <p class="t3">Fecha</p>
                                                        <p class="t4">09/22</p>

                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6 d-btn-eliminar-tarjeta">
                                                        <a class="btn btn-eliminar-tarjeta" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">Eliminar tarjeta</a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="d-item-tarjeta visa">
                                                <div class="row mb-10">
                                                    <div class="col-lg-6 col-md-6 col-6">
                                                        <p class="t1"><img src="images/icon-visa.svg" alt=""></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6">
                                                        <p class="t2">**** 9606</p>
                                                    </div>
                                                </div>

                                                <p class="t3">Nombre</p>
                                                <p class="t4 one-line">Brayam Omar Morando Pérez</p>

                                                <div class="row mt-10">
                                                    <div class="col-lg-6 col-md-6 col-6">
                                                        <p class="t3">Fecha</p>
                                                        <p class="t4">11/21</p>

                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6 d-btn-eliminar-tarjeta">
                                                        <a class="btn btn-eliminar-tarjeta" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">Eliminar tarjeta</a>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center mb">
                    <img class="img-mb" src="images/icon-atencion.png" alt="">
                    <p class="title-mb mt-20">Atención</p>
                    <p class="sub-title-mb">¿Desea eliminar el metodo de pago?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-aceptar-modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>


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

</body></html>
