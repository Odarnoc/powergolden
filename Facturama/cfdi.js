var newCfdi = {
    "Serie": "",
    "Currency": "MXN",
    "ExpeditionPlace": "45900",
    "PaymentConditions": "Producto Liquidado",
    "CfdiType": "I",
    "PaymentForm": "03",
    "PaymentMethod": "PUE",
    "Receiver": {
        "Rfc": "XAXX010101000",
        "Name": "RADIAL SOFTWARE SOLUTIONS",
        "CfdiUse": "P01"
    },
    "Items": [
    {
        "ProductCode": "50171550",
        "IdentificationNumber": "No aplica",
        "Description": "Estudios de viabilidad",
        "Unit": "NO APLICA",
        "UnitCode": "MTS",
        "UnitPrice": 50.0,
        "Quantity": 2.0,
        "Subtotal": 100.0,
        "Taxes": [{
            "Total": 16.0,
            "Name": "IVA",
            "Base": 100.0,
            "Rate": 0.16,
            "IsRetention": false
        }],
        "Total": 116.0
    }]
};

var newClient = {
    "Email": "pruebas@gmail.com",
    "Address": {
        "Street": "Av Seguridad Soc",
        "ExteriorNumber": "123",
        "InteriorNumber": "",
        "Neighborhood": "Fidel Velazquez",
        "ZipCode": "",
        "Locality": "",
        "Municipality": "Soledad de Graciano Sánchez",
        "State": "San Luis Potosí",
        "Country": "Mex"
    },
    "Rfc": "ROAM861021459",
    "Name": "Manuel Romero Alva",
    "CfdiUse": "P01",
};

var clientUpdate;

function testCRUDCfdi() {
	var cfdi;
	//creacion de un CFDI con error
	Facturama.Cfdi.Create(newCfdi, function(result){ 
		cfdi = result;
		console.log("creacion",result);
    
	}, function(error) {
		if (error && error.responseJSON) {
            console.log("errores", error.responseJSON);
        }		
	});


	//creacion de un cfdi
	newCfdi.ExpeditionPlace = "78116";
	Facturama.Cfdi.Create(newCfdi, function(result){ 
		cfdi = result;
		console.log("creacion",result);
    
	    //enviar el cfdi al cliente
		//var email = "norma@facturama.com.mx";
		var email = "chucho@facturama.mx";
	    var type = "issued";
	    Facturama.Cfdi.Send("?cfdiType=" + type + "&cfdiId=" + cfdi.Id + "&email=" + email, function(result){ 
			console.log("envio", result);
		});

		//descargar el PDF del cfdi
		Facturama.Cfdi.Download("pdf", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/pdf');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
		});

		//descargar el XML del cfdi
		Facturama.Cfdi.Download("xml", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/xml');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
		});


		// //obtener todos los cfdi con cierto rfc
		var rfc = "XEXX010101000";
		Facturama.Cfdi.List("?type=issued&keyword=" + rfc, function(result){ 
			clientUpdate = result;
			console.log("todos",result);
		});

		//eliminar el cfdi creado
		Facturama.Cfdi.Cancel(cfdi.Id + "?type=issued", function(result){ 
			console.log("eliminado",result);
		});

	}, function(error) {
		if (error && error.responseJSON) {
            console.log("errores", error.responseJSON);
        }
		
	});
}

function converBase64toBlob(content, contentType) {
	contentType = contentType || '';
	var sliceSize = 512;
	var byteCharacters = window.atob(content); //method which converts base64 to binary
	var byteArrays = [];

	for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
		var slice = byteCharacters.slice(offset, offset + sliceSize);
		var byteNumbers = new Array(slice.length);
		for (var i = 0; i < slice.length; i++) {
	  		byteNumbers[i] = slice.charCodeAt(i);
		}
		var byteArray = new Uint8Array(byteNumbers);
		byteArrays.push(byteArray);
	}

	var blob = new Blob(byteArrays, {type: contentType}); //statement which creates the blob
	return blob;
}



