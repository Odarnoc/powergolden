<?php
    require 'user_preferences/user-info.php';
    $id = 0;
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $rol = R::findOne('roles','id = '.$id);
    $query = 'SELECT id, label,IF((SELECT id FROM privilegios as priv WHERE priv.menu_id = s.id && priv.rol_id = '.$id.' ) IS NULL,0,1) as checked FROM submenu as s';
    $menus = R::getAll($query);
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/helper.css">
    <!-- responseive menu -->
    <link rel="stylesheet" href="css/menu-movil.css">

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
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Editar rol</p>
                                    <p class="small-text-cuenta">Puedes editar aqui los roles para tus usuarios.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                        <div class="d-nuevo-rol">
                                <div class="col-lg-12 col-md-12">

                                    <div class="d-form-registro-productos">

                                        <form id="form-roles" class="form-registro-productos" method="post"
                                            enctype="multipart/form-data">

                                            <div class="form-row">
                                            <div class="form-group col-lg-6 col-md-6">
                                                <div class="floating-label-group">
                                                    <input id="nombre" type="text"
                                                        class="form-control input-form" required value="<?php echo $rol->nombre; ?>" />
                                                    <label class="floating-label">Nombre del rol </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6">
                                                <div class="floating-label-group">
                                                    <input id="descripcion" type="text"
                                                        class="form-control input-form" required value="<?php echo $rol->descripcion; ?>" />
                                                    <label class="floating-label">Descripción</label>
                                                </div>
                                            </div>

                                            </div>

                                            
                                            <p class="p-privilegios">Privilegios <br><br></p>
                                            <div class="form-row">

                                                <?php
                $contmenu=0;
                foreach ($menus as $item) { 
            ?>
                                                <div class="form-group col-lg-6 col-md-6 col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="menus"
                                                            <?php if($item['checked'] == 1) {echo 'checked';} ?>
                                                            type="checkbox" id="checkbox<?php echo $item['id']; ?>"
                                                            value="<?php echo $item['id']; ?>">
                                                        <label class="form-check-label"
                                                            for="checkbox<?php echo $item['id']; ?>"><?php echo $item['label']; ?></label>
                                                    </div>
                                                </div>
                                                <?php
                    $contmenu++; 
                } 
            ?>
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

    <script>
    var rol_id = '<?php echo $id; ?>';
    </script>

    <script src="js/editar-rol.js"></script>



</body>

</html>