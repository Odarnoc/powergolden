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

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

    <title>Power Golden | El Mundo de la Herbolaria</title>

</head>

<body class="bg-gray">


    <section class="sec-oficina-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="d-item-oficina-home">
                        <img src="images/company.svg" alt="">
                        <p class="t1">Back Oficce</p>
                        <button onclick="login()" class="btn btn-lg-blue">Entrar</button>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="d-item-oficina-home">
                        <img src="images/professions-and-jobs%20(1).svg" alt="">
                        <p class="t1">Oficina Virtual</p>
                        <button onclick="login()" class="btn btn-lg-blue">Entrar</button>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="d-item-oficina-home">
                        <img src="images/professions-and-jobs.svg" alt="">
                        <p class="t1">Página Personal</p>
                        <button class="btn btn-lg-blue">Entrar</button>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                <p class="text-home-oficina">Las siguientes direcciones pueden ser integradas a su página comercial</p>
                </div>
            </div>


        </div>
    </section>

    <footer class="footer-home-oficina" hidden>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <a href="#0"><i class="fas fa-user-plus mr-2"></i> Registro sin invitacion</a>
                </div>
                <div class="col-lg-3 col-md-3">
                    <a href="#0"><i class="fas fa-map-marker-alt mr-2"></i> Localizar un líder</a>
                </div>
                <div class="col-lg-3 col-md-3">
                    <a href="#0"><i class="fas fa-address-card mr-2"></i> Localizar página personal</a>
                </div>
                <div class="col-lg-3 col-md-3">
                    <a href="#0"><i class="fas fa-shopping-bag mr-2"></i> Localizar tienda virtual</a>
                </div>
            </div>
        </div>


    </footer>


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
    <script>
        function login() {
            location.href="iniciar-sesion-admin.php";
        }
    </script>

</body></html>
