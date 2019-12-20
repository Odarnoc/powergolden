<nav class="navbar navbar-solid navbar-expand-lg navbar-dark bg-dark fixed-top" style="z-index: 1030;">

<div class="container">
    <a class="logo" href="index.php">
        <img src="images/logo-navbar-white.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-solid p-3 p-lg-0 mt-lg-0 justify-content-lg-end  d-flex flex-column flex-lg-row flex-xl-row mobileMenu" id="navbarNav">
        <ul class="navbar-nav align-self-stretch ml-auto">
            <li class="nav-item logo-movil">
                <a class="logo" href="index.php">
                    <img src="images/logo-navbar.png">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre Power Golden</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#sec-busqueda">Tienda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sucursales.php">Sucursales</a>
            </li>
            <?php if(isset($_SESSION["user_id"])){ ?>
            <li class="nav-item">
                <a class="nav-link btn-socios" href="ajax/cerrar_sesion.php">Cerrar Sesion</a>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link btn-socios" href="iniciar-sesion.php">Iniciar Sesion</a>
            </li>
            <li class="nav-item registrate-movil" style="padding-left:8px;">
                <a class="nav-link btn-socios" href="registro.php">Registrate</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>

</nav>
<div class="overlay"></div>