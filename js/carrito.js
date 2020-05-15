var carrito = JSON.parse(localStorage.getItem('carrito'));
var total = 0;
var iduser;
var can = 0;
var promociones = [];
var mensaje = "";
var can_prod_final = 0;
var gratis = 0;
var prodcantidad;
var prodcant;
$(document).ready(function() {
    pintarCarrito();
    get_promociones_info();

});

function pintarCarrito() {
    console.log(carrito);

    var listaProds = "";
    total = 0;
    var canprodp = 0;
    var descuento = 0;
    var sumatorio = parseInt(prodcantidad) + parseInt(prodcant);
    carrito.forEach(function(item, index) {
        var totalTemp = parseFloat(item.precio) * parseInt(item.cant);
        var html = '<div class="d-item-carrito">' +
            '<div class="row">' +
            '<div class="col-lg-4 col-md-4 col-4">' +
            '<div class="d-img-carrito">' +
            '<img src="productos_img/' + item.imagen + '" alt="">' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-8 col-md-8 col-8">' +
            '<div class="d-info-carrito">' +
            '<p class="t1 one-line">' + item.nombre + '</p>' +
            '<p class="t2 one-line">' + item.descripcion + '</p>' +
            '<p class="t3">$' + item.precio + '</p>' +
            '<div class="row">' +
            '<div class="col-lg-6 col-md-6 col-6 col-8">' +
            '<div class="input-group mb-3">' +
            '<div class="input-group-prepend">' +
            '<button class="btn btn-dark btn-sm" id="minus-btn" onclick="res(\'' + index + '\')"><i class="fa fa-minus"></i></button>' +
            '</div>' +
            '<input type="number" id="cantProdsEdit' + index + '" onchange="editarCant(\'' + index + '\')" class="form-control form-control-sm" value="' + item.cant + '" min="1">' +
            '<div class="input-group-prepend">' +
            '<button class="btn btn-dark btn-sm" id="plus-btn" onclick="sum(\'' + index + '\')"><i class="fa fa-plus"></i></button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<button class="btn btn-link-carrito" onclick="eliminar(\'' + index + '\')" role="button">Eliminar producto</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        listaProds += html;
        canprodp += item.cant;
        total += totalTemp;
        var conteop = 0;
        var restarc = 0;
        for (var i = canprodp; i > 0; i--) {
            conteop++;
            console.log(canprodp);
            if (conteop == sumatorio) {
                total -= parseInt(item.precio) * parseInt(prodcant);
                restarc += sumatorio;
                conteop = 0;
                descuento += parseInt(item.precio) * parseInt(prodcant);
                console.log(descuento);
            }
        }
        canprodp -= restarc;

    });


    if (canprodp >= prodcantidad && canprodp < sumatorio) {
        $('#bcompra').prop('disabled', true);
        $('#ptext').show();
    } else {
        $('#bcompra').prop('disabled', false);
        $('#ptext').hide();;
    }

    $('#lista-productos').empty();
    $('#lista-productos').append(listaProds);
    $('#cantProds').text('(' + carrito.length + ')');
    $('#total').text('$' + total);
    $('#total2').text('$' + total);
    $('#gratis').text(prodcant);
    console.log(descuento);
    localStorage.setItem("descuento", descuento);
    can_prod_final = canprodp;
}

function editarCant(index) {
    console.log(index);
    var nuevaCantidad = $('#cantProdsEdit' + index).val();
    carrito[index].cant = nuevaCantidad;
    if (select_gratis && anterior < arreglo[id]) {
        gratis += parseFloat(arreglo[id]) - parseFloat(anterior);
    } else {
        cuenta -= price_out * anterior;
        cantidades =
            parseFloat(cantidades) - parseFloat(anterior) + parseFloat(arreglo[id]);
        cuenta += parseFloat(price_out * arreglo[id]);
    }
    localStorage.setItem('carrito', JSON.stringify(carrito));
    pintarCarrito();
}

function eliminar(index) {
    console.log(index);
    carrito.splice(parseInt(index), 1);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    pintarCarrito();
}

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
                    text: json_mensaje.mensaje
                });
                carrito = [];
                localStorage.setItem('carrito', JSON.stringify(carrito));
                pintarCarrito();
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

function sum(index) {
    carrito[index].cant = parseInt(carrito[index].cant) + 1;
    localStorage.setItem('carrito', JSON.stringify(carrito));
    pintarCarrito();
}

function res(index) {
    if (carrito[index].cant > 1) {
        carrito[index].cant = parseInt(carrito[index].cant) - 1;
        localStorage.setItem('carrito', JSON.stringify(carrito));
        pintarCarrito();
    }

}

function comrpaslindas() {
    console.log(promociones);
    if(carrito.length>0){
        var productos_descuento = 0;
        for (promo in promociones) {
            if (promociones[promo].tipo == 2) {
                if (can_prod_final / promociones[promo].desde >= 1) {
                    productos_descuento =
                        parseInt(can_prod_final / promociones[promo].desde) *
                        promociones[promo].cantidad;
                }
            }
        }

        if (productos_descuento != gratis) {
            mensaje +=
                "El cliente tiene (" + productos_descuento + ") productos gratis.";
            console.log(mensaje);

            valid = false;
        }

        if (iduser == undefined) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Iniciar secion para continuar la compra."
            });
        } else {
            location.href = "nuevo-envio-ecomerce.php";
        }
    }else{
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Agrega productos al carrito de compras."
            });
    }
    
}

function get_promociones_info() {
    $.ajax({
        url: "ajax/infor_promo.php",
        type: "POST",
        dataType: "json",
        beforeSend: function() {},
        success: function(data) {
            console.log(data);
            prodcantidad = data['desde'];
            prodcant = data['cantidad'];

        },
    });
}