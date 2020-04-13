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



	
	if(!isset($_REQUEST['nombre'])){
     $sql=array();
	$PAGINADOR=new Paginador($sql);
	
	$sql=$PAGINADOR->sql;
    $filtro = "";
}else{
    $sql=array();
	$PAGINADOR=new Paginador($sql,$_REQUEST['nombre']);
	$sql=$PAGINADOR->sql;
    $filtro = $_REQUEST['nombre'];
}

	
	
	
	//$res=mysql_query($sql) or die($sql." - ".mysql_error());
	?>
    

    
    
                                <div class="d-title-cuenta">

                                    <p class="title-cuenta">Clientes</p>
                                    
                                     <p class="small-text-cuenta">Busqueda:  
                                        <form action="bonificaciones_consulta.php" method="post">
                                            ID/Nombre:<input style="margin-left 20px" value="<?php echo $filtro;  ?>" type="text" id="nombre" name="nombre"> 
                                             Desde:<input style="margin-left 20px" value="<?php echo $_REQUEST['fecha-in'];  ?>" type="date" id="datein" name="fecha-in">
                                             Hasta<input style="margin-left 20px" value="<?php echo $_REQUEST['fecha-out'];  ?>" type="date" id="dateout" name="fecha-out"> 
                                           
                                            <button class="btn btn-aceptar-modal" style="color: white" id="buscar" type="submit">Buscar<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </button>
                                            <a class="btn btn-aceptar-modal" style="color: white" href="bonificaciones_consulta.php" >Limpiar filtro<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </a>
                                            <a id="pdf" class="btn btn-danger" href="#" >Exportar PDF<i style="margin-left: 20px" class="fas fa-file-pdf"></i>
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
                                <?php foreach ($sql as $item) { 
                                	if(!isset($_REQUEST['fecha-in']) ||!isset($_REQUEST['fecha-out'])){
    $filtro1 = "dd-mm-aaaa";
    $filtro2 = "dd-mm-aaaa";
    
}else{
   $filtro1 = $_REQUEST['fecha-in'];
   $filtro2 = $_REQUEST['fecha-out'];
}

                                ?>
                                    
                                        
                                        
                                        <?php
                                        //calcular 
                                        if( $filtro1 != "dd-mm-aaaa" && $filtro2!="dd-mm-aaaa"){
                                            $filtro1=$filtro1." "."00:00:00";
                                            $filtro2=$filtro2." "."23:59:00";
                                          //  echo $filtro1;
                                        //    echo "----".$filtro2;
                                            $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario and (fecha BETWEEN :fecha1 AND :fecha2)  order by fecha DESC' ,
    array(':idusuario'=>$item['id'],':fecha1'=>$filtro1,':fecha2'=>$filtro2));
    
    //checar
        $resFiltro=array();
    
     $vacio=0;
    if(!empty($res)){
         if($res[0]['id']==NULL){
            $vacio=1;
         //echo "no hay";
             
         }
    
    }
     
     if(!empty($res) && $vacio==0){
         $s="";
     
 foreach($res as $row) 
                {
                   
                   
                    if(!empty($s)){
                        
                        //echo "aqui llego2:".$row['fecha'];
                         $date = strtotime($s);
                         $date2 = strtotime($row['fecha']);
                        if((date("m", $date)!=date("m", $date2))||(date("Y", $date)!=date("Y", $date2))){
                            
                        //echo "aqui llego3:".$row['fecha'];
                            $s = $row['fecha'];
                    array_push($resFiltro,$row);
                    }
                    }else{
                        //echo "aqui llego:".$row['fecha'];
                    $s = $row['fecha'];
                    array_push($resFiltro,$row);    
                    }
                    
                }
    
     }
     
    $res=$resFiltro;
   // var_dump($res);
    
    
    
                                        }else{
                                        
                                           $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1' ,
    array(':idusuario'=>$item['id']));
                                        }
    
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
                                <?php  $x1=0; foreach ($sql as $item) { 
                                	if(!isset($_REQUEST['fecha-in']) ||!isset($_REQUEST['fecha-out'])){
    $filtro1 = "dd-mm-aaaa";
    $filtro2 = "dd-mm-aaaa";
    
}else{
   $filtro1 = $_REQUEST['fecha-in'];
   $filtro2 = $_REQUEST['fecha-out'];
}
                                ?>
                                    
                                        
                                        
                                        <?php
                                        //calcular 
                                        if( $filtro1 != "dd-mm-aaaa" && $filtro2!="dd-mm-aaaa"){
                                            $filtro1=$filtro1." "."00:00:00";
                                            $filtro2=$filtro2." "."23:59:00";
                                          //  echo $filtro1;
                                        //    echo "----".$filtro2;
                                            $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario and (fecha BETWEEN :fecha1 AND :fecha2)  order by fecha DESC' ,
    array(':idusuario'=>$item['id'],':fecha1'=>$filtro1,':fecha2'=>$filtro2));
    
    //checar
        $resFiltro=array();
    
     $vacio=0;
    if(!empty($res)){
         if($res[0]['id']==NULL){
            $vacio=1;
         //echo "no hay";
             
         }
    
    }
     
     if(!empty($res) && $vacio==0){
         $s="";
     
 foreach($res as $row) 
                {
                   
                   
                    if(!empty($s)){
                        
                        //echo "aqui llego2:".$row['fecha'];
                         $date = strtotime($s);
                         $date2 = strtotime($row['fecha']);
                        if((date("m", $date)!=date("m", $date2))||(date("Y", $date)!=date("Y", $date2))){
                            
                        //echo "aqui llego3:".$row['fecha'];
                            $s = $row['fecha'];
                    array_push($resFiltro,$row);
                    }
                    }else{
                        //echo "aqui llego:".$row['fecha'];
                    $s = $row['fecha'];
                    array_push($resFiltro,$row);    
                    }
                    
                }
    
     }
     
    $res=$resFiltro;
   // var_dump($res);
    
    
    
                                        }else{
                                        
                                           $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,fecha,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5 
    from matrizvalores where idusuario= :idusuario  order by fecha DESC limit 1' ,
    array(':idusuario'=>$item['id']));
                                        }
    
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
	        
     
     

                          //estilo 
                          if($x1%2==0)
                            $stilo="background-color: #f3ea8069";
                            else
                            $stilo="background-color: #ddd";
                            
                          
                         // echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";
                                        ?>
                                        <tr style="<?php echo $stilo; ?> !important;">
                                             <td><?php echo $item['id'];?></td>
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
                                        
                                        
        <?php  } }else{ ?>
        
                                        <tr>
                                            <td><?php echo $item['id'];?></td>
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
                                        </td>
        
                                        
                                    </tr> 
                                <?php } $x1++;} ?>    
                            </tbody>
                        </table>
                        <hr />
                        <?php
                        	if(!isset($_REQUEST['fecha-in']) ||!isset($_REQUEST['fecha-out'])){ ?>
                        
<div><?php echo $PAGINADOR->ver_pagina("bonificaciones_consulta.php");?></div>
                    <?php }else{ ?>
                    
<div><?php echo $PAGINADOR->ver_pagina("bonificaciones_consulta.php","fecha-in=".$_REQUEST['fecha-in']."&fecha-out=".$_REQUEST['fecha-out']);?></div>
<?php } ?>

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
                    <p class="title-mb mt-20">Atenci贸n</p>
                    <p class="sub-title-mb">驴Desea eliminar el metodo de pago?</p>
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
