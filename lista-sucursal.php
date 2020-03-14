<?php

require 'user_preferences/user-info.php';

$query = 'SELECT * FROM  sucursales';
$sucursal = R::getAll($query);

$suc = R::find('sucursales');
$prod = R::find('productos');

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

</head>

<body>


    <!-- Top Menu -->
    <?php include("menus/top_menu.php"); ?>
    <!-- End Top Menu -->




    <section class="sec-cuenta">
        <div class="container">
            <div class="row">

                <!-- Admin Menu -->
                <?php include("menus/menu_general_admin.php"); ?>
                <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray">
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="d-title-cuenta">
                                    <p class="title-cuenta">Lista de sucursales.</p>
                                </div>
                            </div>

                            <div class="form-group col-lg-4 col-md-4" style="text-align: end;">
                                <a type="button" href="productos-inventarios.php" style="margin-top: 0rem!important; height: 37px;" class="btn btn-blue mt-2"><i class="fas fa-plus mr-2"></i>Agregar producto a inventario</a>
                            </div>
                        </div>
                        <br>

                        <table class="table" style="text-align:center">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sucursal as $item) { ?>
                                    <tr>
                                        <td style="vertical-align: middle"><?php echo $item['nombre'] ?></td>
                                        <td style="vertical-align: middle"><?php echo $item['direccion'] ?></td>
                                        <td style="vertical-align: middle"><?php echo $item['estado'] ?></td>
                                        <td style="vertical-align: middle">
                                            <div>
                                                <a href type="button" data-toggle="modal" data-target="#modalCopiar" onclick="selectSucursal('<?php echo $item['id'] ?>')"><i class="fas fa-exchange-alt"></i></a>
                                                <a href type="button" data-toggle="modal" data-target="#modalClonar" onclick="selectSucursal('<?php echo $item['id'] ?>')"><i class="fas fa-clone"></i></a>
                                                <a href="inventario-sucursal.php?id=<?php echo $item['id'] ?>"><i class="far fa-eye"></i></a>
                                                <a href="editar-sucursal.php?id=<?php echo $item['id'] ?>"><i class="far fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Modal transferir -->
    <div class="modal fade" id="modalCopiar" tabindex="-1" role="dialog" aria-labelledby="modalClonar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¿Deseas transferir un inventario?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-modal-cliente">
                        <p class="t1">Selecciona la sucursal de la que deseas copiar el inventario. </p>
                        <div class="form-group">
                            <div class="floating-label-group">
                                <label class="label-select">Sucursal de origen</label>
                                <select id="sucursalTranferir" class="form-control input-form-underline">
                                    <option value="9" hidden>Seleccionar sucursal.</option>
                                    <?php
                                    foreach ($suc as $valor) {
                                    ?>
                                        <option value="<?php echo $valor->id; ?>"><?php echo $valor->nombre; ?>. <?php echo $valor->estado; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <p class="t1">Selecciona el producto y la cantidad que deseas transferir.</p>
                        <div class="form-group">
                            <div class="floating-label-group">
                                <label class="label-select">Nombre del producto.</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <select id="productoTranferir" class="form-control input-form-underline">
                                            <option value="9" hidden>Producto.</option>
                                            <?php
                                            foreach ($prod as $valor) {
                                            ?>
                                                <option value="<?php echo $valor->id; ?>"><?php echo $valor->nombre; ?>. <?php echo $valor->estado; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" value="0" id="cantidadTranferir">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-30">
                            <div class="col-lg-6 col-md-6" style="margin: auto;">
                                <button style="background-color: #49B7F3; color:white;" type="button" class="btn btn-lg-modal btn-cliente-temporal" onclick="tranferir()">Copiar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Clonar-->
    <div class="modal fade" id="modalClonar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¿Deseas clonar el inventario? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-modal-cliente">
                        <p class="t1">Selecciona la sucursal de la que deseas clonar el inventario.</p>
                        <div class="form-group">
                            <div class="floating-label-group">
                                <label class="label-select">Sucursal de origen</label>
                                <select id="clonarSuc" class="form-control input-form-underline">
                                    <option value="9" hidden>Seleccionar sucursal.</option>
                                    <?php
                                    foreach ($suc as $valor) {
                                    ?>
                                        <option value="<?php echo $valor->id; ?>"><?php echo $valor->nombre; ?>. <?php echo $valor->estado; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-30">
                            <div class="col-lg-6 col-md-6" style="margin: auto;">
                                <button style="background-color: #49B7F3; color:white;" type="button" class="btn btn-lg-modal btn-cliente-temporal" onclick="clonar()">Clonar inventario</button>
                            </div>
                        </div>

                    </div>
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
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>

    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>

    <script src="js/sucursal.js"></script>
    <script src="js/sucursal-actions.js"></script>

    <script>
        $("input[type='number']").inputSpinner()
    </script>

</body>

</html>