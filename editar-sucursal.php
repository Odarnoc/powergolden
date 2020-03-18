<?php

require 'user_preferences/user-info.php';

$id=$_GET['id'];

$item=R::findOne('sucursales','id ='.$id );

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
                                    <p class="title-cuenta">Nueva Sucursal.</p>
                                    <p class="small-text-cuenta">Registra una nueva direccion para tus envios.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">

                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12" style="text-align">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12" style="margin-left: auto; margin-right: auto">

                                        <form action="" class="form-tarjetas">

                                            <div class="form-group">
                                                <div class="floating-label-group">
                                                    <input type="text" id="nombre" class="form-control input-form-underline" value="<?php echo $item['nombre'] ?>" />
                                                    <label class="floating-label-underline">Nombre</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="floating-label-group">
                                                    <input type="text" id="direccion" class="form-control input-form-underline" value="<?php echo $item['direccion'] ?>" />
                                                    <label class="floating-label-underline">Direccion</label>
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-lg-6 col-md-6">
                                                    <div class="floating-label-group">
                                                        <input type="number" id="cp" class="form-control input-form-underline" value="<?php echo $item['codigo'] ?>" />
                                                        <label class="floating-label-underline">C. Postal</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-6">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="id" class="form-control input-form-underline" value="<?php echo $item['id'] ?>" hidden />
                                                        <input type="text" id="colo" class="form-control input-form-underline" value="<?php echo $item['colonia'] ?>"  />
                                                        <label class="floating-label-underline">Colonia</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-6">
                                                    <div class="floating-label-group">
                                                        <input type="text" id="muni" class="form-control input-form-underline" value="<?php echo $item['ciudad'] ?>" />
                                                        <label class="floating-label-underline">Ciudad</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-6">
                                                    <div class="floating-label-group">
                                                        <select autocomplete="false" style="height:60%;" class="form-control" id="estado" name="estado">
                                                            <option value="Aguascalientes">Aguascalientes</option>
                                                            <option value="Baja California Norte">Baja California Norte</option>
                                                            <option value="Baja California Sur">Baja California Sur</option>
                                                            <option value="Campeche">Campeche</option>
                                                            <option value="Chiapas">Chiapas</option>
                                                            <option value="Chihuahua">Chihuahua</option>
                                                            <option value="Ciudad de Mexico">Ciudad de Mexico</option>
                                                            <option value="Coahuila">Coahuila</option>
                                                            <option value="Colima">Colima</option>
                                                            <option value="Durango">Durango</option>
                                                            <option value="Guanajuato">Guanajuato</option>
                                                            <option value="Guerrero">Guerrero</option>
                                                            <option value="Hidalgo">Hidalgo</option>
                                                            <option value="Jalisco">Jalisco</option>
                                                            <option value="Estado de Mexico">Estado de Mexico</option>
                                                            <option value="Michoacan">Michoacan</option>
                                                            <option value="Morelos">Morelos</option>
                                                            <option value="Nayarit">Nayarit</option>
                                                            <option value="Nuevo Leon">Nuevo Leon</option>
                                                            <option value="Oaxaca">Oaxaca</option>
                                                            <option value="Puebla">Puebla</option>
                                                            <option value="Queretaro">Queretaro</option>
                                                            <option value="Quintana Roo">Quintana Roo</option>
                                                            <option value="San Luis Potosi">San Luis Potosi</option>
                                                            <option value="Sinaloa">Sinaloa</option>
                                                            <option value="Sonora">Sonora</option>
                                                            <option value="Tabasco">Tabasco</option>
                                                            <option value="Tamaulipas">Tamaulipas</option>
                                                            <option value="Tlaxcala">Tlaxcala</option>
                                                            <option value="Veracruz">Veracruz</option>
                                                            <option value="Yucatan">Yucatan</option>
                                                            <option value="Zacatecas">Zacatecas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="floating-label-group">
                                                    <input type="text" id="motivacion" class="form-control input-form-underline" required value="<?php echo $item['frase'] ?>" />
                                                    <label class="floating-label-underline">Mensaje de motivación</label>
                                                </div>
                                            </div>

                                            <div class="form-group" style="text-align: right;">
                                                <button type="button" id="editar_suc" style="width: 50%" class="btn btn-lg-blue">Guardar</button>
                                            </div>
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
    <!-- custom scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- perfil scripts -->
    <script src="js/perfil.js"></script>
    <!-- billetera js -->
    <script src="js/sucursal.js"></script>

    <script>
        $(function() {
            var temp="<?php echo $item['estado']; ?>"; 
                console.log(temp);
            $("#estado").val(temp);
        });
    </script>

</body></html>
