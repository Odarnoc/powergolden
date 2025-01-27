var carrito = JSON.parse(localStorage.getItem('carrito'));
var total = 0;
var descuento = localStorage.getItem("descuento");
var totalOri = 0;
var envcos = 0;

$(document).ready(function() {
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
    carrito.forEach(function(item, index) {

        var totalTemp = parseFloat(item.precio) * parseInt(item.cant);
        var html =
            '<tr>' +
            '<td class="td-img-review"><img class="img-table-review" src="productos_img/' + item.imagen + '" alt=""></td>' +
            '<td class="td-producto-review">' +
            '<p>' + item.nombre + '<br><b class="b1"><span  style="color:' + item.color + '">' + item.linea + '</span></b><br></p>' +
            '</td>' +
            '<td class="td-precio-review" valign="center">$' + item.precio + '</td>' +
            '<td class="td-cantidad-review">' + item.cant + '</td>' +
            '<td class="td-total-review">$' + totalTemp + '</td>' +
            '</tr>';
        listaProds += html;
        total += totalTemp;
        totalOri += totalTemp;
    });
    enviar()
    superior += sup;
    total -= descuento;
    localStorage.setItem('totalgen', total + envcos);
    $('#totalgeneral').text(total + envcos);
    $('#lista-productos').empty();
    $('#lista-superior').append(superior);
    $('#lista-productos').append(listaProds);
    $('#iva').append(total * 16 / 100);
    $('#tdesc').text(descuento);
    $('#ton').text(totalOri - total * 16 / 100);
    $('#env').text(envcos);
}

function enviar() {
    if (localStorage.getItem('sucursal_id') != 0) {
        document.getElementById("txenv").style.display = "none";
    } else {
        envcos = 300;
    }
}