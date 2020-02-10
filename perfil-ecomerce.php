<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);

$query = 'SELECT * FROM direcciones WHERE idusuario = '.$_SESSION["user_id"];

$queryt = 'SELECT * FROM tarjetas WHERE idusuario = '.$_SESSION["user_id"];

$tarjeta=R::getAll($queryt); 

$direccion=R::getAll($query); 

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

      <section class="sec-gray separar-menu">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="d-cont-right perfil-movil">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Perfil</p>
                                    <p class="small-text-cuenta">Deberás ingresar algunos datos para completar tu registro en la plataforma.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="d-btn-editar-perfil">
                                    <div class="row">
                                        <div class="col">
                                            <a class="btn btn-editar-perfil" id="edit_button" href="#0" role="button">Editar</a>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-editar-perfil" id="edit_button" href="add-direccion.php" role="button">Direcciones</a>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-editar-perfil" id="edit_button" href="billetera-ecomerce.php" role="button">Tarjetas</a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-perfil">
                                    <form class="form-perfil">

                                        <div class="form-row">
                                            <div class="col-lg-5 col-md-5">

                                                <p style="font-size: larger; font-weight: 600;" class="sub-title-cuenta">Datos personales</p>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->nombre; ?>" type="text" id="nombre" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Nombre </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->apellidos; ?>" type="text" id="apellido" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Apellidos</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->correo; ?>" type="text" id="correo" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Correo electrónico</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->telefono; ?>" type="text" id="telefono"  pattern="[0-9]" class="form-control input-form-underline" disabled/>
                                                        <label class="floating-label-underline">Teléfono</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <input value="<?php echo $information->nacimiento; ?>" type="date" id="nacimiento" class="form-control input-form-underline" required disabled/>
                                                        <label class="floating-label-underline">Fecha de nacimiento</label>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-lg-5 col-md-5 offset-lg-2 offset-md-2">
                                                <p style="font-size: larger; font-weight: 600;" class="sub-title-cuenta">Direcciónes de envio.</p>
                                                <?php foreach ($direccion as $item) { ?>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php echo ($item['direccion'])?>
                                                            </label>
                                                        </div>
                                                        <p class="small-text-cuenta ml-4"><?php echo ($item['colonia'])?>, <?php echo ($item['ciudad'])?>, <?php echo ($item['estado'])?>, <?php echo ($item['codigo'])?></p>
                                                    </div>
                                                    <div class="col" style="text-align: right">
                                                        <a style="" class="btn btn-blue mt-2"  href="editar-direccion.php?id=<?php echo $item['id']?>" role="button" ><i style="color: white" class="far fa-edit"></i></a>
                                                        <a style="background-color: #e4605e" class="btn btn-blue mt-2"  href="" role="button" data-toggle="modal" onclick="eliminar('<?php echo $item['id'] ?>')" data-target="#exampleModalCenter"><i style="color: white" class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                                <?php } ?> 

                                                <p style="font-size: larger; font-weight: 600;" class="sub-title-cuenta">Tarjetas</p>
                                                <?php foreach ($tarjeta as $item) { ?>
                                                <div class="row d-item-tarjeta visa">
                                                    <div class="form-group" style="margin-bottom: 1px">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <p class="t2">XXXX - XXXX - XXXX - <?php echo substr ($item['numerotar'],12,15) ?></p>
                                                            </label>
                                                        </div>
                                                        <p class="small-text-cuenta ml-4"><?php echo $item['propietario'] ?></p>
                                                        <p class="ml-4">Expiracion:  <a class="small-text-cuenta ml-4"><?php echo $item['fecha'] ?></a></p>
                                                    </div>
                                                    <div class="col" style="text-align: right">
                                                        <a style="" class="btn btn-blue mt-2"  href="editar-tarjeta.php?id=<?php echo $item['id']?>" role="button" ><i style="color: white" class="far fa-edit"></i></a>
                                                        <a style="background-color: #e4605e" class="btn btn-blue mt-2"  href="" role="button" data-toggle="modal" onclick="eliminart('<?php echo $item['id'] ?>')" data-target="#exampleModalCenter"><i style="color: white" class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                                <?php } ?> 

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

    </section>

            <!-- Modal Direccion-->
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
                            <p class="sub-title-mb">¿Desea eliminar el metodo de pago?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-aceptar-modal" onclick="confirmar()" >Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>


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
  <script src="js/main-perfil.js"></script>

  <!-- custom scripts -->
  <script src="js/scripts.js"></script>
  <script src="js/bootstrap-input-spinner.js"></script>
  <!-- sweetalert scripts -->
  <script src="js/sweetalert2.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- perfil scripts -->
    <script src="js/perfil.js"></script>
    <script src="js/add-direccion.js"></script>
    <script src="js/billetera-add.js"></script>

  <script>
    $(document).ready(function() {
      $('#perfil-active').addClass("active");
    });
  </script>

</body></html>
