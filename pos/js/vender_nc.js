var server="http://heladoschaps.com/application";
var username="";
var userid="";
var cuenta=0;
var contador=0;
var stock="";
var turno=0;
var arregloventas=[];
var arreglodeveluciones=[];
var total_general=0;
var total_devs=0;
$(document).ready(function(){
	$("#rowproductos").empty().append("<div class=\"col-md-4\" onclick=\"agregarProducto('Chica','35','4')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Chica<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Mediana','40','5')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Mediana<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Taza','47','6')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Taza<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Copa','52','7')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Copa<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('1\/2 Litro','60','8')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">1\/2 Litro<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Litro','95','9')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Litro<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('P. Leche','16','10')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">P. Leche<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('P. Agua','13','11')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">P. Agua<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('P. Especial','22','12')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">P. Especial<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Barquillo S.','19','13')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Barquillo S.<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Barquillo D.','35','14')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Barquillo D.<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Cazuela','40','15')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Cazuela<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('A. Fresca Chica','14','16')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">A. Fresca Chica<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('A. Fresca Grande','23','17')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">A. Fresca Grande<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('A. Botella Chica','8','18')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">A. Botella Chica<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('A. Botella Grande','16','19')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">A. Botella Grande<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Fresas','33','20')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Fresas<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Malteadas','40','21')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Malteadas<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Papas','27','22')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Papas<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Palomitas','17','23')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Palomitas<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Expresso','15','24')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Expresso<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('C. Americano','30','25')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">C. Americano<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('C. Capuchino Late','33','26')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">C. Capuchino Late<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Infusion (Te)','27','27')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Infusion (Te)<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Smoothie','40','28')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Smoothie<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Frapuchino','40','29')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Frapuchino<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div><div class=\"col-md-4\" onclick=\"agregarProducto('Crepa','40','30')\">\n\t<div class=\"divitemproducto cat_\">\n\t<center>\n\t<img id=\"imgproducto\" src=\"images\/logochaps.PNG\" alt=\"\">\n\t<p class=\"pitemproducto\">Crepa<\/p>\n\t<\/center>\n\n\t<\/div>\n\n\t<\/div>");
	arregloventas[turno]=[];
	arreglodeveluciones[turno]=[];
});
$("#buscar").keyup(function(event){
	
	$.ajax({
		url: server+"/webserviceapp/get_products.php",
		type: "POST",
		data: {"product": $("#buscar").val()},
		dataType: "json",
		beforeSend: function() {
			swal({
				title: "Cargando...",
				showConfirmButton: false,
				imageUrl: "loader.gif"
			});
		},
		success: function(data) {
				////console.log(data);
				swal.close();
				//console.log(data);
				$("#rowproductos").empty().append(data.list);
			}
		});

});
function sale(){
	var countrows = $('#tablacarrito tr').length;
	var rows = countrows - 1;

	if (rows == 0) {

		swal("<p id='pswalerror'>Atención</p>", "<p id='psswalerror'>Para realizar una venta primero debe agregar productos al carrito, por favor vuelva a intentarlo.</p>", "info");

	} else {

		swal({

			type: 'info',
			title: "<p id='prealizarventa'>Realizar Venta</i>",
			html: "<p id='psswal'>¿Cantidad recibida?</p>",position:'top',
			input: 'number',
			confirmButtonText: 'Aceptar',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',

		}).then((result) => {

			var auxiliar = $("#totalcarrito").html();
			auxiliar = auxiliar.replace("$", "");
			auxiliar = auxiliar.replace(",", "");
			var total = parseFloat(auxiliar);
			var inputValue = result.value;

			if (inputValue == "") {

				swal("<p id='pswalerror'> Error </p>", "<p id='psswalerror'>Necesitas escribir una cantidad, <br> por favor vuelva a intentarlo.</p> ", "error");
				return false;

			} else if (total > parseFloat(inputValue)) {

				swal("<p id='pswalerror'> Error </p>", "<p id='psswalerror'>Cantidad recibida menor al valor de la venta, <br>por favor vuelva a intentarlo.</p>", "error");

			} else if (result.value) {
				var total_string="Total:                $"+addCommas(total)+"\n";
				total_string+="C. Recibida:          $"+addCommas(parseFloat(inputValue))+"\n";
				total = parseFloat(inputValue) - total;
				total_string+="Cambio:               $"+addCommas(parseFloat(total))+"\n";
				var product='';
				var price_out='';
				var ticket="";
				var cualquierCadena="";
				$('#tablacarrito > tbody  > tr').each(function () {
					product = $(this).find("td:eq(0)").text();
					product = product.trim();
					price_out = $(this).find("td:eq(1)").text();
					cualquierCadena=$(this).find("td:eq(2)").text();
					price_out = price_out.trim();

					total_general+=parseFloat(price_out);
					if(cualquierCadena.length>20){
						cualquierCadena=cualquierCadena.substring(0,20)

					}else{
						for(var x=cualquierCadena.length;x<20;x++){
							cualquierCadena+=" ";
						}
					}
					data={
						'product': product,
						'nproduct':cualquierCadena,
						'price_out':price_out,
						'stock_id':stock,
						'user_id':userid
					};
					ticket+=cualquierCadena+"    $"+addCommas(price_out)+"\n";
					arregloventas[turno].push(data);
				});
				ticket+="\n";
				
				imprimir_ticket(ticket,total_string,"");

				swal("<p id='pswal'>Venta realizada</p>", "<p id='psswal'> El cambio a entregar es de: <br> <b id='psbswal'>$" + addCommas(total) + ".<sup id='supswal'>00</sup></b></p>", "success");

				$('#tablacarrito  tbody').empty();
				$("#totalcarrito").empty().append("$0.00");
				$("#totalventas").empty().append("$"+parseFloat(total_general).toFixed(2));
				contador=0;
				cuenta=0;
			}


		});


	}

	$('.swal2-input').on('input', function () {
		this.value = this.value.replace(/[^0-9]/g, '');
	});


}
function agregarProducto(name,price_out,id){
	////console.log("Aqui ando");
	$("#tablacarrito > tbody").append(' <tr id="'+contador+'">\
		<td style="display:none">'+id+'</td>\
		<td style="display:none">'+price_out+'</td>\
		<td class="tdproducto">'+name+'</td>\
		<td class="tdprecio">$'+parseFloat(price_out).toFixed(2)+'</td>\
		<td class="tdborrar"><a onclick="eliminar_carrito(\''+contador+'\',\''+price_out+'\')"><img id="iconborrar" src="images/iconborrar.png" alt=""></a></td>\
		</tr>');
	cuenta+=parseFloat(price_out);
	contador++;
	$("#totalcarrito").empty().append("$"+parseFloat(cuenta).toFixed(2));

}
function eliminar_carrito(id,price_out){
	$('#'+id).remove();
	cuenta-=parseFloat(price_out);
	$("#totalcarrito").empty().append("$"+parseFloat(cuenta).toFixed(2));

}
function addCommas(nStr) {
	nStr += '';
	var x = nStr.split('.');
	var x1 = x[0];
	var x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function logout(){
	window.location.replace("index.html");
}
function iniciovender() {

	window.location.href= "vender.html?id="+userid+"&name="+username+"&stock="+stock;
}
function inicioventas() {

	window.location.href= "ventas.html?id="+userid+"&name="+username+"&stock="+stock;
}

function iniciodevoluciones() {

	window.location.href= "devoluciones.html?id="+userid+"&name="+username+"&stock="+stock;
}
function inicioinicio(){
	swal({
		title: "<p id='pswalerror'>Corte de caja</p>",
		html: "<p id='psswalerror'>¿Deseas realizar el corte de caja?</p>",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#0066D1',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Aceptar',
		cancelButtonText: 'Cancelar',
	}).then((result) => {

		if (result.value) {
			if(total_general!=0){
				swal({
					title: 'Accede a tu cuenta',
					position:'top',
					html:
					'<p id="usernc">Nombre de usuario</p><input id="swal-input1" class="swal2-input">' +
					'<p id="passnc">Contraseña</p><input type="password" id="swal-input2" class="swal2-input">',
					preConfirm: function () {
						return new Promise(function (resolve) {
							resolve([
								$('#swal-input1').val(),
								$('#swal-input2').val()
								])
						})
					},
					onOpen: function () {
						$('#swal-input1').focus()
					}
				}).then(function (resultado) {
					swal({
						title: "Cargando...",
						showConfirmButton: false,
						imageUrl: "loader.gif"
					});
					$.ajax({
						url: server+"/webserviceapp/login_process.php",
						type: "POST",
						data: {
							username:resultado.value[0],
							password:resultado.value[1]
						},
						dataType: "json",
						beforeSend: function() {
							
						},
						success: function(datauser) {
							swal.close();
				//console.log(data);
				if(datauser==false){
					swal("Error de credenciales.","El usuario no existe o la contraseña es incorrecta, por favor revisa tus credenciales." ,"warning");
				}else{
					////console.log(data.name);
					if(datauser.stock_id==undefined){
						datauser.stock_id="admin";

					}
					swal({
						title: "Cargando...",
						showConfirmButton: false,
						imageUrl: "loader.gif"
					});
					for(var i=0;i<=turno;i++){
						arregloventas[i].forEach(function (venta,index) {
							product = venta.product;
							product = product.trim();
							price_out = venta.price_out;
							price_out = price_out.trim();
							$.ajax({
								url: server+"/webserviceapp/sale.php",
								type: 'post',
								async: false,
								data: {
									'product': product,
									'price_out':price_out,
									'stock_id':datauser.stock_id,
									'user_id':datauser.id
								},
								dataType: 'html',
								success() {




								}
							});
						});
						arreglodeveluciones[i].forEach(function (venta,index) {

							$.ajax({
								url: server+"/webserviceapp/devolucion.php",
								type: 'post',
								async: false,
								data: {
									'importe': venta.importe,
									'concepto':venta.concepto,
									'stock_id':datauser.stock_id,
									'user_id':datauser.id
								},
								dataType: 'html',
								success() {




								}
							});
						});

					}
					
					$.ajax({
						url: server+"/webserviceapp/corte.php",
						type: "POST",
						data: {
							'stock_id':datauser.stock_id,
							'user_id':datauser.id
						},
						dataType: "json",
						success: function(data) {
							swal.close();
							
							window.location.href= "index.html";
							
							
							
							
						}
					});

				}
			}
		});

				});
			}else{
				swal("<p id='pswalerror'>Atención</p>", "<p id='psswalerror'>Para realizar un corte de caja primero debes realizar una venta.</p>", "info");

			}
		}
	});

	

	
}
function cambioturno(){
	var ventas=[];
	var conceptos=[];
	var impresion="";
	arregloventas[turno].forEach(function (venta,index) {
		if(ventas[venta.product]==null){
			ventas[venta.product]=1;
		}else{
			ventas[venta.product]=ventas[venta.product]+1;
		}
		conceptos[venta.product]=venta.nproduct;
	});
	console.log(ventas);
	ventas.forEach(function (venta,index) {
		impresion += conceptos[index] + '          ' + venta + "\n";
	});
	if(arreglodeveluciones[turno].length>0){
		impresion += 'Devoluciones        ' + '          ' + arreglodeveluciones[turno].length + "\n";
	}

	var string_total="Total:        $"+addCommas(parseFloat(total_general).toFixed(2));

	if(total_devs!=0){
		string_total+="\n"+"Devoluciones: $"+addCommas(parseFloat(total_devs).toFixed(2));
		string_total+="\n"+"Total Real:   $"+addCommas((parseFloat(total_general)-parseFloat(total_devs)).toFixed(2));
	}
	imprimir_ticket2(impresion,string_total,"Turno "+(turno+1));
	turno++;
	arregloventas[turno]=[];
	arreglodeveluciones[turno]=[];
	total_general=0;
	total_devs=0;
	$("#totaldevs").empty().append("$"+parseFloat(total_devs).toFixed(2));
	$("#totalventas").empty().append("$"+parseFloat(total_general).toFixed(2));

}
function devolucionnc(){
	swal({
		title: 'Devolución',
		position:'top',
		html:
		'<p id="usernc">Concepto</p><input id="swal-input1" class="swal2-input">' +
		'<p id="passnc">Importe</p><input type="number" id="swal-input2" class="swal2-input">',
		preConfirm: function () {
			return new Promise(function (resolve) {
				resolve([
					$('#swal-input1').val(),
					$('#swal-input2').val()
					])
			})
		},
		onOpen: function () {
			$('#swal-input1').focus()
		}
	}).then(function (resultado) {
		swal({
			title: "Cargando...",
			showConfirmButton: false,
			imageUrl: "loader.gif"
		});

		var concepto=resultado.value[0];
		var importe=resultado.value[1];
		data={
			'concepto': concepto,
			'importe':importe
		};
		arreglodeveluciones[turno].push(data);
		swal.close();
		total_devs+=parseFloat(importe);

		$("#totaldevs").empty().append("$"+parseFloat(total_devs).toFixed(2));
		imprimir_ticket3(concepto,"Total:        $"+addCommas(parseFloat(importe).toFixed(2)),"");
		swal({

			type: 'success',
			title: "<p id='pswal'>Devolucion realizada</p>",
			html: "<p id='psswal'> El administrador sera notificado en breve.</p>",
			confirmButtonText: 'Aceptar',
			showCancelButton: false,
			cancelButtonText: 'Cancelar',

		}).then((result) => {

		});
	});
}
