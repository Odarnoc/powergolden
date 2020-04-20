<?php
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
    
  $registro = R::dispense('ventas');

  $registro->user_id = $_POST["usuariid"];
  $registro->fecha = date('Y-m-d');
  $registro->total = $_POST['transaction_amount'];
  $registro->is_payed = 1;
  $id = R::store($registro);

  $vpagos = R::dispense('ventaspagos');
  $vpagos->venta_id = $id;
  $vpagos->tipo_pago = 'Tarjeta';
  $vpagos->cantidad = $_POST['transaction_amount'];
  $id_venta = R::store($vpagos);

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