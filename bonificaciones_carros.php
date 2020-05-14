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
                                        <form action="bonificaciones_carros.php" method="post">
                                            <input style="margin-left 20px" value="<?php echo $filtro;  ?>" type="text" id="nombre" name="nombre"> 
                                            <button class="btn btn-aceptar-modal" style="color: white" id="buscar" type="submit">Buscar<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </button>
                                            <a class="btn btn-aceptar-modal" style="color: white" href="bonificaciones.php" >Limpiar filtro<i style="margin-left: 20px" class="fas fa-search"></i>
                                            </a>
                                            <a id="pdf" class="btn btn-danger" href="#" >Exportar PDF<i style="margin-left: 20px" class="fas fa-file-pdf"></i>
                                            </a>
                                            
                                             
                                        </form>  
                                       
                                    </p> 
                                    
                                    <p class="small-text-cuenta">Numero de clientes registrados <b>(<?php echo $PAGINADOR->total; ?>) Año en curso: <?php echo date("Y");?></b></p>
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
                                <th scope="col">Ene</th>
                                <th scope="col">Feb</th>
                                <th scope="col">Mar</th>
                                <th scope="col">Abr</th>
                                
                                <th scope="col">May</th>
                                <th scope="col">Jun</th>
                                <th scope="col">Jul</th>
                                <th scope="col">Ago</th>
                                
                                <th scope="col">Sep</th>
                                <th scope="col">Oct</th>
                                <th scope="col">Nov</th>
                                
                                <th scope="col">Dic</th>
                            
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
	        
     
      //inicia meses
	        
	         $anio=date("Y");
	
	$ene=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=1 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $feb=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=2 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $mar=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=3 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $abr=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=4 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $may=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=5 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $jun=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=6 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $jul=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=7 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $ago=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=8 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $sep=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=9 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $oct=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=10 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $nov=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=11 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $dic=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=12 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
    
    $arregloCarros=array();
    $r1="transparente";
    if(!empty($ene)){
         if($ene[0]['id']!=NULL){
        $r1=$ene[0]['mirango'];
         //echo "no hay";
         }
    }
    
    $r2="transparente";
    if(!empty($feb)){
         if($feb[0]['id']!=NULL){
        $r2=$feb[0]['mirango'];
         //echo "no hay";
         }
    }
    $r3="transparente";
    if(!empty($mar)){
         if($mar[0]['id']!=NULL){
        $r3=$mar[0]['mirango'];
         //echo "no hay";
         }
    }
    $r4="transparente";
    if(!empty($abr)){
         if($abr[0]['id']!=NULL){
        $r4=$abr[0]['mirango'];
         //echo "no hay";
         }
    }
    $r5="transparente";
    if(!empty($may)){
         if($may[0]['id']!=NULL){
        $r5=$may[0]['mirango'];
         //echo "no hay";
         }
    }
    $r6="transparente";
    if(!empty($jun)){
         if($jun[0]['id']!=NULL){
        $r6=$jun[0]['mirango'];
         //echo "no hay";
         }
    }
    $r7="transparente";
    if(!empty($jul)){
         if($jul[0]['id']!=NULL){
        $r7=$jul[0]['mirango'];
         //echo "no hay";
         }
    }
    $r8="transparente";
    if(!empty($ago)){
         if($ago[0]['id']!=NULL){
        $r8=$ago[0]['mirango'];
         //echo "no hay";
         }
    }
    $r9="transparente";
    if(!empty($sep)){
         if($sep[0]['id']!=NULL){
        $r9=$sep[0]['mirango'];
         //echo "no hay";
         }
    }
    $r10="transparente";
    if(!empty($oct)){
         if($oct[0]['id']!=NULL){
        $r10=$oct[0]['mirango'];
         //echo "no hay";
         }
    }
    $r11="transparente";
    if(!empty($nov)){
         if($nov[0]['id']!=NULL){
        $r11=$nov[0]['mirango'];
         //echo "no hay";
         }
    }
    $r12="transparente";
    if(!empty($dic)){
         if($dic[0]['id']!=NULL){
        $r12=$dic[0]['mirango'];
         //echo "no hay";
         }
    }
    
    array_push($arregloCarros,$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12);
	     //obtener el mayor rango de todos los meses
     for($i = 0; $i < count($arregloCarros)-2; $i++) {
         if($arregloCarros[$i]=='coronavip' ||$arregloCarros[$i]=='coronaluxury'||$arregloCarros[$i]=='coronapremier'||$arregloCarros[$i]=='coronaelite'){
    if ($arregloCarros[$i + 1] == $arregloCarros[$i]  && $arregloCarros[$i + 2] == $arregloCarros[$i+1] ) $arregloCarros[$i + 2]=$arregloCarros[$i + 2]."-carro";
         }
  }
  for($i = 0; $i < count($arregloCarros); $i++) {
         if (strpos($arregloCarros[$i], '-carro') == false)
            $arregloCarros[$i]="nocar";
  }
	        
	        //termina meses
	        
                    
       if($filtrocolor && $rango==$_POST['nombre']){
                          
                         // echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";
                                        ?>
                                        <tr>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><?php echo $item['correo'] ?>></td>
                                        <td><?php echo $item['telefono'] ?></td>
                                        <td><?php echo $r1;?></td>
                                        
                                        <td><?php echo $r2;?></td>
                                        
                                        <td><?php echo $r3;?></td>
                                        
                                        <td><?php echo $r4;?></td>
                                        
                                        <td><?php echo $r5;?></td>
                                        
                                        <td><?php echo $r6;?></td>
                                        
                                        <td><?php echo $r7;?></td>
                                        
                                        <td><?php echo $r8;?></td>
                                        
                                        <td><?php echo $r9;?></td>
                                        
                                        <td><?php echo $r10;?></td>
                                        
                                        <td><?php echo $r11;?></td>
                                        
                                        <td><?php echo $r12;?></td>
                                        </tr>
                                        
                                       <?php } else  if(!$filtrocolor){ ?>                      
                    <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                         <td><?php echo $item['correo'] ?>></td>
                                        <td><?php echo $item['telefono'] ?></td>
                                        
                                        <td><?php echo $r1;?></td>
                                        
                                        <td><?php echo $r2;?></td>
                                        
                                        <td><?php echo $r3;?></td>
                                        
                                        <td><?php echo $r4;?></td>
                                        
                                        <td><?php echo $r5;?></td>
                                        
                                        <td><?php echo $r6;?></td>
                                        
                                        <td><?php echo $r7;?></td>
                                        
                                        <td><?php echo $r8;?></td>
                                        
                                        <td><?php echo $r9;?></td>
                                        
                                        <td><?php echo $r10;?></td>
                                        
                                        <td><?php echo $r11;?></td>
                                        
                                        <td><?php echo $r12;?></td>
                                        
                                        </tr>
                        <?php } ?>                
                                        
        <?php } }else{ ?>
                                            
                                        <tr>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><?php echo $item['correo'] ?>></td>
                                        <td><?php echo $item['telefono'] ?></td>
                                       
                                       <td><?php echo $r1;?></td>
                                        
                                        <td><?php echo $r2;?></td>
                                        
                                        <td><?php echo $r3;?></td>
                                        
                                        <td><?php echo $r4;?></td>
                                        
                                        <td><?php echo $r5;?></td>
                                        
                                        <td><?php echo $r6;?></td>
                                        
                                        <td><?php echo $r7;?></td>
                                        
                                        <td><?php echo $r8;?></td>
                                        
                                        <td><?php echo $r9;?></td>
                                        
                                        <td><?php echo $r10;?></td>
                                        
                                        <td><?php echo $r11;?></td>
                                        
                                        <td><?php echo $r12;?></td>
                                        
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
                                <th scope="col">Ene</th>
                                <th scope="col">Feb</th>
                                <th scope="col">Mar</th>
                                <th scope="col">Abr</th>
                                
                                <th scope="col">May</th>
                                <th scope="col">Jun</th>
                                <th scope="col">Jul</th>
                                <th scope="col">Ago</th>
                                
                                <th scope="col">Sep</th>
                                <th scope="col">Oct</th>
                                <th scope="col">Nov</th>
                                
                                <th scope="col">Dic</th>
                            
                                </tr>
                            
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
	        
	        //inicia meses
	        
	         $anio=date("Y");
	
	$ene=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=1 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $feb=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=2 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $mar=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=3 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $abr=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=4 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $may=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=5 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $jun=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=6 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $jul=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=7 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $ago=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=8 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $sep=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=9 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $oct=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=10 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $nov=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=11 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
     $dic=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=12 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$item['id'],':anio'=>$anio));
    
    $arregloCarros=array();
    $r1="transparente";
    if(!empty($ene)){
         if($ene[0]['id']!=NULL){
        $r1=$ene[0]['mirango'];
         //echo "no hay";
         }
    }
    
    $r2="transparente";
    if(!empty($feb)){
         if($feb[0]['id']!=NULL){
        $r2=$feb[0]['mirango'];
         //echo "no hay";
         }
    }
    $r3="transparente";
    if(!empty($mar)){
         if($mar[0]['id']!=NULL){
        $r3=$mar[0]['mirango'];
         //echo "no hay";
         }
    }
    $r4="transparente";
    if(!empty($abr)){
         if($abr[0]['id']!=NULL){
        $r4=$abr[0]['mirango'];
         //echo "no hay";
         }
    }
    $r5="transparente";
    if(!empty($may)){
         if($may[0]['id']!=NULL){
        $r5=$may[0]['mirango'];
         //echo "no hay";
         }
    }
    $r6="transparente";
    if(!empty($jun)){
         if($jun[0]['id']!=NULL){
        $r6=$jun[0]['mirango'];
         //echo "no hay";
         }
    }
    $r7="transparente";
    if(!empty($jul)){
         if($jul[0]['id']!=NULL){
        $r7=$jul[0]['mirango'];
         //echo "no hay";
         }
    }
    $r8="transparente";
    if(!empty($ago)){
         if($ago[0]['id']!=NULL){
        $r8=$ago[0]['mirango'];
         //echo "no hay";
         }
    }
    $r9="transparente";
    if(!empty($sep)){
         if($sep[0]['id']!=NULL){
        $r9=$sep[0]['mirango'];
         //echo "no hay";
         }
    }
    $r10="transparente";
    if(!empty($oct)){
         if($oct[0]['id']!=NULL){
        $r10=$oct[0]['mirango'];
         //echo "no hay";
         }
    }
    $r11="transparente";
    if(!empty($nov)){
         if($nov[0]['id']!=NULL){
        $r11=$nov[0]['mirango'];
         //echo "no hay";
         }
    }
    $r12="transparente";
    if(!empty($dic)){
         if($dic[0]['id']!=NULL){
        $r12=$dic[0]['mirango'];
         //echo "no hay";
         }
    }
    
    array_push($arregloCarros,$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12);
	     //obtener el mayor rango de todos los meses
     for($i = 0; $i < count($arregloCarros)-2; $i++) {
         if($arregloCarros[$i]=='coronavip' ||$arregloCarros[$i]=='coronaluxury'||$arregloCarros[$i]=='coronapremier'||$arregloCarros[$i]=='coronaelite'){
    if ($arregloCarros[$i + 1] == $arregloCarros[$i]  && $arregloCarros[$i + 2] == $arregloCarros[$i+1] ) $arregloCarros[$i + 2]=$arregloCarros[$i + 2]."-carro";
         }
  }
  for($i = 0; $i < count($arregloCarros); $i++) {
         if (strpos($arregloCarros[$i], '-carro') == false)
            $arregloCarros[$i]="nocar";
  }
	        
	        //termina meses
	        
	        
     
     

       if($filtrocolor && $rango==$_POST['nombre']){
           
                          
                         // echo strval($puntos1)."|".strval($puntos2)."|".strval($puntos3)."|".strval($puntos4)."|".strval($puntos5)."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";
                                        ?>
                                        <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        
                                        
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Enero" src="images/<?php echo $r1;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Febrero" src="images/<?php echo $r2;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Marzo" src="images/<?php echo $r3;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Abril" src="images/<?php echo $r4;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Mayo" src="images/<?php echo $r5;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Junio" src="images/<?php echo $r6;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Julio" src="images/<?php echo $r7;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Agosto" src="images/<?php echo $r8;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Septiembre" src="images/<?php echo $r9;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Octubre" src="images/<?php echo $r10;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Noviembre" src="images/<?php echo $r11;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Diciembre" src="images/<?php echo $r12;?>-min.png" width="30px" height="30px" /></td>
                                        
                                      
                                      
                                        </tr>
       <?php } else  if(!$filtrocolor){ ?>                      
                    <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        
                                         <td><img data-toggle="tooltip" data-placement="top" title="Enero" src="images/<?php echo $r1;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Febrero" src="images/<?php echo $r2;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Marzo" src="images/<?php echo $r3;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Abril" src="images/<?php echo $r4;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Mayo" src="images/<?php echo $r5;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Junio" src="images/<?php echo $r6;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Julio" src="images/<?php echo $r7;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Agosto" src="images/<?php echo $r8;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Septiembre" src="images/<?php echo $r9;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Octubre" src="images/<?php echo $r10;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Noviembre" src="images/<?php echo $r11;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Diciembre" src="images/<?php echo $r12;?>-min.png" width="30px" height="30px" /></td>
                                      
                                        </tr>
                        <?php } ?>                
                                        
        <?php } }else{ ?>
                                        <tr>
                                         <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre'].' '.$item['apellidos'] ?></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['correo'] ?>" href="mailto:<?php echo $item['correo'] ?>"><i class="fas fa-envelope"></i></a></td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="<?php echo $item['telefono'] ?>" href="tel:<?php echo $item['telefono'] ?>"><i class="fas fa-phone"></i></a></td>
                                        
                                
                                       <td><img data-toggle="tooltip" data-placement="top" title="Enero" src="images/<?php echo $r1;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Febrero" src="images/<?php echo $r2;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Marzo" src="images/<?php echo $r3;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Abril" src="images/<?php echo $r4;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Mayo" src="images/<?php echo $r5;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Junio" src="images/<?php echo $r6;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Julio" src="images/<?php echo $r7;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Agosto" src="images/<?php echo $r8;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Septiembre" src="images/<?php echo $r9;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Octubre" src="images/<?php echo $r10;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Noviembre" src="images/<?php echo $r11;?>-min.png" width="30px" height="30px" /></td>
                                        
                                        
                                        <td><img data-toggle="tooltip" data-placement="top" title="Diciembre" src="images/<?php echo $r12;?>-min.png" width="30px" height="30px" /></td>
                                        
        
                                        
                                    </tr> 
                                <?php }} ?>    
                            </tbody>
                        </table>
                        <hr />
<div><?php echo $PAGINADOR->ver_pagina("bonificaciones_carros.php")?></div>
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
    $("#bonificaciones2").tableHTMLExport({type:'pdf',filename:'bonificaciones_carros.pdf',orientation:'l',exclude_img:false

});
  });
  
  
    </script>

</body></html>
