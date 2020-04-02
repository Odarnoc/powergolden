var carrito = JSON.parse(localStorage.getItem('carrito'));
var total = 0;
var iduser;
$(document).ready(function() {
    pintarCarrito();
});

function pintarCarrito() {
    console.log(carrito);

    var listaProds = "";
    total = 0;
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
            '<div class="input-group mb-3">'+
            '<div class="input-group-prepend">'+
            '<button class="btn btn-dark btn-sm" id="minus-btn" onclick="res(\'' + index + '\')"><i class="fa fa-minus"></i></button>'+
            '</div>'+
            '<input type="number" id="cantProdsEdit' + index + '" onchange="editarCant(\'' + index + '\')" class="form-control form-control-sm" value="' + item.cant + '" min="1">'+
            '<div class="input-group-prepend">'+
            '<button class="btn btn-dark btn-sm" id="plus-btn" onclick="sum(\'' + index + '\')"><i class="fa fa-plus"></i></button>'+
            '</div>'+
            '</div>'+
            '</div>' +
            '</div>' +
            '<button class="btn btn-link-carrito" onclick="eliminar(\'' + index + '\')" role="button">Eliminar producto</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        listaProds += html;
        total += totalTemp;
    });
    $('#lista-productos').empty();
    $('#lista-productos').append(listaProds);
    $('#cantProds').text('(' + carrito.length + ')');
    $('#total').text('$' + total);
    $('#total2').text('$' + total);
}

function editarCant(index) {
    console.log(index);
    var nuevaCantidad = $('#cantProdsEdit' + index).val();
    carrito[index].cant = nuevaCantidad;
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

function sum(index){
        carrito[index].cant = parseInt(carrito[index].cant)+1;
        pintarCarrito();
}

function res(index){
    if(carrito[index].cant > 1){
        carrito[index].cant = parseInt(carrito[index].cant)-1;
        pintarCarrito();
    }
    
}

function comrpaslindas(){ 
    console.log(iduser);
    if(iduser == undefined){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "Iniciar secion para continuar la compra."
        });
    }else{
        location.href="nuevo-envio-ecomerce.php";
    }
}