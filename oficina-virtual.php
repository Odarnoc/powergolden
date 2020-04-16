<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';

$id = $_SESSION["user_id"];

$res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1' ,
    array(':idusuario'=>$_SESSION["user_id"]));
$colorescss1=json_decode($res[0]['colorescss']);
$rango="Sin liderazgo";
foreach ($colorescss1 as $co) {
    foreach ($co as $key => $value) {
    //echo "$('#".$key."').addClass('".$value."');";
    if($key== $_SESSION["user_id"] && !empty($value)){
        $rango=$value;
        break;
    }
    }
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
                                    <p class="t1"><?php echo $rango; ?></p>
                                    <p class="t2">Rango obtenido</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php echo $res[0]['clientestotales']; ?></p>
                                    <p class="t2">Personas en tu red</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php echo $res[0]['puntospersonales']; ?></p>
                                    <p class="t2">Puntos personales</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php echo $res[0]['puntosgrupales5nivel']; ?></p>
                                    <p class="t2">Puntos grupales</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil pt-0">

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php echo $res[0]['ventasmatriz']; ?></p>
                                    <p class="t2">Compras de <?php echo $res[0]['mes']; ?></p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php if($res[0]['rollover']=='1'){echo 'SI';}else{echo 'NO';}  ?></p>
                                    <p class="t2">Roll over</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="clearfix d-item-num-oficina">
                                    <p class="t1"><?php echo 100/floatval($res[0]['clientestotales'])*floatval($res[0]['clientesactivos']); ?>%</p>
                                    <p class="t2">Personas activas</p>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2" hidden>
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

                            <div class="col-lg-6 col-md-6 col-12 mb-30" hidden>
                                <div class="d-grafica-oficina">
                                    <p class="title-chart-oficina">Valor negocio</p>
                                    <p class="sub-title-chart-oficina mb-4">Estadística de compra</p>
                                    <canvas height="300" id="chart-valor-negocio"></canvas>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-30" hidden>
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
                                    <a class="btn btn-afiliado-primary mt-10 mb-30" style="color:white" href="<?php echo "http://" .$_SERVER["HTTP_HOST"]; ?>/landing-afiliado.php?ui=<?php echo $id; ?>" role="button">Ver página personal</a>
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
