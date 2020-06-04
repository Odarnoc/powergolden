var total = 0;

$(document).ready(function() {
    total = localStorage.getItem('totalgen');
});

window.Mercadopago.setPublishableKey(
    "APP_USR-7c786e56-33cf-4138-8b3e-ffdf10de9b3a"
);

window.Mercadopago.getIdentificationTypes();

document
    .getElementById("cardNumber")
    .addEventListener("keyup", guessPaymentMethod);
document
    .getElementById("cardNumber")
    .addEventListener("change", guessPaymentMethod);

function guessPaymentMethod(event) {
    let cardnumber = document.getElementById("cardNumber").value;

    if (cardnumber.length >= 6) {
        let bin = cardnumber.substring(0, 6);
        window.Mercadopago.getPaymentMethod({
                bin: bin
            },
            setPaymentMethod
        );
    }
}

function setPaymentMethod(status, response) {
    if (status == 200) {
        let paymentMethodId = response[0].id;
        let element = document.getElementById("payment_method_id");
        element.value = paymentMethodId;
        getInstallments();
    } else {
        alert(`payment method info error: ${response}`);
    }
}

function getInstallments() {
    window.Mercadopago.getInstallments({
            payment_method_id: document.getElementById("payment_method_id").value,
            amount: parseFloat(document.getElementById("transaction_amount").value)
        },
        function(status, response) {
            if (status == 200) {
                document.getElementById("installments").options.length = 0;
                response[0].payer_costs.forEach(installment => {
                    let opt = document.createElement("option");
                    opt.text = installment.recommended_message;
                    opt.value = installment.installments;
                    document.getElementById("installments").appendChild(opt);
                });
            } else {
                alert(`installments method info error: ${response}`);
            }
        }
    );
}

$("#pay").submit(function(event) {
    event.preventDefault();

    var $form = document.querySelector("#pay");

    window.Mercadopago.createToken($form, sdkResponseHandler);

    return false;
});

function sdkResponseHandler(status, response) {
    if (status != 200 && status != 201) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Verifica los datos de la tarjeta'
        });

    } else {
        $("#token").val(response.id);
        $("#transaction_amount").val(10);
        console.log(localStorage.getItem('carrito'));
        console.log(iduser);
        var datados = {
            'carrito': JSON.parse(localStorage.getItem('carrito')),
            'usuariid': iduser,
            "sucursal": localStorage.getItem('sucursal_id'),
            "email": "luis.edgar89@gmail.com",
            "transaction_amount": 1 /*localStorage.getItem('totalgen')*/ ,
            "direccion": localStorage.getItem('direccion'),
            "estado": localStorage.getItem('estado'),
            "cp": localStorage.getItem('codigop'),
            "ciudad": localStorage.getItem('municipio'),
            "colonia": localStorage.getItem('colonia'),
            "pais": localStorage.getItem('pais')
        };
        $("#pay").serializeArray().forEach((value, key) => { datados[value['name']] = value['value'] });
        $.ajax({
            url: "ajax/mercado-pago.php",
            type: "post",
            data: datados,
            dataType: "json",
            success(data) {
                var datatres = data;
                console.log(data);
                if (datatres['status'] == "approved") {
                    Mercadopago.clearSession();
                    Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Compra exitosa!'
                        })
                        .then((ok) => {
                            if (ok) {
                                localStorage.clear();
                                localStorage.setItem('carrito', JSON.stringify([]));
                                location.href = "index.php";
                            }
                        });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error al realizar la compra!'
                    });
                }
            },
            error(error) {

            }
        });
    }
}

function enviar_pago_oxxo() {
    datosuser();
    $.ajax({
        url: "ajax/pago-ecomerce-oxxo.php",
        type: "post",
        data: {
            transaction_amount: localStorage.getItem('totalgen'),
            sucursal: localStorage.getItem('sucursal_id'),
            email: correo,
            usuariid: id,
            carrito: JSON.parse(localStorage.getItem('carrito')),
            direccion: localStorage.getItem('direccion'),
            estado: localStorage.getItem('estado'),
            cp: localStorage.getItem('codigop'),
            ciudad: localStorage.getItem('municipio'),
            colonia: localStorage.getItem('colonia'),
            pais: localStorage.getItem('pais')
        },
        success(data) {
            console.log(data);
            swal.close();
            window.open(data, '_blank');
            Mercadopago.clearSession();
            Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Compra exitosa!'
                })
                .then((ok) => {
                    if (ok) {
                        localStorage.clear();
                        localStorage.setItem('carrito', JSON.stringify([]));
                        location.href = "index.php";
                    }
                });
        },
        error(error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error al realizar la compra!'
            });
        }
    });
}


paypal.Buttons({
    locale: 'es-MX',
    style: {
        shape: 'rect',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',
    },

    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: total
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Compra exitosa!'
                })
                .then((ok) => {
                    if (ok) {
                        localStorage.clear();
                        localStorage.setItem('carrito', JSON.stringify([]));
                        location.href = "index.php";
                    }
                });
        });
    }
}).render('#paypal-button-container');