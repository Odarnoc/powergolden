<?php
require 'bd/conexion.php';






$id=$_GET['id'];

$ventasMatriz=0;
$clientesTotales=0;
$clientesActivos=0;
$resultados="";


$compensacionn1=0;
     $compensacionn2=0;
     $compensacionn3=0;
     $compensacionn4=0;
     $compensacionn5=0;
     
     $puntos1=0;
     $puntos2=0;
     $puntos3=0;
     $puntos4=0;
     $puntos5=0;
     
$puntosPersonales=0;
$puntosGrupales=0;
$puntosGrupales5nivel=0;
$porcentajeRed=0;
$rollOver=true;
$activosPrimerNivel=0;


$primerNivel = array();
$porcentajesPrimerNivel=array();
$porcentajesPrimerNivel2=array();
$puntosPorId=array();
$activos=array();
$colores=array();
$colorescss=array();
$jerarquia=array();
$LIDERAZGOS=array();


$mes = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"][date("n") - 1];

$matrizP="";
    
if (isset($id)) {
    
    
    $usuario  = R::findOne( 'usuarios', ' id = '.$id);
    if($usuario!=NULL){
    //checo si tengo un registro hoy
    
    
    
     $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5,fecha
    from matrizvalores where idusuario= :idusuario order by fecha DESC limit 1',
    array(':idusuario'=>$id));
    
    $ultimasCompras=R::getAll('SELECT v.id,v.fecha,v.total,vp.paquete_id FROM ventas v inner join ventaspaquetes vp on vp.venta_id=v.id WHERE v.user_id=:idusuario order by v.fecha DESC limit 6',array(':idusuario'=>$id));
    
    $vacio=0;
    if(!empty($res)){
         if($res[0]['id']==NULL){
            $vacio=1;
        // echo "no hay";
             
         }
    
    }
     
     if(!empty($res) && $vacio==0){
        //echo "hay"; 
            foreach($res as $row) 
                {
$aviones=$row['aviones']; 
$colorescss=json_decode($row['colorescss']);
$LIDERAZGOS=json_decode($row['liderazgos']);
$clientesTotales=$row['clientestotales'];
$ventasMatriz=$row['ventasmatriz'];
$mes=$row['mes'];
$puntosPersonales=$row['puntospersonales'];
$puntosGrupales5nivel=$row['puntosgrupales5nivel'];
$clientesActivos=$row['clientesactivos'];
$rollOver=filter_var($row['rollover'], FILTER_VALIDATE_BOOLEAN);
$porcentajeRed=$row['porcentajered'];
$matrizP=json_decode($row['matriz']);
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

//var_dump($matrizP);
//var_dump($row['max(fecha)']);

//echo $row['rollover'];
                }
         
     }else{
     $response = file_get_contents('http://powergolden.com.mx/matriz_api.php?id='.$id);
     $response = preg_replace('/\s+/', '', $response);
        //echo "--".$response."--";
       $response=preg_replace('/[^0-9]/', '', $response);
     if(is_numeric(trim($response))){
          $res=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5,fecha
    from matrizvalores where idusuario= :idusuario order by fecha DESC limit 1',
    array(':idusuario'=>$id));
    $vacio=0;
    if(!empty($res)){
         if($res[0]['id']==NULL){
            $vacio=1;
         //echo "no hay";
             
         }
    
    }
    
     if(!empty($res) && $vacio==0){
            foreach($res as $row) 
                {
$aviones=$row['aviones'];                    
$colorescss=json_decode($row['colorescss']);
$LIDERAZGOS=json_decode($row['liderazgos']);
$clientesTotales=$row['clientestotales'];
$ventasMatriz=$row['ventasmatriz'];
$mes=$row['mes'];
$puntosPersonales=$row['puntospersonales'];
$puntosGrupales5nivel=$row['puntosgrupales5nivel'];
$clientesActivos=$row['clientesactivos'];
$rollOver=$rollOver=filter_var($row['rollover'], FILTER_VALIDATE_BOOLEAN);
$porcentajeRed=$row['porcentajered'];
$matrizP=json_decode($row['matriz']);
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
//echo $row['rollover'];

//var_dump($matrizP);
//var_dump($row['max(fecha)']);
                }
     }
    
    
    
     }
    
     }
    }
}





