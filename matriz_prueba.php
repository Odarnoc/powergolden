<?php
require 'bd/conexion.php';

$id=$_GET['id'];


$ventasMatriz=0;
$clientesTotales=0;
$clientesActivos=0;
$resultados="";

$puntosPersonales=0;
$puntosGrupales=0;
$puntosGrupales5nivel=0;
$porcentajeRed=0;
$rollOver=true;
$activosPrimerNivel=0;
$aviones=0;
                      

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


 /** Actual month last day **/
  function _data_last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  };
  
 
  
 
  /** Actual month first day **/
  function _data_first_month_day() {
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
  }
  
  function getActivos(){
      global $clientesActivos,$activos;
      
      foreach ($activos as $act) {
        foreach ($act as $key => $value) {
                   if($value=='activo')
                    $clientesActivos++;
                
            }
      }
  }
 
 
   function getActivo($id){
      global $activos;
      
      $activo=false;
      foreach ($activos as $act) {
        foreach ($act as $key => $value) {
            if($key==$id){
                   if($value=='activo')
                    $activo=true;
                    break;
            }
                
            }
      }
      return $activo;
  }
  
  function getPuntosPorId($id){
         global $puntosPorId;
         $suma=0;
           foreach ($puntosPorId as $item) {
            foreach ($item as $key => $value) {
                if($key==$id){
                    $suma=$value;
                }
            }
        }
        return $suma;
  }
 
 function liderazgos(){
      global $activos;
      foreach ($activos as $act) {
           foreach ($act as $key => $value) {
                   if($value=='activo'){
                       calcularLiderazgo($key);
                   }
            }
           
      }
 }
 
