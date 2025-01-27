<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: iniciar-sesion-cliente.php");
}
if ($_SESSION["rol"] != 1) {
    header("Location: iniciar-sesion-cliente.php");
}
require 'bd/conexion.php';
$suc = R::find('sucursales', 'WHERE id != 1');

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

    <section class="sec-gray" style="margin-top:55px">
        <div class="container">
            <div class="row">

                <?php include 'menus/lineas_asistencia.php'; ?>

                <div class="col-lg-9 col-md-6 bg-gray lista-productos-movil">

                    <div class="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Direccion de envío</p>
                                    <!-- <p class="small-text-cuenta">Seleccionar metodo de envio </p> -->
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group" id="contlocal">
                            <div class="form-check">
                                <input onclick="boxlocal()" class="form-check-input" type="checkbox" id="local" required>
                                <label class="form-check-label" for="local">
                                    Recoleccion en sucursal.
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="form-group" id="contdomi">
                            <div class="form-check">
                                <input onclick="boxdomi()" class="form-check-input" type="checkbox" id="domicilio" required>
                                <label class="form-check-label" for="domicilio">
                                    Envio a domicilio.
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>-->

                        <div id="particular">
                            <div class="row row-form-perfil footer-movil">
                                <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                                    <form class="form-delivery-checkout" name="formulario" method="POST">

                                        <div class="form-group">
                                            <div class="floating-label-group">
                                                <input type="text" id="direccion" value="" class="form-control input-form-underline" required />
                                                <label class="floating-label-underline">Direccion</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6 col-md-6">
                                                <div class="floating-label-group">
                                                    <input type="number" id="cp" value="" class="form-control input-form-underline" required />
                                                    <label class="floating-label-underline">C. Postal</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <div class="floating-label-group">
                                                    <input type="text" id="colo" value="" class="form-control input-form-underline" required />
                                                    <label class="floating-label-underline">Colonia</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <div class="floating-label-group">
                                                    <input type="text" id="muni" value="" class="form-control input-form-underline" required />
                                                    <label class="floating-label-underline">Ciudad</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <div class="floating-label-group">
                                                    <select autocomplete="false" value="'BC'" onchange="pais()" style="height:60%;" class="form-control" id="country" name="country" required>
                                                        <option value="MX">Mexico</option>
                                                        <option value="EUA">Estados Unidos</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6" id="selectMX">
                                                <div class="floating-label-group">
                                                    <select autocomplete="false" value="'BC'" style="height:60%;" class="form-control" id="estado" name="estado" required>
                                                        <option value="AG">Aguascalientes</option>
                                                        <option value="BC">Baja California Norte</option>
                                                        <option value="BS">Baja California Sur</option>
                                                        <option value="CM">Campeche</option>
                                                        <option value="CS">Chiapas</option>
                                                        <option value="CH">Chihuahua</option>
                                                        <option value="DF">Ciudad de Mexico</option>
                                                        <option value="CO">Coahuila</option>
                                                        <option value="CL">Colima</option>
                                                        <option value="DG">Durango</option>
                                                        <option value="GT">Guanajuato</option>
                                                        <option value="GR">Guerrero</option>
                                                        <option value="HG">Hidalgo</option>
                                                        <option value="JA">Jalisco</option>
                                                        <option value="MX">Estado de Mexico</option>
                                                        <option value="MI">Michoacan</option>
                                                        <option value="MO">Morelos</option>
                                                        <option value="NA">Nayarit</option>
                                                        <option value="NL">Nuevo Leon</option>
                                                        <option value="OA">Oaxaca</option>
                                                        <option value="PU">Puebla</option>
                                                        <option value="QT">Queretaro</option>
                                                        <option value="QR">Quintana Roo</option>
                                                        <option value="SL">San Luis Potosi</option>
                                                        <option value="SI">Sinaloa</option>
                                                        <option value="SO">Sonora</option>
                                                        <option value="TB">Tabasco</option>
                                                        <option value="TM">Tamaulipas</option>
                                                        <option value="TL">Tlaxcala</option>
                                                        <option value="VE">Veracruz</option>
                                                        <option value="YU">Yucatan</option>
                                                        <option value="ZA">Zacatecas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6" id="selectEU">
                                                <div class="floating-label-group">
                                                    <select autocomplete="false" value="'BC'" style="height:60%;" class="form-control" id="estadousa" name="estadousa" required>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">District Of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-btns-checkout mt-60">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <a href="carrito-ecomerce.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                                            </div>
                                            <div class=" col-lg-6 col-md-6 col-6">
                                                <a><button type="button" onclick="datosDireccion()" class="btn btn-lg-blue">Continuar <i class="fas fa-chevron-right"></i></button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="dlocal" style="display: none">
                            <div class="form-group">
                                <div class="floating-label-group">
                                    <label class="label-select">Seleccionar sucursal para recoleccion.</label>
                                    <select id="sucursal" class="form-control input-form-underline" onchange="sucursal">
                                        <option value="9" hidden>Seleccionar sucursal.</option>
                                    </select>
                                </div>
                                <div class="row row-btns-checkout mt-60">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <a href="carrito-ecomerce.php"><button type="button" class="btn btn-back-checkout"><i class="fas fa-chevron-left"></i> Regresar</button></a>
                                    </div>
                                    <div class=" col-lg-6 col-md-6 col-6">
                                        <a><button type="button" onclick="datosDireccionlocal()" class="btn btn-lg-blue">Continuar <i class="fas fa-chevron-right"></i></button></a>
                                    </div>
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
    <script src="js/metodo-pago-ecomerce.js"></script>
    <script>
        $(document).ready(function() {
            document.getElementById("selectEU").style.display = "none";
        });
    </script>

</body>

</html>