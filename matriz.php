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
	$('#<?php echo $id;?>').attr('data-toggle', 'tooltip');
    $('#<?php echo $id;?>').attr('data-placement', 'right');
    $('#<?php echo $id;?>').attr('data-html', 'true');
    $('#<?php echo $id;?>').attr('title', '<p class="p-tooltip">EI Activos: <b><?php echo $clientesActivos;?></b></p><p class="p-tooltip">Número de Afiliados: <b><?php echo $clientesTotales;?></b></p><p class="p-tooltip">Rango/Color: <b>'+rango+'</b></p><p class="p-tooltip">Puntos Grupales: <b><?php echo $puntosGrupales5nivel;?></b></p><p class="p-tooltip">Puntos Personales: <b><?php echo $puntosPersonales;?></b></p><p class="p-tooltip">Compras / Mes (<?php echo $mes;?>): <b><?php echo $ventasMatriz; ?></b></p><p class="p-tooltip">Puntos p/nivel: <b><?php echo $puntos1."|".$puntos2."|".$puntos3."|".$puntos4."|".$puntos5."-Total=(".($puntos1+$puntos2+$puntos3+$puntos4+$puntos5).")";?></b></p><p class="p-tooltip">Roll over: <b><?php if($rollOver) echo "SI";else echo "No";?></b></p>');
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
	        
     
     
     


?>

$('#<?php echo $i;?>').attr('data-toggle', 'tooltip');
    $('#<?php echo $i;?>').attr('data-placement', 'right');
    $('#<?php echo $i;?>').attr('data-html', 'true');
    $('#<?php echo $i;?>').attr('title', '<p class="p-tooltip">EI Activos: <b><?php echo $clientesActivos1;?></b></p><p class="p-tooltip">Número de Afiliados: <b><?php echo $clientesTotales1;?></b></p><p class="p-tooltip">Rango/Color: <b>'+rango1+'</b></p><p class="p-tooltip">Puntos Grupales: <b><?php echo $puntosGrupales5nivel1;?></b></p><p class="p-tooltip">Puntos Personales: <b><?php echo $puntosPersonales1;?></b></p><p class="p-tooltip">Compras / Mes (<?php echo $mes1;?>): <b><?php echo $ventasMatriz1; ?></b></p><p class="p-tooltip">Puntos p/nivel: <b><?php echo $puntoss1."|".$puntoss2."|".$puntoss3."|".$puntoss4."|".$puntoss5."-Total=(".($puntoss1+$puntoss2+$puntoss3+$puntoss4+$puntoss5).")";?></b></p><p class="p-tooltip">Roll over: <b><?php if($rollOver1) echo "SI";else echo "No";?></b></p>');
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
