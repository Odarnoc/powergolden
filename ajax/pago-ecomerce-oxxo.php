<?php
require '../bd/conexion.php';
require '../utils/error.php';

require_once '../pos/webserviceapp/vendor/autoload.php';

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

  $venta = R::dispense('ventas');
  $venta->user_id = $_POST['usuariid'];
  $venta->fecha = new DateTime();
  $venta->total = $_POST['transaction_amount'];
  $venta->is_payed = 0;
  $id_venta = R::store($venta);

  $vpagos = R::dispense('ventaspagos');
  $vpagos->venta_id = $id_venta;
  $vpagos->tipo_pago = 'Referencia';
  $vpagos->cantidad = $_POST['transaction_amount'];
  R::store($vpagos);

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

  if($_POST['sucursal'] != 0){
    $sucur = R::dispense('ventasentregas');
    $sucur->id_venta = $id_venta;
    $sucur->id_sucursal = $_POST['sucursal'];
    $sucur->id_usuario = $_POST['usuariid'];
    $sucur->status = 0;
    R::store($sucur); 
    }

  if(isset($_POST['pack_id'])){
    $sucur = R::dispense('ventaspaquetes');
    $sucur->venta_id = $id_venta;
    $sucur->paquete_id = $_POST['pack_id'];
    R::store($sucur); 
  }
