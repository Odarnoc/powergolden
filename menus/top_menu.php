<nav class="navbar navbar-solid navbar-expand-lg navbar-dark bg-dark">

<div class="container">
     <a class="logo" href="dashboard.php">
        <img src="images/logo-navbar.png">
    </a> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-cuenta-nav" href="editar-perfil-desktop.php"></i><?php echo $information->nombre?> <?php echo $information->apellidos?></a>
            </li>
            <li class="nav-item">
                <div id="google_translate_element"></div>
            </li>

        </ul>
    </div>
</div>

</nav>


<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>