// getRollOver($id);    
//activosPrimerNivel($id);

 function calcularLiderazgo($id){
       global $activos,$LIDERAZGOS,$rollOver,$puntosGrupales5nivel, $activosPrimerNivel,$aviones;
         foreach ($activos as $act) {
           foreach ($act as $key => $value) {
            if($key==$id){
                   if($value=='activo'){
                       $activosPrimer= $activosPrimerNivel;
                       $roll=$rollOver;
                       $puntoG=$puntosGrupales5nivel;
                       if($roll){
                       echo "Activos primer Nivel=".$activosPrimer."--RollOver=".$roll.'--Puntos Grupales='.$puntoG;
                       echo "\n";
                       }else{
                       echo "Activos primer Nivel=".$activosPrimer."--RollOver=falso --Puntos Grupales=".$puntoG;
                       echo "\n";
                           
                       }
                       $lidera="";
                       //bronce
                       
                       if(($activosPrimer>=5) && $roll && ($puntoG>=50)){
                                $lidera="bronce";
                                $aviones=1;
                                //$arraycol=array($id => "bronce");
                                //array_push($LIDERAZGOS,$arraycol);
                       }
                        //plata
                       if(($activosPrimer>=10) && $roll && ($puntoG>=100)){
                           $lidera="plata";
                           $aviones=2;
                           //$arraycol=array($id => "plata");
                           
                             //   array_push($LIDERAZGOS,$arraycol);
                       }
                        //oro
                       if(($activosPrimer>=15) && $roll && ($puntoG>=150)){
                           $lidera="oro";
                           $aviones=3;
                           //$arraycol=array($id => "oro");
                             //   array_push($LIDERAZGOS,$arraycol);
                       }
                        //diamante
                       if(($activosPrimer>=20) && $roll && ($puntoG>=250)){
                           $lidera="diamante";
                           $aviones=5;
                           //$arraycol=array($id => "diamante");
                             //   array_push($LIDERAZGOS,$arraycol);
                       }
                        //corona
                       if(($activosPrimer>=25) && $roll && ($puntoG>=400)){
                           $lidera="corona";
                           $aviones=8;
                           //$arraycol=array($id => "corona");
                            //    array_push($LIDERAZGOS,$arraycol);
                       }
                       
                       $arraycol=array($id => $lidera);
                       array_push($LIDERAZGOS,$arraycol);

                       
                   }
                    break;
            }
                
            }
      }
      
      
 }
 
 function calcularAviones($id){
 global $mes;
  
  
  
  //periodo 1
  if($mes =='enero' || $mes=='febrero' || $mes=='marzo'){
      $anio=date("Y");
      $dateToTest = $anio."-01-01";
      $lastday = date('t',strtotime($dateToTest));
      $date2=date_create($anio.'-01-'.$lastday.' 23:59:59');
      $date1=date_create($anio.'-01-01 00:00:00');
      echo $date2->format('Y-m-d H:i:s');
     
      $query1="select id,idusuario,colorescss,liderazgos,clientestotales,ventasmatriz,mes,puntospersonales,puntosgrupales5nivel,clientesactivos,rollover,porcentajered,matriz,max(fecha) from matrizvalores where idusuario= 1 and fecha between '2020-02-01 00:00:00' and '2020-02-29 23:59:59'";
      
      
      
      
      $date2=date_create($anio.'-03-'.$lastday);
      $date1=date_create($anio.'-01-01');
      //query
      
      
      
  }
  
  
  
  //periodo 2
  if($mes =='abril' || $mes=='mayo' || $mes=='junio'){
      $anio=date("Y");
      $me=date("m");
      $dateToTest = $anio."-06-01";
      $lastday = date('t',strtotime($dateToTest));
      
      $date2=date_create($anio.'-06-'.$lastday);
      $date1=date_create($anio.'-04-01');
      //query
      
  }
  
  //periodo 3
  if($mes =='julio' || $mes=='agosto' || $mes=='septiembre'){
 $anio=date("Y");
      $me=date("m");
      $dateToTest = $anio."-09-01";
      $lastday = date('t',strtotime($dateToTest));
      
      $date2=date_create($anio.'-09-'.$lastday);
      $date1=date_create($anio.'-07-01');     
        //query
      
  }
  
  //periodo 4
  if($mes =='octubre' || $mes=='noviembre' || $mes=='diciembre'){
      
      $anio=date("Y");
      $me=date("m");
      $dateToTest = $anio."-12-01";
      $lastday = date('t',strtotime($dateToTest));
      
      $date2=date_create($anio.'-12-'.$lastday);
      $date1=date_create($anio.'-10-01');
      //query
      
  }
  
 
     
 }
 
 function calcularCompensacionNivelesActivos($id){
   global $activosPrimerNivel;
    
    // var_dump($activosPrimerNivel);
     $compensacionn1=0;
     $compensacionn2=0;
     $compensacionn3=0;
     $compensacionn4=0;
     $compensacionn5=0;
     $n1=array();
     $n2=array();
     $n3=array();
     $n4=array();
     $n5=array();
     
     echo "\n";
     
     if($activosPrimerNivel>0){
         //echo "lego";
       $res=R::getAll( ' SELECT t1.id AS lev1, t2.id as lev2, t3.id as lev3, t4.id as lev4,t5.id as lev5,t6.id as lev6
FROM usuarios AS t1
LEFT JOIN usuarios AS t2 ON t2.referido = t1.id
LEFT JOIN usuarios AS t3 ON t3.referido = t2.id
LEFT JOIN usuarios AS t4 ON t4.referido = t3.id
LEFT JOIN usuarios AS t5 ON t5.referido = t4.id
LEFT JOIN usuarios AS t6 ON t6.referido = t5.id
WHERE t1.id = :idventa',
            array(':idventa'=>$id));
    
    $puntos="";
                foreach($res as $row) 
                {
                //echo $row['lev1']."-".$row['lev2']."-".$row['lev3']."-".$row['lev4']."-".$row['lev5']."-".$row['lev6']."-\n";
                //if(activo)
                
            
        
                $a=$row['lev2'];
                $b=$row['lev3'];
                $c=$row['lev4'];
                $d=$row['lev5'];
                $e=$row['lev6'];
              //  echo $row['lev1']."-".$a."-".$b."-".$c."-".$d."-".$e."-\n";
                
            
                if($a!=NULL){
                //    echo $a." no es nulo-";
                    
                   //checo que ese id no este ya agregado
                   if(!in_array( $a ,$n1 ) )
                        {
                            $compensacionn1+= (getPuntosPorId($a)*500);
                            $n1[] = $a;
                        }
                   
                }
                
                //segundo nivel
                
                if($b!=NULL && $activosPrimerNivel>=2){
                   //checo que ese id no este ya agregado
                   if(!in_array( $b ,$n2 ))
                        {
                            if(getActivo($a)){
                                $compensacionn2+= (getPuntosPorId($b)*250);
                                $n2[] = $b;
                            }else{
                                $compensacionn2+= (getPuntosPorId($b)*(250*2));
                                $n2[] = $b;
                                
                            }
                            
                             
                        }
                   
                }
                
                //tercer nivel
                
                if($c!=NULL && $activosPrimerNivel>=3){
                   //checo que ese id no este ya agregado
                   if(!in_array( $c ,$n3 ))
                        {
                            if(getActivo($b)){
                                $compensacionn3+= (getPuntosPorId($c)*75);  
                                $n3[] = $c;
                            }else{
                                $compensacionn3+= (getPuntosPorId($c)*(75*2));
                                $n3[] = $c;
                            }
                            
                        }
                }
                
                 //cuarto nivel
                
                if($d!=NULL && $activosPrimerNivel>=4){
                   //checo que ese id no este ya agregado
                   if(!in_array( $d,$n4 ))
                        {
                            if(getActivo($c)){
                                $compensacionn4+= (getPuntosPorId($d)*50);
                                $n4[] = $d;
                            }else{
                                $compensacionn4+= (getPuntosPorId($d)*(50*2));
                                $n4[] = $d;
                            }
                            
                        }
                }
                
                  
                 //quinto nivel
                
                if($e!=NULL && $activosPrimerNivel>=5){
                   //checo que ese id no este ya agregado
                   if(!in_array( $e,$n5 ))
                        {
                            if(getActivo($d)){
                                $compensacionn5+= (getPuntosPorId($e)*25);
                                $n5[] = $e;
                            }else{
                                $compensacionn5+= (getPuntosPorId($e)*(25*2));
                                $n5[] = $e;
                            }
                            
                        }
                }
        
              
              /*
                if($n1!=NULL){
                 $elementos.=$n1.",";
                }
                if($n2!=NULL){
                 $elementos.=$n2.",";
                }
                if($n3!=NULL){
                 $elementos.=$n3.",";
                }
                if($n4!=NULL){
                 $elementos.=$n4.",";
                }
                if($n5!=NULL){
                 $elementos.=$n5.",";
                }
                */
                
                }
     
     
     
     
     }
     echo "Compensacion 1 nivel:".$compensacionn1."\n";
      echo "Compensacion 2 nivel:".$compensacionn2."\n";
       echo "Compensacion 3 nivel:".$compensacionn3."\n";
        echo "Compensacion 4 nivel:".$compensacionn4."\n";
         echo "Compensacion 5 nivel:".$compensacionn5."\n";
 
     //var_dump($n1);
     //var_dump($n2);
 }
 
 
 
 function calcularPuntosGrupales5Nivel($id){
     global $puntosPorId,$puntosGrupales5nivel;
       $res=R::getAll( ' SELECT t1.id AS lev1, t2.id as lev2, t3.id as lev3, t4.id as lev4,t5.id as lev5,t6.id as lev6
FROM usuarios AS t1
LEFT JOIN usuarios AS t2 ON t2.referido = t1.id
LEFT JOIN usuarios AS t3 ON t3.referido = t2.id
LEFT JOIN usuarios AS t4 ON t4.referido = t3.id
LEFT JOIN usuarios AS t5 ON t5.referido = t4.id
LEFT JOIN usuarios AS t6 ON t6.referido = t5.id
WHERE t1.id = :idventa',
            array(':idventa'=>$id));
    
    $elementos="";
                foreach($res as $row) 
                {
                //echo $row['lev1']."\n";
                $n1=$row['lev2'];
                $n2=$row['lev3'];
                $n3=$row['lev4'];
                $n4=$row['lev5'];
                $n5=$row['lev6'];
              
                if($n1!=NULL){
                 $elementos.=$n1.",";
                }
                if($n2!=NULL){
                 $elementos.=$n2.",";
                }
                if($n3!=NULL){
                 $elementos.=$n3.",";
                }
                if($n4!=NULL){
                 $elementos.=$n4.",";
                }
                if($n5!=NULL){
                 $elementos.=$n5.",";
                }
                
                
                }
    if(substr($elementos, -1) == ","){
    $elementos=substr_replace($elementos ,"",-1);  
    }            
    
    $ele=explode(",",$elementos);
    
    $ele = array_unique($ele);
    $suma=0;
    foreach($ele as $e){
    
        foreach ($puntosPorId as $item) {
            foreach ($item as $key => $value) {
                if($key==$e){
                    $suma+=$value;
                }
            }
        }
        
    }
   
   $puntosGrupales5nivel=$suma; 
     return $suma;
 }
 
 
 
 function calcularPuntosGrupales5Niveltmp($id){
     global $puntosPorId;
       $res=R::getAll( ' SELECT t1.id AS lev1, t2.id as lev2, t3.id as lev3, t4.id as lev4,t5.id as lev5,t6.id as lev6
FROM usuarios AS t1
LEFT JOIN usuarios AS t2 ON t2.referido = t1.id
LEFT JOIN usuarios AS t3 ON t3.referido = t2.id
LEFT JOIN usuarios AS t4 ON t4.referido = t3.id
LEFT JOIN usuarios AS t5 ON t5.referido = t4.id
LEFT JOIN usuarios AS t6 ON t6.referido = t5.id
WHERE t1.id = :idventa',
            array(':idventa'=>$id));
    
    $elementos="";
                foreach($res as $row) 
                {
                //echo $row['lev1']."\n";
                $n1=$row['lev2'];
                $n2=$row['lev3'];
                $n3=$row['lev4'];
                $n4=$row['lev5'];
                $n5=$row['lev6'];
              
                if($n1!=NULL){
                 $elementos.=$n1.",";
                }
                if($n2!=NULL){
                 $elementos.=$n2.",";
                }
                if($n3!=NULL){
                 $elementos.=$n3.",";
                }
                if($n4!=NULL){
                 $elementos.=$n4.",";
                }
                if($n5!=NULL){
                 $elementos.=$n5.",";
                }
                
                
                }
    if(substr($elementos, -1) == ","){
    $elementos=substr_replace($elementos ,"",-1);  
    }            
    
    $ele=explode(",",$elementos);
    
    $ele = array_unique($ele);
    $suma=0;
    foreach($ele as $e){
    
        foreach ($puntosPorId as $item) {
            foreach ($item as $key => $value) {
                if($key==$e){
                    $suma+=$value;
                }
            }
        }
        
    }
   
  // $puntosGrupales5nivel=$suma; 
     return $suma;
 }
 
  
  function calcularColores(){
        global $primerNivel,$nivel,$activos,$colores;
foreach ($primerNivel as $item) {
    foreach ($item as $key => $value) {
        if($value!=''){
        //echo $key."-(";
        $nivel=explode(",",$value);
        $contador=0;
        foreach ($nivel as $niv) {
            foreach ($activos as $act) {
                   if($act[$niv]=='activo')
                    $contador++;
                
            }
               // echo $niv.",";
            }
            //echo ')'.$contador;
            
        $arraycol=array($key => $contador);
        array_push($colores,$arraycol);

        }
    } 
    
  //  echo "</br>";
}
      
  }
  
  
  function setJerarquia($dat){
$data = $dat;
global $jerarquia;

$dom = new DOMDocument();
$dom->loadHTML($data);

$po = $dom->getElementsByTagName('a');

foreach ($po as $p) {
 //   echo $p->nodeValue.'--'.$p->getAttribute('parent')."\n";
    $arraytmp=array($p->getAttribute('parent') =>  $p->nodeValue);
    array_push($jerarquia,$arraytmp);
}
      
  }
  
  
  function buscarJerarquia($id){
$data = $dat;
global $jerarquia,$primerNivel;

$valor="";
foreach ($jerarquia as $p) {
    foreach ($p as $key=>$value) {
        if($id==$key)
        $valor.=$value.",";

}
}
if($valor!=""){
    if(substr($valor, -1) == ","){
    $valor=substr_replace($valor ,"",-1);  
    }
    $arraytmp=array($id => $valor);
    array_push($primerNivel,$arraytmp);
}

  }
  
  
 
 function agruparJerarquia(){
   global $activos;

foreach ($activos as $p) {
   foreach ($p as $key=>$value) {
        buscarJerarquia($key);
   }
}
     
 } 
 
 
 
 function getRollOver($id){
     global $primerNivel,$puntosPorId,$porcentajeRed,$rollOver, $porcentajesPrimerNivel,$porcentajesPrimerNivel2;

/*
$mayor=0;     
foreach ($primerNivel as $p) {
   foreach ($p as $key=>$value) {
         $max=explode(",",$value);
         if(count($max)>$mayor)
            $mayor=count($max);
   }
}

foreach ($primerNivel as $p) {
   foreach ($p as $key=>$value) {
       if($key==$id){
           $max=explode(",",$value);
         $porcentajeRed=count($max);
        }
   }
}
$roll=false;
if($clientesTotales>1){
$porcentajeMio=(100/($clientesTotales-1))*$porcentajeRed;
$porcentajeMayor=(100/($clientesTotales-1))*$mayor;
if($porcentajeMio>=$porcentajeMayor){
    $rollOver=true;
    $roll=true;
}
}

$porcentajeRed=$porcentajeMio;
*/
//obtener puntos del primer nivel
$puntos=0;
$valores=null;



foreach ($primerNivel as $p) {
   foreach ($p as $key=>$value) {
       if($key==$id){
           $valores=explode(",",$value);
           break;
        }
   }
}

//descarto los inactivos
$primerNivelActivos=array();
if(!empty($valores)){
foreach($valores as $v){
foreach ($puntosPorId as $p) {
        foreach ($p as $key=>$value) {
        if($key==$v){
            if($value>0){
                $arraycol=array($key => $value);
                array_push($primerNivelActivos,$arraycol);
            }               
        }
        }
    }
}




//obtengo los puntos grupales
$totalPuntosGrupales=0;
$porcentajeRed=0;

foreach ($primerNivelActivos as $p) {
        foreach ($p as $key=>$value) {
$punto=calcularPuntosGrupales5Niveltmp($key);
$punto+=$value;
$porcentajeRed+=$punto;
$totalPuntosGrupales+=$punto;
$arraycol=array($key=> $punto);
array_push($porcentajesPrimerNivel,$arraycol);
            
        }
}
if($primerNivelActivos>0 && $porcentajeRed>0){

$porcentajeRed=$porcentajeRed/count($primerNivelActivos);
}
//regla de 3

foreach ($porcentajesPrimerNivel as $p) {
        foreach ($p as $key=>$value) {
$probabilidad=(100*$value)/$totalPuntosGrupales;
$arraycol=array($key=> $probabilidad);
array_push($porcentajesPrimerNivel2,$arraycol);
            
        }
}

//checar si alguien tiene mas de 60

$roll=true;

foreach ($porcentajesPrimerNivel2 as $p) {
        foreach ($p as $key=>$value) {
        if($value>=60)
        $roll=false;
        
        
        
            
        }
}

if($primerNivelActivos>0 && $porcentajeRed>0){
    $roll=false;
}

$rollOver=$roll;

}               

     return $roll;
 }
  
  function activosPrimerNivel($id){
 global $primerNivel,$activosPrimerNivel;
 $primer=null;
 foreach ($primerNivel as $p) {
   if(isset($p[$id])){
       $primer=$p[$id];
     }
  }     
  
  $valores=explode(",",$primer);
  $numero=0;
  foreach($valores as $v){
  if(getActivo($v))
    $numero++;
  }
      $activosPrimerNivel=$numero;
     return $numero; 
  }
  
  
  

