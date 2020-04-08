<?php
require 'bd/conexion.php';
$user_id = -1;
if (isset($_GET['ui'])) {
  $user_id = $_GET['ui'];
}

$query = 'SELECT nombre,correo,apellidos FROM usuarios WHERE id = '.$user_id.' limit 1';
$user = R::getAll($query);
$sobremi = R::findOne('landing','usuario_id ='.$user_id);
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
    	
    	
    	<header class="header-landing valign" data-overlay-dark="5" data-scroll-index="0">
    	    <div class="container">
    	        <div class="row">
    	            <div class="col-lg-6 col-md-6">
    	                <div class="d-header-landing">
                           
    	                    <p class="t2">Afiliado Power Golden</p>
    	                    <p class="t1"><?php echo $user[0]['nombre'].' '.$user[0]['apellidos']; ?></p>
    	                    <p class="t1 one-line"><?php echo $user[0]['correo']; ?></p>
    	                    <div class="row row-btns-landing">
    	                        <div class="col-lg-4 col-md-4">
    	                            <a class="btn btn-afiliado-primary" href="index.php?ui=<?php echo $user_id; ?>" role="button">Ver productos</a>
    	                        </div>
    	                        
    	                        <div class="col-lg-4 col-md-4">
    	                            <a class="btn btn-afiliado-secondary" href="registro-oficina.php?ui=<?php echo $user_id; ?>" role="button">Registrarte</a>
    	                        </div>
    	                    </div>
    	                </div>
    	            </div>
    	        </div>
    	    </div>
    	</header>
    	

    <section class="sec-sobre-mi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                   <hr class="hr-blue">
                    <div class="d-sobre-mi">
                    <p class="t1">Sobre mí</p>
                    <p class="t2"><?php if(!empty($sobremi)){echo $sobremi->descripcion;} ?></p>
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

</body></html>
