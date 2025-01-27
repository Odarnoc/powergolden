<?php
    require 'user_preferences/user-info.php';

    $id=$_GET['id'];

    $item=R::findOne('promociones','id ='.$id );

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
                                    <p class="title-cuenta">Editar promocion</p>
                                    <p class="small-text-cuenta">Aqui puedes editar las promociones existentes.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div class="d-form-registro-productos">

                                    <form id="edit-promocion" class="form-registro-productos" method="post" enctype="multipart/form-data">

                                       

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input name="nombre" type="text" value="<?php echo $item['nombre'] ?>" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Nombre de la promocion </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input name="descripcion" type="text" value="<?php echo $item['descripcion'] ?>" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Descripción </label>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group" hidden>
                                            <div class="floating-label-group">
                                                <input name="id" value="<?php echo $item['id'] ?>" type="text" class="form-control input-form-underline"  />
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                                    <div class="floating-label-group">
                                                        <label class="">Tipo de promoción</label>
                                                        <select name="tipo" id="tipo" class="form-control input-form-underline" required >
                                                             <option value="1">Productos por kits</option>
                                                             <option value="2">Productos por venta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="kits" style="display:">
                                                <div class="form-group" id="kit_div">
                                                    <div class="floating-label-group">
                                                        <label class="">Tipo de Kit</label>
                                                        <select name="paquete_id" id="paquete_id" class="form-control input-form-underline"  >
                                                            <?php
$lista = R::findAll("paquetes");
foreach ($lista as $key) {
    echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
}
?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <div class="floating-label-group">
                                                    <label class="">Desde primera compra</label>
                                                        <input type="checkbox" name="primera" class="form-control input-form-underline"  <?php echo $item['primera'] == 1 ? 'checked' : '' ?>  />

                                                    </div>
                                                </div>
                                                
                                                        </div>
                                                        <div id="productos" style="display:none">
                                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input name="desde" type="number" class="form-control input-form-underline" value="<?php echo $item['desde'] ?>" />
                                                <label class="floating-label-underline">A partir de la compra de </label>
                                            </div>
                                        </div>
                                        
                                                        </div>
                                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input name="cantidad" type="number" class="form-control input-form-underline" value="<?php echo $item['cantidad'] ?>"  />
                                                <label class="floating-label-underline">Cantidad de productos incluidos </label>
                                            </div>
                                        </div>
                                            </div>

                                    <!--<div class="form-group">
                                            <div class="floating-label-group">
                                                <input name="precio" type="text" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Precio </label>
                                            </div>
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

    <script src="js/crear-promocion.js"></script>
    <script>
        $("#tipo").val(<?php echo $item['tipo'] ?>);
        $("#paquete_id").val(<?php echo $item['paquete_id'] ?>);
        $("#tipo").trigger("change");
    </script>



</body></html>

