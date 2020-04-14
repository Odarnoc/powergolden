var deviceSessionId = "";
var nombre;
var apellidos;
var telefono;
var correo;
var id;

$(document).ready(function () {
    OpenPay.setId('m1ob7biidxpcjepkiqw1');
    OpenPay.setApiKey('pk_c6f578b1dd4a463ca07f2b7a8ea0e87e');
    OpenPay.setSandboxMode(true);
    deviceSessionId = OpenPay.deviceData.setup(
        "payment-form",
        "deviceIdHiddenFieldName"
    );
    console.log(deviceSessionId);
    console.log("REady");
});

$("#payment-form").submit(function (event) {
    event.preventDefault();
    console.log(deviceSessionId);
    OpenPay.token.extractFormAndCreate(
        "payment-form",
        success_callbak,
        error_callbak
    );
});
    /*Infomracion de Clientes*/
function infocliente() {
    let data = {
        correo: $('#correore').val(),
        id: $('#codigore').val()
    };
    $.ajax({
        url: 'ajax/info-cliente.php',
        data: data,
        type: 'POST',
        success: function (respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            var nombre = json_mensaje['nombre'];
            var telefono = json_mensaje['telefono'];
            var correo = json_mensaje['correo'];
            var id = json_mensaje['id'];
            var apellidos = json_mensaje['apellidos'];
            console.log();
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                localStorage.setItem('nombre', nombre);
                localStorage.setItem('telefono', telefono);
                localStorage.setItem('correo', correo);
                localStorage.setItem('id', id);
                localStorage.setItem('apellidos', apellidos);
            }
        },
    });
}

/* Pago con Tarjeta OpenPay*/
var success_callbak = function (response) {
    var token_id = response.data.id;
    $('#token_id').val(token_id);
    console.log(token_id);
    $.ajax({
        url: "ajax/pago.php",
        type: "post",
        data: {
            usuariid: localStorage.getItem('id'),
            nombre: localStorage.getItem('nombre'),
            apellido: localStorage.getItem('apellidos'),
            telefono: localStorage.getItem('telefono'),
            correo: localStorage.getItem('correo'),
            token_id: token_id,
            deviceIdHiddenFieldName: deviceSessionId
        },
    });
    setTimeout(function () {
        location.href = 'iniciar-sesion-oficina.php';
        storage.clear();
    }, 5000);
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: 'Su cuenta ha sido restaurada correctamente'
    })
        .then((ok) => {
            if (ok) {
                location.href = 'iniciar-sesion-oficina.php';
                storage.clear();
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
                    location.reload();
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
                    location.reload();
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
                    location.reload();
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
                    location.reload();
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
                    location.reload();
                }
            });
    }
};

function enviar() {
    location.href = 'recuperar-cuenta.php';
}

/*Referenia Tiendas OpenPay*/
function referencia() {
    $.ajax({
        url: 'ajax/pago-referencia.php',
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
            var datajson = JSON.parse(data);
            window.open(datajson.url_recibo);
            location.reload();
        },
    });
}

/*Referencia Bancara OpenPay*/
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

