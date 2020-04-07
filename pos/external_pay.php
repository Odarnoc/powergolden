<?php

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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	


	<title>POS Power Golden | El Mundo de la Herbolaria</title>

</head>
<style>
.gpay-button.long{
	width:100% !important;
}</style>

<body class="bg-gray" id="cuerpo">
<a style="display:none"href="#" id="close-window">Close this window tab</a>
    <input type="hidden" id="venta_id" value="<?php echo $_GET['venta']?>">

<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Pagar</h5>
				
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-6">
							<div class="d-modal-pagar">
								<p class="t1">Total</p>
								<p class="t2" id="total_metodo_pago"></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-6">
							<div class="d-modal-pagar">
								<p class="t1">Total acumulado</p>
								<p class="t2" id="total_a_metodo_pago"></p>
							</div>
						</div>
					</div>


					<p class="p-metodo-pago">Metodo de pago</p>

					<br>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-6" >
					<div id="paypal-button-container"></div>
					</div>
					<div class="col-lg-6 col-md-6 col-6">
							<button type="button" onclick='$("#modalTarjeta").modal("toggle");' class="btn btn-mercado-pago"><img src="/images/mercadopago.png" alt="">Pago con Mercado Pago</button>
						</div>
						<div class="col-lg-3 col-md-3 col-3" style="display:none;">
							<button type="button" onclick='enviar_pago_oxxo()' class="btn btn-lg-blue btn-bg-blue">Pagar con oxxo</button>	
						</div>
					</div>
					<br>
					<div class="row mt-1" id="div_pago" style="display:none;">
						<div class="col-lg-12 col-md-12 col-12">
							<button type="button" onclick="sale();" class="btn btn-lg-blue btn-bg-blue">Completar pago</button>
						</div>
					</div>


				</div>
			
			</div>
		</div>
	<section class="sec-ticket" style="width:1440px !important; display:none;"  id="sec-ticket" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10" >
                    <div class="d-ticket">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <p class="title-ticket">Ticket</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <img class="img-ticket" src="../images/logo-navbar.png" alt="">
                            </div>
                        </div>
                        <p class="p-total-pos" style="display:none"><b id="totalcarrito">$0.00</b></p>

                        <div class="d-info-top">

                            <p class="t1">Fecha: <b id="fecha_ticket">30/11/2020 13:12 PM</b> </p>
                            <p class="t1">Folio: <b id="folio_ticket">0357</b></p>
							<div id="cliente_ticket">
								<p class="t1" >Cliente: <b id="nombre_cliente">Brayam Morando</b></p>
								<p class="t1" >Teléfono cliente: <b id="telefono_cliente">33 2269 2108</b></p>
							</div>
							<div id="referencia_ticket">
								<p class="t1" >Referencia: <b id="referencia_cliente">Brayam Morando</b></p>
							</div>

                        </div>

                        <div class="d-table-ticket">
                            <div class="table-responsive">
                                <table class="table table-borderless table-ticket" id="tabla_ticket">
                                    <thead>
                                        <tr>
                                            <th >Producto</th>
                                            <th >Cant.</th>
                                            <th id="row_precio_table" >Precio</th>
                                            <th id="row_total_table">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        
                        <div class="d-footer-ticket">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-4 pr-0">
                                    <p class="t1 text-center">Productos: <b id="productos_ticket"></b></p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-4 pl-0 pr-0">
                                    <p class="t1 text-center">Subtotal: <b id="subtotal_ticket"></b></p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-4 pl-0">
                                    <p class="t1 text-center">IVA: <b id="iva_ticket"> </b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <p class="t2">Total: <span id="total_ticket"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-4 pr-0">
                                    <p class="t1 text-center">Pago: <b id="recibido_ticket"></b></p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-4 pl-0 pr-0">
                                    <p class="t1 text-center">Cambio: <b id="cambio_ticket"></b></p>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12">
                                <p class="t1 text-center">¡Gracias por tu preferencia!</p>
                                <p class="t1 text-center"><b>Power Golden</b></p>
                            </div>
                        </div>
                        
                       


                    </div>
                </div>

            </div>
        </div>

    </section>
<!-- Modal -->

</form>
<div class="modal fade" id="modalTarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Pago con tarjeta</h5>
					<button type="button" class="close btn-close-tarjeta" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p class="p-metodo-pago">Datos bancarios</p>

					<form method="post" id="pay" name="pay" >
                <fieldset>
					<input type="hidden" name="transaction_amount" id="transaction_amount" value="100">
					<input type="hidden" name="token" id="token" value="100">
				<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
								<label class="floating-label">Número de la tarjeta</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" id="cardholderName" data-checkout="cardholderName" />
								<label class="floating-label">Nombre y apellido</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" id="cardExpirationMonth" data-checkout="cardExpirationMonth" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
								<label class="floating-label">Mes de vencimiento</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" id="cardExpirationYear" data-checkout="cardExpirationYear" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
								<label class="floating-label">Año de vencimiento</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" id="securityCode" data-checkout="securityCode" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
								<label class="floating-label">Código de seguridad</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<select class="form-control input-form-border"  id="installments" class="form-control" name="installments"></select>
								<label class="floating-label">Cuotas</label>
							</div>
						</div>
                  
                    
                    <input type="hidden" name="payment_method_id" id="payment_method_id"/>
                   
					<button type="submit" class="btn btn-lg-blue mt-4">Pagar</button>
					
                </fieldset>
            </form>
				</div>
			</div>
		</div>
	</div>
                </div>
            </div>
        </div>
    </div>

	<!-- jQuery -->
	<script src="../js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" 
        src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript' 
  src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
	
	<script src="../js/jquery-migrate-3.0.0.min.js"></script>

	<!-- popper.min -->
	<script src="../js/popper.min.js"></script>

	<!-- bootstrap -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- scrollIt -->
	<script src="../js/scrollIt.min.js"></script>

	<script src="../js/owl.carousel.js"></script>
	<script src="../js/jquery.mousewheel.min.js"></script>
	<script src="js/sweetalert2.all.js"></script>
	<script src="js/app_main.js"></script>
	<script src="js/external_pay.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../js/jquery.easypiechart.min.js"></script>

  
<script src="https://www.paypal.com/sdk/js?client-id=Afj8W6DoGpUac1ZsvxkGMqt5yoeN3jEEA4DZ-n2Fr-qicsBHWUTcwVlssu1lEDDh3hBnBosC82L4uhXM&currency=MXN&locale=es_MX" data-sdk-integration-source="button-factory"></script>



	<script>
		$(document).ready(function() {
			$('.owl-carousel').owlCarousel();
		});
		


		var owl = $('.owl-carousel');


		owl.owlCarousel({
			loop: true,
			margin: 11,
			nav: false,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 2,
				},
				600: {
					items: 4,
				},
				1000: {
					items: 4
				}
			}
		});

		owl.on('mousewheel', '.owl-stage', function(e) {
			if (e.deltaY > 0) {
				owl.trigger('prev.owl');
			} else {
				owl.trigger('next.owl');
			}
			e.preventDefault();
			e.preventDefault();
		});

		$('.btn-menu-slide').on('click', function() {
			$('.btn-menu-slide.active-slide').removeClass('active-slide');
			$(this).addClass('active-slide');
		});

		$('.item-product-list').on('click', function() {
			$('.item-product-list.active-product-list').removeClass('active-product-list');
			$(this).addClass('active-product-list');
		});
	</script>
	<script>

    </script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
	<script src="js/mercadopago.js"></script>
	<script async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"></script>

</body></html>
