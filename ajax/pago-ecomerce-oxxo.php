<?php
require '../bd/conexion.php';
require '../utils/error.php';

require_once '../pos/webserviceapp/vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-7698839841259331-040703-babc7d9c09e98697a4429f7079a92f22-286156172");

  $payment = new MercadoPago\Payment();
  $payment->transaction_amount = floatval($_POST['transaction_amount']);
  //$payment->transaction_amount = floatval(20);
  $payment->description = "Compra online Power Golden.";
  $payment->payment_method_id = "oxxo";
  $payment->payer = array(
    "email" => $_POST['email']
  );

  $payment->save();
  echo $payment->transaction_details->external_resource_url;

  $carrito = $_POST['carrito'];
  $errores=array();
  
  if(sizeof($carrito) < 0){
  error_mensaje('El carrito no puede estar vacio.');
  return;
  } 
  
  foreach ($carrito as $valor) {
      $almacen = R::findOne( 'inventarios', 'sucursal_id = 1 && existencia >= ? && producto_id = ?', [ $valor['cant'],$valor['id'] ]);
      if(empty($almacen)){
          array_push($errores,$valor);
      }
  }
  
  if(!empty($errores)){
    $prodsErr='';
    foreach ($errores as $valor) {
        $prodsErr.=$valor['nombre'].', ';
    }
    $msjErr='Los productos ( '.$prodsErr.' ) no tienen suficientes existencias';
    error_mensaje($msjErr);
    return;
}

  $venta = R::dispense('ventas');
  $venta->user_id = $_POST['usuariid'];
  $venta->fecha = new DateTime();
  $venta->total = $_POST['transaction_amount'];
  $id_venta = R::store($venta);

  foreach ($carrito as $item) {
      $prod = R::dispense('productosxventas');
      $prod->venta_id = $id_venta;
      $prod->producto_id = $item['id'];
      $prod->cantidad = $item['cant'];
      $id = R::store($prod);


      $producto = R::findOne( 'inventarios', 'sucursal_id = 1 && producto_id = ?', [$item['id']]);
      $producto->existencia -= $item['cant'];
      R::store($producto);

  }

?>