function getVentasMatriz($parent_id,$root=0){
   global $ventasMatriz,$resultados,$puntosGrupales,$puntosPersonales,$activos,$puntosPorId;
    
$res=R::getAll( 'select id,fecha,total from ventas where user_id= :idusuario and (fecha BETWEEN :fechaInicio AND :fechaFin)',
array(':idusuario'=>$parent_id,
    ':fechaInicio'=>_data_first_month_day() ,
    ':fechaFin'=>_data_last_month_day()));

$activo=0;
$totales=0;
    foreach($res as $row) 
{
    //obtener por cada venta el paquete vendido
    
       $res2=R::getAll( 'select id,venta_id,paquete_id from ventaspaquetes where venta_id= :idventa',
            array(':idventa'=>$row['id']));
    
                foreach($res2 as $row2) 
                {
                    $activo++;
                    if($row2['paquete_id']=='2'){
                        if($root==0)
                        $puntosGrupales+=1;
                        else
                        $puntosPersonales+=1;
                    
                        $totales+=1;
                    }
                    if($row2['paquete_id']=='3'){
                        if($root==0)
                        $puntosGrupales+=2;
                        else
                        $puntosPersonales+=2;
                    
                        $totales+=2;
                    }
                            
    
}

         if($root==0){
         $resultados.=$row['id']." ";
       $ventasMatriz++;
         }
}

$arraytmpp=array($parent_id => $totales);
array_push($puntosPorId,$arraytmpp);


if($root==0){
if($activo>0){
$arraytmp=array($parent_id => "activo");
array_push($activos,$arraytmp);
}else{
$arraytmp=array($parent_id => "inactivo");
array_push($activos,$arraytmp);
}
}

}



