
<div class="col-lg-4 col-md-4 bg-white">
                    <div class="d-menu-left">
                        <div class="clearfix d-img-name">
                            <img src="images/profile-brayam-morando.png" alt="">
                            <p class="t1 one-line"><?php echo $information->nombre." ".$information->apellidos; ?></p>
                            <p class="t2 one-line"><?php echo $information->correo; ?></p>
                        </div>

                        <div class="d-list-menu">
                            <ul>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="clientes.php">Clientes</a></li>
                                <li><a href="ventas.php">Ventas</a></li>
                                <li><a href="">Timeline de productos</a></li>
                                <li><a href="registro-administrador.php">Registro Administrador</a></li>
                                <li>
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Productos
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Listado de productos</a>
                                            <a class="dropdown-item" href="carrito.php">Carrito de compras</a>
                                            <a class="dropdown-item" href="#">Lista de carrito</a>
                                            <a class="dropdown-item" href="registro-productos.php">Agregar producto</a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="">Tarjetas</a></li>
                                <li><a href="">Paquetes de productos</a></li>
                                <li><a href="">Folletos electrónicos</a></li>
                                <li><a href="billetera.php">Billetera</a></li>
                                <li><a href="bonos.php">Bonos</a></li>
                                <li><a href="reportes.php">Reportes</a></li>
                                <li><a href="matriz.php">Matriz de clientes</a></li>
                                <li><a href="">Promociones</a></li>
                                <li><a href="">Videos</a></li>
                                <li><a href="">New letters</a></li>
                                <li><a class="logout" href="ajax/cerrar_sesion.php">Cerrar sesión<i class="fas fa-sign-out-alt"></i></a></li>
                            </ul>

                        </div>

                    </div>

                </div>
                
