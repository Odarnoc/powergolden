<?php
    require 'user_preferences/user-info.php';

    $id=$_GET['id'];

    $item=R::findOne('folletos','id ='.$id );

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

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Editar paquete</p>
                                    <p class="small-text-cuenta">Puedes editar el paquete seleccionado.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div class="d-form-registro-productos">

                                    <form id="edit-folleto" class="form-registro-productos" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <div class="image-upload " style="background-image: url(images/folletos/<?php echo $item['imagen'] ?>);">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group" style="text-align: right">
                                                <label for="file-input" style="cursor: pointer;">
                                                    <i class="fas fa-plus"></i> Subir foto
                                                </label>
                                                <input name="img-producto" id="file-input" type="file" onchange="readURL(this);" hidden />
                                            </div>
                                        </div>                          

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input name="nombre" id="nombre" type="text" value="<?php echo $item['nombre']; ?>"class="form-control input-form-underline"/>
                                                <label class="floating-label-underline">Nombre del folleto</label>
                                            </div>
                                        </div>

                                        <div class="form-group" hidden>
                                            <div class="floating-label-group">
                                                <input name="id" value="<?php echo $item['id']; ?>" id="nombre" type="text" class="form-control input-form-underline"/>
                                            </div>
                                        </div>

                                        <div class="form-group" >
                                            <div class="floating-label-group">
                                                <input name="description" value='<?php echo $item['descripcion']; ?>' id="descripcion" type="text" class="form-control input-form-underline"/>
                                                <label class="floating-label-underline">Descripción del folleto</label>
                                            </div>
                                        </div>
                                        

                                        <!--
                                        <div class="form-group">
                                            <button class="btn btn-primary" onclick="productos()" >Agregar</button>
                                        </div>

                                        <div id="select">

                                        </div> -->

                                        <button type="submit"  class="btn btn-lg-blue mt-3">Guardar</button>

                                    </form>
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
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script src="js/nuevo-folleto.js"></script>



</body></html>