?>


			    <?php
//			  	var_dump( $rollOver); 
//var_dump($porcentajesPrimerNivel2);
			  
			  ?>
<!doctype html>
<html lang="en">

<head><meta charset="euc-kr">
	<!-- Required meta tags -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="css/matriz.css">

	<title>Matriz Power Golden</title>
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   
	<style>
	    .amarillo{
	            background-image: url(../images/amarillo.png) !important;
	              background-size: 60px 50px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .gris{
	            background-image: url(../images/gris.png) !important;
	            background-size: 60px 50px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .transparente{
	            background-image: url(../images/transparente.png) !important;
	            background-size: 60px 50px !important;
	             background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .verde{
	            background-image: url(../images/verde.png) !important;
	              background-size: 60px 50px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .azul{
	            background-image: url(../images/azul.png) !important;
	              background-size: 60px 50px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .rojo{
	            background-image: url(../images/rojo.png) !important;
	              background-size: 60px 50px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .lila{
	            background-image: url(../images/lila.png) !important;
	              background-size: 60px 50px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    
	    
	    
	    
	    .bronce{
	            background-image: url(../images/bronce.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .plata{
	            background-image: url(../images/plata.png) !important;
	            background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .oro{
	            background-image: url(../images/oro.png) !important;
	            background-size: 60px 60px !important;
	             background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .diamante{
	            background-image: url(../images/diamante.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .corona{
	            background-image: url(../images/corona.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 2px;
  font-size: 13px;
}

tr:nth-child(even) {
  background-color: #aac4ff;
}
	    
	</style>
	
	
	<script>
	var rango="";
	var rango1="";

	    function calcularColores(){
	        <?php
	      //$("#txt").addClass('textbox');   
        foreach ($colorescss as $co) {
            foreach ($co as $key => $value) {
	        echo "$('#".$key."').addClass('".$value."');";
	        if($key== $id && !empty($value)){
	            echo "rango='".$value."';";
	        }
            }
        }
	        ?>
	    }
	    
	    function calcularLiderazgos(){
	        <?php
	      //$("#txt").addClass('textbox');   
        foreach ($LIDERAZGOS as $co) {
            foreach ($co as $key => $value) {
	        echo "$('#".$key."').addClass('".$value."');";
            if($key== $id && !empty($value)){
	            echo "rango='".$value."';";
	        }
                
            }
        }
	        ?>
	    }
	    
	   function mostrarInfo(){
	     <?php
	     
	     $anio=date("Y");
	
	$ene=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=1 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $feb=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=2 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $mar=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=3 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $abr=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=4 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $may=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=5 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $jun=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=6 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $jul=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=7 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $ago=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=8 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $sep=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=9 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $oct=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=10 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $nov=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=11 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
     $dic=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=12 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$id,':anio'=>$anio));
    
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
           
	     
	     ?>
	
	       
	$('#<?php echo $id;?>').attr('data-toggle', 'tooltip');
    $('#<?php echo $id;?>').attr('data-placement', 'right');
    $('#<?php echo $id;?>').attr('data-html', 'true');
    $('#<?php echo $id;?>').attr('title', '<p class="p-tooltip">EI Activos: <b><?php echo $clientesActivos;?></b></p><p class="p-tooltip">Puntos Grupales: <b><?php echo $puntosGrupales5nivel;?></b></p><p class="p-tooltip">Puntos Personales: <b><?php echo $puntosPersonales;?></b></p><p class="p-tooltip">Puntos p/nivel: <b><?php echo $puntos1."|".$puntos2."|".$puntos3."|".$puntos4."|".$puntos5."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";?></b></p><p class="p-tooltip">Roll over: <b><?php if($rollOver) echo "SI";else echo "No";?></b></p><p class="p-tooltip"><i class="fas fa-plane"></i>:<b>&nbsp;<?php echo $aviones;?></b></p><div class="d-meses"><div class="item-mes">ENE <br> <img src="images/<?php echo $r1;?>-min.png"></div><div class="item-mes">FEB <br> <img src="images/<?php echo $r2;?>-min.png"></div><div class="item-mes">MAR <br> <img src="images/<?php echo $r3;?>-min.png"></div><div class="item-mes">ABR <br> <img src="images/<?php echo $r4;?>-min.png"></div><div class="item-mes">MAY <br> <img src="images/<?php echo $r5;?>-min.png"></div><div class="item-mes">JUN <br> <img src="images/<?php echo $r6;?>-min.png"></div><div class="item-mes">JUL <br> <img src="images/<?php echo $r7;?>-min.png"></div><div class="item-mes">AGO <br> <img src="images/<?php echo $r8;?>-min.png"></div><div class="item-mes">SEP <br> <img src="images/<?php echo $r9;?>-min.png"></div><div class="item-mes">OCT <br> <img src="images/<?php echo $r10;?>-min.png"></div><div class="item-mes">NOV <br> <img src="images/<?php echo $r11;?>-min.png"></div><div class="item-mes">DIC <br> <img src="images/<?php echo $r12;?>-min.png"></div></div><div class="d-meses"><div class="item-mes">ENE <br> <img src="images/<?php echo $arregloCarros[0];?>-min.png"></div><div class="item-mes">FEB <br> <img src="images/<?php echo $arregloCarros[1];?>-min.png"></div><div class="item-mes">MAR <br> <img src="images/<?php echo $arregloCarros[2];?>-min.png"></div><div class="item-mes">ABR <br> <img src="images/<?php echo $arregloCarros[3];?>-min.png"></div><div class="item-mes">MAY <br> <img src="images/<?php echo $arregloCarros[4];?>-min.png"></div><div class="item-mes">JUN <br> <img src="images/<?php echo $arregloCarros[5];?>-min.png"></div><div class="item-mes">JUL <br> <img src="images/<?php echo $arregloCarros[6];?>-min.png"></div><div class="item-mes">AGO <br> <img src="images/<?php echo $arregloCarros[7];?>-min.png"></div><div class="item-mes">SEP <br> <img src="images/<?php echo $arregloCarros[8];?>-min.png"></div><div class="item-mes">OCT <br> <img src="images/<?php echo $arregloCarros[9];?>-min.png"></div><div class="item-mes">NOV <br> <img src="images/<?php echo $arregloCarros[10];?>-min.png"></div><div class="item-mes">DIC <br> <img src="images/<?php echo $arregloCarros[11];?>-min.png"></div></div>');
    $('[data-toggle="tooltip"]').tooltip();
	   
	       <?php
	       $dom = new DOMDocument();
$dom->loadHTML($matrizP);


foreach($dom->getElementsByTagName('a') as $element){
    $i=$element->getAttribute('id');
    if($i!=$id){
        $res1=R::getAll( 'select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,aviones,compensacionn1,compensacionn2,compensacionn3,compensacionn4,compensacionn5,puntos1,puntos2,puntos3,puntos4,puntos5,fecha
    from matrizvalores where idusuario= :idusuario order by fecha DESC limit 1',
    array(':idusuario'=>$i));
    
    
    $vacio1=0;
    if(!empty($res1)){
         if($res1[0]['id']==NULL){
            $vacio1=1;
         //echo "no hay";
             
         }
    
    }
    
     if(!empty($res1) && $vacio1==0){
            foreach($res1 as $row1) 
                {
$aviones1=$row1['aviones'];                    
$colorescss1=json_decode($row1['colorescss']);
$LIDERAZGOS1=json_decode($row1['liderazgos']);
$clientesTotales1=$row1['clientestotales'];
$ventasMatriz1=$row1['ventasmatriz'];
$mes1=$row1['mes'];
$puntosPersonales1=$row1['puntospersonales'];
$puntosGrupales5nivel1=$row1['puntosgrupales5nivel'];
$clientesActivos1=$row1['clientesactivos'];
$rollOver1=filter_var($row1['rollover'], FILTER_VALIDATE_BOOLEAN);
$porcentajeRed1=$row1['porcentajered'];
//$matrizP1=json_decode($row1['matriz']);
$compensacionn1=$row1['compensacionn1'];
     $compensacionn21=$row1['compensacionn2'];
     $compensacionn31=$row1['compensacionn3'];
     $compensacionn41=$row1['compensacionn4'];
     $compensacionn51=$row1['compensacionn5'];
     
         $puntoss1=$row1['puntos1'];
       $puntoss2=$row1['puntos2'];
       $puntoss3=$row1['puntos3'];
       $puntoss4=$row1['puntos4'];
       $puntoss5=$row1['puntos5'];
     
     
     //calcular colores
      
	      //$("#txt").addClass('textbox');   
        foreach ($colorescss1 as $co) {
            foreach ($co as $key => $value) {
	        //echo "$('#".$key."').addClass('".$value."');";
	        if($key== $i && !empty($value)){
	            echo " rango1='".$value."';";
	            break;
	        }
            }
        }
	        
	      //$("#txt").addClass('textbox');   
        foreach ($LIDERAZGOS as $co) {
            foreach ($co as $key => $value) {
	        //echo "$('#".$key."').addClass('".$value."');";
            if($key== $i && !empty($value)){
	            echo " rango1='".$value."';";
	            break;
	        }
                
            }
        }
	        
     
     
     
/*Aqui empieza carros por cada uno si se vuelve pesado eliminar */

	$ene1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=1 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $feb1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=2 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $mar1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=3 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $abr1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=4 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $may1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=5 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $jun1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=6 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $jul1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=7 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $ago1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=8 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $sep1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=9 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $oct1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=10 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $nov1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=11 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
     $dic1=R::getAll( 'select id,idusuario,mirango,fecha from matrizvalores where idusuario= :idusuario and MONTH(fecha)=12 and YEAR(fecha)= :anio order by fecha DESC limit 1',
    array(':idusuario'=>$i,':anio'=>$anio));
    
    $arregloCarros1=array();
    $r11="transparente";
    if(!empty($ene1)){
         if($ene1[0]['id']!=NULL){
        $r11=$ene1[0]['mirango'];
         //echo "no hay";
         }
    }
    
    $r21="transparente";
    if(!empty($feb1)){
         if($feb1[0]['id']!=NULL){
        $r21=$feb1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r31="transparente";
    if(!empty($mar1)){
         if($mar1[0]['id']!=NULL){
        $r31=$mar1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r41="transparente";
    if(!empty($abr1)){
         if($abr1[0]['id']!=NULL){
        $r41=$abr1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r51="transparente";
    if(!empty($may1)){
         if($may1[0]['id']!=NULL){
        $r51=$may1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r61="transparente";
    if(!empty($jun1)){
         if($jun1[0]['id']!=NULL){
        $r61=$jun1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r71="transparente";
    if(!empty($jul1)){
         if($jul1[0]['id']!=NULL){
        $r71=$jul1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r81="transparente";
    if(!empty($ago1)){
         if($ago1[0]['id']!=NULL){
        $r81=$ago1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r91="transparente";
    if(!empty($sep1)){
         if($sep1[0]['id']!=NULL){
        $r91=$sep1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r101="transparente";
    if(!empty($oct1)){
         if($oct1[0]['id']!=NULL){
        $r101=$oct1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r111="transparente";
    if(!empty($nov1)){
         if($nov1[0]['id']!=NULL){
        $r111=$nov1[0]['mirango'];
         //echo "no hay";
         }
    }
    $r121="transparente";
    if(!empty($dic1)){
         if($dic1[0]['id']!=NULL){
        $r121=$dic1[0]['mirango'];
         //echo "no hay";
         }
    }
    
    array_push($arregloCarros1,$r11,$r21,$r31,$r41,$r51,$r61,$r71,$r81,$r91,$r101,$r111,$r121);
	     //obtener el mayor rango de todos los meses
     for($i1 = 0; $i1 < count($arregloCarros1)-2; $i1++) {
         if($arregloCarros1[$i1]=='coronavip' ||$arregloCarros1[$i1]=='coronaluxury'||$arregloCarros1[$i1]=='coronapremier'||$arregloCarros1[$i1]=='coronaelite'){
    if ($arregloCarros1[$i1 + 1] == $arregloCarros1[$i1]  && $arregloCarros1[$i1 + 2] == $arregloCarros1[$i1+1] ) $arregloCarros1[$i1 + 2]=$arregloCarros1[$i1 + 2]."-carro";
         }
  }
  for($i1 = 0; $i1 < count($arregloCarros1); $i1++) {
         if (strpos($arregloCarros1[$i1], '-carro') == false)
            $arregloCarros1[$i1]="nocar";
  }


/*aqui termina carros */

?>




$('#<?php echo $i;?>').attr('data-toggle', 'tooltip');
    $('#<?php echo $i;?>').attr('data-placement', 'right');
    $('#<?php echo $i;?>').attr('data-html', 'true');
    $('#<?php echo $i;?>').attr('title', '<p class="p-tooltip">EI Activos: <b><?php echo $clientesActivos1;?></b></p><p class="p-tooltip">Puntos Grupales: <b><?php echo $puntosGrupales5nivel1;?></b></p><p class="p-tooltip">Puntos Personales: <b><?php echo $puntosPersonales1;?></b></p><p class="p-tooltip">Puntos p/nivel: <b><?php echo $puntoss1."|".$puntoss2."|".$puntoss3."|".$puntoss4."|".$puntoss5."-Total=(".($puntoss1+$puntoss2+$puntoss3+$puntoss4+$puntoss5).")";?></b></p><p class="p-tooltip">Roll over: <b><?php if($rollOver1) echo "SI";else echo "No";?></b></p><p class="p-tooltip"><i class="fas fa-plane"></i>:<b>&nbsp;<?php echo $aviones1;?></b></p><div class="d-meses"><div class="item-mes">ENE <br> <img src="images/<?php echo $r11;?>-min.png"></div><div class="item-mes">FEB <br> <img src="images/<?php echo $r21;?>-min.png"></div><div class="item-mes">MAR <br> <img src="images/<?php echo $r31;?>-min.png"></div><div class="item-mes">ABR <br> <img src="images/<?php echo $r41;?>-min.png"></div><div class="item-mes">MAY <br> <img src="images/<?php echo $r51;?>-min.png"></div><div class="item-mes">JUN <br> <img src="images/<?php echo $r61;?>-min.png"></div><div class="item-mes">JUL <br> <img src="images/<?php echo $r71;?>-min.png"></div><div class="item-mes">AGO <br> <img src="images/<?php echo $r81;?>-min.png"></div><div class="item-mes">SEP <br> <img src="images/<?php echo $r91;?>-min.png"></div><div class="item-mes">OCT <br> <img src="images/<?php echo $r101;?>-min.png"></div><div class="item-mes">NOV <br> <img src="images/<?php echo $r111;?>-min.png"></div><div class="item-mes">DIC <br> <img src="images/<?php echo $r121;?>-min.png"></div></div><div class="d-meses"><div class="item-mes">ENE <br> <img src="images/<?php echo $arregloCarros1[0];?>-min.png"></div><div class="item-mes">FEB <br> <img src="images/<?php echo $arregloCarros1[1];?>-min.png"></div><div class="item-mes">MAR <br> <img src="images/<?php echo $arregloCarros1[2];?>-min.png"></div><div class="item-mes">ABR <br> <img src="images/<?php echo $arregloCarros1[3];?>-min.png"></div><div class="item-mes">MAY <br> <img src="images/<?php echo $arregloCarros1[4];?>-min.png"></div><div class="item-mes">JUN <br> <img src="images/<?php echo $arregloCarros1[5];?>-min.png"></div><div class="item-mes">JUL <br> <img src="images/<?php echo $arregloCarros1[6];?>-min.png"></div><div class="item-mes">AGO <br> <img src="images/<?php echo $arregloCarros1[7];?>-min.png"></div><div class="item-mes">SEP <br> <img src="images/<?php echo $arregloCarros1[8];?>-min.png"></div><div class="item-mes">OCT <br> <img src="images/<?php echo $arregloCarros1[9];?>-min.png"></div><div class="item-mes">NOV <br> <img src="images/<?php echo $arregloCarros1[10];?>-min.png"></div><div class="item-mes">DIC <br> <img src="images/<?php echo $arregloCarros1[11];?>-min.png"></div></div>');
    $('[data-toggle="tooltip"]').tooltip();




<?php

                }
     }
    
    
    
    
    
    
    
    }
    //echo $element->getAttribute('id').",";
}
	       
	       
	      
	       
	       ?>
	       
	       
	       
	       
	       
	   }
	    
	</script>
	

</head>

<body onload="calcularColores();calcularLiderazgos(); mostrarInfo();">

	<div class="container-fluid">
		<div class="row row-items-number">
			<div class="col-lg-12 col-md-12">
				<div class="d-item-number">
				    <div>
					<span class="t1"><?php echo $usuario['nombre']." ".$usuario['apellidos'];?></span>
					</div>
					<div>
					<span class="t2"> Telefono:<?php echo $usuario['telefono'];?></span>
						<span class="t2"> Correo: <?php echo $usuario['correo'];?></span>
				
					</div>
					<div>
					<span class="t2">Domicilio:<?php echo $usuario['direccion'];?></span>
					<span class="t2">Estado:<?php echo $usuario['estado'];?></span>
						<span class="t2">Ciudad:<?php echo $usuario['ciudad'];?></span>
							<span class="t2">CP:<?php echo $usuario['codigop'];?></span>
					</div>
					
				</div>
				
				<div class="d-item-number">
					<p class="t2">Últimas Compras</p>
					<table>
  <tr>
    <th>Id</th>
    <th>Fecha</th>
    <th>Total</th>
    <th>Puntos</th>
  </tr>
  <?php
  if(!empty($ultimasCompras)){
            foreach($ultimasCompras as $row) {
                $puntos=0;
                if($row['paquete_id']=='2'){
                    $puntos=1;
                }else{
                    $puntos=2;
                }
       echo  "<tr>";
    echo "<td>".$row['id']."</td>";
echo     "<td>".date_format(date_create($row['fecha']),"d/m/Y H:i:s")."</td>";
echo    "<td>".$row['total']."</td>";
echo     "<td>".$puntos."</td>";
echo  "</tr>";
        
            }
        }
            
 
  
 ?>
</table>
					
					
					<!--<p class="t1"><?php //echo $ventasMatriz; ?></p>-->
					
				</div>
				<!--
				<div class="d-item-number">
					<p class="t1"><?php //echo $puntosPersonales; ?></p>
					<p class="t2">Puntos Personales</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php //echo $puntosGrupales5nivel; ?></p>
					<p class="t2">Puntos Grupales(5 nivel) </p>
				</div>
				
				<div class="d-item-number">
					<p class="t1">123</p>
					<p class="t2">Bonos</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php //echo $clientesActivos;?></p>
					<p class="t2">Distribuidores Activos</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php //if($rollOver) echo "SI";else echo "No";?></p>
					<p class="t2">Roll Over (Equilibrio Red)</p>
				</div>
					<div class="d-item-number">
					<p class="t1"><?php //echo round($porcentajeRed,2)."%";?></p>
					<p class="t2">% en Red</p>
				</div>
				
-->
			</div>
			
		</div>
	</div>


	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12">
			    
			    <?php
			  //	echo $ventasMatriz; 
			  //var_dump($primerNivel);
			  	
			  ?>
			    
			    
	<div class="tree">
			
<?php
echo $matrizP;

?>
</div>






	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body></html>