function get_menu_tree_tmp($parent_id) 
{
global $primerNivel;
$menu = "";
$menut = "";

$res=R::getAll( 'select id, nombre, referido from
 (select * from usuarios order by referido, id) usuarios_sorted,
 (select @pv := :idusuario) initialisation where find_in_set(referido, @pv)' , 
        array(':idusuario'=> $parent_id) 
    );
    
foreach($res as $row) 
{
       $menu .="<li ><a href='matriz.php?id=".$row['id']."' id='".$row['id']."'>".$row['id']."</a>";
       $menu .= "</li>";
       $menut .="<li ><a href='#'>".$row['id']."</a>";
       $menut .= "</li>";
}

/*
$tmp2=str_replace("<li >","",$menut);
$tmp2=str_replace("</li>","",$tmp2);
$tmp2=str_replace("</a>","",$tmp2);
$tmp2=str_replace("</ul>","",$tmp2);
$tmp2=str_replace("<ul>","",$tmp2);
$tmp2=str_replace("<a href='#'>",",",$tmp2);
$tmp2=str_replace(" ","",$tmp2);
if ($tmp2 !== ''){
    if($tmp2[0] == ","){
     $tmp2=substr($tmp2, 1);   
    }
}
//echo $tmp2."\n";
$arraytmp=array($parent_id =>  $tmp2);
array_push($primerNivel,$arraytmp);
*/

    
}


