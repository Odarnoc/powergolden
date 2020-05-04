var carrito = JSON.parse(localStorage.getItem('carrito-oficina'));
var total = 0;
var descuento = 0;
var totalOri = 0;
var cargo = 0;
var envcos = 0;

$(document).ready(function() {
    tiempo();
    carrito = JSON.parse(localStorage.getItem('carrito-oficina'));
    datosuser();
    mostrar();
});

function mostrar() {
    $('#direccion').text(localStorage.getItem('direccion'));
    $('#col').text(localStorage.getItem('colonia'));
    $('#ciudad').text(localStorage.getItem('municipio'));
    $('#psotal').text(localStorage.getItem('codigop'));
    $('#estados').text(localStorage.getItem('estado'));
    $('#nombreuser').text(nombre);
    envio();
}

function tiempo() {
    $.ajax({
        url: 'ajax/recuperacion.php',
        type: 'GET',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(json_mensaje);
            if (json_mensaje['requiere_reactivacion'] != false) {
                cargo = 500;
                console.log(cargo);
            } else {
                document.getElementsByName('recar')[0].style.display = 'none';
                document.getElementsByName('mensajeini')[0].style.display = 'none';
                console.log('hola');
            }
            pintarCarrito()
        },
    });
}

function pintarCarrito() {

    console.log(cargo);

    console.log(carrito);

    var listaProds = "";
    var superior = "";
    total = 0;

    var sup = '<tr>' +
        '<th></th>' +
        '<th class="th-producto-review">Producto</th>' +
        '<th class="th-precio-review">Precio</th>' +
        '<th class="th-cantidad-review">Cantidad</th>' +
        '<th class="th-total-review">Total</th>' +
        '</tr>';
    var categorio = "";
    carrito.paquetes.forEach(function(item, index) {

        var totalTemp = parseFloat(item.precio) * parseInt(item.cant);
        var html =
            '<tr>' +
            '<td class="td-img-review"></td>' +
            '<td class="td-producto-review">' +
            '<p>' + item.nombre + '</p>' +
            '</td>' +
            '<td class="td-precio-review" valign="center">$' + item.precio + '</td>' +
            '<td class="td-cantidad-review">' + item.cant + '</td>' +
            '<td class="td-total-review">$' + totalTemp + '</td>' +
            '</tr>';
        listaProds += html;
        total += totalTemp;
        totalOri += totalTemp;
    });
    envio();
    superior += sup;
    total -= descuento;
    localStorage.setItem('totalgen', total + envcos + cargo + total * 16 / 100);
    $('#totalgeneral').text(total + envcos + cargo + total * 16 / 100);
    $('#lista-productos').empty();
    $('#lista-superior').append(superior);
    $('#lista-productos').append(listaProds);
    $('#ton').text(totalOri);
    $('#env').text(envcos);
}

function envio() {
    kit = JSON.parse(localStorage.getItem('carrito-oficina')).paquetes;
    console.log(kit[0]['id']);
    if (kit[0]['id'] != 2) {
        envcos = 300;
    } else {
        envcos = 200;
    }
}