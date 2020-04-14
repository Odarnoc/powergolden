<?php
session_start();
require 'bd/conexion.php';

$user_id=-1;
if(isset($_SESSION["user_id"])){
  $user_id=$_SESSION["user_id"];
}

$query='SELECT * FROM folletos';

$prods=R::getAll($query);

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


            <section class="sec-cuenta">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-3 col-md-3 bg-white">
                    <div style="margin-top: 100px" class="d-menu-oficina">
                        <?php include("componentes/menu-oficina.php"); ?>
                    </div>
                </div>

                    <div class="col-lg-9 col-md-9 bg-gray">
                        <div class="d-cont-right">
                            <div class="row">
                                <div style="width: 100%;">
                                    
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <p class="title-sec mb-20">Folletos virtuales</p>
                                    </div>
                                </div>

                                  <div class="row row-items-pro">
                                    <?php foreach ($prods as $item) { ?>
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
                                                          <div class="col" style="text-align: right;">
                                                              <a class="btn btn-ver-mas mt-3" href="folleto-individual-oficina.php?id=<?php echo $item['id']?>" role="button"><i class="fas fa-eye"></i> Ver más</a>
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
