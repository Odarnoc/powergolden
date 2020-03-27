<?php
session_start();
require 'bd/conexion.php';

$id_prod = $_GET['key'];

$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}
$query1='SELECT p.*, i.existencia,l.nombre as linea,l.color,IF(i.precio_mxn=0,p.precio_mxn,i.precio_mxn) as precio_mxn, IF(i.precio_usd=0,p.precio_usd,i.precio_usd) as precio_usd FROM inventarios as i LEFT JOIN productos as p ON i.producto_id = p.id LEFT JOIN lineas as l ON p.categoria = l.id WHERE i.sucursal_id = 1 AND p.id = '.$id_prod.' LIMIT 1';
$res=R::getAll($query1);
if(empty($res)){
    $query1='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id WHERE p.id = '.$id_prod.' LIMIT 1';
    $res=R::getAll($query1);
}
$prodIndividual = $res[0];

$query2='SELECT p.*,l.nombre as linea,l.color FROM productos as p LEFT JOIN lineas as l ON p.categoria = l.id where p.id!='.$prodIndividual['id'].' and p.categoria='.$prodIndividual['categoria'].' ORDER BY RAND() LIMIT 2';
$prodsRelacionados=R::getAll($query2);

$fragmaneto;
$color;
$abiable = false;

if(isset($prodIndividual['existencia'])){
    if($prodIndividual['existencia'] > 0){
        $fragmaneto = 'Disponibles: '.$prodIndividual['existencia'].'pz';
        $color = 'style = "background-color:#3CC16F"';
        $abiable = true;
    }else{
        $fragmaneto = 'No disponible';
        $color =  'style = "background-color:#ff4c4c"';
    }
}else{
    $fragmaneto = 'No disponible';
    $color =  'style = "background-color:#ff4c4c"';
}

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
    <style>
        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
            text-align: center; 
            padding: 19px;
        }
    </style>

    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body>


            <!-- Menu -->
            <?php include("menus/menu_general.php"); ?>
            <!-- End Menu -->


    <!-- End Navbar ====
    	======================================= -->


    <?php include("menus/search.php"); ?>


    <section class="sec-gray">
        <div class="container">
            <div class="row">
                
                <?php include 'menus/lineas_asistencia.php'; ?>

                <div class="col-lg-9 col-md-6">

                    <div class="row row-breadcrumb">
                        <div class="col-lg-12 col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="lineas.php?linea=<?php echo $prodIndividual['categoria'] ?>">Linea <?php echo $prodIndividual['linea'] ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $prodIndividual['nombre'] ?></li>
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
                                                    <span <?php echo $color ?> class="badge badge-disponible"><?php echo $fragmaneto ?>.</span>
                                                    <p class="title-pro-ind one-line"><?php echo $prodIndividual['nombre'] ?></p>
                                                </div>

                                                <div class="col-lg-4 col-md-4">
                                                    <p class="price-pro-ind">$<?php echo $prodIndividual['precio_mxn'] ?></p>
                                                </div>
                                            </div>

                                            <p class="sub-title-pro-ind"><?php echo $prodIndividual['descripcion'] ?></p>

                                            <div class="row row-info-pro-ind">
                                                <div class="col-lg-12 col-md-12">
                                                    <p class="t1"><b>Ingredientes:</b> <?php echo $prodIndividual['ingredientes'] ?></p>

                                                    <p class="t2"><b>Modo de uso:</b> <?php echo $prodIndividual['uso'] ?></p>
                                                </div>
                                            </div>

                                            <div class="row row-cant-pro-ind">
                                                <div class="col-lg-12 col-md-12">

                                                    <div class="form-cant-pro-ind" <?php if(!$abiable) echo 'hidden' ?>>
                                                       <p class="t1"><b>Cantidad</b></p>
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-4 col-md-4">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                                                                    </div>
                                                                        <input type="number" id="cantidad"  class="form-control form-control-sm" value="1" min="1">
                                                                    <div class="input-group-prepend">
                                                                        <button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-4 col-md-4">
                                                                <button type="button" class="btn btn-add-car" onclick="agregar()">Agregar al carrito</button>
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



                    <div class="row row-items-pro">

                        <div class="col-lg-12 col-md-12">
                            <p class="title-sec mb-20">Relacionados</p>
                        </div>


                        
                        <?php foreach ($prodsRelacionados as $item) { ?>
                            <div class="col-lg-6 d-all-item-pro">
                                <div class="d-item-pro h-100" style="padding-bottom: 1rem;">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-5">
                                            <div class="d-img-pro">
                                                <img src="productos_img/<?php echo $item['imagen'] ?>" alt="">

                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7 col-7">
                                            <div class="d-info-pro">
                                                <p class="t1" style="color:<?php echo $item['color'] ?>">Línea <?php echo $item['linea'] ?></p>
                                                <p class="t2"><?php echo $item['nombre'] ?></p>
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
    
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script>
    $(document).ready(function(){
    $('#cantidad').prop('disabled', true);
    $('#plus-btn').click(function(){
        $('#cantidad').val(parseInt($('#cantidad').val()) + 1 );
            });
        $('#minus-btn').click(function(){
        $('#cantidad').val(parseInt($('#cantidad').val()) - 1 );
        if ($('#cantidad').val() == 0) {
            $('#cantidad').val(1);
        }
        });
    });
    </script>
    <script>
        var prod = '<?php echo $id_prod; ?>';
        console.log(prod);
        
    </script>
    <script src="js/prod-individual.js"></script>

</body></html>
