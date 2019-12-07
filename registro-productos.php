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
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Nuevo producto</p>
                                    <p class="small-text-cuenta">Para agregar un nuevo producto deberás completar el siguiente formulario.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div class="d-form-registro-productos">

                                    <form action="" class="form-registro-productos">
                                        <div class="form-group">
                                            <div class="image-upload" style="background-image: url(images/bg-image-upload.jpg);">
                                                <label for="file-input">
                                                    <i class="fas fa-plus"></i> Subir foto
                                                </label>
                                                <input id="file-input" type="file" onchange="readURL(this);" />

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Nombre del producto *</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Descripción *</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <textarea class="form-control input-form-underline" rows="3" required></textarea>
                                                <label class="floating-label-underline">Ingredientes *</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <textarea class="form-control input-form-underline" rows="3" required></textarea>
                                                <label class="floating-label-underline">Modo de uso *</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Inventario *</label>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="floating-label-group">

                                                <label class="label-select">Categoria *</label>
                                                <select class="form-control input-form-underline">
                                                    <option hidden>Seleccionar la categoria</option>
                                                    <option>Línea Café</option>
                                                    <option>Línea Amarilla</option>
                                                    <option>Línea Rosa</option>
                                                    <option>Línea Tinta</option>
                                                    <option>Línea Verde</option>
                                                    <option>Línea Yin Yang</option>
                                                    <option>Línea Estrella</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Precio *</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-lg-blue mt-3">Guardar</button>

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

</body></html>
