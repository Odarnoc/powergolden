<?php

require 'user_preferences/user-info.php';

if(!isset($_POST['busqueda'])){
    $query = 'SELECT * FROM folletos';
    $filtro = "Buscar paquete";
}else{
    $query = 'SELECT * FROM folletos where  (nombre LIKE "%'.$_POST['busqueda'].'%")' ;
    $filtro = $_POST['busqueda'];
}

$paquetes=R::getAll($query); 
var_dump($paquetes);

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
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Folletos electrónicos</p>
                                    <p class="small-text-cuenta">Aqui se muestran todos los folletos agregados hastala fecha.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-buscar-productos">

                            <!-- <div class="col-lg-8 col-md-8">
                                <div class="d-buscar-l-p">
                                    <form action="folletos.php" method="post"class="f-search-home">
                                        <div class="form-row">
                                            <div class="form-group col-lg-10 col-md-10 col-10">
                                                <input type="text" name="busqueda" class="form-control input-search" placeholder="<?php echo $filtro;  ?>">
                                            </div>

                                            <div class="form-group col-md-2 col-2 text-center">
                                                <button class="btn btn-search" type="submit" role="button"><img src="images/icon-search-white.svg" alt=""></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                        </div>

                        <div class="row row-listado-productos">

                            <?php foreach ($paquetes as $item) { ?>
                                <div class="col-lg-6 col-md-6 d-all-item-pro">
                                    <div class="d-item-folleto h-100">
                                        <div class="d-img-pro-ind" style="background-image: url('images/folletos/<?php echo $item['imagen'] ?>'); height: 200px;
                                            background-size: cover;
                                            background-repeat: no-repeat; ">
                                        </div>
                                        <div class="d-2">
                                            <p class="t1"><?php echo $item['nombre'] ?></p>
                                            <p class="t2 two-lines mt-1"><?php echo $item['descripcion'] ?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-ver-mas mt-3" href="folleto-individual.php?id=<?php echo $item['id']?>" role="button"><i class="fas fa-eye"></i> Ver más</a>
                                                </div>
                                                <div class="col" style="text-align: right">
                                                    <a style="" class="btn btn-blue mt-2"  href="editar-folleto.php?id=<?php echo $item['id']?>" role="button" ><i style="color: white" class="far fa-edit"></i></a>
                                                    <a style="background-color: #e4605e" class="btn btn-blue mt-2"  href="" role="button" data-toggle="modal" onclick="eliminar('<?php echo $item['id'] ?>')" data-target="#exampleModalCenter"><i style="color: white" class="far fa-trash-alt"></i></a>
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
                    <p class="sub-title-mb">¿Desea eliminar el paquete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-aceptar-modal" onclick="confirmar()" >Aceptar</button>
                </div>
            </div>
        </div>
    </div>


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

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script src="js/nuevo-folleto.js"></script>

</body></html>
