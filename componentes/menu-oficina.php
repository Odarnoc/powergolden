<?php

$information  = R::findOne( 'usuarios', ' id = '.$_SESSION["user_id"]);

?>

<div class="clearfix d-img-name">
    <p class="t1 one-line title-menu-oficina"><?php echo $information['nombre']?> <?php echo $information['apellidos']?></p>
    <p class="t2 one-line mb-0 mt-1">Experiencia</p>
    <div class="d-progress">
        <progress max="100" value="80" class="html5">
            <div class="progress-bar">
                <span style="width: 80%">80%</span>
            </div>
        </progress>
    </div>

</div>

<div class="d-list-menu">
    <ul>
        <li><a href="oficina-virtual.php">Dashboard</a></li>
        <li><a href="registro-independiente-oficina.php">Registro</a></li>
        <!-- <li><a href="#0">Mensajes <span class="noti-menu-oficina">5</span></a></li>
        <li><a href="#0">Pedidos de mis clientes <span class="noti-menu-oficina">3</span></a></li>
        <li><a href="#0">Mis pedidos con la empresa <span class="noti-menu-oficina">2</span></a></li>
        <li><a href="#0">Mis últimas compras <span class="noti-menu-oficina">1</span></a></li> -->
        <!--<li><a href="facturacion.php">Facturacion</a></li>-->
        <li><a href="promociones-ecomerce.php">Promociones</a></li>
        <li><a href="paquetes-ecomerce.php">Paquetes</a></li>
        <li><a href="folletos-oficina.php">Folletos electronicos</a></li>
        <!---<li><a href="#0">Página personal</li>-->
        <li><a href="mis-ventas-oficina.php">Ventas directas</li>
        <li><a href="historial-ecomerce.php">Compras</li>
        <li><a href="matriz.php?id=<?php echo $_SESSION["user_id"]?>">Mi organización</li>
        <!-- <li><a href="#0">Empresa</li> -->
        <li><a href="reporte-venta-oficina.php">Reportes</li>
        <li><a href="contacto.php">Contacto</a></li>
    </ul>

</div>


