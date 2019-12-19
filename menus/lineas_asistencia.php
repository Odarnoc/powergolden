    <?php 
        $lineas=R::find('lineas');
    ?>

        <div class="col-lg-3 col-md-3">
            <div class="d-lineas">
                <p class="title-sec">LÍneas</p>

                <ul id="lista-lineas">
                    <?php foreach ($lineas as $valorLinea) { ?>
                    <li><a href="lineas.php?linea=<?php echo $valorLinea['id'] ?>"><i class="fas fa-circle" style="color:<?php echo $valorLinea['color'] ?>"></i><?php echo $valorLinea['nombre'] ?></a></li>
                    <?php } ?>
                </ul>

            </div>

            <div class="d-asistencia mt-30">
                <img src="images/icon-asistencia.svg" alt="">
                <p class="t1">Asistencia</p>
                <p class="t2"><a href="tel:3331227000">33 3122 7000</a></p>
            </div>



        </div>