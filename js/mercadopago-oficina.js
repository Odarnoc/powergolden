var total = 0;

$(document).ready(function () {
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
        window.Mercadopago.getPaymentMethod(
            {
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
    window.Mercadopago.getInstallments(
        {
            payment_method_id: document.getElementById("payment_method_id").value,
            amount: parseFloat(document.getElementById("transaction_amount").value)
        },
        function (status, response) {
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

$("#pay").submit(function (event) {
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
        var data = $("#pay").serializeArray();
        data.push({ 'carrito': JSON.parse(localStorage.getItem('carrito-oficina')).carrito, 'usuariid': id, "email": localStorage.getItem('correo') });
        $.ajax({
            url: "ajax/mercado-pago.php",
            type: "post",
            data: data,
            dataType: "html",
            success(data) {
                console.log(data);
                Mercadopago.clearSession();
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Compra exitosa!'
                })
                    .then((ok) => {
                        if (ok) {
                            //localStorage.clear();
                            //localStorage.setItem('carrito-oficina', JSON.stringify([]));
                            //location.href = "oficina-virtual.php";
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
}

function enviar_pago_oxxo() {
    datosuser();
    console.log(JSON.parse(localStorage.getItem('carrito-oficina')).carrito);
    
    $.ajax({
        url: "ajax/pago-ecomerce-oxxo.php",
        type: "post",
        data: { transaction_amount: localStorage.getItem('totalgen'), email: correo, usuariid: id, carrito: JSON.parse(localStorage.getItem('carrito')), },
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
                        //localStorage.clear();
                        //localStorage.setItem('carrito-oficina', JSON.stringify([]));
                        //location.href = "oficina-virtual.php";
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

    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: total
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Compra exitosa!'
            })
                .then((ok) => {
                    if (ok) {
                        //localStorage.clear();
                        //localStorage.setItem('carrito-oficina', JSON.stringify([]));
                        //location.href = "oficina-virtual.php";
                    }
                });
        });
    }
}).render('#paypal-button-container');