<?php
 session_start();

 if(isset($_SESSION["user_id"])){
    header('Location: dashboard.php');
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">


    <title>POS Power Golden | El Mundo de la Herbolaria</title>

</head>

<body class="bg-gray">

    <section class="sec-login-pos">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 offset-lg-4 offset-md-3">
                    <div class="d-login-pos">

                        <div class="clearfix d-title-login-pos">
                            <img src="../images/logo-ind-color.png" alt="">
                            <p class="t1">Iniciar sesión</p>
                        </div>

                        <form class="form-login-pos" id="login_form">

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="number" id="userlogin" class="form-control input-form" required />
                                    <label class="floating-label">Código Socio</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="floating-label-group">
                                    <input type="password" id="passlogin" class="form-control input-form" required />
                                    <label class="floating-label">Contraseña</label>
                                </div>
                            </div>

                            <button type="submit" id="login" class="btn btn-lg-blue mt-10">Entrar</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- jQuery -->
    <script src="../js/jquery-3.0.0.min.js"></script>
    <script src="../js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="../js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- scrollIt -->
    <script src="../js/scrollIt.min.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="js/login.js"></script>


</body></html>
