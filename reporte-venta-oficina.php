<?php
    session_start();
    require 'bd/conexion.php';

    $user_id=-1;
    if(isset($_SESSION["user_id"])){
    $user_id=$_SESSION["user_id"];
    }

    if(!isset($_POST['fechauno'])||!isset($_POST['fechados'])){
    $query = 'SELECT * FROM ventascliente WHERE user_id ="'.$_SESSION["user_id"].'"' ;
    }else{
    $query = 'SELECT * FROM ventascliente WHERE user_id ="'.$_SESSION["user_id"].'" and fecha BETWEEN "'.$_POST['fechauno'].'" and "'.$_POST['fechados'].'"';
    $filtro = $_POST['fechauno'];
    $filtrodos = $_POST['fechados'];
}

$productos=R::getAll($query);


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


    <section class="sec-gray">
        <div class="container">
            <div class="row">
                
                <?php include 'menus/lineas_asistencia.php'; ?>
                <div class="col-lg-9 col-md-6 lista-productos-movil">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <p class="title-sec mb-20">Reporte de ventas</p>
                        </div>
                    </div>

                    <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">

                                <div class="d-form-reporte">

                                    <form action="reporte-venta-oficina.php" method="post" class="form-reporte">
                                        <p class="t1">Rango de fechas</p>
                                        <div class="form-row">

                                            <div class="form-group col-lg-4 col-md-4">
                                                <input type="date" class="datepicker-here form-control" placeholder="<?php echo $filtro;  ?>"  name="fechauno" data-date-format="yyyy/mm/dd" data-language='es' placeholder="Inicio">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-4">
                                                <input type="date" class="datepicker-here form-control" placeholder="<?php echo $filtrodos;  ?>" name="fechados" data-date-format="yyyy/mm/dd" data-language='es' placeholder="Fin">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-4">
                                                <button type="submit"  style="margin-top: 0rem!important; height: 37px;" class="btn btn-blue mt-2"><i style="color: white" class="fas fa-search"></i></button>
                                                <a type="button" style="margin-top: 0rem!important; height: 37px;" href="pdf-ventas-oficina.php<?php if (isset($_POST['fechauno'])&&isset($_POST['fechados'])){ ?>?inicio=<?php echo $_POST['fechauno'] ;  ?>&fin=<?php echo $_POST['fechados'] ; }?>" target="_blank" class="btn btn-blue mt-2"><i class="fas fa-arrow-circle-down mr-2"></i>Generar reporte</a>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row row-tabla-ventas">
                            <div class="col-lg-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>Fecha</th>
                                                <th>Cliente</th>
                                                <th style="text-align: center">Estatus</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($productos as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['fecha'] ?></td>
                                                <td><?php echo $item['nombre'] ?></td>
                                                <td style="text-align: center"><?php if($item['cobrado']!=0){?><i style="color: green;" class="far fa-check-circle"></i><?php }else{?><i style="color: red;" class="far fa-times-circle"></i><?php }?></td>
                                                <td>$<?php echo $item['total'] ?><sup>.00</sup></td>
                                            </tr>
                                        <?php } ?>  
                                        </tbody>

                                    </table>
                                </div>

                            </div>
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
    <script src="js/registro-oficina.js"></script>

    </body></html>
