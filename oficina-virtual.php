<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$id = $_SESSION["user_id"];

$usuario = R::getAll("select  id,
        nombre,
        referido 
from    (select * from usuarios
         order by referido, id) clientes_sorted,
        (select @pv := '$id') initialisation
where   find_in_set(referido, @pv)
and     length(@pv := concat(@pv, ',', id))");

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

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-3 col-md-3 bg-white">
                    <div style="margin-top: 100px" >
                        <?php include("componentes/menu-oficina.php"); ?>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 bg-gray">
                    <div class="d-cont-right">

                        <div class="row row-form-perfil pt-0">
                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">357</p>
                                    <p class="t2">Rango obtenido</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php echo count($usuario) ?></p>
                                    <p class="t2">Personas en tu red</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">4</p>
                                    <p class="t2">Puntos personales</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">401</p>
                                    <p class="t2">Puntos grupales</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil pt-0">
                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">4</p>
                                    <p class="t2">Negocio personal</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">591</p>
                                    <p class="t2">Negocio grupal</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">74,225</p>
                                    <p class="t2">Bonificaciones</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1">37%</p>
                                    <p class="t2">Personas activas</p>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Indicadores</p>
                                    <p class="sub-title-chart-oficina">Periodo 1901 respecto Periodo 1812</p>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="d-item-chart-pie">
                                                <div class="d-chart-pie">
                                                    <span class="chart" data-percent="86">
                                                        <span class="percent"></span>
                                                    </span>
                                                </div>

                                                <p class="t1">Actividad calificada</p>
                                                <p class="t2">0/713</p>

                                            </div>

                                        </div>

                                        <div class="col-lg-4 col-md-4">
                                            <div class="d-item-chart-pie">
                                                <div class="d-chart-pie">
                                                    <span class="chart" data-percent="50">
                                                        <span class="percent"></span>
                                                    </span>
                                                </div>

                                                <p class="t1">Actividad total</p>
                                                <p class="t2">0/713</p>

                                            </div>

                                        </div>

                                        <div class="col-lg-4 col-md-4">
                                            <div class="d-item-chart-pie">

                                                <div class="d-chart-pie">
                                                    <span class="chart" data-percent="29">
                                                        <span class="percent"></span>
                                                    </span>
                                                </div>


                                                <p class="t1">Crecimiento personas</p>
                                                <p class="t2">0/713</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Importe</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística de compra</p>
                                    <canvas height="300" id="chart-importe"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Puntos</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística de compra</p>
                                    <canvas height="300" id="chart-puntos"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Valor negocio</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística de compra</p>
                                    <canvas height="300" id="chart-valor-negocio"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Incorporaciones personales</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística</p>
                                    <canvas height="300" id="chart-incorporaciones"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Bonificaciones</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística</p>
                                    <canvas height="300" id="chart-bonificaciones"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Febrero 2020</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística</p>
                                    <canvas height="300" id="chart-febrero"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina h-100">
                                    <p class="title-chart-oficina">Informativo</p>
                                    <p class="sub-title-chart-oficina mb-3">Acumulado historico de bonificaciones</p>
                                    
                                    <p class="acumulado">$3,089,655.<sup>00</sup> </p>

                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-12 mb-30">
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Informativo</p>
                                    <p class="sub-title-chart-oficina mb-3">Direcciones importantes</p>
                                    
                                    <p class="t2">Tu página personal</p>
                                    <a href="<?php echo "http://" .$_SERVER["HTTP_HOST"]; ?>/landing-afiliado.php?ui=<?php echo $id; ?>"><?php echo "http://" .$_SERVER["HTTP_HOST"]; ?>/landing-afiliado.php?ui=<?php echo $id; ?></a>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>





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
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/chart-dashboard-oficina.js"></script>

    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>


    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script>
        $(function() {
            $('.chart').easyPieChart({
                size: 180,
                barColor: '#49B7F3',
                trackColor: '#F4F4F4',
                lineWidth: 5,
                lineCap: 'circle',
                animate: 2000,
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        });

        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [10, 30, 50, 20, 25, 44, -10],
                    fill: false,
                }, {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [100, 33, 22, 19, 11, 49, 30],
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Min and Max Settings'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 10,
                            max: 50
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };
    </script>

</body></html>
