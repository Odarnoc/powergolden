<!-- Menu-bottom -->
<?php
$user_ip = $_SERVER['REMOTE_ADDR'];
$ch = curl_init("http://www.geoplugin.net/json.gp?ip=".$user_ip);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$dataArray = curl_exec($ch);
$dataArray = json_decode($dataArray);
$country_code = $dataArray->geoplugin_countryCode;
?>
<!-- End Menu-bottom -->
<?php include("menus/menu_bottom.php"); ?>
<nav class="navbar navbar-solid navbar-expand-lg bg-dark fixed-top" style="z-index: 1030;position: sticky;">

<div class="container">
    <a class="logo" href="index.php">
        <img src="images/logo-navbar.png">
    </a>
    <button class="navbar-toggler navbar-hamburguer" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse navbar-solid p-3 p-lg-0 mt-lg-0 justify-content-lg-end  d-flex flex-column flex-lg-row flex-xl-row mobileMenu" id="navbarNav">
        <ul class="navbar-nav align-self-stretch ml-auto">
            <li class="nav-item logo-movil">
                <a class="logo" href="index.php">
                    <img src="images/logo-navbar.png">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre-power-golden.php">Sobre Power Golden</a>
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
                <a class="nav-link" href="perfil-ecomerce.php">Mi perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="oficina-virtual.php">Oficina virtual</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-socios" href="ajax/cerrar_sesion.php">Cerrar Sesion</a>
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link btn-socios" href="iniciar-sesion.php">Socios</a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" onclick="rastrear_pedido()">Rastrear Pedido</a>
            </li>
            <li>
               
		  <a href="#googtrans(en|en)" class="lang-en lang-select" data-lang="en"><img src="images/usa.png" alt="USA" width="45px" height="35px"></a>
		  <a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es"><img src="images/mexico.png" width="35px" height="35px" alt="MEXICO"></a>
		 
	
                
            <div id="google_translate_element" style="display:none !important;"></div> 
            </li>
        </ul>
    </div>
</div>

</nav>
<div class="overlay"></div>
<style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
<style type="text/css">body {position: static !important; top:0px !important;}</style>
<script type="text/javascript">
var codigoPais="<?php echo $country_code; ?>";
console.log(codigoPais);
</script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false}, 'google_translate_element');
    }

	function triggerHtmlEvent(element, eventName) {
	  var event;
	  if (document.createEvent) {
		event = document.createEvent('HTMLEvents');
		event.initEvent(eventName, true, true);
		element.dispatchEvent(event);
	  } else {
		event = document.createEventObject();
		event.eventType = eventName;
		element.fireEvent('on' + event.eventType, event);
	  }
	}

	$('.lang-select').click(function() {
	  var theLang = $(this).attr('data-lang');
	  $('.goog-te-combo').val(theLang);

	  //alert(jQuery(this).attr('href'));
	  window.location = $(this).attr('href');
	  location.reload();

	});
  </script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
