<?php

require 'user_preferences/user-info.php';

$clientes=R::find('usuarios','rol = 0');

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

                <div class="col-lg-8 col-md-8 bg-gray" >
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Administrador</p>
                                    <p class="small-text-cuenta">Numero de administradores registrados <b>(<?php echo count($clientes) ?>)</b></p>
                                </div>
                            </div>

                        </div>

                        <table class="table" style="text-align:center">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php foreach ($clientes as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        <td><a href="editar-usuario.php?id=<?php echo $item['id']?>"><i class="fas fa-user-edit"></i></a></td>
                                        <td><a role="button" onclick="eliminar('<?php echo $item['id'] ?>')"><i class="far fa-trash-alt"></i></a></td>
                                    </tr> 
                                <?php } ?>    
                            </tbody>
                        </table>
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

    <script>
        $("input[type='number']").inputSpinner();
        $('[data-toggle="tooltip"]').tooltip();
    </script>

</body></html>