function obtenerBusqueda(){
	
	// //obtener todos los cfdi con cierto rfc
		var rfc = $("#searchRfc").val();
		Facturama.Cfdi.List("?type=issued&keyword=" + rfc, function(result){ 
		

var con="";
		for(var i=0;i<result.length;i++){
			var n=result[i];
			con+="<tr><td>"+n.Id+"</td><td>"+n.CfdiType+"</td><td>"
		+n.Folio+"</td><td>"+n.Serie+"</td><td>"+
		n.TaxName+"</td><td>"+n.Rfc+"</td><td>"+n.Date+"</td><td>"+
		n.Subtotal+"</td><td>"+n.Total+"</td><td>"+n.Email+"</td><td>"+
		n.PaymentMethod+"</td><td><button type='button' class='btn btn-default' aria-label='Left Align' onclick=\"imprimirFactura(\'"+n.Id+"\');\"><span class='glyphicon glyphicon-save-file' aria-hidden='true' ></span></button></td><td></td></tr>";
		}
		
		$("#contenido").html("");	
		$("#contenido").append(con);	
		//paginador
 $('#tabla').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:50});		
			
			
			//console.log("todos",result);
		});
	
	return false;
}

function obtenerTodos(){
	
	// //obtener todos los cfdi con cierto rfc
		var rfc = "";
		Facturama.Cfdi.List("?type=issued" + rfc, function(result){ 
		

var con="";
		for(var i=0;i<result.length;i++){
			var n=result[i];
			con+="<tr><td>"+n.Id+"</td><td>"+n.CfdiType+"</td><td>"
		+n.Folio+"</td><td>"+n.Serie+"</td><td>"+
		n.TaxName+"</td><td>"+n.Rfc+"</td><td>"+n.Date+"</td><td>"+
		n.Subtotal+"</td><td>"+n.Total+"</td><td>"+n.Email+"</td><td>"+
		n.PaymentMethod+"</td><td><button type='button' class='btn btn-default' aria-label='Left Align' onclick=\"imprimirFactura(\'"+n.Id+"\');\"><span class='glyphicon glyphicon-save-file' aria-hidden='true' ></span></button></td><td></td></tr>";
		}
		
		$("#contenido").html("");	
		$("#contenido").append(con);	
		//paginador
 $('#tabla').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:50});		
			
			
			//console.log("todos",result);
		});
	
	
}

function imprimirFactura(id){
	//descargar el PDF del cfdi
		Facturama.Cfdi.Download("pdf", "issued", id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/pdf');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
		});
	
	
}

function crearFactura(){
var tipoCFDI=$('#tipo').val();
var formaPago=$('#forma').val();
var metodoPago=$('#metodo').val();

console.log(tipoCFDI+".."+formaPago+".."+metodoPago);

var rfc=$('#rfc').val();
var nombre=$('#nombre').val();
var email=$('#email').val();
var domicilio=$('#domicilio').val();
var numero=$('#numero').val();
var municipio=$('#municipio').val();
var estado=$('#estado').val();
var pais=$('#pais').val();
var usoCFDI=$('#uso').val();

console.log(rfc+".."+nombre+".."+email+".."+domicilio+".."+numero+".."+estado+".."+pais+".."+usoCFDI);

var descripcion=$('#descripcion').val();
var precio=$('#precio').val();
var cantidad=$('#cantidad').val();
var subtotal=$('#subtotal').val();
var total=$('#total').val();


console.log(descripcion+".."+precio+".."+cantidad);

newCfdi["CfdiType"]=tipoCFDI;
newCfdi["PaymentForm"]=formaPago;
newCfdi["PaymentMethod"]=metodoPago;

newCfdi["Receiver"].Rfc=rfc;
newCfdi["Receiver"].Name=nombre;
newCfdi["Receiver"].CfdiUse=usoCFDI;



newCfdi["Items"][0].UnitPrice=parseFloat(precio);
newCfdi["Items"][0].Quantity=parseFloat(cantidad);
newCfdi["Items"][0].Subtotal=parseFloat(subtotal);
newCfdi["Items"][0].Total=parseFloat(total);
newCfdi["Items"][0].Description=descripcion;

newCfdi["Items"][0].Taxes[0].Total=parseFloat($('#iva').val());
newCfdi["Items"][0].Taxes[0].Base=parseFloat(subtotal);
newCfdi["Items"][0].Taxes[0].Rate=0.16;


console.log(newCfdi);

newClient["Email"]=email;
newClient["Address"].Street=domicilio;
newClient["Address"].ExteriorNumber=numero;
newClient["Address"].Neighborhood=domicilio;
newClient["Address"].Municipality=municipio;
newClient["Address"].State=estado;
newClient["Rfc"]=rfc;
newClient["Name"]=nombre;
newClient["CfdiUse"]=usoCFDI;




console.log(newClient);




	var client;
	//creacion de un cliente
	Facturama.Clients.Create(newClient, function(result){ 
		client = result;
		console.log("creacion",result);
    
	  
	//creacion de un cfdi
	newCfdi.ExpeditionPlace = "45900";
	Facturama.Cfdi.Create(newCfdi, function(result){ 
		cfdi = result;
		console.log("creacion",result);
    
	    
	    var type = "issued";
	    Facturama.Cfdi.Send("?cfdiType=" + type + "&cfdiId=" + cfdi.Id + "&email=" + email, function(result){ 
			console.log("envio", result);
		});

		//descargar el PDF del cfdi
		Facturama.Cfdi.Download("pdf", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/pdf');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
			$('#exampleModal').modal('hide');
		});

		//descargar el XML del cfdi
		Facturama.Cfdi.Download("xml", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/xml');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
			location.reload();
			
		});


	}, function(error) {
		if (error && error.responseJSON) {
			
			 $("#error").show();
            console.log("errores", error.responseJSON);
        }
		
	});

	

//aqui termina crear cliente
	}, function(error) {
		if (error && error.responseJSON) {
			$("#error").show();
            console.log("errores", error.responseJSON);
        }
		
	});


	
