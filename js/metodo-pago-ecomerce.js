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

    url: "webserviceapp/process_pay.php",

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

      Swal.fire({

        title: "Cargando...",

        showConfirmButton: false,

        imageUrl: "resources/loader.gif"

      });

    },

    success(data) {

      Swal.fire.close();

      check_quantities("Tarjeta", cantidad_tarjeta, numero_tarjeta);

      $('#card_payment')[0].reset();

      $("#modalTarjeta").modal("hide");

      

    },error(error){

      Swal.fire(

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

      Swal.fire(

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

  Swal.fire(

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

