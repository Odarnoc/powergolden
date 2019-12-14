<?php
require 'bd/conexion.php';

$id_prod = $_GET['key'];

session_start();
$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}
$query1='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id LIMIT 1';
$res=R::getAll($query1);
$prodIndividual = $res[0];

$query2='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id where p.id='.$prodIndividual['id'].' and p.categoria='.$prodIndividual['categoria'].' ORDER BY RAND() LIMIT 2';
$prodsRelacionados=R::getAll($query2);

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


            <!-- Menu -->
            <?php include("menus/menu_general.php"); ?>
            <!-- End Menu -->


    <!-- End Navbar ====
    	======================================= -->

    <header class="header-home valign" data-overlay-dark="4" data-scroll-index="0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">

                    <div class="d-info-header">
                        <img class="logo-header" src="images/logo-header.png" alt="">
                        <h1 class="t1">El mundo</h1>
                        <h1 class="t2">de la Herbolaria</h1>
                        <a class="btn btn-header mt-30" href="#" data-scroll-nav="1" role="button">Ver productos</a>
                    </div>

                </div>
            </div>
        </div>
    </header>


    <section id="sec-tienda" class="sec-search" data-scroll-index="1">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-5 col-10 ">
                    <form action="" class="f-search-home">
                        <div class="form-row">
                            <div class="form-group col-md-10 col-10">
                                <input type="text" class="form-control input-search" placeholder="Buscar productos">

                            </div>

                            <div class="form-group col-md-2 col-2 text-center">
                                <a class="btn btn-search" href="#" role="button"><img src="images/icon-search-white.svg" alt=""></a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-2 col-md-2 offset-md-5  col-2">
                    <div class="d-icon-bag">
                        <a class="btn btn-bag" href="#" role="button"><i class="fas fa-shopping-bag"></i></a>

                    </div>
                </div>

            </div>
        </div>

    </section>


    <section class="sec-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="d-lineas">
                        <p class="title-sec">LÍneas</p>

                        <ul>
                            <li><a href="linea-cafe.html"><i class="fas fa-circle cafe"></i>Café</a></li>
                            <li><a href="linea-amarilla.html"><i class="fas fa-circle amarilla"></i>Amarilla</a></li>
                            <li><a href="linea-rosa.html"><i class="fas fa-circle rosa"></i>Rosa</a></li>
                            <li><a href="linea-tinta.html"><i class="fas fa-circle tinta"></i>Tinta</a></li>
                            <li><a class="active" href="linea-verde.html"><i class="fas fa-circle verde"></i>Verde</a></li>
                            <li><a href="linea-yin-yang.html"><i class="fas fa-circle ying-yang"></i>Yin Yang</a></li>
                            <li><a href="linea-estrella.html"><i class="fas fa-circle estrella"></i>Estrella</a></li>
                        </ul>

                    </div>

                    <div class="d-asistencia mt-30">
                        <img src="images/icon-asistencia.svg" alt="">
                        <p class="t1">Asistencia</p>
                        <p class="t2"><a href="tel:3331227000">33 3122 7000</a></p>
                    </div>



                </div>


                <div class="col-lg-9 col-md-6">

                    <div class="row row-breadcrumb">
                        <div class="col-lg-12 col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="linea-verde.html">Línea Verde</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Forever Y</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row row-pro-ind ">
                        <div class="col-lg-12 col-md-12 ">
                            <div class="d-pro-ind ">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="d-img-pro-ind ">
                                            <img src="productos_img/<?php echo $prodIndividual['imagen'] ?>" alt="">
                                        </div>

                                    </div>

                                    <div class="col-lg-8 col-md-8">
                                        <div class="d-info-pro-ind">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <span class="badge badge-disponible">Disponible</span>
                                                    <p class="title-pro-ind one-line"><?php echo $prodIndividual['nombre'] ?></p>
                                                    <p class="sub-title-pro-ind one-line"><?php echo $prodIndividual['descripcion'] ?></p>
                                                </div>

                                                <div class="col-lg-4 col-md-4">
                                                    <p class="price-pro-ind">$<?php echo $prodIndividual['precio'] ?></p>
                                                </div>
                                            </div>

                                            <div class="row row-info-pro-ind">
                                                <div class="col-lg-12 col-md-12">
                                                    <p class="t1"><b>Ingredientes:</b> <?php echo $prodIndividual['ingredientes'] ?></p>

                                                    <p class="t2"><b>Modo de uso:</b> <?php echo $prodIndividual['uso'] ?></p>
                                                </div>
                                            </div>

                                            <div class="row row-cant-pro-ind">
                                                <div class="col-lg-12 col-md-12">

                                                    <form class="form-cant-pro-ind">
                                                       <p class="t1"><b>Cantidad</b></p>
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-4 col-md-4">
                                                                <input id="cantidad" type="number" class="cant-number" value="1" min="1" max="500" step="1" />
                                                            </div>
                                                            <div class="form-group col-lg-4 col-md-4">
                                                                <button type="button" class="btn btn-add-car" onclick="agregar()">Agregar al carrito</button>
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
                    </div>



                    <div class="row row-items-pro">

                        <div class="col-lg-12 col-md-12">
                            <p class="title-sec mb-20">Relacionados</p>
                        </div>


                        
                        <?php foreach ($prodsRelacionados as $item) { ?>
                            <div class="col-lg-6 d-all-item-pro">
                                <div class="d-item-pro h-100">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-4">
                                            <div class="d-img-pro">
                                                <img src="productos_img/<?php echo $item['imagen'] ?>" alt="">

                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-8 col-8">
                                            <div class="d-info-pro">
                                                <p class="t1" style="color:<?php echo $item['color'] ?>">Línea <?php echo $item['linea'] ?></p>
                                                <p class="t2"><?php echo $item['nombre'] ?></p>
                                                <p class="t3"><?php echo $item['descripcion'] ?></p>
                                                <p class="t4 two-lines"><?php echo $item['ingredientes'] ?></p>
                                                <a class="btn btn-blue mt-3" href="producto-individual.php?key=<?php echo $item['id'] ?>" role="button">Ver producto</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        


                    </div>

                </div>

            </div>
        </div>

    </section>


    <section>
        <div class="container">

            <div class="d-asistencia-movil">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="d-img-asistencia">
                            <img src="images/icon-asistencia.svg" alt="">

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-6 valign">
                        <div class="d-info-asistencia">

                            <p class="t1">Asistencia</p>
                            <p class="t2"><a href="tel:3331227000">33 3122 7000</a></p>

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
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script>
        $("input[type='number']").inputSpinner()
    </script>
    <script>
        var prod = '<?php echo json_encode($prodIndividual); ?>';
    </script>
    <script src="js/prod-individual.js"></script>

</body></html>
