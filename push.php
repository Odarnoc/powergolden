<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyDmZjdxNIHJh-0dclX7OdyrIacSx-WorY0' );



$titulo=$_REQUEST['titulo'];
$body=$_REQUEST['mensaje'];




$registrationIds = array( TOKENS );
// prep the bundle
$msg = array
(
    'body'  => $body,
    'title'     => $titulo,
    'vibrate'   => 1,
    'sound'     => 1,
);

$fields = array
(
    'to'  => '/topics/ventas',
    'notification'          => $msg
);

$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;

header("Location: notificaciones.php");
die();

?>