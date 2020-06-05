<?php

require 'conexion.php';

$lista = R::getAll("SELECT * from envioshistorico
    where venta_id = ".$_POST['venta_id'] );
    $nuevo = 0;
    $transito = 0;
    $resulto = 0;
    $recoleccion = 0;
      
if ($lista) {
	foreach ($lista as $key) {

        if ($key['status'] == 'Preparando envio') {
            $nuevo = 1;
        }
        if($key['status'] =="Recolección pendiente"){
            $recoleccion = 1;
        }
        if ($key['status'] == 'En tránsito') {
            $transito = 1;
        }
        if ($key['status'] == 'Entregado') {
            $resulto = 2;
        }
        $data .= '<li class="progress-step is-complete">
                              <div class="progress-marker"></div>
                              <div class="progress-text">
                                <h4 class="progress-title">' . $key['status'] . '</h4>
                                ' . $key['created'] . '
                              </div>
                            </li>';

    }
    if ($nuevo == 0) {
        $data .= '<li class="progress-step ">
                              <div class="progress-marker"></div>
                              <div class="progress-text">
                                <h4 class="progress-title">Preparando envio</h4>

                              </div>
                            </li>';
    }
    if ($recoleccion == 0) {
        $data .= '<li class="progress-step ">
                              <div class="progress-marker"></div>
                              <div class="progress-text">
                                <h4 class="progress-title">Recolección pendiente</h4>

                              </div>
                            </li>';
    }
    if ($transito == 0) {
        $data .= '<li class="progress-step ">
                              <div class="progress-marker"></div>
                              <div class="progress-text">
                                <h4 class="progress-title">En tránsito</h4>

                              </div>
                            </li>';
    }
    if ($resulto == 0) {
        $data .= '<li class="progress-step ">
                              <div class="progress-marker"></div>
                              <div class="progress-text">
                                <h4 class="progress-title">Entregado</h4>

                              </div>
                            </li>';
    }
    $result['track'] = $data;
}else{
  $result['track']="La venta no ha sido encontrada, intenta nuevamente.";
}
echo $result['track'];
?>