return false;	
}



//englobado todo en un solo concepto
function newFactura(rfc,nombre,email,domicilio,numero,municipio,estado,pais,descripcion,preciounitario,cantidad,subtotal,total,ivacobrado){
var tipoCFDI="I";
var formaPago="99";
var metodoPago="PUE";

console.log(tipoCFDI+".."+formaPago+".."+metodoPago);

var usoCFDI="P01";

console.log(rfc+".."+nombre+".."+email+".."+domicilio+".."+numero+".."+estado+".."+pais+".."+usoCFDI);

var descripcion=descripcion;
var precio=preciounitario;
var cantidad=cantidad;
var subtotal=subtotal;
var total=total;


console.log(descripcion+".."+precio+".."+cantidad);

newCfdi["CfdiType"]=tipoCFDI;
newCfdi["PaymentForm"]=formaPago;
newCfdi["PaymentMethod"]=metodoPago;

newCfdi["Receiver"].Rfc=rfc;
newCfdi["Receiver"].Name=nombre;
newCfdi["Receiver"].CfdiUse=usoCFDI;



newCfdi["Items"][0].UnitPrice=parseFloat(precio);
newCfdi["Items"][0].Quantity=parseFloat(cantidad);
newCfdi["Items"][0].Subtotal=parseFloat(subtotal);
newCfdi["Items"][0].Total=parseFloat(total);
newCfdi["Items"][0].Description=descripcion;

newCfdi["Items"][0].Taxes[0].Total=parseFloat(ivacobrado);
newCfdi["Items"][0].Taxes[0].Base=parseFloat(total);
newCfdi["Items"][0].Taxes[0].Rate=0.16;


console.log(newCfdi);

newClient["Email"]=email;
newClient["Address"].Street=domicilio;
newClient["Address"].ExteriorNumber=numero;
newClient["Address"].Neighborhood=domicilio;
newClient["Address"].Municipality=municipio;
newClient["Address"].State=estado;
newClient["Rfc"]=rfc;
newClient["Name"]=nombre;
newClient["CfdiUse"]=usoCFDI;




console.log(newClient);




	var client;
	//creacion de un cliente
	Facturama.Clients.Create(newClient, function(result){ 
		client = result;
		console.log("creacion",result);
    
	  
	//creacion de un cfdi
	newCfdi.ExpeditionPlace = "45900";
	Facturama.Cfdi.Create(newCfdi, function(result){ 
		cfdi = result;
		console.log("creacion",result);
    
	    
	    var type = "issued";
	    Facturama.Cfdi.Send("?cfdiType=" + type + "&cfdiId=" + cfdi.Id + "&email=" + email, function(result){ 
			console.log("envio", result);
		});

		//descargar el PDF del cfdi
		Facturama.Cfdi.Download("pdf", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/pdf');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
			$('#exampleModal').modal('hide');
		});

		//descargar el XML del cfdi
		Facturama.Cfdi.Download("xml", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/xml');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
			//location.reload();
			
		});


	}, function(error) {
		if (error && error.responseJSON) {
			
			 $("#error").show();
            console.log("errores", error.responseJSON);
        }
		
	});

//aqui termina crear cliente
	}, function(error) {
		if (error && error.responseJSON) {
			$("#error").show();
            console.log("errores", error.responseJSON);
        }
		
	});

