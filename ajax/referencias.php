<?php

require 'user_preferences/user-info.php';

if(!isset($_POST['fecha-in'])){
    $query = 'SELECT v.*, u.nombre as nombre, u.apellidos as apellido from referencias as v LEFT JOIN usuarios as u on v.usuario_id = u.id';
    $filtro = "dd-mm-aaaa";
}else{
    $query = "SELECT v.*, u.nombre as nombre, u.apellidos as apellido from referencias as v LEFT JOIN usuarios as u on v.usuario_id = u.id where DATE(fecha)=DATE('".date("Y-m-d", strtotime($_POST['fecha-in']))."')" ;
    $filtro = $_POST['fecha-in'];
}

$ventas=R::getAll($query);

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

    <!-- responseive menu -->
    <link rel="stylesheet" href="css/menu-movil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">



    <title>Power Golden | El Mundo de la Herbolaria</title>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload').attr("style", "background-image: url(" + e.target.result + ");");
                    $('.image-upload').addClass("overlay-image-upload");

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</head>

<body>

            <!-- Top Menu -->
            <?php include("menus/top_menu.php"); ?>
            <!-- End Top Menu -->



    <!-- End Navbar ====
    	======================================= -->

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">

            <!-- Admin Menu -->
            <?php include("menus/menu_general_admin.php"); ?>
            <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray" >
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Historial de Referencias.</p>
                                    <button class="btn btn-aceptar-modal" style="color: white" id="crear_referencia" onclick="crear_referencia();" type="button">Crear Nueva Referencia de Pago<i style="margin-left: 20px" class="fas fa-plus"></i>
                                            </button>
                                    <p class="small-text-cuenta">Busca tus referencia por fecha:  
                                        <form action="referencias.php" method="post">
                                            <input style="margin-left 20px" value="<?php echo $filtro;  ?>" type="date" id="datein" name="fecha-in"> 
                                            <button class="btn btn-aceptar-modal" style="color: white" id="buscar" type="submit">Buscar<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </button>
                                            <a class="btn btn-aceptar-modal" style="color: white" href="referencias.php" >Limpiar filtro<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </a>
                                        </form>  
                                    </p> 
                                </div>
                            </div>

                        </div>

                        <table class="table" style="text-align:center">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">Cliente</th>
                                <th scope="col">Tipo de Referencia</th>
                                <th scope="col">Numero de Referencia</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody >
                            
                            <?php 
                            foreach ($ventas as $item) { ?>
                                <tr>
                                <td style="text-align:left"><?php echo $item['nombre'] ?> <?php echo $item['apellido'] ?></td>
                                
                                <td><?php echo ($item['tipo']==1) ? "Pago en tienda" : "Pago en Banco";  ?></td>
                                <td><?php echo $item['referencia'] ?></td>
                                <td><?php echo ($item['status']==0) ? "<span class='label label-danger'>No cobrado</span>" : "<span class='label label-success'>Cobrado</span>";  ?></td>
                                <td><?php echo $item['fecha'] ?></td>
                                <td>$<?php echo $item['cantidad'] ?><sup>.00</sup></td>
                                </tr> 
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="modalReferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Referencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body pt-5 pb-5">
                    <button type="button" onclick="pago_en_tienda()" class="btn btn-lg-modal mb-3"><i class="fas fa-store mr-3"></i>Referencia de pago en tiendas</button>
                    <button type="button" onclick="pago_en_banco()" class="btn btn-lg-modal"><i class="fas fa-university mr-3"></i>Referencia de pago en bancos</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalGenerarReferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Referencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body pt-5 pb-5">
                <form id="payment">
                   
                <select id="sector" data-live-search="true" required class=" selectpicker form-control input-pos select-cliente-pos mt-3">
									<option value="">Seleccionar cliente</option>
									

                                </select>
                                <br>
                    
                    <input type="number" id="cantidad" style="margin-top:15px;"class="form-control input-pos input-cantidad-modal" placeholder="Cantidad" required>
                    
                    <button type="submit" class="btn btn-lg-blue mt-4" >Generar referencia de pago</button>
                            </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

            <!-- Footer-->
            <?php include("menus/footer_general.php"); ?>
            <!-- End Footer -->


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

    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <script src="js/referencias.js"></script>

    

</body></html>
