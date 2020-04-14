<?php
session_start();
require '../bd/conexion.php';
require '../utils/error.php';

$response['data'] = null;
$response['mensaje'] = "error en el servidor";

if(!isset($_POST['email'])&&!isset($_POST['pass'])){
    error_mensaje("Completar todos los campos.");
    return;
}

if(empty($_POST['email'])){
    error_mensaje('Llenar el campo correo.');
    return;
}

if(empty($_POST['pass'])){
    error_mensaje('Llenar el campo contraseña.');
    return;
}

    $correo = $_POST['email'];
    $contrasena = $_POST['pass'];

    /*$inicio = R::findOne('ventas','user_id ="'.$correo.'" ORDER BY fecha DESC LIMIT 1');
    $fin = date('Y-m-d');*/

   /* if(empty($inicio)){
        $registro = R::findOne('usuarios','id ='.$correo.'');
        $inicio['fecha'] = date("Y-m-d", strtotime($registro['creado']));

    

    if(diferenciaDias($inicio['fecha'], $fin) >= 60){
        error_mensaje('Su cuenta a expirado'); 
    }else{ */
            $query = 'SELECT u.id,u.rol FROM usuarios as u LEFT JOIN independientes as i on u.id = i.usuario_id WHERE u.id='.$correo.'  &&  u.pass= "'.$contrasena.'" && u.rol = 2 && i.status = 1' ;

            $login_in=R::getAll($query);

            if(sizeof($login_in) == 0){
                $status = R::findOne('independientes','usuario_id ="'.$correo.'"');

                if($status['status'] != 1){
                    error_mensaje('Su cuenta no ha sido aprobada');
                }else{
                error_mensaje('Usuario o contraseña invalido');
                }
            }else{
                $_SESSION["user_id"] = $login_in[0]['id'];
                $_SESSION["rol"] = $login_in[0]['rol'];
                echo json_encode($login_in[0]);
            }
        
  //  }

   /* function diferenciaDias($inicio, $fin)
    {
        $inicio = strtotime($inicio);
        $fin = strtotime($fin);
        $dif = $fin - $inicio;
        $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
        return ceil($diasFalt);
    } */
?>