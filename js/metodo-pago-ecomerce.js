var deviceSessionId = "";
var total;
var nombre;
var apellidos;
var correo;
var telefono;
var id = 0;
var idusuario = 0;
$(document).ready(function () {
    datosuser();
    mostrar();
    OpenPay.setId('m1ob7biidxpcjepkiqw1');
    OpenPay.setApiKey('pk_c6f578b1dd4a463ca07f2b7a8ea0e87e');
    OpenPay.setSandboxMode(true);
    deviceSessionId = OpenPay.deviceData.setup(
        "payment-form",
        "deviceIdHiddenFieldName"
    );
});

$("#payment-formfinal").submit(function (event) {
    event.preventDefault();
    OpenPay.token.extractFormAndCreate(
        "payment-formfinal",
        success_callbak,
        error_callbak
    );
});

function datosuser() {
    $.ajax({
        url: "ajax/getdatos.php",
        type: "post",
        data: { id: iduser },
        success: function (respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            id = json_mensaje['id'];
            nombre = json_mensaje['nombre'];
            apellidos = json_mensaje['apellidos'];
            correo = json_mensaje['correo'];
            telefono = json_mensaje['telefono'];
            iduse = json_mensaje['id'];
        },
    });
}

function datosDireccion() {
    var dir = $("#direccion").val();
    var cp = $("#cp").val();
    var col = $("#colo").val();
    var mun = $("#muni").val();
    var est = $("#estado").val();

    localStorage.setItem('direccion', dir);
    localStorage.setItem('codigop', cp);
    localStorage.setItem('colonia', col);
    localStorage.setItem('municipio', mun);
    localStorage.setItem('estado', est);

    location.href = "resumen.php"

}

function mostrar() {
    $('#direccion').text(localStorage.getItem('direccion'));
    $('#col').text(localStorage.getItem('colonia'));
    $('#ciudad').text(localStorage.getItem('municipio'));
    $('#psotal').text(localStorage.getItem('codigop'));
    $('#estados').text(localStorage.getItem('estado'));
    $('#nombreuser').text(nombre);
}

var success_callbak = function (response) {
    var token_id = response.data.id;
    $('#token_id').val(token_id);
    console.log(token_id);
    $.ajax({
        url: "ajax/pago-ecomerce.php",
        type: "post",
        data: {
            carrito: JSON.parse(localStorage.getItem('carrito')),
            total: localStorage.getItem('totalgen'),
            id: iduse,
            nombre: nombre,
            apellido: apellidos,
            telefono: telefono,
            correo: correo,
            token_id: token_id,
            deviceIdHiddenFieldName: deviceSessionId
        },
        success: function (respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                setTimeout(function () {
                    localStorage.clear();
                    localStorage.setItem('carrito', JSON.stringify([]));
                    location.href = "carrito-ecomerce.php";
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                })
                    .then((ok) => {
                        if (ok) {
                            localStorage.clear();
                            localStorage.setItem('carrito', JSON.stringify([]));
                            location.href = "carrito-ecomerce.php";
                        }
                    });
            }
        },

        error: function (er) {

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

var error_callbak = function (response) {
    var desc = response.data.description != undefined ?
        response.data.description : response.message;
    if (desc = "holder_name is required, card_number is required, expiration_year expiration_month is required") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ingrese todos los campos correctamente'
        })
            .then((ok) => {
                if (ok) {
                }
            });
    }
    if (desc = "The CVV2 security code is required") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ingrese el codigo de seguridad de la tarjeta'
        })
            .then((ok) => {
                if (ok) {
                }
            });
    }
    if (desc = "card_number must contain only digits") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El numero de la tarjeta solo debe contener digitos'
        })
            .then((ok) => {
                if (ok) {
                }
            });
    }
    if (desc = "card_number length is invalid") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La cantidad de numero de la tarjeta es incorrecto'
        })
            .then((ok) => {
                if (ok) {
                }
            });
    }
    if (desc = "The card number verification digit is invalid") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La tarjeta no es valida'
        })
            .then((ok) => {
                if (ok) {
                }
            });
    }
};

function referencia() {
    $.ajax({
        url: 'ajax/pago-referencia-ecomerce.php',
        type: "post",
        data: {
            carrito: JSON.parse(localStorage.getItem('carrito')),
            usuariid: id,
            nombre: nombre,
            apellido: apellidos,
            telefono: telefono,
            correo: correo,
            total: localStorage.getItem('totalgen'),
        },
        success(data) {
            console.log(data);
            swal.close();
            var datajson = JSON.parse(data)
            window.open(datajson.url_recibo);
            localStorage.clear();
            localStorage.setItem('carrito', JSON.stringify([]));
            location.href = "carrito-ecomerce.php";
        },
    });
}

/*function referenciaBanco() {
    $.ajax({
        url: 'ajax/pago-referencia-banco.php',
        type: "post",
        data: {
            usuariid: localStorage.getItem('id'),
            nombre: localStorage.getItem('nombre'),
            apellido: localStorage.getItem('apellidos'),
            telefono: localStorage.getItem('telefono'),
            correo: localStorage.getItem('correo'),
        },
        success(data) {
            console.log(data);
            swal.close();
            var datajson = JSON.parse(data)
            window.open(datajson.url_recibo);
            $("#modalGenerarReferencia").modal("hide");
        },
    });
}*/