function get_menu_tree($parent_id) 
{
    
global $clientesTotales,$primerNivel,$level;

$menu = "";


$res=R::getAll( 'select id, nombre, referido from
 (select * from usuarios order by referido, id) usuarios_sorted,
 (select @pv := :idusuario) initialisation where find_in_set(referido, @pv)' , 
        array(':idusuario'=> $parent_id) 
    );
    
    
foreach($res as $row) 
{
    
       $menu .="<li ><a href='matriz.php?id=".$row['id']."' id='".$row['id']."' parent='".$parent_id."'>".$row['id']."</a>";
    
//colores primer nivel

$tmp=get_menu_tree($row['id']);

       $menu .= "<ul>".$tmp." </ul>"; //call  recursively
       $menu .= "</li>";
       
}


$clientesTotales++;
getVentasMatriz($parent_id);

//echo $menu."\n";
return $menu;
}




if (isset($id)) {
    
    getVentasMatriz($id,$id);
  //  get_menu_tree_tmp($id);
    
    $matrizP="";
    
    $usuario  = R::findOne( 'usuarios', ' id = '.$id);
    if($usuario!=NULL){
    
   $matrizP.="<ul><li ><a href='#' id='".$id."'>".$id."</a>";
   $matrizP.="<ul>";
   $matrizP.=get_menu_tree($id);
   $matrizP.= "</ul></li></ul>"; 
    
    
    
 setJerarquia($matrizP);    
 agruparJerarquia();
 calcularColores();
getRollOver($id);    
activosPrimerNivel($id);

calcularPuntosGrupales5Nivel($id);
   // getVentasMatriz($id);

//echo "\n";
//procesar css para colores
foreach ($activos as $at) {
    foreach ($at as $key1 => $value1) {
        
    
        $encontro=false;
        foreach ($colores as $co) {
            
            if(isset($co[$key1])){
             
             if($co[$key1]>0  && $value1=='activo'){
                  if($co[$key1]==1)
            array_push($colorescss,array($key1 => "amarillo"));
         if($co[$key1]==2 )
            array_push($colorescss,array($key1 => "verde"));
         if($co[$key1]==3 )
            array_push($colorescss,array($key1 => "azul"));
         if($co[$key1]==4 )
            array_push($colorescss,array($key1 => "rojo"));
         if($co[$key1]>=5 )
            array_push($colorescss,array($key1 => "lila"));
              
            $encontro=true;  
            break;
            }
            
            }
        }
        
        if(!$encontro){
               if($value1=='activo')
                      array_push($colorescss,array($key1 => "gris"));
            
             if($value1=='inactivo')
                     array_push($colorescss,array($key1 => "transparente"));
                
        }
        
        
    }
}


//get clientes activos
getActivos();

//calcularRangosLider
    calcularLiderazgo($id);
     
     //calcular bonificacion 1
     calcularCompensacionNivelesActivos($id);
     
     var_dump($porcentajesPrimerNivel2);
     

    }
    
}





