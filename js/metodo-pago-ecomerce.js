var deviceSessionId = "";
var total;
$(document).ready(function () {
    mostrar();
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

function datostTar() {
    var nombret = $('#nombre_tarjeta').val();
    var numt = $('#numero_tarjeta').val();
    var mest = $('#mes_vencimiento_tarjeta').val();
    var añot = $('#ano_vencimiento_tarjeta').val();
    var codigost = $('#cvv_tarjeta').val();

    localStorage.setItem('nombretar', nombret);
    localStorage.setItem('numerotar', numt);
    localStorage.setItem('mescadtar', mest);
    localStorage.setItem('anocadtar', añot);
    localStorage.setItem('codsegtar', codigost);

    location.href = "resumen.php"
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

    location.href = "tarjetas-ecomerce.php"

}

function mostrar() {
    $('#direccion').text(localStorage.getItem('direccion'));
    $('#col').text(localStorage.getItem('colonia'));
    $('#ciudad').text(localStorage.getItem('municipio'));
    $('#psotal').text(localStorage.getItem('codigop'));
    $('#estados').text(localStorage.getItem('estado'));
    $('#nombreuser').text(localStorage.getItem('nombretar'));
    $('#tarnumero').text(localStorage.getItem('numerotar').substring(12, 16));
    $('#mestar').text(localStorage.getItem('mescadtar'));
    $('#anotar').text(localStorage.getItem('anocadtar'));

    $('#nomtarenv').val(localStorage.getItem('anocadtar'));
    $('#numtarenv').val(localStorage.getItem('numerotar'));
    $('#mestarenv').val(localStorage.getItem('mescadtar'));
    $('#anotarenv').val(localStorage.getItem('anocadtar'));
    $('#ccvtar').val(localStorage.getItem('codsegtar'));

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
            nombre: localStorage.getItem('nombretar'),
            apellido: localStorage.getItem('nombretar'),
            telefono: '0000000000',
            correo: 'powergolden01@gmail.com',
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
                    location.reload();
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                })
                    .then((ok) => {
                        if (ok) {
                            location.reload();
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
};