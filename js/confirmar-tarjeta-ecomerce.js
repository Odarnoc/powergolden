var deviceSessionId = "";

$(document).ready(function () {
    OpenPay.setId('m1ob7biidxpcjepkiqw1');
    OpenPay.setApiKey('pk_c6f578b1dd4a463ca07f2b7a8ea0e87e');
    OpenPay.setSandboxMode(true);
    deviceSessionId = OpenPay.deviceData.setup(
        "payment-form",
        "deviceIdHiddenFieldName"
    );
});

$("#payment-forms").submit(function (event) {
    event.preventDefault();
    OpenPay.token.extractFormAndCreate(
        "payment-forms",
        success_callbakdos,
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

var success_callbakdos = function (response) {
    datostTar();
}