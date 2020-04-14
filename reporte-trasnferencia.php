<?php

require 'user_preferences/user-info.php';

if(!isset($_POST['fechauno'])&&!isset($_POST['fechados'])){
    $query = 'SELECT ht.fecha,ht.cantidad,(SELECT nombre FROM productos as p WHERE ht.producto_id = p.id) as producto,(SELECT nombre FROM sucursales as s WHERE ht.origen = s.id) as origen, (SELECT nombre FROM sucursales as s WHERE ht.destino = s.id) as destino FROM historialtraspasos as ht';
}else{
    $query = 'SELECT ht.fecha,ht.cantidad,(SELECT nombre FROM productos as p WHERE ht.producto_id = p.id) as producto,(SELECT nombre FROM sucursales as s WHERE ht.origen = s.id) as origen, (SELECT nombre FROM sucursales as s WHERE ht.destino = s.id) as destino FROM historialtraspasos as ht
    WHERE ht.fecha BETWEEN"'.$_POST['fechauno'].'" and "'.$_POST['fechados'].'"';
    $filtro = $_POST['fechauno'];
    $filtrodos = $_POST['fechados'];
}

$productos=R::getAll($query);
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

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

    <title>Power Golden | El Mundo de la Herbolaria</title>

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

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Reportes</p>
                                    <p class="small-text-cuenta">Para generar un nuevo reporte de ventas, seleccione un rango de fechas.</p>
                                </div>
                            </div>

                        </div>

                        <div class="row row-form-perfil">
                            <div class="col-lg-12 col-md-12">

                                <div class="d-form-reporte">

                                    <form action="reporte-trasnferencia.php" method="post" class="form-reporte">
                                        <p class="t1">Rango de fechas</p>
                                        <div class="form-row">

                                            <div class="form-group col-lg-4 col-md-4">
                                                <input type="date" class="datepicker-here form-control" placeholder="<?php echo $filtro;  ?>" value="<?php if(isset($filtro)) echo $filtro;  ?>"  name="fechauno" data-date-format="yyyy/mm/dd" data-language='es' placeholder="Inicio">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-4">
                                                <input type="date" class="datepicker-here form-control" placeholder="<?php echo $filtrodos;  ?>" value="<?php if(isset($filtrodos)) echo $filtrodos;  ?>" name="fechados" data-date-format="yyyy/mm/dd" data-language='es' placeholder="Fin">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-4">
                                                <button type="submit"  style="margin-top: 0rem!important; height: 37px;" class="btn btn-blue mt-2"><i style="color: white" class="fas fa-search"></i></button>
                                                <a type="button" style="margin-top: 0rem!important; height: 37px;" href="pdf-traspasos.php<?php if(isset($_POST['fechauno']) && isset($_POST['fechados'])) {  ?>?inicio=<?php echo $_POST['fechauno'] ;  ?>&fin=<?php echo $_POST['fechados'] ; } ?>" target="_blank" class="btn btn-blue mt-2"><i class="fas fa-arrow-circle-down mr-2"></i>Generar reporte</a>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row row-tabla-ventas">
                            <div class="col-lg-12 col-md-12">
                                <div class="table-responsive">
                                    <table id="reportetransferencia" class="table">
                                        <thead>
                                            <tr class="table-primary">
                                                 <th>ID</th>
                                                <th>Fecha</th>
                                                <th>Cantidad</th>
                                                <th>Producto</th>
                                                <th>Origen</th>
                                                <th>Destino</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($productos as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['id'] ?></td>
                                                <td><?php echo substr($item['fecha'], 0, 10); ?></td>
                                                <td><?php echo $item['producto'] ?></td>
                                                <td><?php echo $item['cantidad'] ?></td>
                                                <td><?php echo $item['origen'] ?></td>
                                                <td><?php echo $item['destino'] ?></td>
                                            </tr>
                                        <?php } ?>  
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


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
    
     <!-- datables paginadores -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.js"></script>

    


    

    <script>

   
$(document).ready(function() {
    $('#reportetransferencia').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    } );
} );

</script>

</body>

</html>
