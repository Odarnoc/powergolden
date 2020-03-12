<?php
    require 'user_preferences/user-info.php';

    $id_producto = $_GET['id'];
    $item=R::findOne('productos','id ='.$id_producto );

    $lineas = R::find('lineas');

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
                                    <p class="title-cuenta">Editar producto</p>
                                    <p class="small-text-cuenta">Para editar un producto deberás completar el siguiente formulario.</p>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row row-form-perfil">

                            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">

                                <div class="d-form-registro-productos">
                                    <form id="form-producto" class="form-registro-productos" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="image-upload" style="background-image: url(productos_img/<?php echo $item['imagen']?>)">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <a type="button" for="file-input"><i class="fas fa-plus"></i> Subir foto </a >
                                                <input hidden name="img-producto" id="file-input" type="file" onchange="readURL(this);"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div >
                                                <label>Nombre del producto *</label>
                                                <input name="nombre" type="text" class="form-control input-form-underline" value="<?php echo $item['nombre']?>" required></input>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <label >Descripción *</label>
                                                <input name="descripcion" type="text" class="form-control input-form-underline" value="<?php echo $item['descripcion']?>" required />
                                                <input name="id_producto" type="text" class="form-control input-form-underline" value="<?php echo $item['id']?>" hidden />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <label>Ingredientes *</label>
                                                <textarea name="ingredientes" class="form-control input-form-underline" rows="3" required><?php echo $item['ingredientes']?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <label>Modo de uso *</label>
                                                <textarea name="uso" class="form-control input-form-underline" rows="3" required><?php echo $item['uso']?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="floating-label-group">

                                                <label class="label-select">Categoria *</label>
                                                <select name="categoria" class="form-control input-form-underline">
                                                    <option hidden>Seleccionar la categoria</option>
                                                        <?php
                                                        foreach ($lineas as $valor) {
                                                        ?>
                                                            <option <?php if($valor->id == $item['categoria'] ) echo "selected"; ?> value="<?php echo $valor->id; ?>">Línea <?php echo $valor->nombre; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <label>Precio MXN *</label>
                                                <input name="precio" type="text" class="form-control input-form-underline" value="<?php echo $item['precio_mxn']?>" required />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <label>Precio USD *</label>
                                                <input name="preciousd" type="text" class="form-control input-form-underline" value="<?php echo $item['precio_usd']?>" required />
                                            </div>
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

    <script src="js/editar-producto.js"></script>


</body></html>