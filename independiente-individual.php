<?php

require 'user_preferences/user-info.php';

$query = 'SELECT u.*,i.status,i.direccion,i.imagen,i.imagen2,i.archivo AS archivo FROM usuarios as u LEFT JOIN independientes as i on u.id = i.usuario_id WHERE u.rol=2 && u.id = "' . $_GET['id'] . '"';

$res = R::getAll($query);

$cliente = $res[0];

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
                        <div class="row ">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-folleto-ind">
                                    <div class="d-img-pro-ind" style="background-image: url('images/ine/<?php echo $cliente['imagen'] ?>'); height: 350px;
                                            background-size: cover;
                                            background-repeat: no-repeat; 
                                            ">
                                    </div>
                                    <br>
                                    <div class="d-img-pro-ind" style="background-image: url('images/ine/<?php echo $cliente['imagen2'] ?>'); height: 350px;
                                            background-size: cover;
                                            background-repeat: no-repeat; 
                                            ">
                                    </div>

                                    <div class="d-2">
                                        <p class="t1"><?php echo $cliente['nombre'].' '.$cliente['apellidos']?> <input hidden id="nombre" type="text" value="<?php echo $cliente['nombre'].' '.$cliente['apellidos']?>"></p>
                                        <p class="t2">Telefono: <?php echo $cliente['telefono'] ?></p>
                                        <p class="t2">Correo: <input id="correo" type="text" value="<?php echo $cliente['correo'] ?>" hidden><?php echo $cliente['correo'] ?></p>
                                        <p class="t2">Direccion: <?php echo $cliente['direccion'] ?></p>
                                        <input hidden class="t2" id="id" value="<?php echo $cliente['id'] ?>"></input>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a class="btn btn-blue" onclick="registrar()" style="color: white" role="button"><i class="fas fa-check"></i> Aprobar</a>
                                            </div>
                                            <div class="col-sm-3">
                                                <button class="btn btn-blue"  onclick="rechazar()"style="background-color: #e4605e; color:white"><i class="fas fa-ban"></i> Rechazar</button>
                                            </div>
                                            <div class="col-sm-3">
                                                <a class="btn btn-blue" href="firmas/firma-<?php echo $cliente['id'] ?>.pdf" style="color: white" role="button"> Ver firma</a>
                                            </div>
                                            <div class="col-sm-3">
                                                <a class="btn btn-blue" download href="/firmas/Documentos/<?php echo $cliente['archivo'] ?>" style="color: white" role="button">Contrato</a>
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
    <script src="js/main-perfil.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- eliminar js -->
    <script src="js/editar-persona.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script src="js/aceptar-independientes.js"></script>

    <script>
        $("input[type='number']").inputSpinner()
    </script>

</body>

</html>