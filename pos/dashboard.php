<?php
 session_start();

 if(!isset($_SESSION["user_id"])){
    header('Location: index.php');
 }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>POS Power Golden | El Mundo de la Herbolaria</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style-dashboard-pos.css">

    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
</head>

<body class="body-dash-pos">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../images/logo-navbar.png" alt="">
            </div>

            <div class="sidebar-sub-header">
                Menu
            </div>

            <ul class="list-unstyled components">
                <li class="">
                    <a class="active" href="dashboard.html">Dashboard</a>
                </li>
                <li>
                    <a onclick="corte_de_caja()">Corte de Caja</a>
                </li>
                <li>
                    <a href="#">Reportes</a>
                </li>
                <li>
                    <a href="#">Gastos</a>
                </li>
                <li>
                    <a href="pos.php">POS</a>
                </li>
                <li>
                    <a href="#">Productos</a>
                </li>
                <li>
                    <a href="#">Configuración</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <div class="container-fluid">
                <nav class="navbar navbar-pos navbar-expand-lg navbar-light bg-light">
                    <button type="button" id="sidebarCollapse" class="btn btn-menu">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
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

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <p class="title-dash">Dashboard</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-2">
                    <a href="pos.php">
                        <div class="d-item-dashboard">
                            <i class="fas fa-store-alt icon-dash"></i>
                            <p class="t1"><a href="pos.php">Punto de venta</a></p>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-2" onclick="corte_de_caja()";>
                        <div class="d-item-dashboard">
                            <i class="fas fa-dollar-sign icon-dash"></i>
                            <p class="t1"><a href="#0">Corte de Caja</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="d-item-dashboard">
                            <i class="fas fa-chart-pie icon-dash"></i>
                            <p class="t1"><a href="#0">Reportes</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="d-item-dashboard">
                            <i class="fas fa-hand-holding-usd icon-dash"></i>
                            <p class="t1"><a href="#0">Gastos</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="d-item-dashboard">
                            <i class="fas fa-shopping-basket icon-dash"></i>
                            <p class="t1"><a href="#0">Productos</a></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="d-item-dashboard">
                            <i class="fas fa-cog icon-dash"></i>
                            <p class="t1"><a href="#0">Configuración</a></p>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mb-4">
                    <div class="col-lg-12 col-md-12">
                        <div class="d-grafica-ventas">
                            <p class="t1">Historico de ventas</p>
<!--<canvas height="400" id="myChart"></canvas>-->
<div class="row" >
						<div class="col-lg-4 col-md-4 col-4 pr-0">
                            <label for="">Clientes</label>
						<select class="selectpicker form-control input-pos mt-3" id="sector">
							<option  value="">Todos los clientes</option>
                        </select>
</div>
<div class="col-lg-3 col-md-3 col-3 pr-0">
                            <label for="">Desde</label>
						<input type="date" id="inicio" class="form-control input-pos mt-3">
</div>
<div class="col-lg-3 col-md-3 col-3 pr-0">
                            <label for="">Hasta</label>
						<input type="date" id="fin" class="form-control input-pos mt-3">
</div>
<div class="col-lg-2 col-md-2 col-2 pr-0">
    <br>
                          <button type="button" onclick="get_sales();" class="btn btn-lg-pos btn-bg-blue mt-3">Filtrar</button>
</div>
</div>
<br>
<div class="row">
<div class="col-lg-6 col-md-6 col-6 pt-2 ">
</div>
<div class="col-lg-6 col-md-6 col-6 pt-2 " style="text-align:right;">
									<p class="p-total-pos">Total: <span id="total"></span></p>
								</div>
