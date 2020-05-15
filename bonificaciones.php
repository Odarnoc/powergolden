<?php

require 'user_preferences/user-info.php';

$clientes=R::find('usuarios','rol = 2');

?>
<!doctype html>
<html lang="es">

<head><meta charset="gb18030">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Plugin -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/helper.css">
    <!-- responseive menu -->
    <link rel="stylesheet" href="css/menu-movil.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

<style type="text/css">

ul.paginador
{
	
}
ul.paginador li
{
	float:left;
}
ul.paginador li a
{
	float:left;
}
ul.paginador li.paginador-active a, ul.paginador li a:hover
{
	background-color: #337ab7;
	border-color: #337ab7;
	color:#FFFFFF;
}
ul.paginador li.paginador-disabled a, ul.paginador li.paginador-disabled a:hover
{
	cursor:default;
}
ul.paginador li.paginador-current
{
}
</style>
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">


    <title>Power Golden | El Mundo de la Herbolaria</title>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload').attr("style", "background-image: url(" + e.target.result + ");");
                    $('.image-upload').addClass("overlay-image-upload");

                };

                reader.readAsDataURL(input.files[0]);
            }
        }

function corteBonificaciones(){
    var m=0;
    $.when(


    <?php foreach ($clientes as $item) { ?>
                
                
                                 $.ajax({
        url: "matriz_api.php?id=<?php echo $item['id'];?>",
        type: "post",
        success: function (response) {
            m++;
            console.log(m);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    }),
    
    <?}?>

).then(function() {
Swal.fire(
      'Realizado!',
      'El corte fue realizado',
      'success'
    ).then((result) => {
location.reload();

    })

});
    
}


function confirmarCorte(){
      Swal.fire({
  title: 'Esta seguro de realizar el corte?',
  text: "Todos los datos seran guardados!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, realizar corte!'
}).then((result) => {
  if (result.value) {
      corteBonificaciones();
      
    
  }
})
      
  }
    </script>


</head>

<body>


            <!-- Top Menu -->
            <?php include("menus/top_menu.php"); ?>
            <!-- End Top Menu -->


    <!-- End Navbar ====
    	======================================= -->

    <section class="sec-cuenta">
        <div class="container">
            <div class="row">

            <!-- Admin Menu -->
            <?php include("menus/menu_general_admin.php"); ?>
            <!-- End Admin Menu -->

                <div class="col-lg-8 col-md-8 bg-gray" >
                    <div class="d-cont-right">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                   <?php
	include_once("class.pagina.php");
	
	$filtrocolor=false;
	
	if(!isset($_POST['nombre'])){
     $sql=array();
	$PAGINADOR=new Paginador($sql);
	
	$sql=$PAGINADOR->sql;
    $filtro = "";
}else{
    if($_POST['nombre']!="bronce" && $_POST['nombre']!="plata" && $_POST['nombre']!="oro" && $_POST['nombre']!="diamante" && $_POST['nombre']!="corona" && $_POST['nombre']!="amarillo" && $_POST['nombre']!="azul" &&$_POST['nombre']!="rojo" && $_POST['nombre']!="lila" && $_POST['nombre']!="gris" && $_POST['nombre']!="transparente" && $_POST['nombre']!="verde" ){
    $sql=array();
	$PAGINADOR=new Paginador($sql,$_POST['nombre']);
	$sql=$PAGINADOR->sql;
    $filtro = $_POST['nombre'];    
    }else{
        $filtrocolor=true;
	
        $sql=array();
	$PAGINADOR=new Paginador($sql,$_POST['nombre']);
	
	$sql=$PAGINADOR->sql;
    $filtro = $_POST['nombre'];
    }
    
}

	
	
	
	//$res=mysql_query($sql) or die($sql." - ".mysql_error());
	?>
    

    
    
                                <div class="d-title-cuenta">

                                    <p class="title-cuenta">Clientes</p>
                                    
                                     <p class="small-text-cuenta">Busqueda:  
                                        <form action="bonificaciones.php" method="post">
                                            <input style="margin-left 20px" value="<?php echo $filtro;  ?>" type="text" id="nombre" name="nombre"> 
                                            <button class="btn btn-aceptar-modal" style="color: white" id="buscar" type="submit">Buscar<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </button>
                                            <a class="btn btn-aceptar-modal" style="color: white" href="bonificaciones.php" >Limpiar filtro<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </a>
                                            <a id="pdf" class="btn btn-danger" href="#" >Exportar PDF<i style="margin-left: 20px" class="fas fa-file-pdf"></i>
                                            </a>
                                             <a  class="btn btn-danger" href="#" onclick="confirmarCorte();">Realizar Corte<i style="margin-left: 20px" class="fas fa-calendar-check"></i>
                                            </a>
                                             
                                        </form>  
                                       
                                    </p> 
                                    
                                    <p class="small-text-cuenta">Numero de clientes registrados <b>(<?php echo $PAGINADOR->total; ?>)</b></p>
                                </div>
                            </div>

                        </div>
 <table id="bonificaciones2" class="table" style="text-align:center; display: none;overflow-x: auto;white-space: nowrap;">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Liderasgo/Rango</th>
                                <th scope="col">Aviones</th>
                                <th scope="col">Puntos p/nivel</th>
                                <th scope="col">Bonificacion</th>
                                
                                <th scope="col">Puntos Grupales</th>
                                <th scope="col">Puntos Personales</th>
                                <th scope="col">EI Activos</th>
                                <th scope="col">RollOver</th>
                                
                                <th scope="col">Ultimo Corte</th>
                            
                                </tr>
                            </thead>
                            <tbody >
                                <?php foreach ($sql as $item) { ?>
                                    
                                        
                                        
                                        <?php
                                           $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1' ,
    array(':idusuario'=>$item['id']));
    
    $vacio=0;
    if(!empty($res)){
         if($res[0]['id']==NULL){
            $vacio=1;
         //echo "no hay";
             
         }
    
    }
     
     if(!empty($res) && $vacio==0){
        //echo "hay"; 
            foreach($res as $row) 
                {
                    $compensacionn1=$row['compensacionn1'];
     $compensacionn2=$row['compensacionn2'];
     $compensacionn3=$row['compensacionn3'];
     $compensacionn4=$row['compensacionn4'];
     $compensacionn5=$row['compensacionn5'];

$puntos1=$row['puntos1'];
$puntos2=$row['puntos2'];
$puntos3=$row['puntos3'];
$puntos4=$row['puntos4'];
$puntos5=$row['puntos5'];

$colorescss1=json_decode($row['colorescss']);
$LIDERAZGOS=json_decode($row['liderazgos']);  
$rango="Sin liderazgo";
        foreach ($colorescss1 as $co) {
            foreach ($co as $key => $value) {
	        //echo "$('#".$key."').addClass('".$value."');";
	        if($key== $row['idusuario'] && !empty($value)){
	            $rango=$value;
	            break;
	        }
            }
        }
	        
	    foreach ($LIDERAZGOS as $co) {
            foreach ($co as $key => $value) {
	        //echo "$('#".$key."').addClass('".$value."');";
            if($key== $row['idusuario'] && !empty($value)){
	            $rango=$value;
	            break;
	        }
                
            }
        }
	        
     
     
                    
       if($filtrocolor && $rango==$_POST['nombre']){
                          
                         // echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";
                                        ?>
                                        <tr>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><?php echo $item['correo'] ?>></td>
                                        <td><?php echo $item['telefono'] ?></td>
                                        <td><?php echo $rango;?></td>
                                        <td><?php echo $row['aviones']?></td>
                                        <td><?php echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";?></td>
                                       
                                        <td><?php echo (round($compensacionn1,2))."|".(round($compensacionn2,2))."|".(round($compensacionn3,2))."|".(round($compensacionn4,2))."|".(round($compensacionn5,2))."-Total=(".round(($compensacionn1+$compensacionn2+$compensacionn3+$compensacionn4+$compensacionn5),2).")";?></td>
                                        <td><?php echo $row['puntospersonales']?></td>
                                        <td><?php echo $row['puntosgrupales5nivel']?></td>
                                        <td><?php echo $row['clientesactivos']?></td>
                                        <td><?php if(filter_var($row['rollover'], FILTER_VALIDATE_BOOLEAN)) echo "SI";else echo "No"; ?></td>
                                        <td><?php echo date_format(date_create($row['fecha']),"d/m/Y H:i:s");?></td>
                                        </tr>
                                        
                                       <?php } else  if(!$filtrocolor){ ?>                      
                    <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><?php echo $item['correo'] ?>></td>
                                        <td><?php echo $item['telefono'] ?></td>
                                        <td><?php echo $rango;?></td>
                                        
                                        
                                        <td><?php echo $row['aviones']?></td>
                                        <td><?php echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";?></td>
                                       
                                        <td><?php echo (round($compensacionn1,2))."|".(round($compensacionn2,2))."|".(round($compensacionn3,2))."|".(round($compensacionn4,2))."|".(round($compensacionn5,2))."-Total=(".round(($compensacionn1+$compensacionn2+$compensacionn3+$compensacionn4+$compensacionn5),2).")";?></td>
                                        <td><?php echo $row['puntospersonales']?></td>
                                        <td><?php echo $row['puntosgrupales5nivel']?></td>
                                        <td><?php echo $row['clientesactivos']?></td>
                                        <td><?php if(filter_var($row['rollover'], FILTER_VALIDATE_BOOLEAN)) echo "SI";else echo "No"; ?></td>
                                        <td><?php echo date_format(date_create($row['fecha']),"d/m/Y H:i:s");?></td>
                                        </tr>
                        <?php } ?>                
                                        
        <?php } }else{ ?>
                                            
                                        <tr>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><?php echo $item['correo'] ?>></td>
                                        <td><?php echo $item['telefono'] ?></td>
                                        <td>No Activo</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                         <td>0</td>
                                         <td>No</td>
                                         <td>Sin fecha</td>
                                        
        
                                        
                                    </tr> 
                                <?php }} ?>    
                            </tbody>
                        </table>
                                
                                
                                
                                

                        <table id="bonificaciones" class="table" style="text-align:center; display: block;overflow-x: auto;white-space: nowrap;">
                            <thead class="table-primary">
                                <tr>
                                 <th scope="col">ID</th>    
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Matriz</th>
                                <th scope="col">Liderasgo/Rango</th>
                                <th scope="col">Aviones</th>
                                <th scope="col">Puntos p/nivel</th>
                                <th scope="col">Bonificacion</th>
                                
                                <th scope="col">Puntos Grupales</th>
                                <th scope="col">Puntos Personales</th>
                                <th scope="col">EI Activos</th>
                                <th scope="col">RollOver</th>
                                
                                <th scope="col">Ultimo Corte</th>
                            
                                </tr>
                            </thead>
                            <tbody >
                                <?php foreach ($sql as $item) { ?>
                                    
                                        <?php
                                           $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1' ,
    array(':idusuario'=>$item['id']));
    
    $vacio=0;
    if(!empty($res)){
         if($res[0]['id']==NULL){
            $vacio=1;
         //echo "no hay";
             
         }
    
    }
     
     if(!empty($res) && $vacio==0){
        //echo "hay"; 
            foreach($res as $row) 
                {
                    $compensacionn1=$row['compensacionn1'];
     $compensacionn2=$row['compensacionn2'];
     $compensacionn3=$row['compensacionn3'];
     $compensacionn4=$row['compensacionn4'];
     $compensacionn5=$row['compensacionn5'];

$puntos1=$row['puntos1'];
$puntos2=$row['puntos2'];
$puntos3=$row['puntos3'];
$puntos4=$row['puntos4'];
$puntos5=$row['puntos5'];

$colorescss1=json_decode($row['colorescss']);
$LIDERAZGOS=json_decode($row['liderazgos']);  
$rango="Sin liderazgo";
        foreach ($colorescss1 as $co) {
            foreach ($co as $key => $value) {
	        //echo "$('#".$key."').addClass('".$value."');";
	        if($key== $row['idusuario'] && !empty($value)){
	            $rango=$value;
	            break;
	        }
            }
        }
	        
	    foreach ($LIDERAZGOS as $co) {
            foreach ($co as $key => $value) {
	        //echo "$('#".$key."').addClass('".$value."');";
            if($key== $row['idusuario'] && !empty($value)){
	            $rango=$value;
	            break;
	        }
                
            }
        }
	        
     
     

       if($filtrocolor && $rango==$_POST['nombre']){
           
                          
                         // echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";
                                        ?>
                                        <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        
                                        
                                        <td><a href="matriz.php?id=<?php echo $item['id']?>" target="_blank"><i class="fas fa-sitemap"></i></a></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="<?php echo $rango;?>" src="images/<?php echo $rango;?>.png" width="30px" height="30px" /></td>
                                        <td><?php echo $row['aviones']?></td>
                                        <td><?php echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";?></td>
                                       
                                        <td><?php echo (round($compensacionn1,2))."|".(round($compensacionn2,2))."|".(round($compensacionn3,2))."|".(round($compensacionn4,2))."|".(round($compensacionn5,2))."-Total=(".round(($compensacionn1+$compensacionn2+$compensacionn3+$compensacionn4+$compensacionn5),2).")";?></td>
                                        <td><?php echo $row['puntospersonales']?></td>
                                        <td><?php echo $row['puntosgrupales5nivel']?></td>
                                        <td><?php echo $row['clientesactivos']?></td>
                                        <td><?php if(filter_var($row['rollover'], FILTER_VALIDATE_BOOLEAN)) echo "SI";else echo "No"; ?></td>
                                        <td><?php echo date_format(date_create($row['fecha']),"d/m/Y H:i:s");?></td>
                                        </tr>
       <?php } else  if(!$filtrocolor){ ?>                      
                    <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        
                                        
                                        <td><a href="matriz.php?id=<?php echo $item['id']?>" target="_blank"><i class="fas fa-sitemap"></i></a></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="<?php echo $rango;?>" src="images/<?php echo $rango;?>.png" width="30px" height="30px" /></td>
                                        <td><?php echo $row['aviones']?></td>
                                        <td><?php echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";?></td>
                                       
                                        <td><?php echo (round($compensacionn1,2))."|".(round($compensacionn2,2))."|".(round($compensacionn3,2))."|".(round($compensacionn4,2))."|".(round($compensacionn5,2))."-Total=(".round(($compensacionn1+$compensacionn2+$compensacionn3+$compensacionn4+$compensacionn5),2).")";?></td>
                                        <td><?php echo $row['puntospersonales']?></td>
                                        <td><?php echo $row['puntosgrupales5nivel']?></td>
                                        <td><?php echo $row['clientesactivos']?></td>
                                        <td><?php if(filter_var($row['rollover'], FILTER_VALIDATE_BOOLEAN)) echo "SI";else echo "No"; ?></td>
                                        <td><?php echo date_format(date_create($row['fecha']),"d/m/Y H:i:s");?></td>
                                        </tr>
                        <?php } ?>                
                                        
        <?php } }else{ ?>
                                        <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        
                                
                                        <td><a href="matriz.php?id=<?php echo $item['id']?>" target="_blank"><i class="fas fa-sitemap"></i></a></td>
                                        
                                        <td>No Activo</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                         <td>0</td>
                                         <td>No</td>
                                         <td>Sin fecha</td>
                                        
        
                                        
                                    </tr> 
                                <?php }} ?>    
                            </tbody>
                        </table>
                        <hr />
