<?php
session_start();

	require '../bd/conexion.php';

	if($_POST["accionproducto"]=="editar"){

		if(!file_exists($_FILES['img-producto']['tmp_name']) || !is_uploaded_file($_FILES['img-producto']['tmp_name'])) {

    		//echo 'No upload';

			$producto= R::load( 'productos',$_POST["id_producto"]); 

			$producto->nombre=$_POST["nombre"];

			$producto->descripcion=$_POST["descripcion"];

			$producto->ingredientes=$_POST["ingredientes"];

			$producto->uso=$_POST["uso"];

			$producto->categoria=$_POST["categoria"];

			$producto->precio_mxn=$_POST["precio"];
			
			$producto->precio_usd=$_POST["preciousd"];
			
			//$producto->foto=basename($_FILES['img-producto']['name']);

			$id = R::store($producto); 

			echo "OK update".$id;

		}else{

			$dir_subida = '../productos_img/';

			$fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

			if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

				$producto= R::load( 'productos',$_POST["id_producto"]); 

				$producto->nombre=$_POST["nombre"];

				$producto->descripcion=$_POST["descripcion"];

				$producto->ingredientes=$_POST["ingredientes"];

				$producto->uso=$_POST["uso"];

				$producto->categoria=$_POST["categoria"];

				$producto->precio_mxn=$_POST["precio"];
			
				$producto->precio_usd=$_POST["preciousd"];

				$producto->imagen=basename($_FILES['img-producto']['name']);

				$id = R::store($producto);

				echo "OK update".$id;

   			}	

		}

	}



	if($_POST["accionproducto"]=="guardar"){

		$dir_subida = '../productos_img/';

		$fichero_subido = $dir_subida . basename($_FILES['img-producto']['name']);

		if (move_uploaded_file($_FILES['img-producto']['tmp_name'], $fichero_subido)) {

			$producto = R::dispense('productos');

			$producto->nombre=$_POST["nombre"];

			$producto->descripcion=$_POST["descripcion"];

			$producto->ingredientes=$_POST["ingredientes"];

			$producto->uso=$_POST["uso"];

			$producto->categoria=$_POST["categoria"];

			$producto->precio_mxn=$_POST["precio"];
			
			$producto->precio_usd=$_POST["preciousd"];

			$producto->imagen=basename($_FILES['img-producto']['name']);

			$id = R::store($producto);

			echo "OK insert".$id;
		}

	}



	if($_POST["accionproducto"]=="eliminar") {

		$producto = R::load( 'productos',$_POST["id_producto"]); 

		R::trash($producto);

		echo "OK eliminado".$id;

	}
	include 'registros-administrador.php';
?>