?>


			    <?php
			  //	echo $rollOver; 
//var_dump($puntosPorId);
			  
			  ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="css/matriz.css">

	<title>Matriz Power Golden</title>
	
	<style>
	    .amarillo{
	            background-image: url(../images/amarillo.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .gris{
	            background-image: url(../images/gris.png) !important;
	            background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .transparente{
	            background-image: url(../images/transparente.png) !important;
	            background-size: 60px 60px !important;
	             background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .verde{
	            background-image: url(../images/verde.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .azul{
	            background-image: url(../images/azul.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .rojo{
	            background-image: url(../images/rojo.png) !important;
	              background-size: 60px 60px !important;
	            background-repeat: no-repeat !important;
                background-position: bottom !important;
	    }
	    .lila{
	            background-image: url(../images/lila.png) !important;
	              background-size: 60px 60px !important;
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
	    
	</style>
	
	
	<script>
	    function calcularColores(){
	        <?php
	      //$("#txt").addClass('textbox');   
        foreach ($colorescss as $co) {
            foreach ($co as $key => $value) {
	        echo "$('#".$key."').addClass('".$value."');";
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
            }
        }
	        ?>
	    }
	    
	</script>
	

</head>

<body onload="calcularColores();calcularLiderazgos();">

	<div class="container-fluid">
		<div class="row row-items-number">
			<div class="col-lg-12 col-md-12">
				<div class="d-item-number">
					<p class="t1"><?php echo $clientesTotales;?></p>
					<p class="t2">Distribuidores en Red</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php echo $ventasMatriz; ?></p>
					<p class="t2">Ventas / Mes (<?php echo $mes;?>)</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php echo $puntosPersonales; ?></p>
					<p class="t2">Puntos Personales</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php echo $puntosGrupales5nivel; ?></p>
					<p class="t2">Puntos Grupales(5 nivel) </p>
				</div>
				
				<div class="d-item-number">
					<p class="t1">123</p>
					<p class="t2">Bonos</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php echo $clientesActivos;?></p>
					<p class="t2">Distribuidores Activos</p>
				</div>
				
				<div class="d-item-number">
					<p class="t1"><?php if($rollOver) echo "SI";else echo "No";?></p>
					<p class="t2">Roll Over (Equilibrio Red)</p>
				</div>
					<div class="d-item-number">
					<p class="t1"><?php echo round($porcentajeRed,2)."%";?></p>
					<p class="t2">% en Red</p>
				</div>
				

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