return false;	
}



//englobado todo en varios conceptos
function newFacturaMulti(rfc,nombre,email,domicilio,numero,municipio,estado,pais,conceptos){
var tipoCFDI="I";
var formaPago="99";
var metodoPago="PUE";

console.log(tipoCFDI+".."+formaPago+".."+metodoPago);

var usoCFDI="P01";

console.log(rfc+".."+nombre+".."+email+".."+domicilio+".."+numero+".."+estado+".."+pais+".."+usoCFDI);

var descripcion=descripcion;
var precio=preciounitario;
var cantidad=cantidad;
var subtotal=subtotal;
var total=total;


console.log(descripcion+".."+precio+".."+cantidad);

newCfdi["CfdiType"]=tipoCFDI;
newCfdi["PaymentForm"]=formaPago;
newCfdi["PaymentMethod"]=metodoPago;

newCfdi["Receiver"].Rfc=rfc;
newCfdi["Receiver"].Name=nombre;
newCfdi["Receiver"].CfdiUse=usoCFDI;


<<<<<<< HEAD
=======
descripcion,preciounitario,cantidad,subtotal,total,ivacobrado


>>>>>>> 48f02c733cba8cd21a2821000aec2720cbbf195c

for(var n1=0;n1<conceptos.length;n1++){
 
newCfdi["Items"][n1].UnitPrice=parseFloat(conceptos[n1].preciounitario);
newCfdi["Items"][n1].Quantity=parseFloat(conceptos[n1].cantidad);
newCfdi["Items"][n1].Subtotal=parseFloat(conceptos[n1].subtotal);
newCfdi["Items"][n1].Total=parseFloat(conceptos[n1].total);
newCfdi["Items"][n1].Description=conceptos[n1].descripcion;

newCfdi["Items"][n1].Taxes[0].Total=parseFloat(conceptos[n1].ivacobrado);
newCfdi["Items"][n1].Taxes[0].Base=parseFloat(conceptos[n1].subtotal);
newCfdi["Items"][n1].Taxes[0].Rate=0.16;

}





console.log(newCfdi);

newClient["Email"]=email;
newClient["Address"].Street=domicilio;
newClient["Address"].ExteriorNumber=numero;
newClient["Address"].Neighborhood=domicilio;
newClient["Address"].Municipality=municipio;
newClient["Address"].State=estado;
newClient["Rfc"]=rfc;
newClient["Name"]=nombre;
newClient["CfdiUse"]=usoCFDI;




console.log(newClient);




	var client;
	//creacion de un cliente
	Facturama.Clients.Create(newClient, function(result){ 
		client = result;
		console.log("creacion",result);
    
	  
	//creacion de un cfdi
	newCfdi.ExpeditionPlace = "45900";
	Facturama.Cfdi.Create(newCfdi, function(result){ 
		cfdi = result;
		console.log("creacion",result);
    
	    
	    var type = "issued";
	    Facturama.Cfdi.Send("?cfdiType=" + type + "&cfdiId=" + cfdi.Id + "&email=" + email, function(result){ 
			console.log("envio", result);
		});

		//descargar el PDF del cfdi
		Facturama.Cfdi.Download("pdf", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/pdf');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
			$('#exampleModal').modal('hide');
		});

		//descargar el XML del cfdi
		Facturama.Cfdi.Download("xml", "issued", cfdi.Id, function(result){
			console.log("descarga",result);

			blob = converBase64toBlob(result.Content, 'application/xml');

			var blobURL = URL.createObjectURL(blob);
			window.open(blobURL);
			location.reload();
			
		});


	}, function(error) {
		if (error && error.responseJSON) {
			
			 $("#error").show();
            console.log("errores", error.responseJSON);
        }
		
	});

//aqui termina crear cliente
	}, function(error) {
		if (error && error.responseJSON) {
			$("#error").show();
            console.log("errores", error.responseJSON);
        }
		
	});

return false;	
}








function cambiarCantidades(){
var precio=parseFloat($('#precio').val());
var cantidad=parseFloat($('#cantidad').val());
	
	if(precio>0 && cantidad >0){
		var subtotal=precio*cantidad;
		var iva=subtotal*0.16;
		var total=subtotal+iva;
		$('#subtotal').val(subtotal);
		$('#iva').val(iva);
		$('#total').val(total);
		
		
	}
	
}


  
        