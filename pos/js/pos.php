<?php
 session_start();

 if(!isset($_SESSION["user_id"])){
    header('Location: index.php');
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	


	<title>POS Power Golden | El Mundo de la Herbolaria</title>

</head>
<style>
.gpay-button.long{
	width:100% !important;
}</style>

<body class="bg-gray" id="cuerpo">

	<section class="sec-nav-pos">

		<div class="container-fluid">

			<nav class="navbar navbar-pos navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand logo" href="#"><img src="../images/logo-navbar.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <p class="nav-link mb-0" id="frase"></p>
                        </li>
						<!--<li class="nav-item">
                            <div id="inv_chart"></div>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link mb-0"><b>(<span id="venta"></span>)</b> Prod. Vendidos</p>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link mb-0"><b>(<span id="cantidad"></span>)</b> Prod. en Inventario</p>
                        </li>-->
						<li class="nav-item">
                            <div id="inv_chart"></div>
                        </li>
						<li class="nav-item">
                            <div id="ventas_chart"></div>
                        </li>
                    </ul>

					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="dashboard.php"><i class="fas fa-chart-line mr-2"></i>Dashboard</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user-circle mr-2"></i><?php echo $_SESSION['username']?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<!--<a class="dropdown-item" href="#"><i class="fas fa-star mr-2"></i>Opción uno</a>
								<a class="dropdown-item" href="#"><i class="fas fa-star mr-2"></i>Opción dos</a>-->
								<a class="dropdown-item" id="logout"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

		</div>
	</section>
<input type="hidden" id="user_id" value="<?php $_SESSION["user_id"]?>">
<input type="hidden" id="sucursal_id" value="<?php $_SESSION["sucursal_id"]?>">

	<section class="sec-body-pos">

		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-8 col-md-8">
					<div class="d-products-pos">

						<div class="d-input-product">

							<input type="text" class="form-control input-product" id="buscar" placeholder="Buscar producto por Nombre o Código">
						</div>

						<div class="d-slider-products">

							<div class="owl-carousel owl-theme">
								<div class="item">
									<a class="btn btn-menu-slide active-slide" onclick="change_category(0);"  role="button"><i class="fas fa-star ying-yang mr-3"></i>Todos</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide" onclick="change_category(1);" role="button"><i class="fas fa-circle cafe mr-3"></i>Línea Café</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide"  onclick="change_category(2);" role="button"><i class="fas fa-circle amarilla mr-3"></i>Línea Amarilla</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide"  onclick="change_category(3);" role="button"><i class="fas fa-circle rosa mr-3"></i>Línea Rosa</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide"  onclick="change_category(4);" role="button"><i class="fas fa-circle tinta mr-3"></i>Línea Tinta</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide"  onclick="change_category(5);" role="button"><i class="fas fa-circle verde mr-3"></i>Línea Verde</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide"  onclick="change_category(6);" role="button"><i class="fas fa-circle ying-yang mr-3"></i>Línea Yin Yang</a>
								</div>
								<div class="item">
									<a class="btn btn-menu-slide"  onclick="change_category(7);" role="button"><i class="fas fa-circle estrella mr-3"></i>Línea Estrella</a>
								</div>

							</div>
						</div>


						<div class="d-products-list">
							<div class="row" id="rowproductos">
								
								
							</div>
						</div>


					</div>

				</div>

				<div class="col-lg-4 col-md-4">
					<div class="d-payment-pos">
					<select class="form-control input-pos select-venta-pos" id="tipo_venta" onchange="cambio_tipo_venta()">
							<option hidden value="">Seleccionar tipo de venta</option>
							<option value="0">Cliente Temporal</option>
							<option value="1">Empresario Independiente</option>
						</select>
						<div  id="row_add_kits" style="display:none;">
						<select class="form-control input-pos mt-3" id="tipo_kit" onchange="agregar_kit()">
							<option hidden value="">Seleccionar tipo de kit</option>
						</select>
						</div>
						<div class="row">
							<div class="col-lg-8 col-md-8 col-8 pr-0">

								<select id="sector" data-live-search="true"class=" selectpicker form-control input-pos select-cliente-pos mt-3">
									<option value="0">Seleccionar cliente</option>
									

								</select>
							</div>
							<div class="col-lg-4 col-md-4 col-4">
								<button type="button" class="btn btn-lg-pos btn-bg-blue mt-3" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus mr-2"></i>Nuevo</button>
							</div>
						</div>


						<input type="text" class="form-control input-pos input-barcode-pos mt-3" placeholder="Escanea el código de barras">

						<div class="table-responsive table-pos mt-3">
							<table class="table table-borderless" id="tablacarrito">
								<thead>
									<tr>
										<th style="display:none;"></th>
										<th style="display:none;"></th>
										<th class="th-producto-pos">Producto</th>
										<th class="th-cantidad-pos">Cant.</th>
										<th class="th-precio-pos">Precio</th>
										<th class="th-eliminar-pos"><i class="fas fa-times"></i></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>

						<div class="d-footer-table">


							<div class="row row-footer-table">

								<div class="col-lg-6 col-md-6 col-6">
									<p class="t1">Productos: <b id="totalproductos">0</b></p>
								</div>
								<div class="col-lg-6 col-md-6 col-6 text-right">
									<p class="t1">Subtotal: <b id="subtotalcarrito">$0.00</b></p>
								</div>

								<div class="col-lg-6 col-md-6 col-6" >
									<div class="form-group row mb-0" style="display:none">
										<label for="input-descuento" class="col-sm-7 col-7 col-form-label">Descuento(%):</label>
										<div class="col-sm-5 pl-0 pr-0 col-5">
											<input type="number" id="input-descuento" class="form-control" placeholder="%">
											<label id="alerta" style="color:red; display:none;">Solo números entre 0 y 100</label>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-6 text-right">
									<p class="t1">IVA: <b id="totaliva">$0.00</b></p>
								</div>

							</div>

							<div class="row row-total-pos">
								<div class="col-lg-6 col-md-6 col-6 pt-2 ">
									<p class="p-total-pos">Total</p>
								</div>

								<div class="col-lg-6 col-md-6 col-6 text-right">
									<p class="p-total-pos"><b id="totalcarrito">$0.00</b></p>
								</div>

							</div>

						</div>

						<div class="d-btns-table-pos">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-6">
									<button type="button" onclick="cleanSale()" class="btn btn-lg-pos btn-bg-gray">Cancelar</button>
								</div>

								<div class="col-lg-6 col-md-6 col-6">
								<button type="button" class="btn btn-lg-pos btn-bg-blue" onclick="sale_modal()">Pagar</button>
								</div>

							</div>

						</div>


					</div>
				</div>
			</div>
		</div>
	</section>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="add_clients_form" class="form-cliente-modal">

						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form" name="name" required />
								<label class="floating-label">Nombre</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form" name="paterno" required />
								<label class="floating-label">Apellido Paterno</label>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form" name="materno" required />
								<label class="floating-label">Apellido Materno</label>
							</div>
						</div>
						
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form" name="email"  required />
								<label class="floating-label">Correo electrónico</label>
							</div>
						</div>
						
						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form" name="direccion" required />
								<label class="floating-label">Domicilio</label>
							</div>
						</div>

						<div class="form-group">
							<div class="floating-label-group">
								<input type="tel" class="form-control input-form" name="phone" required />
								<label class="floating-label">Teléfono</label>
							</div>
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-aceptar-modal">Guardar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
		<!-- Modal Metodo de pago -->
		<div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Pagar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
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

					<div class="d-table-modal-pagar">
						<div class="table-responsive">
							<table class="table table-borderless table-modal-pagar" id="tabla_metodos">
								<thead>
									<tr>
										<th>Tipo de Pago</th>
										<th>Cantidad</th>
										<th>Tarjeta</th>
									</tr>
								</thead>
								<tbody>
									

								</tbody>
							</table>
						</div>

					</div>

					<p class="p-metodo-pago">Metodos de pago</p>

					<div class="row">
						<div class="col-sm" >
							<button type="button" class="btn btn-lg-modal btn-pago-tarjeta" onclick='$("#modalPagar").modal("hide");' data-toggle="modal" data-target="#modalGenerarReferencia"><i class="fas fa-credit-card mr-2"></i> Referencia</button>
						</div>
						<div class="col-sm">
							<button type="button" class="btn btn-lg-modal" onclick='card_pay()'><i class="fas fa-credit-card mr-2"></i> Tarjeta</button>
						</div>
						<div class="col-sm">
							<button type="button" class="btn btn-lg-modal" onclick="efective_pay();"><i class="fas fa-coins mr-2"></i> Efectivo</button>
						</div>
						<div class="col-sm">
                            <button type="button" class="btn btn-lg-modal" onclick="transfer_pay();"><i class="fas fa-university mr-2"></i>Transferencia</button>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="btn btn-lg-modal"  onclick="deposito_pay();"><i class="fas fa-university mr-2"></i>Deposito</button>
                        </div>

					</div>
					<br>
					<div class="row">
					<div class="col-lg-12 col-md-12 col-12" >
					<div id="paypal-button-container"></div>
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-lg-12 col-md-12 col-12" id="container"></div>
					
					</div>
					
				
					
					<br>
					<div class="row mt-1">
						<div class="col-lg-12 col-md-12 col-12">
							<button type="button" onclick='$("#modalTarjeta").modal("toggle");' class="btn btn-lg-blue btn-bg-blue">Pagar con mercado pago</button>
							
						</div>
					</div>
					<div class="row mt-1" id="div_pago" style="display:none;">
						<div class="col-lg-12 col-md-12 col-12">
							<button type="button" onclick="sale();" class="btn btn-lg-blue btn-bg-blue">Completar pago</button>
							
						</div>
					</div>
					<div class="row mt-1" >
						<div class="col-lg-12 col-md-12 col-12">
							<button type="button" onclick="sale_externo();" class="btn btn-lg-blue btn-bg-blue">Pago Externo</button>
							
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Metodo de pago -->
	<div class="modal fade" id="modalGenerarReferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Referencia</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick='$("#modalPagar").modal("toggle");' aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body pt-5 pb-5">
                <form id="payment_reference">
                
                    
                    <input type="text" id="n_referencia" style="margin-top:15px;"class="form-control input-pos" placeholder="Referencia" required>
                    
                    <button type="submit" class="btn btn-lg-blue mt-4" >Validar referencia de pago</button>
                            </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" onclick='$("#modalPagar").modal("toggle");'  data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
	</div>
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
<!-- 	<div class="modal fade" id="modalTarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

					<form id="card_payment" class="form-tarjeta-modal">
					<input type="hidden" name="token_id" id="token_id">

						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" id="nombre_tarjeta" data-openpay-card="holder_name" required />
								<label class="floating-label">Nombre en la tarjeta</label>
							</div>
						</div>

						<div class="form-group">
							<div class="floating-label-group">
								<input type="text" class="form-control input-form-border" data-openpay-card="card_number" id="numero_tarjeta" required />
								<label class="floating-label">Número de tarjeta</label>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-lg-3 col-md-3 col-3">
								<div class="floating-label-group">
									<input type="text" class="form-control input-form-border" id="vencimiento_tarjeta" data-openpay-card="expiration_month" required />
									<label class="floating-label">Mes Vencimiento</label>
								</div>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-3">
								<div class="floating-label-group">
									<input type="text" class="form-control input-form-border" id="ano_vencimiento_tarjeta" data-openpay-card="expiration_year" required />
									<label class="floating-label">Año Vencimiento</label>
								</div>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-6">
								<div class="floating-label-group">
									<input type="text" class="form-control input-form-border" id="cvv_tarjeta" data-openpay-card="cvv2" required />
									<label class="floating-label">CVV</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="floating-label-group">
								<input type="number" class="form-control input-form-border" id="cantidad_tarjeta" required />
								<label class="floating-label" >Cantidad a cobrar</label>
							</div>
						</div>
					


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal btn-cancelar-tarjeta" data-dismiss="modal">Cancelar</button>
					<button type="submit" id="pay-button" class="btn btn-aceptar-modal">Aceptar</button>
					<button type="button"  style="display:none;" class="btn btn-aceptar-modal">Aceptar</button>
					</form>
				</div>
			</div>
		</div>
	</div> -->
	<div class="modal fade" id="modalDeleteKits" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Control de Kits</h5>
					<button type="button" class="close btn-close-tarjeta" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p class="p-metodo-pago">Eliminar Kit</p>
						<div class="form-group">
							<div class="floating-label-group">
							<div class="table-responsive table-pos mt-3">
							<table class="table table-borderless" id="tablakits">
								<thead>
									<tr>
										<th >Kit</th>
										<th >Precio</th>
										<th ><i class="fas fa-times"></i></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal btn-cancelar-tarjeta" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalGenerarPagoTarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pago con tarjeta</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick='$("#modalPagar").modal("toggle");' aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id="pago_tarjeta" class="form-tarjeta-modal">
                <div class="modal-body pt-5 pb-5">

                    <select class="form-control input-pos-modal mb-3" name="" id="tipo_tarjeta" required>
                        <option hidden value="">Tipo de Tarjeta</option>
                        <option value="1">Tarjeta de Credito</option>
                        <option value="2">Tarjeta de Debito</option>
                    </select>
					<input type="number" class="form-control input-pos-modal mb-3" id="cantidad_tarjetas" placeholder="Cantidad" required>
					<input type="text" class="form-control input-pos-modal" id="referencia_tarjetas" placeholder="Referencia" required>

                    <button type="submit" class="btn btn-lg-blue mt-4">Pagar</button>

                </div>
                <div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" onclick='$("#modalPagar").modal("toggle");' data-dismiss="modal">Cancelar</button>
</form>
                </div>
			</div>
			<div class="modal fade" id="modalGenerarPagoDeposito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pago con Deposito</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick='$("#modalPagar").modal("toggle");' aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id="pago_deposito" class="form-tarjeta-modal">
                <div class="modal-body pt-5 pb-5">

                    <select class="form-control input-pos-modal mb-3" name="" id="banco_deposito" required>
                        <option hidden value="">Banco</option>
                        <option value="1">BBVA</option>
                        <option value="2">Banorte</option>
                    </select>
					<input type="number" class="form-control input-pos-modal mb-3" id="cantidad_deposito" placeholder="Cantidad" required>
					<input type="text" class="form-control input-pos-modal" id="referencia_deposito" placeholder="Referencia" required>

                    <button type="submit" class="btn btn-lg-blue mt-4">Pagar</button>

                </div>
                <div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" onclick='$("#modalPagar").modal("toggle");' data-dismiss="modal">Cancelar</button>
</form>
                </div>
			</div>
			<div class="modal fade" id="modalGenerarPagoTransfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pago con Transferencia</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick='$("#modalPagar").modal("toggle");' aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id="pago_transfer" class="form-tarjeta-modal">
                <div class="modal-body pt-5 pb-5">

                    <select class="form-control input-pos-modal mb-3" name="" id="banco_transfer" required>
                        <option hidden value="">Banco</option>
                        <option value="1">BBVA</option>
                        <option value="2">Banorte</option>
                    </select>
					<input type="number" class="form-control input-pos-modal mb-3" id="cantidad_transfer" placeholder="Cantidad" required>
					<input type="text" class="form-control input-pos-modal" id="referencia_transfer" placeholder="Referencia" required>

                    <button type="submit" class="btn btn-lg-blue mt-4">Pagar</button>

                </div>
                <div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" onclick='$("#modalPagar").modal("toggle");' data-dismiss="modal">Cancelar</button>
</form>
                </div>
            </div>
        </div>
    </div>

	<!-- jQuery -->
	<script src="../js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
	<script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
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
	<script src="js/vender.js"></script>
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
	<script src="js/mercadopago.js"></script>
	<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
	
	<script async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"></script>
          

</body></html>
