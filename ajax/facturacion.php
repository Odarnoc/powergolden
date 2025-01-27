<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: iniciar-sesion.php");
}

require 'bd/conexion.php';
$information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);

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

  <style>
table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
table * {
  position: relative;
}
table td, table th {
  padding-left: 8px;
}
table thead tr {
  height: 60px;
  background: #7abaff;
  font-size: 16px;
}
table tbody tr {
  height: 48px;
  border-bottom: 1px solid #7abaff;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: right;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }
  table tbody tr td:nth-child(1):before {
    content: "Code";
  }
  table tbody tr td:nth-child(2):before {
    content: "Stock";
  }
  table tbody tr td:nth-child(3):before {
    content: "Cap";
  }
  table tbody tr td:nth-child(4):before {
    content: "Inch";
  }
  table tbody tr td:nth-child(5):before {
    content: "Box Type";
  }
}

blockquote {
  color: white;
  text-align: center;
}

form.example input[type=text] {
  padding: 5px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 5px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

</head>

<body translate="no" onload="obtenerTodos();">


            <!-- Menu -->
            <?php include("menus/top_menu.php"); ?>
            <!-- End Menu -->


  <!-- End Navbar ====
    	======================================= -->

      <section class="sec-gray separar-menu">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="d-cont-right perfil-movil">
                        <div class="row">
                            <div class="col-lg-9 col-md-9">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Facturacion</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="d-title-cuenta">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Nueva Factura</button>
                                </div>
                            </div>
                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-form-perfil">
                                    <form class="form-perfil">

                                        <div class="form-row">
                                            <div class="col-lg-12 col-md-12">

                                            <form class="example" onsubmit="return obtenerBusqueda();" style="margin:auto;max-width:50%">
                                                <input type="text" placeholder="Buscar RFC.." name="search2" id="searchRfc">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            
                                            </form>
                                            

                                            <table id="tabla" class="table" style="text-align:center; margin-top: 20px;">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Tipo</th>
                                                        <th>Folio</th>
                                                        <th>Serie</th>
                                                        <th>Nombre</th>
                                                        <th>RFC</th>
                                                        <th>Fecha</th>
                                                        <th>Subtotal</th>
                                                        <th>Total</th>
                                                        <th>Email</th>
                                                        <th>Metodo Pago</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="contenido">
                                                </tbody>
                                            </table>

                                                

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="alert alert-danger alert-dismissible collapse" role="alert" id="error">
     <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

  <strong>Error!</strong>Llena todos los campos e intenta nuevamente.
</div>


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form onsubmit="return crearFactura();">
      <div class="modal-body">
        
	 <div class="form-group">
       <h4>Datos de Factura</h4>
                   
	
  
    <label for="tipo">Tipo CFDI</label>
    <select class="form-control" id="tipo">
      <option value="I">Ingreso</option>
      <option value="E">Egreso</option>
      <option value="T">Traslado</option>
     
    </select>
  	
  
   <label for="forma">Forma de Pago</label>
    <select class="form-control" id="forma">
      <option value="01">Efectivo</option>
	  <option value="02">Cheque nominativo</option>
	  <option value="03" selected>Transferencia electrónica de fondos</option>
	  <option value="04">Tarjeta de crédito</option>
	  <option value="05">Monedero electrónico</option>
	  <option value="06">Dinero electrónico</option>
	  <option value="08">Vales de despensa</option>
	  <option value="12">Dación en pago</option>
	  <option value="13">Pago por subrogación</option>
	  <option value="14">Pago por consignación</option>
	  <option value="15">Condonación</option>
	  <option value="17">Compensación</option>
	  <option value="23">Novación</option>
	  <option value="24">Confusión</option>
	  <option value="25">Remisión de deuda</option>
	  <option value="26">Prescripción o caducidad</option>
	  <option value="27">A satisfacción del acreedor</option>
	  <option value="28">Tarjeta de débito</option>
	  <option value="29">Tarjeta de servicios</option>
	  <option value="30">Aplicación de anticipos</option>
	  <option value="99">Por definir</option>
    </select>
	 <label for="metodo">Metodo de Pago</label>
    <select class="form-control" id="metodo">
      <option value="PUE">Pago en una sola exhibición</option>
      <option value="PPD">Pago en parcialidades o diferido</option>
      
    </select>
  </div>	
  	
		
  <div class="form-group">
       <h4>Datos del Cliente</h4>
                   
	<label for="rfc">RFC</label>
    <input type="text" class="form-control" id="rfc" aria-describedby="rfc" placeholder="RFC">
	<label for="nombre">Nombre Comercial</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre Comercial">
	<label for="email">Email</label>
    <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Correo Electronico">
	<label for="domicilio">Domicilio</label>
    <input type="text" class="form-control" id="domicilio" aria-describedby="domicilio" placeholder="Domicilio">
	<label for="numero">Numero Exterior</label>
    <input type="number" class="form-control" id="numero" aria-describedby="numero" placeholder="Numero">
	<label for="municipio">Municipio</label>
    <input type="text" class="form-control" id="municipio" aria-describedby="municipio" placeholder="Municipio">
	<label for="estado">Estado</label>
    <input type="text" class="form-control" id="estado" aria-describedby="estado" placeholder="Estado">
	<label for="pais">Pais</label>
    <input type="text" class="form-control" id="pais" aria-describedby="pais" placeholder="Pais">
    
    <label for="uso">Uso del CFDI</label>
    <select class="form-control" id="uso">
     <option value="G01">Adquisición de mercancias</option>	
<option value="G02">Devoluciones, descuentos o bonificaciones</option>	
<option value="G03">Gastos en general</option>	
<option value="I01">Construcciones</option>	
<option value="I02">Mobilario y equipo de oficina por inversiones</option>	
<option value="I03">Equipo de transporte</option>
<option value="I04">Equipo de computo y accesorios</option>	
<option value="I05">Dados, troqueles, moldes, matrices y herramental</option>	
<option value="I06">Comunicaciones telefónicas</option>	
<option value="I07">Comunicaciones satelitales</option>	
<option value="I08">Otra maquinaria y equipo</option>	
<option value="D01">Honorarios médicos, dentales y gastos hospitalarios.</option>	
<option value="D02">Gastos médicos por incapacidad o discapacidad</option>	
<option value="D03">Gastos funerales.</option>	
<option value="D04">Donativos.</option>	
<option value="D05">Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>	
<option value="D06">Aportaciones voluntarias al SAR.</option>
<option value="D07">Primas por seguros de gastos médicos.</option>
<option value="D08">Gastos de transportación escolar obligatoria.</option>	
<option value="D09">Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
<option value="D10">Pagos por servicios educativos (colegiaturas)</option>	
<option value="P01" selected>Por definir</option>	
    </select>
  </div>
  
  
  


  
  
  
    <div class="form-group">
       <h4>Concepto</h4>
                   
	<label for="descripcion">Descripci&oacute;n</label>
    <input type="text" class="form-control" id="descripcion" aria-describedby="rfc" placeholder="Descripcion">
	<label for="precio">Precio</label>
    <input type="number" class="form-control" id="precio" aria-describedby="precio" placeholder="precio" onchange="cambiarCantidades();" onkeyup="cambiarCantidades();">
	<label for="cantidad">Cantidad</label>
    <input type="number" class="form-control" id="cantidad" aria-describedby="cantidad" placeholder="cantidad" onchange="cambiarCantidades();" onkeyup="cambiarCantidades();">
  </div>
  
     <div class="form-group">
       <h4>Total</h4>
                   
	<label for="subtotal">Subtotal</label>
    <input type="number" class="form-control" id="subtotal" aria-describedby="subtotal" readonly>
	<label for="iva">Impuesto IVA</label>
    <input type="number" class="form-control" id="iva" aria-describedby="precio" readonly>
	<label for="total">Total</label>
    <input type="number" class="form-control" id="total" aria-describedby="total" readonly>
  </div>
  
  

  
  
  
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar Factura</button>

      </div>
	  </form>
    </div>
  </div>
</div>

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
    <script src="Facturama/facturama.api.js"></script>
    <script src="Facturama/clients.js"></script>
    <script src="Facturama/products.js"></script>
    <script src="Facturama/branchoffice.js"></script>
    <script src="Facturama/cfdi.js"></script>
    <script src="Facturama/taxentity.js"></script>
    <script src="Facturama/complemento_pago.js"></script>

    <script type="text/javascript">
        $.fn.pageMe = function(opts){
        var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);
        
        var listElement = $this.find('tbody');
        var perPage = settings.perPage; 
        var children = listElement.children();
        var pager = $('.pager');
        
        if (typeof settings.childSelector!="undefined") {
            children = listElement.find(settings.childSelector);
        }
        
        if (typeof settings.pagerSelector!="undefined") {
            pager = $(settings.pagerSelector);
        }
        
        var numItems = children.size();
        var numPages = Math.ceil(numItems/perPage);
    
        pager.data("curr",0);
        
        if (settings.showPrevNext){
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
        }
        
        var curr = 0;
        while(numPages > curr && (settings.hidePageNumbers==false)){
            $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
            curr++;
        }
        
        if (settings.showPrevNext){
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
        }
        
        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages<=1) {
            pager.find('.next_link').hide();
        }
      	pager.children().eq(1).addClass("active");
        
        children.hide();
        children.slice(0, perPage).show();
        
        pager.find('li .page_link').click(function(){
            var clickedPage = $(this).html().valueOf()-1;
            goTo(clickedPage,perPage);
            return false;
        });
        pager.find('li .prev_link').click(function(){
            previous();
            return false;
        });
        pager.find('li .next_link').click(function(){
            next();
            return false;
        });
        
        function previous(){
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }
         
        function next(){
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }
        
        function goTo(page){
            var startAt = page * perPage,
                endOn = startAt + perPage;
            
            children.css('display','none').slice(startAt, endOn).show();
            
            if (page>=1) {
                pager.find('.prev_link').show();
            }
            else {
                pager.find('.prev_link').hide();
            }
            
            if (page<(numPages-1)) {
                pager.find('.next_link').show();
            }
            else {
                pager.find('.next_link').hide();
            }
            
            pager.data("curr",page);
          	pager.children().removeClass("active");
            pager.children().eq(page+1).addClass("active");
        
        }
    };
    
   
    </script>

</body></html>
