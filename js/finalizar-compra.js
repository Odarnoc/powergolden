var carrito = JSON.parse(localStorage.getItem('carrito'));
var total = 0;

function confirmarCompra() {
    $.ajax({
        url: 'ajax/realizarCompra.php',
        data: { carrito: carrito, total: total },
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                console.log(respuesta);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje,
                })
                .then((ok) => {
                    if (ok) {
                        localStorage.removeItem('carrito'),
                        location.href="historial-ecomerce.php"
                    }
                });
            }
        },
        error: function(er) {
            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            });
        }
    });
}

function envio() {
    var direccion = $("#direccion").val();
    var ciudad = $("#ciudad").val();
    var codigo = $("#codigo").val();
    var colonia = $("#colonia").val();
    var estado = $("#estado").val();
    var nombre = $("#nombre").val();
    var telefono = $("#telefono").val();

    let datos = {
        
            "enviaya_account": "J83OOX7Q",
            "carrier_account": null,
            "api_key":"77517a8d6d9386daea24298d5ea6558d",
            "carrier":"Estafeta",
            "carrier_service_code":"70",
            "origin_direction": {
                "full_name": "PowerGolden Service",
                "country_code":"MX",
                "postal_code":"44520",
                "direction_1":"Firmamento 670 Jardines del Bosque",
                "city": "Guadalajara",
                "phone": "3315585421",
                "state_code": "JAL",
                "neighborhood": "Neighborhood"
            },
            "destination_direction": {
                "company": nombre,
                "country_code":"MX",
                "postal_code":codigo,
                "direction_1": direccion,
                "city": ciudad,
                "phone": telefono,
                "state_code":estado,
                "neighborhood": colonia
            },
            "shipment": {
                "shipment_type": "Package",
                "insured_value": 200,
                "insured_value_currency": "MXN",
                "content": "Productos comerciales",
                "parcels":[
                    {
                    "quantity": 5,
                    "weight": 2,
                    "length": 2,
                    "height": 2,
                    "width": 2,
                    "weight_unit": "kg"
                    }
                ]
            },
            "label_format": "Letter"
    }
    
    console.log(datos);

    $.ajax({
        url: 'https://enviaya.com.mx/api/v1/shipments',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(json_mensaje);
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);
        }
    });
}