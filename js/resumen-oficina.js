var carrito = JSON.parse(localStorage.getItem('carrito-oficina'));
var total = 0;
var descuento = 0;
var totalOri = 0;
$(document).ready(function () {
    carrito = JSON.parse(localStorage.getItem('carrito-oficina'));
    datosuser();
    pintarCarrito();
});

function pintarCarrito() {
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
    carrito.paquetes.forEach(function (item, index) {

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
    superior += sup;
    total -= descuento;
    localStorage.setItem('totalgen', total + total * 16 / 100);
    $('#totalgeneral').text(total + total * 16 / 100);
    $('#lista-productos').empty();
    $('#lista-superior').append(superior);
    $('#lista-productos').append(listaProds);
    $('#ton').text(totalOri);
}