<div><?php echo $PAGINADOR->ver_pagina("bonificaciones.php")?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center mb">
                    <img class="img-mb" src="images/icon-atencion.png" alt="">
                    <p class="title-mb mt-20">Atención</p>
                    <p class="sub-title-mb">¿Desea eliminar el metodo de pago?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancelar-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-aceptar-modal" onclick="confirmar()" >Aceptar</button>
                </div>
            </div>
        </div>
    </div>

            <!-- Footer-->
            <?php include("menus/footer_general.php"); ?>
            <!-- End Footer -->

  

    <!-- jQuery -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <!-- popper.min -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- scrollIt -->
    <script src="js/scrollIt.min.js"></script>
    <!-- custom scripts -->
    <script src="js/main-perfil.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- responseive menu -->
    <script src="js/menu-movil.js"></script>
    <!-- eliminar js -->
    <script src="js/editar-persona.js"></script>
    <!-- sweetalert scripts -->
    <script src="js/sweetalert2.js"></script>
    
  <!-- export table -->
    <script src="js/tableHTMLExport.js"></script>
   
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.10/jspdf.plugin.autotable.min.js"></script>


    <script>
        $("input[type='number']").inputSpinner();
        $('[data-toggle="tooltip"]').tooltip();
        
         $('#pdf').on('click',function(){
    $("#bonificaciones2").tableHTMLExport({type:'pdf',filename:'bonificaciones.pdf',orientation:'l',exclude_img:false

});
  });
  
  
    </script>

</body></html>
