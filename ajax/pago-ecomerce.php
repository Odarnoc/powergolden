<?php
require '../bd/conexion.php';
require '../utils/error.php';
require ('../pos/webserviceapp/openpay/Openpay.php');

if(empty($_POST['carrito'])){
    error_mensaje('El carrito no puede estar vacio.');
    return;
}

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

$openpay = Openpay::getInstance('m1ob7biidxpcjepkiqw1',
'sk_b145230a1bd44a5eaea1eac5d723c6b4');

$customer = array(
    'name' => $_POST["nombre"],
    'last_name' => $_POST["apellido"],
    'phone_number' => $_POST["telefono"],
    'email' => $_POST["correo"],);

$chargeData = array(
    'method' => 'card',
    'source_id' => $_POST["token_id"],
    'amount' => $_POST["total"],
    'description' => 'Pago de compra online PowerGolden',
    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
    'customer' => $customer
    );

    $charge =false;
    $charge = $openpay->charges->create($chargeData);

    $usuario = R::dispense('usuarios');
    $usuario->nombre = $_POST["nombre"];
    $usuario->telefono = $_POST["telefono"];
    $usuario->correo = $_POST["correo"];
    $usuario->pass = '0000000000';
    $usuario->apellidos = $_POST["apellido"];
    $usuario->rol = 1;
    $iduser = R::store($registro);

            $venta = R::dispense('ventas');
            $venta->user_id = $iduser;
            $venta->fecha = new DateTime();
            $venta->total = $_POST['total'];
            $id_venta = R::store($venta);

            foreach ($carrito as $item) {
                $registro = R::dispense('productosxventas');
                $registro->venta_id = $id_venta;
                $registro->producto_id = $item['id'];
                $registro->cantidad = $item['cant'];
                $id = R::store($registro);

                $producto = R::load('productos',$item['id']);
                $producto->inventario -= $item['cant'];
                R::store($producto);
            }
            echo json_encode($response);
        

        
?>