var server="";
var clientes=[];
var tipo_ref=0;
$(document).ready(function() {
  get_clientes_info();
});
function get_clientes_info() {
  $.ajax({
    url: server + "pos/webserviceapp/get_clientes.php",
    type: "POST",
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
      clientes = data.arreglo;
      //console.log(data.arreglo[2]);
      
      $("#sector")
        .empty()
        .append(data.list.replace("value=\"0\"", "value=\"\""));
      $(".selectpicker").selectpicker("refresh");
    }
  });
}
$("#payment").submit(function(event) {
  event.preventDefault();
  var cliente=clientes[$("#sector").val()];
  $.ajax({
    url: server + "webserviceapp/process_pay.php",
    type: "post",
    data:{"cantidad":$("#cantidad").val(),
      "nombre":cliente.nombre + " " + cliente.apellidos,
      "phone":cliente.telefono,
      "email":cliente.correo,
      "usuario_id":cliente.id,
      "type":tipo_ref
    },
    dataType: "json",
    beforeSend() {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "pos/resources/loader.gif"
      });
    },
    success(data) {
      console.log(data);
      swal.close();

      window.open(data.url_recibo);
      $("#modalGenerarReferencia").modal("hide");
      $("#payment")[0].reset();
      $(".selectpicker").selectpicker("refresh");
    },
    error(error) {
      swal(
        "<p id='pswalerror'> Error </p>",
        "<p id='psswalerror'>La referencia de pago no ha podido ser procesada. Intente de nuevo, por favor.</p> ",
        "error"
      );
    }
  });
});
function crear_referencia(){
  $("#modalReferencia").modal("toggle");
  
}
function open_referencia_modal(){
  $("#modalReferencia").modal("hide");
  $("#modalGenerarReferencia").modal("toggle");

}
function pago_en_tienda(){
  tipo_ref=1;
  open_referencia_modal();
}
function pago_en_banco(){
  tipo_ref=0;
  open_referencia_modal();
}
var sucess_callbak = function(response) {
  var token_id = response.data.id;
  $("#token_id").val(token_id);
  $.ajax({
    url: server + "webserviceapp/process_pay.php",
    type: "post",
    data: {
      nombre: $("#nombre_tarjeta").val(),
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
      check_quantities(
        "Terminal Electronica",
        cantidad_tarjeta,
        numero_tarjeta
      );
      $("#card_payment")[0].reset();
      $("#modalTarjeta").modal("hide");
    },
    error(error) {
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