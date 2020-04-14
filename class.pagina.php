<?php
//require 'user_preferences/user-info.php';



class Paginador
{
	var $sql,$records,$pages;
	/*
	Variables that are passed via constructor parameters
	*/
	var $pagina,$total,$limit,$first,$previous,$next,$last,$start,$end;
	/*
	Variables that will be computed inside constructor
	*/
	function Paginador($sql,$nombre="",$records=15,$pages=8)
	{
		if($pages%2==0)
			$pages++;
	
	if(empty($nombre) || $nombre=="bronce" || $nombre=="plata" || $nombre=="oro" || $nombre=="diamante" || $nombre=="corona" || $nombre=="amarillo" || $nombre=="azul" || $nombre=="rojo" || $nombre=="lila" || $nombre=="gris" || $nombre=="transparente" || $nombre=="verde") {
	
 $num = R::count( 'usuarios', 'rol = 2');
	}else {
$num = R::count( 'usuarios', 'rol = 2 and (nombre LIKE :name or apellidos LIKE :name or id LIKE :name)',array(':name' => '%' . $nombre. '%' ));

	}
		//$res=mysql_query($sql) or die($sql." - ".mysql_error());
	
		//$total=mysql_num_rows($res);
		$total=$num;
		
		
		$pagina=isset($_GET["pagina"])?$_GET["pagina"]:1;
	if($pagina==-1){
	    $records=10000000;
	    $pages=1;
	    $pagina=1;
	}
	
	if($nombre=="bronce" || $nombre=="plata" || $nombre=="oro" || $nombre=="diamante" || $nombre=="corona" || $nombre=="amarillo" || $nombre=="azul" || $nombre=="rojo" || $nombre=="lila" || $nombre=="gris" || $nombre=="transparente" || $nombre=="verde" ){
	$records=10000000;
	    $pages=1;
	    $pagina=1;
	    
	} 
	
		$limit=($pagina-1)*$records;
	//	$sql.=" limit $limit,$records";
		
			if(empty($nombre) || $nombre=="bronce" || $nombre=="plata" || $nombre=="oro" || $nombre=="diamante" || $nombre=="corona" || $nombre=="amarillo" || $nombre=="azul" || $nombre=="rojo" || $nombre=="lila" || $nombre=="gris" || $nombre=="transparente" || $nombre=="verde"){
			$sql=R::find('usuarios','rol = 2  LIMIT :limit,:records',array( 
                ':limit' => $limit, 
                ':records' => $records 
            ));
			}else{
			   	$sql=R::find('usuarios','rol = 2 and (nombre LIKE :name or apellidos LIKE :name or id LIKE :name) LIMIT :limit,:records',array( 
                ':limit' => $limit, 
                ':records' => $records,
                ':name' => '%' . $nombre. '%' 
            )); 
			    
			}
	
	
		$first=1;
		$previous=$pagina>1?$pagina-1:1;
		$next=$pagina+1;
		$last=ceil($total/$records);
		if($next>$last)
			$next=$last;
	
		$start=$pagina;
		$end=$start+$pages-1;
		if($end>$last)
			$end=$last;
		
		if(($end-$start+1)<$pages)
		{
			$start-=$pages-($end-$start+1);
			if($start<1)
				$start=1;
		}
		if(($end-$start+1)==$pages)
		{
			$start=$pagina-floor($pages/2);
			$end=$pagina+floor($pages/2);
			while($start<$first)
			{
				$start++;
				$end++;
			}
			while($end>$last)
			{
				$start--;
				$end--;
			}
		}
	
		$this->sql=$sql;
		$this->records=$records;
		$this->pages=$pages;
		$this->pagina=$pagina;
		$this->total=$total;
		$this->limit=$limit;
		$this->first=$first;
		$this->previous=$previous;
		$this->next=$next;
		$this->last=$last;
		$this->start=$start;
		$this->end=$end;
	}
	function ver_pagina($url,$paramss="")
	{
		$pagina2="";
		$todos="-1";
	//	echo "aaa";
	//	echo $paramss;
		if($this->total>$this->records)
		{
			$pagina=$this->pagina;
			$first=$this->first;
			$previous=$this->previous;
			$next=$this->next;
			$last=$this->last;
			$start=$this->start;
			$end=$this->end;
			if($paramss=="")
				$params="?pagina=";
			else
				$params="?$paramss&pagina=";
			$pagina2.="<ul class='pagination paginador'>";
			$pagina2.="<li class='paginador-first'><a href='$url$params$todos'>Ver Todo</a></li>";
			$pagina2.="<li class='paginador-current btn btn-primary'>Página $pagina de $last</li>";
			if($page_no==$first)
				$pagina2.="<li class='paginador-first paginador-disabled'><a href='javascript:void(0)'>&lt;&lt;</a></li>";
			else
				$pagina2.="<li class='paginador-first'><a href='$url$params$first'>&lt;&lt;</a></li>";
			if($pagina==$previous)
				$pagina2.="<li class='paginador-previous paginador-disabled'><a href='javascript:void(0)'>&lt;</a></li>";
			else
				$pagina2.="<li class='paginador-previous'><a href='$url$params$previous'>&lt;</a></li>";
			for($p=$start;$p<=$end;$p++)
			{
				$pagina2.="<li";
				if($pagina==$p)
					$pagina2.=" class='paginador-active'";
				$pagina2.="><a href='$url$params$p'>$p</a></li>";
			}
			if($pagina==$next)
				$pagina2.="<li class='paginador-next paginador-disabled'><a href='javascript:void(0)'>&gt;</a></li>";
			else
				$pagina2.="<li class='paginador-next'><a href='$url$params$next'>&gt;</a></li>";
			if($pagina==$last)
				$pagina2.="<li class='paginador-last paginador-disabled'><a href='javascript:void(0)'>&gt;&gt;</a></li>";
			else
				$pagina2.="<li class='paginador-last'><a href='$url$params$last'>&gt;&gt;</a></li>";
			$pagina2.="</ul>";
		}
		
		return $pagina2;
	}
}
?>