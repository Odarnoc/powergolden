var server = "";
var username = "";
var userid = "";
var cuenta = 0;
var contador = 0;
var productos = 0;
var cantidades = 0;
var type = 0;
var descuento = 0;
var arreglo = [];
var arreglo2 = [];
var paquetes = null;
var total_a = 0;
var deviceSessionId = "";
$(document).ready(function() {
  get_products_list();
  get_paquetes_info();
  OpenPay.setId("mcy7r4mints0e7y1nbko");
  OpenPay.setApiKey("pk_380557a00f6c4aae820e6b03ddabd20d");
  OpenPay.setSandboxMode(true);
  //Se genera el id de dispositivo
  deviceSessionId = OpenPay.deviceData.setup(
    "card_payment",
    "deviceIdHiddenFieldName"
  );

  
});
function cambio_tipo_venta() {
  if (cantidades != 0) {
    show_total();
  }
}

function get_paquetes_info() {
  $.ajax({
    url: server + "webserviceapp/get_paquetes.php",
    type: "POST",
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
      paquetes = data.arreglo;
      console.log(data.arreglo[2]);
      $("#tipo_venta").append(data.list);
    }
  });
}
function change_category(category) {
  type = category;
  get_products_list();
}
function get_products_list() {
  var search = $("#buscar").val();
  $.ajax({
    url: server + "webserviceapp/get_products.php",
    type: "POST",
    data: { product: search, category: type },
    dataType: "json",
    beforeSend: function() {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif"
      });
    },
    success: function(data) {
      swal.close();
      $("#rowproductos")
        .empty()
        .append(data.list);
    }
  });
}
$("#buscar").change(function(event) {
  get_products_list();
});
function cleanSale() {
  $("#tipo_venta").val(0);
  contador = 0;
  total_a = 0;
  cuenta = 0;
  productos = 0;
  cantidades = 0;
  arreglo = [];
  arreglo2 = [];
  $("#input-descuento").val("");
  $("#sector").val("");
  $("#tablacarrito > tbody").empty();
  show_total();
}
function agregarProducto(name, price_out, id) {
  ////console.log("Aqui ando");
  if (arreglo2[id] != 1) {
    $("#tablacarrito > tbody").append(
      ' <tr id="' +
        contador +
        '">\
		<td style="display:none">' +
        id +
        '</td>\
		<td style="display:none">' +
        price_out +
        '</td>\
		<td class="td-producto-pos">' +
        name +
        ' </td>\
		<td class="td-cantidad-pos"><input type="number" id="' +
        contador +
        'input" onchange="cambiar_cantidad(\'' +
        contador +
        "','" +
        price_out +
        '\')" class="form-control input-cant-pos" value="1" min="1" max="500" step="1" /></td>\
		<td class="td-precio-pos">$' +
        parseFloat(price_out).toFixed(2) +
        '</td>\
		<td class="td-eliminar-pos"><button type="button" onclick="eliminar_carrito(\'' +
        id +
        "','" +
        contador +
        "','" +
        price_out +
        '\')" class="btn btn-eliminar-pos"><i class="fas fa-times"></i></button></td>\
		</tr>'
    );
    arreglo[contador] = 1;
    arreglo2[id] = 1;
    cuenta += parseFloat(price_out);
    contador++;
    productos++;
    cantidades++;
    show_total();
  } else {
    swal(
      "Este producto ya esta agregado al carrito. Si deseas cambiar la cantidad por favor teclea el numero deseado en la lista.",
      "",
      "info"
    );
  }
}
$("#input-descuento").change(function() {
  $("#alerta").hide();
  if ($("#input-descuento").val() != "") {
    if ($("#input-descuento").val() > 100 || $("#input-descuento").val() < 0) {
      $("#input-descuento").val("");
      $("#alerta").show();
    } else {
      descuento = $("#input-descuento").val();
    }
  } else {
    descuento = 0;
  }
  show_total();
});
function show_total() {
  var tipo_venta = $("#tipo_venta").val();
  if (tipo_venta != "" && tipo_venta != "0") {
    $("#totalcarrito")
      .empty()
      .append(
        "$" +
          parseFloat(
            (paquetes[tipo_venta].precio * (100 - descuento)) / 100
          ).toFixed(2)
      );
    $("#subtotalcarrito")
      .empty()
      .append(
        "$" +
          parseFloat(
            ((paquetes[tipo_venta].precio * (100 - descuento)) / 100) * 0.84
          ).toFixed(2)
      );
    $("#totaliva")
      .empty()
      .append(
        "$" +
          parseFloat(
            ((paquetes[tipo_venta].precio * (100 - descuento)) / 100) * 0.16
          ).toFixed(2)
      );
  } else {
    $("#totalcarrito")
      .empty()
      .append("$" + parseFloat((cuenta * (100 - descuento)) / 100).toFixed(2));
    $("#subtotalcarrito")
      .empty()
      .append(
        "$" + parseFloat(((cuenta * (100 - descuento)) / 100) * 0.84).toFixed(2)
      );
    $("#totaliva")
      .empty()
      .append(
        "$" + parseFloat(((cuenta * (100 - descuento)) / 100) * 0.16).toFixed(2)
      );
  }
  $("#totalproductos")
    .empty()
    .append(cantidades);
}
function cambiar_cantidad(id, price_out) {
  var anterior = arreglo[id];
  arreglo[id] = $("#" + id + "input").val();
  cuenta -= price_out * anterior;
  cantidades =
    parseFloat(cantidades) - parseFloat(anterior) + parseFloat(arreglo[id]);
  cuenta += parseFloat(price_out * arreglo[id]);
  show_total();
}
function eliminar_carrito(elemento, id, price_out) {
  arreglo2[elemento] = 0;
  $("#" + id).remove();
  cuenta -= parseFloat(price_out);
  cantidades -= arreglo[id];
  productos--;
  show_total();
}
function get_actual_date() {
  var today = new Date();
  var dd = today.getDate();

  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }
  var time =
    today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  today = dd + "/" + mm + "/" + yyyy;
  return today + " " + time;
}
function create_ticket(folio, cliente = null, total, recibido, cambio, tabla) {
  $("#fecha_ticket")
    .empty()
    .append(get_actual_date());
  $("#folio_ticket")
    .empty()
    .append(folio);
  if (cliente == null) {
    $("#cliente_ticket").hide();
  } else {
    $("#cliente_ticket").show();
    $("#nombre_cliente")
      .empty()
      .append(cliente.nombre);
    $("#telefono_cliente")
      .empty()
      .append(cliente.telefono);
  }
  $("#productos_ticket")
    .empty()
    .append(cantidades);
  $("#subtotal_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total * 0.84).toFixed(2)));
  $("#iva_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total * 0.16).toFixed(2)));
  $("#total_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total).toFixed(2)));
  $("#recibido_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(recibido).toFixed(2)));
  $("#cambio_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(cambio).toFixed(2)));
  $("#tabla_ticket > tbody")
    .empty()
    .append(tabla);
    var tipo_venta = $("#tipo_venta").val();
  if (tipo_venta != "" && tipo_venta != "0") {
    $("#row_precio_table").hide();
    $("#row_total_table").hide();
  }else{
    $("#row_precio_table").show();
    $("#row_total_table").show();
  }
  $("#sec-ticket").show();
  var htmlsource = $("#sec-ticket")[0];
  html2canvas(htmlsource, {
    onrendered: function(canvas) {
      var img = canvas.toDataURL("image/png");
      var doc = new jsPDF();
      doc.addImage(img, "JPEG", -35, -10);
      doc.save("Ticket_de_Compra.pdf");
      $("#sec-ticket").hide();
    }
  });
}
function sale_modal() {
  var countrows = $("#tablacarrito tr").length;
  var rows = countrows - 1;

  if (rows == 0) {
    swal(
      "<p id='pswalerror'>Atención</p>",
      "<p id='psswalerror'>Para realizar una venta primero debe agregar productos al carrito, por favor vuelva a intentarlo.</p>",
      "info"
    );
  } else {
    var tipo_venta = $("#tipo_venta").val();
    var valid = true;
    var mensaje = "";
    if (tipo_venta != "" && tipo_venta != "0") {
      if (cantidades != paquetes[tipo_venta].productos) {
        mensaje +=
          "La cantidad de productos seleccionadas debe ser igual a la cantidad de productos del " +
          paquetes[tipo_venta].nombre +
          " (" +
          paquetes[tipo_venta].productos +
          ").";

        valid = false;
      }
      if ($("#sector").val() == "") {
        if (mensaje != "") {
          mensaje += "<br>";
        }
        mensaje +=
          "Para la venta de " +
          paquetes[tipo_venta].nombre +
          " debes seleccionar a un cliente activo.";
        valid = false;
      }
    }
    if (valid) {
      var auxiliar = $("#totalcarrito").html();
      auxiliar = auxiliar.replace("$", "");
      auxiliar = auxiliar.replace(",", "");
      var total = parseFloat(auxiliar);
      total_a = 0;
      $("#total_metodo_pago")
        .empty()
        .append("$" + addCommas(parseFloat(total).toFixed(2)));
      $("#total_a_metodo_pago")
        .empty()
        .append("$" + addCommas(parseFloat(total_a).toFixed(2)));
      $("#div_pago").hide();
      $("#tabla_metodos > tbody").empty();
      $("#modalPagar").modal("toggle");
      //efective_pay();
    } else {
      swal(
        "<p id='pswalerror'> Error </p>",
        "<p id='psswalerror'>" + mensaje + "</p> ",
        "error"
      );
    }
  }
}
function check_quantities(tipo, cantidad_pago, tarjeta = "") {
  total_a += parseFloat(cantidad_pago);
  var auxiliar = $("#totalcarrito").html();
  auxiliar = auxiliar.replace("$", "");
  auxiliar = auxiliar.replace(",", "");
  var total = parseFloat(auxiliar);
  if (total <= total_a) {
    $("#div_pago").show();
  } else {
    $("#div_pago").hide();
  }
  $("#total_a_metodo_pago")
    .empty()
    .append("$" + addCommas(parseFloat(total_a).toFixed(2)));
  $("#tabla_metodos > tbody").append(
    "<tr><td>" +
      tipo +
      "</td><td>" +
      "$" +
      addCommas(parseFloat(cantidad_pago).toFixed(2)) +
      "</td><td>" +
      tarjeta +
      "</td></tr>"
  );
}
function efective_pay() {
  $("#modalPagar").modal("hide");
  swal({
    type: "info",
    title: "<p id='prealizarventa'>Realizar Cobro en Efectivo</i>",
    html: "<p id='psswal'>¿Cantidad recibida?</p>",
    input: "number",
    confirmButtonText: "Aceptar",
    showCancelButton: true,
    cancelButtonText: "Cancelar"
  }).then(result => {
    $("#modalPagar").modal("toggle");
    if (result.value) {
      var inputValue = result.value;


      check_quantities("Efectivo", inputValue);
    }
  });
}
$("#card_payment").submit(function(event) {
  event.preventDefault();
  cantidad_tarjeta = $("#cantidad_tarjeta").val();
  numero_tarjeta = $("#numero_tarjeta").val();
  numero_tarjeta = numero_tarjeta.substr(-4);
  OpenPay.token.extractFormAndCreate(
    "card_payment",
    sucess_callbak,
    error_callbak
  );
  
  
});
var sucess_callbak = function(response) {
  var token_id = response.data.id;
  $("#token_id").val(token_id);
        $.ajax({
    url: server + "webserviceapp/process_pay.php",
    type: "post",
    data: {
      nombre:$("#nombre_tarjeta").val(),
      token_id: token_id,
      amount: cantidad_tarjeta,
      description: "Esta es solo prueba",
      deviceIdHiddenFieldName: deviceSessionId
    },
    dataType: "html",
     beforeSend() {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif"
      });
    },
    success(data) {
      swal.close();
      check_quantities("Tarjeta", cantidad_tarjeta, numero_tarjeta);
      $('#card_payment')[0].reset();
      $("#modalTarjeta").modal("hide");
      
    },error(error){
      swal(
        "<p id='pswalerror'> Error </p>",
        "<p id='psswalerror'>El pago no ha podido ser procesado. Intente de nuevo, por favor.</p> ",
        "error"
      );
    }
  });
};

var error_callbak = function(response) {
  var desc =
    response.data.description != undefined
      ? response.data.description
      : response.message;
      swal(
        "<p id='pswalerror'> Error </p>",
        "<p id='psswalerror'>Los datos de la tarjeta son incorrectos.</p> ",
        "error"
      );
  $("#pay-button").prop("disabled", false);
};

function sale() {
  var auxiliar = $("#totalcarrito").html();
  auxiliar = auxiliar.replace("$", "");
  auxiliar = auxiliar.replace(",", "");
  var total = parseFloat(auxiliar);
  var cambio = parseFloat(total_a) - total;

  var product = "";
  var price_out = "";
  var ticket = "";
  var cualquierCadena = "";
  var regreso = "";
  var tipo_venta = $("#tipo_venta").val();
  var estilo = "";
  if (tipo_venta != "" && tipo_venta != "0") {
    estilo = "display:none;";
  }
  $("#tablacarrito > tbody  > tr").each(function(index) {
    product = $(this)
      .find("td:eq(0)")
      .text();
    product = product.trim();
    cualquierCadena = $(this)
      .find("td:eq(2)")
      .text();
    price_out = $(this)
      .find("td:eq(1)")
      .text();
    price_out = price_out.trim();
    regreso +=
      "<tr><td>" +
      cualquierCadena.trim() +
      "</td><td>" +
      arreglo[this.id] +
      "</td><td style='" +
      estilo +
      "'>$" +
      addCommas(parseFloat(price_out).toFixed(2)) +
      "</td><td style='" +
      estilo +
      "'>" +
      addCommas(parseFloat(arreglo[this.id] * price_out).toFixed(2)) +
      "</td></tr>";
    /*             $.ajax({
              url: server + "/webserviceapp/sale.php",
              type: "post",
              async: false,
              data: {
                product: product,
                price_out: price_out,
                stock_id: stock,
                user_id: userid
              },
              dataType: "html",
              success() {}
            });*/
  });
  cliente = null;
  cliente_sel = $("#sector").val();
  if (cliente_sel != "") {
    cliente = clientes[cliente_sel];
  }
  create_ticket(1234, cliente, total, total_a, cambio, regreso);
  ticket += "\n";
  //console.log(ticket);
  //var ate = "" + "Atendido por: " + username + "\n" + stock_name + "\n";
  //imprimir_ticket(ticket, total_string, ate);
  swal(
    "<p id='pswal'>Venta realizada</p>",
    "<p id='psswal'> El cambio a entregar es de: <br> <b id='psbswal'>$" +
      addCommas(cambio) +
      ".<sup id='supswal'>00</sup></b></p>",
    "success"
  );
  $("#modalPagar").modal("hide");

  cleanSale();
}

$(".swal2-input").on("input", function() {
  this.value = this.value.replace(/[^0-9]/g, "");
});

function addCommas(nStr) {
  nStr += "";
  var x = nStr.split(".");
  var x1 = x[0];
  var x2 = x.length > 1 ? "." + x[1] : "";
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, "$1" + "," + "$2");
  }
  return x1 + x2;
}
function logout() {
  window.location.replace("index.html");
}
function iniciovender() {
  window.location.href =
    "vender.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}
function inicioventas() {
  window.location.href =
    "ventas.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}

function iniciodevoluciones() {
  window.location.href =
    "devoluciones.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}
function inicioinicio() {
  window.location.href =
    "inicio.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}
