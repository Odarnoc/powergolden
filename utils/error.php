<?php
function error_mensaje($mensaje){
    //header('Content-Type: application/json');
    $response['mensaje'] = $mensaje;
    $response['error'] = 'hay errtor';
    http_response_code(400);
    echo json_encode($response);
}
?>