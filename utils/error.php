<?php
function error_mensaje($mensaje){
    //header('Content-Type: application/json');
    $response['mensaje'] = $mensaje;
    http_response_code(400);
    echo json_encode($response);
}
?>