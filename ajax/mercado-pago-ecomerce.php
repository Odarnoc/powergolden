<?php
    require_once '../pos/webserviceapp/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("APP_USR-7698839841259331-040703-babc7d9c09e98697a4429f7079a92f22-286156172");
    $payment = new MercadoPago\Payment();
    //$payment->transaction_amount = floatval($_POST['transaction_amount']);
    $payment->transaction_amount = floatval(20);
    $payment->token = $_POST['token'];
    $payment->description = "Power Golden, el poder de la herbolaria.";
    $payment->installments = $_POST['installments'];
    $payment->payment_method_id = $_POST['payment_method_id'];
    $payment->payer = array(
    "email" => $_POST['email']
    );

  $payment->save();
  echo $payment->status;
    
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

  $venta = R::dispense('ventas');
  $venta->user_id = $_POST['usuariid'];
  $venta->fecha = new DateTime();
  $venta->total = $_POST['total'];
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