</div>
<div class="d-table-ticket">
                            <div class="table-responsive">
                                <table class="table table-borderless table-ticket" id="tabla_ventas">
                                    <thead>
                                        <tr>
                                            <th >Cliente</th>
                                            <th >Fecha.</th>
                                            <th id="row_precio_table" >Total Vendido</th>
                                            <th >Atendido Por</th>
                                            <th >Sucursal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <section class="sec-ticket" style="width:1440px !important; display:none;"  id="sec-ticket" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10" >
                    <div class="d-ticket">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <p class="title-ticket">Corte de Caja</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <img class="img-ticket" src="../images/logo-navbar.png" alt="">
                            </div>
                        </div>

                        <div class="d-info-top">

                            <p class="t1">Fecha: <b id="fecha_ticket">30/11/2020 13:12 PM</b> </p>
                            <p class="t1" >Vendedor: <b><?php echo $_SESSION['username']?></b></p>
							<p class="t1" >Sucursal: <b id="sucursal">Brayam Morando</b></p>
                            <div id="horas_div" style="display:none;">
                            <p class="t1" >Horas aplicadas: <b id="horas">Brayam Morando</b></p>
                            </div>

                        </div>
                        

                        <div class="d-table-ticket">
                            <div class="table-responsive">
                                <table class="table table-borderless table-ticket" id="tabla_ticket">
                                    <thead>
                                        <tr>
                                            <th >Cliente</th>
                                            <th >Fecha</th>
                                            <th id="row_precio_table" >C. Producto Vendido</th>
                                            <th id="row_total_table">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="row" >
                        <div class="col-lg-12 col-md-12 col-12">
                                    <p class="t2">Firma de Satisfacción</p>
                                </div>
                                </div>
                        <div class="row" >
                                <div  style=" margin-left:20px;margin-right:20px; width:1320px; height:120px; background-color:#F4F1BB;">
                                </div>
                        </div>
                        <br><br>
                        
                        <div class="d-footer-ticket">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <p class="t2">Total: <span id="total_ticket"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4 pr-0">
                                    <p class="t1 text-center">Tarjeta: <b id="tarjeta_ticket"></b></p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4 pl-0 pr-0">
                                    <p class="t1 text-center">Efectivo: <b id="efectivo_ticket"></b></p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4 pl-0 pr-0">
                                    <p class="t1 text-center">Referencia: <b id="referencia_ticket"></b></p>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12">
                                <p class="t1 text-center">¡Gracias por tu esfuerzo!</p>
                                <p class="t1 text-center"><b>Power Golden</b></p>
                            </div>
                        </div>
                        
                       


                    </div>
                </div>

            </div>
        </div>

    </section>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    
    <div class="modal fade" id="modalCorte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Corte de Caja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="p-metodo-pago">Tipo de corte de caja</p>

					<div class="row">
						<div class="col-lg-4 col-md-4 col-4" style="display:none;">
							<button type="button" class="btn btn-lg-modal btn-pago-tarjeta" data-toggle="modal" data-target="#modalTarjeta"><i class="fas fa-credit-card mr-2"></i> Pago con T. Electronica</button>
						</div>
						<div class="col-lg-6 col-md-6 col-6">
							<button type="button" class="btn btn-lg-modal" onclick="corte_parcial();"><i class="fas fa-credit-card mr-2"></i> Corte Parcial</button>
						</div>
						<div class="col-lg-6 col-md-6 col-6">
							<button type="button" class="btn btn-lg-modal" onclick="corte_diario();"><i class="fas fa-coins mr-2"></i> Corte Diario</button>
						</div>

					</div>
					<br>
					<div class="row mt-1" id="div_pago" style="display:none;">
						<div class="col-lg-12 col-md-12 col-12">
							
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="modalHoras" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Corte de Caja Parcial</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="p-metodo-pago">Horas para el corte de caja</p>
                    <form id="corte_parcial" class="">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-4" style="display:none;">
							<button type="button" class="btn btn-lg-modal btn-pago-tarjeta" data-toggle="modal" data-target="#modalTarjeta"><i class="fas fa-credit-card mr-2"></i> Pago con T. Electronica</button>
						</div>
						<div class="col-lg-6 col-md-6 col-6">
                        <label for="">Desde</label>
						<input type="time" id="hora1" class="form-control input-pos mt-3" required>
						</div>
						<div class="col-lg-6 col-md-6 col-6">
                        <label for="">Hasta</label>
						<input type="time" id="hora2" class="form-control input-pos mt-3" required>
						</div>

					</div>
					<br>
					<div class="row mt-1" id="div_pago" >
						<div class="col-lg-12 col-md-12 col-12">
							<button type="submit" class="btn btn-lg-blue btn-bg-blue">Generar Corte</button>
						</div>
					</div>
                    </form>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.0.0.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- OWL Carousel -->
    <script src="../js/owl.carousel.js"></script>
    <script src="../js/jquery.mousewheel.min.js"></script>
    <!-- OWL Carousel -->
    <script src="../js/Chart.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="../js/chart-dashboard-pos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body></html>